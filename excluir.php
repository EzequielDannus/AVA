<?php 
 session_start();
 if  (!isset ($_SESSION['email'])){ 
    header("location:login.php");
 }
    
?>



<?php 
$conn = new mysqli("localhost", "root", "", "playlists");
if (isset($_POST['remove'])) {
    $songId = $_POST['songId'];

   
    $query = "DELETE FROM pessoa_musica WHERE idMusica = '$songId'";
    $conn->query($query);
    header("location:home.php");
}
    

?>