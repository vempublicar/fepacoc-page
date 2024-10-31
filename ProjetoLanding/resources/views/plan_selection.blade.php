<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de Plano - Fepacoc</title>

    <!-- Importando o CSS do Materialize -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container">
    <h4 class="center-align">Escolha o Plano Ideal para Você</h4>
    
    <div class="row">
        <!-- Plano Básico -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Plano Básico</span>
                    <p>Descrição do plano básico, ideal para iniciantes.</p>
                    <p><strong>R$ 49,90 / mês</strong></p>
                </div>
                <div class="card-action center-align">
                    <a href="{{ route('plan.confirm', 'basic') }}" class="waves-effect waves-light btn">Selecionar</a>
                </div>
            </div>
        </div>

        <!-- Plano Profissional -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Plano Profissional</span>
                    <p>Descrição do plano profissional, ideal para negócios em crescimento.</p>
                    <p><strong>R$ 99,90 / mês</strong></p>
                </div>
                <div class="card-action center-align">
                    <a href="{{ route('plan.confirm', 'professional') }}" class="waves-effect waves-light btn">Selecionar</a>
                </div>
            </div>
        </div>

        <!-- Plano Empresarial -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Plano Empresarial</span>
                    <p>Descrição do plano empresarial, para empresas estabelecidas.</p>
                    <p><strong>R$ 199,90 / mês</strong></p>
                </div>
                <div class="card-action center-align">
                    <a href="{{ route('plan.confirm', 'business') }}" class="waves-effect waves-light btn">Selecionar</a>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- Importando o JavaScript do Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
