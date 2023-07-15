<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Aplicação de Playlist</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: rgb(94, 201, 36);
            background: linear-gradient(209deg, rgba(94, 201, 36, 1) 35%, rgba(93, 181, 224, 1) 55%);
        }

        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            padding: 10px;
            font-weight: bold;
        }

        select {
            width: 15vw;
            height: 1.5rem;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            margin-bottom: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #45a049;
        }

        input {
            width: 15vw;
            height: 1.5rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5);
            width: 30vw;
            border-radius: 10px;
        }

        h2 {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #000000;
        }

        .logout {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form method="POST" action="logout.php">
        <h3>Ja cansou?</h3>
        <button class="logout" type="submit">Logout</button>
    </form>
    <h2>Adicionar Música à Playlist</h2>
    <form method="POST" action="adicionar.php">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>

        <label for="artist">Artista:</label>
        <input type="text" id="artist" name="artist" required>

        <label for="year">Ano:</label>
        <input type="number" id="year" name="year" required>

        <button type="submit" name="add">Adicionar à Playlist</button>
    </form>

    <h2>Remover Música da Playlist</h2>
    <form method="POST" action="excluir.php">
        <label for="songId">ID da Música:</label>
        <input type="text" id="songId" name="songId" required>

        <button type="submit" name="remove">Remover da Playlist</button>
    </form>

    <h2>Pesquisar Músicas na Playlist</h2>
    <form method="GET" action="config.php">
        <label for="searchTerm">Termo de Pesquisa:</label>
        <input type="text" id="searchTerm" name="search" required>

        <label for="email">E-mail do Usuário:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Pesquisar</button>
    </form>

    <h2>Visualizar Playlist de Outras Pessoas</h2>
    <form method="GET" action="config.php">
        <label for="email">E-mail do Usuário:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Visualizar Playlist</button>
    </form>

    <h2>Pesquisar Músicas na Playlist</h2>
    <form method="GET" action="pesquisar.php">
        <label for="searchTerm">Termo de Pesquisa:</label>
        <input type="text" id="searchTerm" name="search" required>

        <label for="searchType">Tipo de Pesquisa:</label>
        <select id="searchType" name="searchType" required>
            <option value="year">Ano</option>
            <option value="title">Título</option>
            <option value="artist">Artista</option>
        </select>

        <button type="submit">Pesquisar</button>
    </form>

</body>

</html>