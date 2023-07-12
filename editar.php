<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_file'])) {
    $file_id = $_POST['file_id'];
    $file_name = $_POST['file_name'];
    $file_path = $_POST['file_path'];

    // Validar os dados
    if (empty($file_id) || empty($file_name) || empty($file_path)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Validar o tipo correto de dados
        if (!is_numeric($file_id) || !is_string($file_name) || !is_string($file_path)) {
            echo "Os campos devem ser do tipo correto.";
        } else {
            // Limpar os dados para evitar ataques de injeção de SQL
            $file_id = mysqli_real_escape_string($conn, $file_id);
            $file_name = mysqli_real_escape_string($conn, $file_name);
            $file_path = mysqli_real_escape_string($conn, $file_path);

            // Preparar uma declaração SQL parametrizada para evitar ataques de injeção de SQL
            $update_query = $conn->prepare("UPDATE arquivos SET nome=?, caminho=? WHERE id=?");
            $update_query->bind_param("ssi", $file_name, $file_path, $file_id);

            if ($update_query->execute()) {
                echo "Arquivo atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o arquivo.";
            }

            $update_query->close();
        }
    }
}
?>
