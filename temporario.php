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