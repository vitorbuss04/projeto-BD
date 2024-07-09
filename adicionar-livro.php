<?php 
    require 'conexao.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar livro</title>
    <link rel="stylesheet" href="styles/adicionar.css">
</head>
<body>
    <?php 
        include 'header.php';
    ?>

    <main>

        <form action="acoes.php" method="post" class="adicionar">
            <div class="content-adicionar">
                <h2 class="titulo-adicionar">Adicionar livro</h2>

                <div class="container-inputs">
                    <div class="input-group">
    
                        <label for="capa" class="label">Capa</label>
                        <input type="text" class="input" name="capa" id="capa">
    
                    </div>
                    <div class="input-group">
    
                        <label for="titulo" class="label">Título</label>
                        <input type="text" class="input" name="titulo" id="titulo">
    
                    </div>
                    <div class="input-group">
    
                        <label for="autor" class="label">Autor</label>
                        <input type="text" class="input" name="autor" id="autor">
    
                    </div>
                    <div class="input-group">
    
                        <label for="genero" class="label">Gênero</label>
                        <input type="text" class="input" name="genero" id="genero">
    
                    </div>
                    <div class="input-group">
    
                        <label for="isbn" class="label">ISBN</label>
                        <input type="number" class="input" name="isbn" id="isbn">
    
                    </div>
                    <div class="input-group">
    
                        <label for="valor" class="label">Valor</label>
                        <input type="number" step=".01" class="input" name="valor" id="valor">
    
                    </div>
                    <div class="input-group">
    
                        <label for="sinopse" class="label">Sinopse</label>
                        <textarea type="text" class="input sinopse" name="sinopse" id="sinopse" size="1000">
                        </textarea>
    
                    </div>
                    <div class="input-group">
    
                        <input type="submit" class="salvar" value="Salvar" name="add_livro">
    
                    </div>
                </div>
            </div>
        </form>
        <div class="conteiner-voltar">
            <a href="index.php" class="voltar">Voltar</a>
        </div>
    </main>
</body>
</html>