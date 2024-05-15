<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if ($_POST['submit'] == 'Entrada de Estoque') {
        // Lógica para lidar com a entrada de estoque
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

        // Obtém os dados do formulário
        $nome_medicamento = $_POST['nome_medicamento'];
        $dosagem = $_POST['dosagem'];
        $empresa = $_POST['empresa'];
        $quantidade = $_POST['quantidade'];
        $UM = $_POST['UM'];
        $recebedor = $_POST['recebedor'];
        $data = $_POST['data'];
        $posicao_estoque = $_POST['posicao_estoque'];

        // Prepara e executa a consulta SQL para inserção de dados
        $sql = "INSERT INTO dados_gerais (Desc_Med, Dosagem, Fabricante, Qtd_Est, UM, Nome, Data, Posicao_Estoque, Tp_Mv)
                VALUES ('$nome_medicamento', '$dosagem', '$empresa', $quantidade, '$UM', '$recebedor', '$data', '$posicao_estoque', 'Entrada')";

        if ($conn->query($sql) === TRUE) {
            echo "Registros inseridos com sucesso";
        } else {
            echo "Erro ao inserir registros: " . $conn->error;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        
    } elseif ($_POST['submit'] == 'Saída de Estoque') {
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

        // Obtém os dados do formulário
        $nome_medicamento = $_POST['nome_medicamento'];
        $dosagem = $_POST['dosagem'];
        $empresa = $_POST['empresa'];
        $quantidade = $_POST['quantidade'];
        $UM = $_POST['UM'];
        $recebedor = $_POST['recebedor'];
        $data_doac = $_POST['data'];
        $posicao_estoque = $_POST['posicao_estoque'];

        // Prepara e executa a consulta SQL para inserção de dados
        $sql = "INSERT INTO dados_gerais (Desc_Med, Dosagem, Fabricante, Qtd_Est, UM, Nome, Data, Posicao_Estoque, Tp_Mv)
                VALUES ('$nome_medicamento', '$dosagem', '$empresa', $quantidade, '$UM', '$recebedor', '$data_doac', '$posicao_estoque', 'Saída')";

        if ($conn->query($sql) === TRUE) {
            echo "Registros inseridos com sucesso";
        } else {
            echo "Erro ao inserir registros: " . $conn->error;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
}

// Adicionando segunda parte


$host = 'localhost';
$usuario = 'root';
$senha = '12345678';
$banco = 'new_schema';

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Recupera os dados do formulário
$nome_medicamento = $_POST['nome_medicamento'];
$dosagem = $_POST['dosagem'];
$empresa = $_POST['empresa'];
$quantidade = $_POST['quantidade'];
$UM = $_POST['UM'];
$data = $_POST['data'];
$posicao_estoque = $_POST['posicao_estoque'];
$uso_controlado = $_POST['uso_controlado']; // Recupera o campo "uso_controlado"
$submit_type = $_POST['submit'];

// Verifica o tipo de movimentação (entrada ou saída)
if ($submit_type == "Saída de Estoque") {
    // Verifica se há um medicamento correspondente no banco de dados com os mesmos detalhes
    $sql_verify = "SELECT * FROM bdd WHERE Desc_Med = '$nome_medicamento' AND Dosagem = '$dosagem' AND Fabricante = '$empresa' AND Uso_Controlado = '$uso_controlado' AND Validade = '$data' AND Posic_Estq = '$posicao_estoque' AND UM = '$UM'";
    $result = $conn->query($sql_verify);

    if ($result->num_rows > 0) {
        // Atualiza a quantidade no banco de dados para saída de estoque
        $sql = "UPDATE bdd SET Qtd_Est = Qtd_Est - $quantidade WHERE Desc_Med = '$nome_medicamento' AND Dosagem = '$dosagem' AND Fabricante = '$empresa' AND Uso_Controlado = '$uso_controlado' AND Validade = '$data' AND Posic_Estq = '$posicao_estoque' AND UM = '$UM'";
    } else {
        // Se não houver correspondência, insere uma nova linha no banco de dados com todos os detalhes do formulário
        $sql = "INSERT INTO bdd (Desc_Med, Dosagem, Fabricante, Qtd_Est, Uso_Controlado, Validade, Posic_Estq, UM) VALUES ('$nome_medicamento', '$dosagem', '$empresa', -$quantidade, '$uso_controlado', '$data', '$posicao_estoque', '$UM')";
    }
} elseif ($submit_type == "Entrada de Estoque") {
    // Verifica se há um medicamento correspondente no banco de dados com os mesmos detalhes
    $sql_verify = "SELECT * FROM bdd WHERE Desc_Med = '$nome_medicamento' AND Dosagem = '$dosagem' AND Fabricante = '$empresa' AND Uso_Controlado = '$uso_controlado' AND Validade = '$data' AND Posic_Estq = '$posicao_estoque' AND UM = '$UM'";
    $result = $conn->query($sql_verify);

    if ($result->num_rows > 0) {
        // Atualiza a quantidade no banco de dados para entrada de estoque
        $sql = "UPDATE bdd SET Qtd_Est = Qtd_Est + $quantidade WHERE Desc_Med = '$nome_medicamento' AND Dosagem = '$dosagem' AND Fabricante = '$empresa' AND Uso_Controlado = '$uso_controlado' AND Validade = '$data' AND Posic_Estq = '$posicao_estoque' AND UM = '$UM'";
    } else {
        // Se não houver correspondência, insere uma nova linha no banco de dados com todos os detalhes do formulário
        $sql = "INSERT INTO bdd (Desc_Med, Dosagem, Fabricante, Qtd_Est, Uso_Controlado, Validade, Posic_Estq, UM) VALUES ('$nome_medicamento', '$dosagem', '$empresa', $quantidade, '$uso_controlado', '$data', '$posicao_estoque', '$UM')";
    }
}

// Executa a query SQL
if ($conn->query($sql) === TRUE) {
    echo "Movimentação de estoque registrada com sucesso!";
} else {
    echo "Erro ao registrar movimentação de estoque: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();



?>
