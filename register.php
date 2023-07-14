<?php
session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "playlists";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtém os valores enviados pelo formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Insere os valores no banco de dados
$sql = "INSERT INTO pessoa (email, senha) VALUES ('$email', '$senha')";

if ($conn->query($sql) === TRUE) {
    header("Location: login.html");
} else {
    echo "Erro ao registrar: " . $conn->error;
}

$conn->close();
