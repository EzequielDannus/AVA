<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "username", "password", "database");

// Cadastro de pessoa
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insere os dados no banco de dados
    $query = "INSERT INTO pessoa (email, senha) VALUES ('$email', '$password')";
    $conn->query($query);
}

// Login (Autenticação)
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica as credenciais
    $query = "SELECT * FROM pessoa WHERE email = '$email' AND senha = '$password'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        
        session_start();
        $_SESSION['email'] = $email;
    }
}


session_start();
if (!isset($_SESSION['email'])) {
    // Redirecionar para a página de login, se não houver sessão ativa
    header("Location: login.php");
    exit();
}


if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $year = $_POST['year'];
    $email = $_SESSION['email'];

    
    $query = "SELECT idPessoa FROM pessoa WHERE email = '$email'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $personId = $row['idPessoa'];

    $query = "INSERT INTO pessoa_musica (idPessoa, idMusica) VALUES ('$personId', (SELECT idMusica FROM musica WHERE titulo = '$title' AND artista = '$artist' AND ano = '$year'))";
    $conn->query($query);
}


if (isset($_POST['remove'])) {
    $songId = $_POST['songId'];

   
    $query = "DELETE FROM pessoa_musica WHERE idMusica = '$songId'";
    $conn->query($query);
}


if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $email = $_GET['email'];

    
    $query = "SELECT idPessoa FROM pessoa WHERE email = '$email'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $personId = $row['idPessoa'];

    
    $query = "SELECT * FROM musica WHERE idMusica IN (SELECT idMusica FROM pessoa_musica WHERE idPessoa = '$personId') AND (titulo LIKE '%$searchTerm%' OR artista LIKE '%$searchTerm%' OR ano = '$searchTerm')";
    $result = $conn->query($query);

   
    while ($row = $result->fetch_assoc(MYSQLI_ASSOC)) {
        echo "Título: " . $row['titulo'] . "<br>";
        echo "Artista: " . $row['artista'] . "<br>";
        echo "Ano: " . $row['ano'] . "<br><br>";
    }
}


if (isset($_GET['email'])) {
    $email = $_GET['email'];

    
    $query = "SELECT idPessoa FROM pessoa WHERE email = '$email'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $personId = $row['idPessoa'];

    
    $query = "SELECT * FROM musica WHERE idMusica IN (SELECT idMusica FROM pessoa_musica WHERE idPessoa = '$personId')";
    $result = $conn->query($query);

    
    while ($row = $result->fetch_assoc()) {
        echo "Título: " . $row['titulo'] . "<br>";
        echo "Artista: " . $row['artista'] . "<br>";
        echo "Ano: " . $row['ano'] . "<br><br>";
    }
}

// Encerrar a conexão com o banco de dados
$conn->close();
?>
