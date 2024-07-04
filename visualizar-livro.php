<?php 
    require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros preferidos</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/visualizar.css">
</head>
<body>
    <header>
        <nav>
            <h1>Livros preferidos</h1>
        </nav>
    </header>
    <main>
        <div class="voltar">
            <h2>Visualizar Livro</h2>
            <a href="index.php" class="link_voltar">Voltar</a>
        </div>
        <div class="info_livro">

            <?php 
                if(isset($_GET['id'])) {
                    $livro_id = mysqli_real_escape_string($conexao, $_GET['id']);
                    $sql = "SELECT * FROM livros WHERE id = $livro_id";
                    $query = mysqli_query($conexao, $sql);

                    if(mysqli_num_rows($query) > 0) {
                        $livro = mysqli_fetch_array($query);
                    
                
            ?>
            <div class="capa">
                <img src="<?= $livro['capa'] ?>" width="200px" alt="Capa: <?= $livro['capa'] ?>">
            </div>
            <div class="dados_livro">
                <div class="descricao">
                    <h2 class="titulo"><?= $livro['titulo'] ?></h2>
                    <p class="autor"><?= $livro['autor'] ?></p>
                    <p class="genero">Gênero <?= $livro['genero'] ?></p>
                    <p class="isbn">ISBN: <?= $livro['isbn'] ?></p>
                    <p class="valor">R$<?= $livro['valor'] ?></p>
                </div>
                <form action="acoes.php" method="post" style="padding: 0;">
                    <button type="submit" value="<?= $livro['id'] ?>" name="add_cart" class="adicionar">Adicionar ao carrinho</button>
                    <input type="number" name="quant" class="quantidade" placeholder="Quantidade" value="1">
                </form>
                
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