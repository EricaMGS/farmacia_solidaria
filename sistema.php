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
                        <a class="nav-link" href="form.php">Doar Medicamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sistema.php">Gestão Estoque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php" >DashBoard</a>
                    </li>

                </ul>
                <form >
                    <button id="open-button" onclick="openNewWindow()">Movimentar Estoque</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar fim -->
    <br>
    <style>
        .search-container {
        margin-left: 135px; /* Centraliza o conteúdo horizontalmente */
        margin-bottom: 20px; /* Adiciona uma margem inferior para separar o campo de busca da tabela */
    }
        table {
        margin: 0 auto;
        width: 80%; /* Set the table width to 100% of its container */
        border-collapse: collapse; /* Collapse table borders */
    }
    th, td {
        border: 1px solid #ddd; /* Add borders to table cells */
        padding: 8px; /* Add padding to table cells */
        text-align: center; /* Align text to the left */
    }
    th {
        background-color: #f2f2f2; /* Add background color to table header cells */
    }
    h2 {
            text-align: center; /* Centraliza o texto */
        }
        
    </style>

    <h2>Visualização de Medicamentos em Estoque</h2>

<script>
    function openNewWindow() {
        // Abrir a nova janela
        var newWindow = window.open('', '_blank', 'width=450,height=280');
        // Criar o conteúdo HTML do formulário
        var formContent = `
            <h2>Registro de Movimentação de Estoque</h2>
            <form action="processa_formulario.php" method="post">
                <label for="nome_medicamento">Nome do Medicamento:</label>
                <input type="text" id="nome_medicamento" name="nome_medicamento" required>
                <br>
                <label for="dosagem">Dosagem:</label>
                <input type="text" id="dosagem" name="dosagem" required>
                <br>
                <label for="empresa">Empresa:</label>
                <input type="text" id="empresa" name="empresa" required>
                <br>
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" min="0" required>
                <label for="UM">UM:</label>
                <select id="UM" name="UM">
                    <option value="caixa">caixa</option>
                    <option value="comprimido">comprimido</option>
                    <option value="cartela">cartela</option>
                </select>
                <br>
                <label for="recebedor">Recebedor/Doador:</label>
                <input type="text" id="recebedor" name="recebedor" required>
                <br>
                <label for="data">Validade:</label>
                <input type="date" id="data" name="data" required>
                <label for="data">Data Doação:</label>
                <input type="date" id="data_doac" name="data_doac" required>
                <br>
                <label for="posicao_estoque">Posição de Estoque:</label>
                <select id="posicao_estoque" name="posicao_estoque">
                    <option value="Prateleira A">Prateleira A</option>
                    <option value="Prateleira B">Prateleira B</option>
                    <option value="Prateleira C">Prateleira C</option>
                </select>
                <br>
                <label for="uso_controlado">Uso Controlado:</label>
                <select id="uso_controlado" name="uso_controlado">
                    <option value="FALSE">FALSE</option>
                    <option value="TRUE">TRUE</option>
                </select>
                <br>
                <br>
                <input type="submit" value="Saída de Estoque" name="submit">

                <input type="submit" value="Entrada de Estoque" name="submit">
            </form>
            
        `;
        // Escrever o conteúdo do formulário na nova janela
        newWindow.document.write(formContent);

        newWindow.document.querySelector('form').addEventListener('submit', function() {
            newWindow.close();
        });
    }
    
</script>

    <br>
    
    <div class="search-container"> <!-- Div para centralizar o campo de busca -->
    <input type="text" onkeyup="filterTable()" placeholder="ID" size="1">
    <input type="text" onkeyup="filterTable()" placeholder="Nome Medicamento" size="18">
    <input type="text" onkeyup="filterTable()" placeholder="Dosagem" size="6">
    <input type="text" onkeyup="filterTable()" placeholder="Qtd" size="9">
    <input type="text" onkeyup="filterTable()" placeholder="UM" size="8">
    <input type="text" onkeyup="filterTable()" placeholder="Empresa" size="11">
    <input type="text" onkeyup="filterTable()" placeholder="Uso Controlado" size="13"> 
    <input type="text" onkeyup="filterTable()" placeholder="Validade" size="7">
    <input type="text" onkeyup="filterTable()" placeholder="Pos_Estoque" size="17">
</div>
    
    <table id="myTable">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Dosagem</th>
            <th>Quantidade</th>
            <th>UM</th>
            <th>Empresa</th>
            <th>Uso Controlado</th>
            <th>Validade</th>
            <th>Posição de Estoque</th>
        </tr>
    
        
        <?php
        // Conectar ao banco de dados
        $host = 'localhost';
        $usuario = 'root';
        $senha = '12345678';
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
        //echo 'connected';
                
        // Exibir dados
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID_Med"] . "</td>";
                echo "<td>" . $row["Desc_Med"] . "</td>";
                echo "<td>" . $row["Dosagem"] . "</td>";
                echo "<td>" . $row["Qtd_Est"] . "</td>";
                echo "<td>" . $row["UM"] . "</td>";
                echo "<td>" . $row["Fabricante"] . "</td>";
                echo "<td>" . $row["Uso_Controlado"]. "</td>";
                echo "<td>" . $row["Validade"]. "</td>";
                echo "<td>" . $row["Posic_Estq"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Nenhum registro encontrado</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    <script>
function filterTable() {
    var inputs, table, tr, td, i, txtValue;
    inputs = document.getElementsByClassName("search-container")[0].getElementsByTagName("input");
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        var display = true;
        for (var j = 0; j < inputs.length; j++) {
            var filter = inputs[j].value.toUpperCase();
            td = tr[i].getElementsByTagName("td")[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) === -1) {
                    display = false;
                    break;
                }
            }
        }
        tr[i].style.display = display ? "" : "none";
    }
}
</script>



    <br>
    <br>

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