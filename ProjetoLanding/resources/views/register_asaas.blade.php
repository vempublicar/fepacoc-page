<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro no Asaas - Fepacoc</title>

    <!-- Importando o CSS do Materialize -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>

<body>
    @php
    $selectedPlan = session('selected_plan');
    $planDetails = [
    'basic' => ['name' => 'Plano Básico', 'value' => 49.90, 'description' => 'Descrição do plano básico, ideal para iniciantes.'],
    'professional' => ['name' => 'Plano Profissional', 'value' => 99.90, 'description' => 'Descrição do plano profissional, ideal para negócios em crescimento.'],
    'business' => ['name' => 'Plano Empresarial', 'value' => 199.90, 'description' => 'Descrição do plano empresarial, para empresas estabelecidas.'],
    ];
    $planInfo = $planDetails[$selectedPlan] ?? null;
    @endphp

    <div class="container">
        <h4 class="center-align">Preencha Seus Dados para Registro</h4>

        @if ($errors->any())
        <div class="card-panel red lighten-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Formulário de Registro no Asaas -->
        <form action="{{ route('register.asaas.submit') }}" method="POST" class="col s12">
            @csrf

            <!-- Campo Nome Completo -->
            <div class="input-field col s12">
                <input id="name" name="name" type="text" class="validate" required value="{{ old('name') }}">
                <label for="name">Nome Completo</label>
            </div>

            <!-- Campo E-mail -->
            <div class="input-field col s12">
                <input id="email" name="email" type="email" class="validate" required value="{{ old('email') }}">
                <label for="email">E-mail</label>
            </div>

            <!-- Campo Telefone -->
            <div class="input-field col s12">
                <input id="phone" name="phone" type="text" class="validate" required value="{{ old('phone') }}">
                <label for="phone">Telefone</label>
            </div>

            <!-- Campo CPF -->
            <div class="input-field col s12">
                <input id="cpf" name="cpf" type="text" class="validate" required value="{{ old('cpf') }}">
                <label for="cpf">CPF</label>
            </div>

            <!-- Campo Endereço -->
            <div class="input-field col s12">
                <input id="address" name="address" type="text" class="validate" required value="{{ old('address') }}">
                <label for="address">Endereço</label>
            </div>

            <!-- Novo campo Nome da Empresa -->
            <div class="input-field col s12">
                <input id="company_name" name="company_name" type="text" class="validate" required value="{{ old('company_name') }}">
                <label for="company_name">Nome da Empresa</label>
            </div>

            <!-- Novo campo CNPJ -->
            <div class="input-field col s12">
                <input id="cnpj" name="cnpj" type="text" class="validate" required value="{{ old('cnpj') }}">
                <label for="cnpj">CNPJ</label>
            </div>

            <div class="input-field col s12">
                <input id="plan_name" name="plan_name" type="text" readonly value="{{ $planInfo['name'] ?? 'Plano não selecionado' }}">
                <label for="plan_name">Nome do Plano</label>
            </div>
            <!-- Select para Ciclo de Pagamento -->
            <div class="input-field col s12">
                <select id="payment_cycle" name="payment_cycle" onchange="updatePlanValue()">
                    <option value="MONTHLY" selected>Mensal</option>
                    <option value="ANNUAL">Anual</option>
                </select>
                <label for="payment_cycle">Ciclo de Pagamento</label>
            </div>

            <div class="input-field col s12">
                <input id="plan_value" name="plan_value" type="text" readonly value="{{ $planInfo['value'] ?? 0 }}">
                <label for="plan_value">Valor do Plano (Mensal)</label>
            </div>

            <div class="input-field col s12">
                <input id="plan_description" name="plan_description" type="text" readonly value="{{ $planInfo['description'] ?? '' }}">
                <label for="plan_description">Descrição do Plano</label>
            </div>

            

            <!-- Botão de envio -->
            <div class="center-align">
                <button type="submit" class="waves-effect waves-light btn">Confirmar Registro</button>
            </div>
        </form>
    </div>

    <!-- Importando o JavaScript do Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
<script>
    function updatePlanValue() {
        const cycle = document.getElementById('payment_cycle').value;
        const planValueField = document.getElementById('plan_value');

        // Pega o valor base do plano mensal
        const baseValue = parseFloat("{{ $planInfo['value'] ?? 0 }}");

        // Calcula o valor do plano de acordo com o ciclo selecionado
        const newValue = cycle === 'ANNUAL' ? baseValue * 12 * 0.9 : baseValue; // 10% de desconto para anual
        planValueField.value = newValue.toFixed(2);
    }

    // Inicialização do Materialize para o select
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        M.FormSelect.init(elems);
    });
</script>