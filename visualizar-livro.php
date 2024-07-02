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
</head>
<body>
    <header>
        <nav>
            <h1>Livros preferidos</h1>
        </nav>
    </header>
    <main>
        <h2>Visualizar Livro</h2>
        <div class="voltar">
            <a href="index.php" class="link_voltar">Voltar</a>
        </div>
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
            <div class="input-group">
                <label for="titulo">Titulo:</label>
                <p><?= $livro['titulo'] ?></p>
            </div> 
            <div class="input-group">
                <label for="isbn">ISBN:</label>
                <p><?= $livro['isbn'] ?></p>
            </div> 
            <div class="input-group">
                <label for="autor">Autor:</label>
                <p><?= $livro['autor'] ?></p>
            </div> 
            <div class="input-group">
                <label for="genero">Gênero</label>
                <p><?= $livro['genero'] ?></p>
            </div>
            <?php 
                    } else {
                        echo "<h5>Livro não encontrado</h5>";
                    }
                }
            ?>
    </main>
</body>
</html>