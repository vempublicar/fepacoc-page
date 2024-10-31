<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page A - Fepacoc</title>

    <!-- Importando o CSS do Materialize -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
            font-family: 'Roboto', sans-serif;
        }
        .container {
            max-width: 700px;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            text-align: center;
        }
        .header-title {
            color: #182433; /* Alinhado com o tom de azul do header */
            font-weight: 600;
            margin-bottom: 10px;
        }
        .subheading {
            color: #616161;
            margin-bottom: 30px;
        }
        .cta-button {
            margin-top: 30px;
            background-color: #ff7043; /* Tom de laranja para contraste */
        }
        .cta-button:hover {
            background-color: #ff5722; /* Tom mais escuro para o efeito hover */
        }
        /* Adicionando um gradiente no botão para chamar atenção */
        .cta-button {
            background: linear-gradient(135deg, #ff7043, #ff8a65);
        }
        .benefit-icon {
            font-size: 40px;
            color: #42a5f5; /* Azul claro para ícones */
        }
        .benefit-description {
            margin-top: 10px;
            color: #424242;
        }
        /* Animação suave para o botão de call-to-action */
        .cta-button {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h4 class="header-title">Bem-vindo ao Fepacoc</h4>
        <p class="subheading">A solução definitiva para transformar a gestão do seu negócio!</p>
        
        <!-- Elemento visual com ícones de benefícios -->
        <div class="row">
            <div class="col s4 center">
                <i class="material-icons benefit-icon">bar_chart</i>
                <p class="benefit-description">Análises Precisas</p>
            </div>
            <div class="col s4 center">
                <i class="material-icons benefit-icon">insights</i>
                <p class="benefit-description">Crescimento Planejado</p>
            </div>
            <div class="col s4 center">
                <i class="material-icons benefit-icon">trending_up</i>
                <p class="benefit-description">Resultados Sustentáveis</p>
            </div>
        </div>
        
        <!-- Imagem ilustrativa de fundo empresarial -->
        <!-- Sugestão: Imagem de fundo sutil de profissionais de negócios em reunião ou gráficos de performance -->
        
        <!-- Botão Call to Action -->
        <a href="/lead-form" class="waves-effect waves-light btn-large cta-button">Saiba Mais</a>
    </div>

    <!-- Importando o JavaScript do Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
