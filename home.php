<!DOCTYPE html>
<html>
<head>
    <title>Aplicação de Playlist</title>
</head>
<body>


    <h2>Adicionar Música à Playlist</h2>
    <form method="POST" action="config.php">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="artist">Artista:</label>
        <input type="text" id="artist" name="artist" required><br>

        <label for="year">Ano:</label>
        <input type="text" id="year" name="year" required><br>

        <button type="submit" name="add">Adicionar à Playlist</button>
    </form>

   
    <h2>Remover Música da Playlist</h2>
    <form method="POST" action="config.php">
        <label for="songId">ID da Música:</label>
        <input type="text" id="songId" name="songId" required><br>

        <button type="submit" name="remove">Remover da Playlist</button>
    </form>

    
    <h2>Pesquisar Músicas na Playlist</h2>
    <form method="GET" action="config.php">
        <label for="searchTerm">Termo de Pesquisa:</label>
        <input type="text" id="searchTerm" name="search" required><br>

        <label for="email">E-mail do Usuário:</label>
        <input type="email" id="email" name="email" required><br>

        <button type="submit">Pesquisar</button>
    </form>

    
    <h2>Visualizar Playlist de Outras Pessoas</h2>
    <form method="GET" action="config.php">
        <label for="email">E-mail do Usuário:</label>
        <input type="email" id="email" name="email" required><br>

        <button type="submit">Visualizar Playlist</button>
    </form>
</body>
</html>
