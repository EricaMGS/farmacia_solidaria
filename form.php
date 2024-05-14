<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia Solidária - Home</title>
    <link rel="shortcut icon" href="Imagens/remedio.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar início -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="Imagens/remedio.png" alt="remédios" width="30" height="24"> Farmácia Solidária</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form.php" >Doar Medicamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sistema.php" >Gestão Estoque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php" >DashBoard</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Digite aqui " aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar fim -->
    <style>
        /* Estilos para o container */
        .container {
            max-width: 800px; /* Define a largura máxima do container */
            margin: 0 auto; /* Centraliza o container na página */
            padding: 0 20px; /* Adiciona um preenchimento interno ao container */
        }

        /* Estilos para o texto */
        p {
            font-size: 15px; /* Define o tamanho da fonte do texto */
            line-height: 1.6; /* Define a altura da linha para melhor legibilidade */
            text-align: justify; /* Justifica o texto */
        }
    </style>
    
    <br>
    <br>
    <div class="container">
    <h1>Por que e como doar ?</h1>
    <p>O processo de doação de remédios é um ato de solidariedade e empatia, fundamental para o bem-estar da sociedade. Qualquer pessoa física ou jurídica que deseje contribuir para o bem-estar do próximo pode participar desse processo. Os medicamentos desempenham um papel crucial na saúde da população, pois ajudam a prevenir, tratar e controlar uma variedade de doenças e condições médicas. No entanto, muitas pessoas não têm acesso adequado a esses recursos essenciais de saúde devido a diferentes barreiras, como falta de recursos financeiros ou infraestrutura de saúde inadequada. Portanto, doar medicamentos é uma forma significativa de garantir que aqueles que mais precisam tenham acesso aos tratamentos necessários para melhorar sua qualidade de vida e promover sua saúde.</p>

    <p>Para efetuar uma doação, é necessário preencher o formulário abaixo com as informações do medicamento, incluindo o nome, dosagem, validade, quantidade e fabricante. Ao fornecer esses detalhes, você estará contribuindo para garantir que os medicamentos doados sejam distribuídos de forma eficiente e segura para aqueles que necessitam, ajudando a promover o bem-estar e a saúde da comunidade em geral.</p>
    
    <br>

    <h2>Formulário de Submissão</h2>
<form action="" method="post">
    <label for="descricao">Nome Doador:</label><br>
    <input type="text" id="Nome_Doador" name="Nome_Doador" required><br>

    <label for="descricao">Telefone:</label><br>
    <input type="tel" id="Telefone" name="Telefone" required><br>

    <label for="descricao">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="descricao">Descrição:</label><br>
    <input type="text" id="descricao" name="descricao" required><br>

    <label for="dosagem">Dosagem:</label><br>
    <input type="number" id="dosagem" name="dosagem" min="0" required><br>

    <label for="quantidade">Quantidade:</label><br>
    <input type="number" id="quantidade" name="quantidade" min="1"required style="width: 90px;">
    <select id="UM" name="UM" required style="width: 90px; height:29px">
                    <option value="caixa">Caixa</option>
                    <option value="comprimido">Comprimido</option>
                    <option value="cartela">Cartela</option>
                </select>
    <br>

    <label for="fabricante">Fabricante:</label><br>
    <input type="text" id="fabricante" name="fabricante" required><br>

    <label for="uso_controlado">Uso Controlado:</label><br>
    <input type="checkbox" id="uso_controlado" name="uso_controlado"><br>

    <label for="validade">Validade:</label><br>
    <input type="date" id="validade" name="validade" required><br><br>

    <input type="submit" value="Enviar">
    <input type="reset" value="Limpar">
</form>
    </div>  
<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "new_schema";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

   // Extrair valores do formulário
   $descricao = $_POST['descricao'];
   $dosagem = $_POST['dosagem'];
   $quantidade = $_POST['quantidade'];
   $um = $_POST['UM'];
   $fabricante = $_POST['fabricante'];
   $uso_controlado = isset($_POST['uso_controlado']) ? 1 : 0;
   $validade = $_POST['validade'];
   $nome_Doador = $_POST['Nome_Doador'];
   $telefone = $_POST['Telefone'];
   $email = $_POST['email'];

   // Preparar e executar a consulta SQL para inserir dados do medicamento
   $sqlMedicamento = "INSERT INTO doar (Descricao, Dosagem, Quantidade, UM, Fabricante, Nome, Telefone, E_mail, Uso_contr, Validade)
           VALUES ('$descricao', $dosagem, $quantidade, '$um', '$fabricante', '$nome_Doador', '$telefone', '$email',  '$uso_controlado', '$validade')";


   if ($conn->query($sqlMedicamento)) {
       echo "Registros inseridos com sucesso";
   } else {
       echo "Erro ao inserir registros: " . $conn->error;
   }

    // Fechar conexão com o banco de dados
    $conn->close();
}
?>

    <br>
    <br>
    <footer class="bg-body-tertiary text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05)" text-align: center;>
            <p>Autores alunos da Univesp:<br>
            <p>Andre Giovanini De Oliveira Sartori,
                Cleyson Gabriel Silva Dos Santos,
                Diogo Marcelino Cuba, Erica Medeiros Grota Sartori,
                Guilherme Francisco Neves, Kedma Teixeira Montedori, Lucas Cruz Barcat</p>
            <p>© 2024</p>
            <hr>
            <p>Fontes imagens:
            <a href="https://www.flaticon.com/br/icones-gratis/ajuda-humanitaria" title="ajuda-humanitaria ícones" target="_blank">Ajuda-humanitaria ícones criados por Freepik - Flaticon</a>
            <a href="https://www.flaticon.com/br/icones-gratis/computador" title="computador ícones" target="_blank">Computador ícones criados por Freepik - Flaticon</a></p>
        </div>
        <!-- Copyright -->

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>
