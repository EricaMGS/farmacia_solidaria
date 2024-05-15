<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia Solidária - Home</title>
    <link rel="shortcut icon" href="Imagens/remedio.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Estilos CSS */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        canvas {
            width: 100%;
            height: 400px;
            margin-bottom: 20px;
        }
        #square {
        float: left;
        margin-top: 45px;
        margin-left: 60px;
        width: 180px;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 50px;
        border: 1px solid black; padding: 10px;
    }

.grid-container {
    float: left;
    display: flex;
    flex-direction: column;
}
.grid-container2 {
    float: right;
    display: flex;
    flex-direction: column;
}
    </style>
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
            </div>
        </div>
    </nav>
    <!-- Navbar fim -->

<div class="container">
        <h1>Dashboard</h1>
        
    </div>
    <div class="grid-container">
    
    <div id="square" class="square">
        <h1 style="font-size: 17px; margin-right: 15px;" >Qtd. Med. <br> Estoque: </h1>
        
            <?php
        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "new_schema";

        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta SQL para obter a quantidade de linhas no banco de dados
        $sql = "SELECT COUNT(DISTINCT Desc_Med) as count FROM bdd" ;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Saída da quantidade de linhas
            while($row = $result->fetch_assoc()) {
                echo $row["count"];
            }
        } else {
            echo "0 resultados";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        ?>

    </div>
    
    <div id="square" style="border: 1px solid black; padding: 10px;" class="square">
        <h1 style="font-size: 17px; margin-right: 15px;">Total <br> Entradas:</h1>
        <?php
        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "new_schema";

        // Criar a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta SQL para obter a quantidade de itens filtrando pela coluna UM
        $sql = "SELECT COUNT(Tp_Mv) AS entradas FROM dados_gerais WHERE Tp_Mv = 'Entrada'"; //
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibir a quantidade de itens
            while($row = $result->fetch_assoc()) {
                echo "<h2 style='font-size: 24px; margin-bottom: 0px;'>{$row["entradas"]}</h2>";
            }
        } else {
            echo "0 resultados";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
        ?>
    </div>

    <div id="square" style="border: 1px solid black; padding: 10px;" class="square">
        <h1 style="font-size: 17px; margin-right: 15px;">Total <br> Saídas:</h1>
        <?php
        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "new_schema";

        // Criar a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta SQL para obter a quantidade de itens filtrando pela coluna UM
        $sql = "SELECT COUNT(Tp_Mv) AS doacoes FROM dados_gerais WHERE Tp_Mv = 'Saída'"; //
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibir a quantidade de itens
            while($row = $result->fetch_assoc()) {
                echo "<h2 style='font-size: 24px; margin-bottom: 0px;'>{$row["doacoes"]}</h2>";
            }
        } else {
            echo "0 resultados";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
        ?>
    </div>

    </div>

    <div class="grid-container2">
    <div id="square" style="border: 1px solid black; margin-right: 50px; padding: 10px;" class="square">
        <h1 style="font-size: 17px; margin-right: 15px;">Total Caixas <br> Estoque:</h1>
        <?php
        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "new_schema";

        // Criar a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta SQL para obter a quantidade de itens filtrando pela coluna UM
        $sql = "SELECT SUM(Qtd_Est) AS total_caixa FROM bdd WHERE UM = 'caixa'"; //
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibir a quantidade de itens
            while($row = $result->fetch_assoc()) {
                echo "<h2 style='font-size: 24px; margin-bottom: 0px;'>{$row["total_caixa"]}</h2>";
            }
        } else {
            echo "0 resultados";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
        ?>
    </div>

    <div id="square" style="border: 1px solid black; margin-right: 50px; padding: 10px;" class="square">
        <h1 style="font-size: 17px; margin-right: 15px;">Total Cartelas <br> Estoque:</h1>
        <?php
        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "new_schema";

        // Criar a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta SQL para obter a quantidade de itens filtrando pela coluna UM
        $sql = "SELECT SUM(Qtd_Est) AS total_cartela FROM bdd WHERE UM = 'cartela'"; //
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibir a quantidade de itens
            while($row = $result->fetch_assoc()) {
                echo "<h2 style='font-size: 24px; margin-bottom: 0px;'>{$row["total_cartela"]}</h2>";
            }
        } else {
            echo "0 resultados";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
        ?>
    </div>

    <div id="square" style="border: 1px solid black; margin-right: 50px; padding: 10px;" class="square">
        <h1 style="font-size: 17px; margin-right: 15px;">Total comprimidos <br> Estoque:</h1>
        <?php
        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "new_schema";

        // Criar a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta SQL para obter a quantidade de itens filtrando pela coluna UM
        $sql = "SELECT SUM(Qtd_Est) AS total_comprimidos FROM bdd WHERE UM = 'comprimido'"; //
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibir a quantidade de itens
            while($row = $result->fetch_assoc()) {
                echo "<h2 style='font-size: 24px; margin-bottom: 0px;'>{$row["total_comprimidos"]}</h2>";
            }
        } else {
            echo "0 resultados";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
        ?>
    </div>


    </div>
    
    <div class="container">
    <canvas id="myChart" style="height: 500px;"></canvas>
    <canvas id="chartValidade"></canvas>    
    
    </div>



        <?php
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "new_schema";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consulta SQL para obter os dados
    $sql = "SELECT Desc_Med, UM, SUM(Qtd_Est) as total FROM bdd GROUP BY Desc_Med, UM";
    $result = $conn->query($sql);

    // Arrays para armazenar os dados
    $labels = [];
    $datasets = [];

    $cores_por_um = [
        'caixa' => 'rgba(255, 99, 132, 0.7)', // Vermelho
        'cartela' => 'rgba(54, 162, 235, 0.7)', // Azul
        'comprimido' => 'rgba(255, 206, 86, 0.7)' // Amarelo
    ];

    // Extrair dados do resultado da consulta e armazenar nos arrays
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $descMed = $row["Desc_Med"];
            $um = $row["UM"];
            $total = $row["total"];
            
            // Verificar se já existe um conjunto de dados para a Desc_Med
            $labelIndex = array_search($descMed, array_column($labels, 'label'));
            
            // Se não existir, adiciona um novo rótulo
            if ($labelIndex === false) {
                $labels[] = [
                    'label' => $descMed,
                    'data' => [], // Inicializa o array de dados
                ];
                $labelIndex = count($labels) - 1;
                
                // Inicializa os dados do novo rótulo para todos os conjuntos de dados
                foreach ($datasets as &$dataset) {
                    $dataset['data'][] = 0;
                }
                unset($dataset); // Desvincula a referência
            }
            
            // Verifica se já existe um conjunto de dados para a UM
            $umIndex = array_search($um, array_column($datasets, 'label'));
            
            // Se não existir, adiciona um novo conjunto de dados
            if ($umIndex === false) {
                $datasets[] = [
                    'label' => $um,
                    'data' => array_fill(0, count($labels), 0), // Inicializa o array de dados
                    'backgroundColor' => $cores_por_um[$um], // Define a cor com base no tipo de UM
                    'borderColor' => $cores_por_um[$um], // Define a cor da borda com base no tipo de UM
                    'borderWidth' => 1
                ];
                $umIndex = count($datasets) - 1;
            }
            
            // Adiciona o total ao conjunto de dados correspondente
            $datasets[$umIndex]['data'][$labelIndex] += $total;
        }
    }

    // Fechar conexão com o banco de dados
    $conn->close();
    ?>

    <!-- Elemento canvas para o gráfico -->
    

    <script>
        // Obtendo referência para o elemento canvas
        var ctx = document.getElementById('myChart').getContext('2d');

        // Criando o gráfico de barras
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_column($labels, 'label')); ?>,
                datasets: <?php echo json_encode($datasets); ?>
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stacked: true
                    },
                    x: {
                        stacked: true // Empilha as barras no eixo X
                    }
                }
            }
        });
    </script>

    
    <script>
        // PHP para acessar o banco de dados e recuperar os dados
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "new_schema";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Query para o segundo gráfico (Validade)
        $sqlValidade = "SELECT Validade, SUM(Qtd_Est) AS total FROM bdd GROUP BY Validade";
        $resultValidade = $conn->query($sqlValidade);

        $labelsValidade = [];
        $dataValidade = [];

        if ($resultValidade->num_rows > 0) {
            while ($row = $resultValidade->fetch_assoc()) {
                $labelsValidade[] = $row["Validade"];
                $dataValidade[] = $row["total"];
            }
        } else {
            echo "0 results";
        }
        

        $conn->close();
        ?>

        
        // JavaScript para criar o segundo gráfico (Validade)
        var ctxValidade = document.getElementById('chartValidade').getContext('2d');
        var chartValidade = new Chart(ctxValidade, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labelsValidade); ?>,
                datasets: [{
                    label: 'Quantidade em Estoque (por Validade)',
                    data: <?php echo json_encode($dataValidade); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
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
