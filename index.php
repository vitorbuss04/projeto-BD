<?php
    require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Emil</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <nav>
            <h1>Biblioteca Emil Glitz</h1>
        </nav>
    </header>
    <main>
        <div class="adicionar">
            <h2>Lista de livros</h2>
            <a href="adicionar-livro.php" class="botao_adicionar">Adicionar</a>
        </div>
        

        <div class="card-livro">
            <?php 
                $sql = 'SELECT * FROM livros';
                $livros = mysqli_query($conexao, $sql);
                if(mysqli_num_rows($livros) > 0) {
                    foreach($livros as $livro) {
            ?>
            
            <img src="<?= $livro['capa'] ?>" alt="capa" class="capa" width="100px">
            <a href="visualizar-livro.php?id=<?= $livro['id'] ?>">comprar</a>
            <h2 class="titulo_livro"> <?= $livro['titulo'] ?> </h2>
            <p>ISBN: <?= $livro['isbn'] ?></p>
            <p>Autor: <?= $livro['autor'] ?></p>
            <p>Genero: <?= $livro['genero'] ?></p>

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