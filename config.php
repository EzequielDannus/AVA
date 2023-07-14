<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "playlists");

session_start();
if (!isset($_SESSION['email'])) {
    // Redirecionar para a página de login, se não houver sessão ativa
    header("Location: login.php");
    exit();
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

   
    while ($row = $result->fetch_assoc()) {
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
