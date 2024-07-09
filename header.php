<?php 
    $logado = $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/header.css">
    <title>Document</title>
</head>
<body>
<header style="z-index: 1;">

<a href="index.php" class="container-logo" style="text-decoration: none">
    <img src="img/logo.svg" alt="Logo" class="logo-img">
    <h1 class="logo-texto">Livraria de <?= $logado ?></h1>
</a>

<div class="container-buttons">

    <?php

        if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
            header('Location: login.php');
        } else {
    ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>"  method="post" class="botao">
        <div class="botao-content">
            <input type="submit" name="encerrar" value="Sair" class="button-texto" style="background-color: transparent; border: none;"></input>
        </div>
    </form>
    <?php 
        }

        if(isset($_POST['encerrar'])) {
            session_destroy();
            header('Location: index.php');
        }
    ?>

    <a href="adicionar-livro.php" class="botao">
        <div class="botao-content">
            <img src="img/plus.svg" alt="icone adicionar" class="button-icon">
            <p class="button-texto">Adicionar</p>
        </div>
    </a>

    <a href="carrinho.php" class="botao">
        <div class="botao-content">
            <img src="img/carrinho.svg" alt="icone carrinho" class="button-icon">
            <p class="button-texto">Carrinho</p>
        </div>
    </a>

</div>
</header>
</body>
</html>