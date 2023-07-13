<!DOCTYPE html>
<html>
<head>
    <title>Tela de Login</title>
</head>
<body>
    <h2>Tela de Login</h2>
    <form method="post" action="processa_login.php">
        <label for="username">Usuário:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
