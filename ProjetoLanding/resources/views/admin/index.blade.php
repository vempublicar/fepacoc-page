<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Leads</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h4 class="center-align">Painel de Administração - Leads</h4>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>WhatsApp</th>
                    <th>Tipo de Usuário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leads as $lead)
                <tr>
                    <td>{{ $lead->name }}</td>
                    <td>{{ $lead->email }}</td>
                    <td>{{ $lead->whatsapp }}</td>
                    <td>{{ $lead->user_type }}</td>
                    <td>
                        <a href="{{ route('admin.show', $lead->id) }}" class="btn-small">Ver Detalhes</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
