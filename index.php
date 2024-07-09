<?php 
    require 'conexao.php';
    session_start();
    $logado = $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria do Buss</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <?php 
        include 'header.php';
    ?>

    <main>

        <div class="banner">
            <img src="" alt="" class="img-banner">
        </div>

        <div class="container-cards"> 
            <?php 
                    $sql = 'SELECT * FROM livros';
                    $livros = mysqli_query($conexao, $sql);
                    if(mysqli_num_rows($livros) > 0) {
                        foreach($livros as $livro) {
            ?>

            <a href="visualizar-livro.php?id=<?= $livro['id'] ?>" class="card-produto">
                <div class="card-content">
                    <img src="<?= $livro['capa'] ?>" alt="capa" class="card-img">
                    
                    <div class="card-info">

                        <h3 class="card-titulo"><?= $livro['titulo'] ?></h3>
                        <p class="card-autor"><?= $livro['autor'] ?></p>
                        <p class="card-valor">R$<?= $livro['valor'] ?></p>

                    </div>
                </div>
            </a>
            <?php 
                        }
                    } else {
                        echo "<h5>Nenhum livro encontrado.</h5>";
                    }
            ?>
        </div>

    </main>
</body>
</html>