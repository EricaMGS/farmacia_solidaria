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
        $data = $_POST['data'];
        $posicao_estoque = $_POST['posicao_estoque'];

        // Prepara e executa a consulta SQL para inserção de dados
        $sql = "INSERT INTO dados_gerais (Desc_Med, Dosagem, Fabricante, Qtd_Est, UM, Nome, Data, Posicao_Estoque, Tp_Mv)
                VALUES ('$nome_medicamento', '$dosagem', '$empresa', $quantidade, '$UM', '$recebedor', '$data', '$posicao_estoque', 'Saída')";

        if ($conn->query($sql) === TRUE) {
            echo "Registros inseridos com sucesso";
        } else {
            echo "Erro ao inserir registros: " . $conn->error;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
}
?>
