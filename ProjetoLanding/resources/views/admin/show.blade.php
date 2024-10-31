<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Detalhes do Lead</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h4 class="center-align">Detalhes do Lead</h4>
        <ul class="collection">
            <li class="collection-item"><strong>Nome:</strong> {{ $lead->name }}</li>
            <li class="collection-item"><strong>E-mail:</strong> {{ $lead->email }}</li>
            <li class="collection-item"><strong>WhatsApp:</strong> {{ $lead->whatsapp }}</li>
            <li class="collection-item"><strong>Tipo de Usuário:</strong> {{ $lead->user_type }}</li>
        </ul>
        <!-- Aqui, será possível exibir o status do pagamento no Asaas -->
        <a href="{{ route('admin.index') }}" class="btn">Voltar</a>
    </div>
</body>
</html>
