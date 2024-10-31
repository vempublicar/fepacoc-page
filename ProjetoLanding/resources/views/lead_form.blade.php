<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Coleta de Leads - Fepacoc</title>

    <!-- Importando o CSS do Materialize -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h5 class="center-align">Cadastre-se e Conheça o Método Fepacoc</h5>

        <!-- Formulário de Leads -->
        <form action="{{ route('lead.submit') }}" method="POST" class="col s12">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" name="name" type="text" class="validate" required value="{{ old('name') }}">
                    <label for="name">Nome</label>
                    @if ($errors->has('name'))
                    <span class="red-text">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate" required value="{{ old('email') }}">
                    <label for="email">E-mail</label>
                    @if ($errors->has('email'))
                    <span class="red-text">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="input-field col s12">
                    <input id="whatsapp" name="whatsapp" type="text" class="validate" required value="{{ old('whatsapp') }}">
                    <label for="whatsapp">WhatsApp</label>
                    @if ($errors->has('whatsapp'))
                    <span class="red-text">{{ $errors->first('whatsapp') }}</span>
                    @endif
                </div>

                <div class="input-field col s12">
                    <select name="user_type" required>
                        <option value="" disabled {{ old('user_type') ? '' : 'selected' }}>Escolha o tipo de usuário</option>
                        <option value="Empresário" {{ old('user_type') == 'Empresário' ? 'selected' : '' }}>Empresário</option>
                        <option value="Freelancer" {{ old('user_type') == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
                        <option value="Estudante" {{ old('user_type') == 'Estudante' ? 'selected' : '' }}>Estudante</option>
                        <option value="Outro" {{ old('user_type') == 'Outro' ? 'selected' : '' }}>Outro</option>
                    </select>
                    <label>Tipo de Usuário</label>
                    @if ($errors->has('user_type'))
                    <span class="red-text">{{ $errors->first('user_type') }}</span>
                    @endif
                </div>
            </div>
            <div class="center-align">
                <button type="submit" class="waves-effect waves-light btn">Enviar</button>
            </div>
        </form>

    </div>

    <!-- Importando o JavaScript do Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        // Inicializa o seletor de opções
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>

</html>