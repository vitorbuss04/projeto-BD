<?php 
    require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar livro</title>
    <link rel="stylesheet" href="styles/visualizar.css">
</head>
<body>
    <header>

    <div class="container-logo">
        <img src="img/logo.svg" alt="Logo" class="logo-img">
        <h1 class="logo-texto">Livraria do Buss</h1>
    </div>

    <div class="container-buttons">

        <a href="adicionar-livro.php" class="botao">
            <div class="botao-content">
                <img src="img/plus.svg" alt="icone adicionar" class="button-icon">
                <p class="button-texto">Adicionar</p>
            </div>
        </a>

        <a href="carrinho1.php" class="botao">
            <div class="botao-content">
                <img src="img/carrinho.svg" alt="icone carrinho" class="button-icon">
                <p class="button-texto">Carrinho</p>
            </div>
        </a>

    </div>
    </header>

    <main>
        <div class="container-voltar">

            <a href="index.php" class="voltar-button">Voltar</a>

        </div>
        <div class="info-produto">
            <?php 
                    if(isset($_GET['id'])) {
                        $livro_id = mysqli_real_escape_string($conexao, $_GET['id']);
                        $sql = "SELECT * FROM livros WHERE id = $livro_id";
                        $query = mysqli_query($conexao, $sql);

                        if(mysqli_num_rows($query) > 0) {
                            $livro = mysqli_fetch_array($query);
            ?>

            <div class="content-produto">

                <div class="container-img">
                    <img src="<?= $livro['capa'] ?>" alt="" class="capa-livro">
                </div>

                <div class="container-informacoes">
                    <div class="informacoes-textos">
                        <h3 class="informacoes-titulo"><?= $livro['titulo'] ?></h3>
                        <p class="informacoes-autor"><?= $livro['autor'] ?></p>
                        <p class="informacoes-genero"><?= $livro['genero'] ?></p>
                        <p class="informacoes-valor"><?= $livro['valor'] ?></p>
                    </div>

                    <form action="acoes.php" method="post" class="container-adicionar" style="padding: 0;">
                        <button type="submit" class="botao-adicionar" name="add_cart" value="<?= $livro['id'] ?>" >Adicionar ao carrinho</button>

                        <input type="number" class="quantidade" value="<?= $livro['id'] ?>" name="quant">
                    </form>
                </div>

            </div>
            <?php 
                    } else {
                        echo "<h5>Livro não encontrado</h5>";
                    }
                }
            ?>

        </div>
    </main>
</body>
</html>