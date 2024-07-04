<?php
    require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Emil</title>
</head>
<body>
    <header>
        <img src="img/logo.svg" alt="logo" width="50px">
        <h1>Livraria do Buss</h1>
    </header>
    <main>
        <div class="adicionar">
            <h2>Recomendados</h2>
            <a href="carrinho.php" class="link_carrinho">carrinho</a>
            <a href="adicionar-livro.php" class="botao_adicionar">Adicionar</a>
        </div>

        <div class="container-produtos">
                <?php 
                    $sql = 'SELECT * FROM livros';
                    $livros = mysqli_query($conexao, $sql);
                    if(mysqli_num_rows($livros) > 0) {
                        foreach($livros as $livro) {
                ?>
            <a href="visualizar-livro.php?id=<?= $livro['id'] ?>" class="link-livro">
                <div class="card-livro"> 
                    <img src="<?= $livro['capa'] ?>" alt="capa" class="capa">
                    <div class="info">
                        <h2 class="titulo_livro"> <?= $livro['titulo'] ?> </h2>
                        <p class="preco">R$<?= $livro['valor'] ?></p>
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