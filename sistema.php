<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia Solidária - Gestão de Estoque</title>
    <link rel="shortcut icon" href="Imagens/estoque.png">
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
                        <a class="nav-link" href="sistema.html" target="_blank">Gestão Estoque</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar fim -->
    <br>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

    <h2>Visualização do Banco de Dados</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Dosagem</th>
            <th>Quantidade</th>
            <th>Empresa</th>
            <th>Uso Controlado</th>
            <th>Posição de Estoque</th>
        </tr>
        
        <?php
        // Conectar ao banco de dados
        $host = 'localhost';
        $usuario = 'root';
        $senha = 'Vida@001';
        $banco = 'new_schema';

        $conn = new mysqli($host, $usuario, $senha, $banco);

        // Verificar conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta SQL para recuperar os dados
        $sql = "SELECT * FROM bdd";
        $result = $conn->query($sql);

        // Fechar conexão
        echo 'connected';
                
        // Exibir dados
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID_Med"] . "</td>";
                echo "<td>" . $row["Desc_Med"] . "</td>";
                echo "<td>" . $row["Dosagem"] . "</td>";
                echo "<td>" . $row["Qtd_Est"] . "</td>";
                echo "<td>" . $row["Fabricante"] . "</td>";
                echo "<td>" . $row["Uso_Controlado"]. "</td>";
                echo "<td>" . $row["Posic_Estq"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Nenhum registro encontrado</td></tr>";
        }
        $conn->close();
        ?>
    </table>


    <footer class="bg-body-tertiary text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            <p>Autores alunos da Univesp:<br>
            <p>Andre Giovanini De Oliveira Sartori,
                Cleyson Gabriel Silva Dos Santos,
                Diogo Marcelino Cuba, Erica Medeiros Grota Sartori,
                Guilherme Francisco Neves, Kedma Teixeira Montedori, Lucas Cruz Barcat</p>
            <p>© 2024</p>
            <hr>
            <p>Fontes imagens:
                <a href="https://www.flaticon.com/br/icones-gratis/ajuda-humanitaria" title="ajuda-humanitaria ícones"
                    target="_blank">Ajuda-humanitaria ícones criados por Freepik - Flaticon</a>
                <a href="https://www.flaticon.com/br/icones-gratis/computador" title="computador ícones"
                    target="_blank">Computador ícones criados por Freepik - Flaticon</a>
            </p>
        </div>
        <!-- Copyright -->

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>