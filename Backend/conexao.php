<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'loja_teste';

$conn = new mysqli($host, $username, $password, $database, 3307);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// echo "Conexão bem-sucedida!";
?>