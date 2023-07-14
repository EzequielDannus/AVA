<?php 
 session_start();
 if  (!isset ($_SESSION['email'])){ 
    header("location:login.php");
 }
    
?>



<?php 
$conn = new mysqli("localhost", "root", "", "playlists");
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
    header("location:home.php");
}
?>