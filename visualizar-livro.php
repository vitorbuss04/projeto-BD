<?php 
    require 'conexao.php';
    session_start();
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
    <?php 
        include 'header.php';
    ?>

    <main>
        
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
                        <p class="sinopse"><?= $livro['Sinopse'] ?></p>
                    </div>

                    <form action="acoes.php" method="post" class="container-adicionar" style="padding: 0;">
                        <button type="submit" class="botao-adicionar" name="add_cart" value="<?= $livro['id'] ?>" >Adicionar ao carrinho</button>

                        <input type="number" class="quantidade" value="1" name="quant" max="20">
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
        <div class="container-voltar">

            <a href="index.php" class="voltar-button">Voltar</a>

        </div>
    </main>
</body>
</html>