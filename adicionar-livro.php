<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar livro</title>
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
            <h2>Adicionar livro</h2>
            <a href="index.php" class="link_voltar">Voltar</a>
        </div>
        <form action="acoes.php" method="POST"> 
            <div class="input-group">
                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" id="titulo">
            </div> 
            <div class="input-group">
                <label for="isbn">ISBN:</label>
                <input type="number" name="isbn" id="isbn">
            </div> 
            <div class="input-group">
                <label for="autor">Autor:</label>
                <input type="text" name="autor" id="autor">
            </div> 
            <div class="input-group">
                <label for="genero">Gênero</label>
                <input type="text" name="genero" id="genero">
            </div>
            <div class="input-group">
                <label for="capa">Capa:</label>
                <input type="text" name="capa" id="capa">
            </div> 
            <div class="input-group">
                <input type="submit" value="Salvar" name="add_livro" class="salvar">
            </div> 
        </form>
    </main>
</body>
</html>