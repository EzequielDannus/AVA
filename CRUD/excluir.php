<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_file'])) {
    $file_id = $_POST['file_id'];

    // Validar os dados
    if (empty($file_id)) {
        echo "Por favor, forneça o ID do arquivo.";
    } else {
        // Validar o tipo correto de dados
        if (!is_numeric($file_id)) {
            echo "O ID do arquivo deve ser um valor numérico.";
        } else {
            // Limpar os dados para evitar ataques de injeção de SQL
            $file_id = mysqli_real_escape_string($conn, $file_id);

            // Preparar uma declaração SQL parametrizada para evitar ataques de injeção de SQL
            $delete_query = $conn->prepare("DELETE FROM arquivos WHERE id=?");
            $delete_query->bind_param("i", $file_id);

            if ($delete_query->execute()) {
                echo "Arquivo excluído com sucesso!";
            } else {
                echo "Erro ao excluir o arquivo.";
            }

            $delete_query->close();
        }
    }
}
?>
