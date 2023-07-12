<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_file'])) {
    $file_name = $_POST['file_name'];
    $file_path = $_POST['file_path'];

    // Validar os dados
    if (empty($file_name) || empty($file_path)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Validar o tipo correto de dados
        if (!is_string($file_name) || !is_string($file_path)) {
            echo "Os campos devem ser do tipo texto.";
        } else {
            // Limpar os dados para evitar ataques de injeção de SQL
            $file_name = mysqli_real_escape_string($conn, $file_name);
            $file_path = mysqli_real_escape_string($conn, $file_path);

            // Preparar uma declaração SQL parametrizada para evitar ataques de injeção de SQL
            $insert_query = $conn->prepare("INSERT INTO arquivos (nome, caminho, id_usuario) VALUES (?, ?, (SELECT id FROM usuarios WHERE username = ?))");
            $insert_query->bind_param("sss", $file_name, $file_path, $username);

            if ($insert_query->execute()) {
                echo "Arquivo adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar o arquivo.";
            }

            $insert_query->close();
        }
    }
}
?>
