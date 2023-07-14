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

// Verifica as credenciais no banco de dados
$sql = "SELECT * FROM pessoa WHERE email='$email' AND senha='$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['email'] = $email;
    header("Location: home.php");
} else {
    echo "Credenciais inválidas.";
}

$conn->close();
