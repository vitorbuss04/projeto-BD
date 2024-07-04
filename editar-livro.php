<?php 
    require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar livro</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <nav>
            <h1>Livros preferidos</h1>
        </nav>
    </header>
    <main>
        <div class="voltar">
            <a href="index.php" class="link_voltar">Voltar</a>
        </div>
        <h2>Editar livro</h2>
        <?php 
                if(isset($_GET['id'])) {
                    $livro_id = mysqli_real_escape_string($conexao, $_GET['id']);
                    $sql = "SELECT * FROM livros WHERE id = $livro_id";
                    $query = mysqli_query($conexao, $sql);

                    if(mysqli_num_rows($query) > 0) {
                        $livro = mysqli_fetch_array($query);
                        
        ?>
        <form action="acoes.php" method="POST">
            <input type="hidden" name="livro_id" value="<?= $livro['id'] ?>">

            <div class="input-group">
                <label for="capa">Capa:</label>
                <input type="text" name="capa" value="<?= $livro['capa'] ?>" id="capa ">
            </div> 
            <div class="input-group">
                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" value="<?= $livro['titulo'] ?>" id="titulo">
            </div> 
            <div class="input-group">
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" value="<?= $livro['isbn'] ?>" id="isbn">
            </div> 
            <div class="input-group">
                <label for="autor">Autor:</label>
                <input type="text" name="autor" value="<?= $livro['autor'] ?>" id="autor">
            </div> 
            <div class="input-group">
                <label for="genero">Gênero</label>
                <input type="text" name="genero" value="<?= $livro['genero'] ?>" id="genero">
            </div> 
            <div class="input-group">
                <label for="valor">valor</label>
                <input type="number" name="valor" value="<?= $livro['valor'] ?>" id="valor" step="0.01">
            </div> 
            <div class="input-group">
                <input type="submit" value="Salvar" name="edit_livro">
            </div> 
        </form>
        <?php 
                } else {
                    echo "<h5>Livro não encontrado</h5>";
                }
            }
        ?>
    </main>
</body>
</html>