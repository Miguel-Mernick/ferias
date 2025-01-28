<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Minhas Férias</title>
</head>
<body>
    <nav>
        <h1>Minhas Férias</h1>
        <ul>
            <li>
                <a href="logout.php"><img src="https://cdn-icons-png.flaticon.com/512/1053/1053210.png" alt="Sair"></a>
            </li>
        </ul>
    </nav>

    <div class="background-gif">
        <div class="container">
            <div class="imagem">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1bGMDWpOa3NHA6HuVlLLYTebq2_y2Gsrgfw&s" alt="Foto de um quarto">
                <p class="descricao">Passei um tempo relaxando no meu quarto, assistindo filmes e jogando com meus amigos.</p>
            </div>
            <div class="imagem">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVGHv2MTWG_YG9sDdBDPvqZEMS789pRJhs8Q&s" alt="Foto de um carro com um caminhão">
                <p class="descricao">Trabalhei ao lado do meu tio na oficina Roch Freios, aprendendo sobre manutenção de caminhões.</p>
            </div>
            <div class="imagem">
                <img src="https://www.dicaseducacaofisica.info/wp-content/uploads/2017/04/basquete-quadra.webp" alt="foto de uma quadra de basquete">
                <p class="descricao">Joguei basquete com os amigos no SESI 166, foi um dia muito divertido.</p>
            </div>
        </div>
    </div>
</body>
</html>