<?php 
 session_start();
 if  (!isset ($_SESSION['email'])){ 
    header("location:login.php");
 }
    
?>

<?php

$conn = new mysqli("localhost", "root", "", "playlists");


if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchType = $_GET['searchType'];

    
    if ($searchType === 'year') {
        $query = "SELECT * FROM musica WHERE ano = '$searchTerm'";
    } elseif ($searchType === 'title') {
        $query = "SELECT * FROM musica WHERE titulo LIKE '%$searchTerm%'";
    } elseif ($searchType === 'artist') {
        $query = "SELECT * FROM musica WHERE artista LIKE '%$searchTerm%'";
    }

    $result = $conn->query($query);

    
    while ($row = $result->fetch_assoc()) {
        echo "Título: " . $row['titulo'] . "<br>";
        echo "Artista: " . $row['artista'] . "<br>";
        echo "Ano: " . $row['ano'] . "<br><br>";
        
    }
    echo '<a href ="home.php">Voltar<a/>';
}

?>
