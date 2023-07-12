<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;
    echo "Login bem-sucedido!";
} else {
    echo "Por favor, forneça um nome de usuário e senha.";
}
?>
