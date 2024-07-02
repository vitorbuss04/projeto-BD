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
        <table class="tabela_livros">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>ISBN</th>
                    <th>Autor</th>
                    <th>Genero</th>
                    <th>Ação</th>
                    <th>Capa</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = 'SELECT * FROM livros';
                    $livros = mysqli_query($conexao, $sql);
                    if(mysqli_num_rows($livros) > 0) {
                        foreach($livros as $livro) {
                ?>
                <tr>
                    <td><?= $livro['id'] ?></td>
                    <td><?= $livro['titulo'] ?></td>
                    <td><?= $livro['isbn'] ?></td>
                    <td><?= $livro['autor'] ?></td>
                    <td><?= $livro['genero'] ?></td>
                    <td>
                        <div class="acao">
                            <a href="visualizar-livro.php?id=<?= $livro['id'] ?>">Visualizar</a>
                            <a href="editar-livro.php?id=<?= $livro['id'] ?>">Editar</a>
                            <form action="acoes.php" method="POST" style="padding: 0;">
                                <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_livro" value="<?=$livro['id']?>">Excluir</button>
                            </form>
                        </div>
                    </td>
                    <td><img src="<?= $livro['capa'] ?>" alt="Capa: <?= $livro['titulo'] ?>" height="100px"></td>
                </tr>
                <?php 
                        }
                    } else {
                        echo "<h5>Nenhum livro encontrado.</h5>";
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>