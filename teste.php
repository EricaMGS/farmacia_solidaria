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
$conn->close();
echo 'disconnected'
?>