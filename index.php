<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Se o usuário não estiver autenticado, redirecione-o para a página de login
    header("Location: login.php");
    exit();
}

include 'conexao.php';

// Consulta os arquivos do usuário logado
$username = $_SESSION['username'];
$sql = "SELECT * FROM arquivos WHERE id_usuario = (SELECT id FROM usuarios WHERE username = '$username')";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Educação</title>
</head>
<body>
    <h1>Seus arquivos:</h1>

    <table>
    <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Caminho</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Exibe os arquivos
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['caminho']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum arquivo encontrado.</td></tr>";
        }
        ?>
       

    </table>

    <h2>Adicionar arquivo:</h2>
    <form method="post" action="adicionar.php">
        <label for="file_name">Nome:</label>
        <input type="text" name="file_name" id="file_name" required>

        <label for="file_path">Caminho:</label>
        <input type="text" name="file_path" id="file_path" required>

        <input type="submit" name="add_file" value="Adicionar">
    </form>

    <h2>Editar arquivo:</h2>
    <form method="post" action="editar.php">
        <label for="edit_file_id">ID do arquivo:</label>
        <input type="number" name="file_id" id="edit_file_id" required>

        <label for="edit_file_name">Nome:</label>
        <input type="text" name="file_name" id="edit_file_name" required>

        <label for="edit_file_path">Caminho:</label>
        <input type="text" name="file_path" id="edit_file_path" required>

        <input type="submit" name="edit_file" value="Editar">
    </form>

    <h2>Excluir arquivo:</h2>
    <form method="post" action="excluir.php">
        <label for="delete_file_id">ID do arquivo:</label>
        <input type="number" name="file_id" id="delete_file_id" required>

        <input type="submit" name="delete_file" value="Excluir">
    </form>
</body>
</html>

<?php
$conn->close();
?>
