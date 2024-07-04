<?php
    require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/carrinho.css">
    <link rel="stylesheet" href="">
    <title>Biblioteca Emil</title>
</head>
<body>
    <header>
        <img src="img/logo.svg" alt="logo" width="50px">
        <h1>Livraria do Buss</h1>
    </header>
    <main>
        <a href="index.php" class="voltar">HOME</a>
    <table>
        <thead>
            <tr>
                <th>id produto</th>
                <th>titulo</th>
                <th>valor</th>
                <th>quantidade</th>
                <th>ação</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $sql = 'SELECT * FROM carrinho';
            $itens = mysqli_query($conexao, $sql);
            if(mysqli_num_rows($itens) > 0) {
                foreach($itens as $item) {
        ?>
        <tr>
            <td><?= $item['id_produto'] ?></td>
            <td><?= $item['nome_produto'] ?></td>
            <td><?= $item['valor'] ?></td>
            <td><?= $item['quant'] ?></td>
            <td>
                <form action="acoes.php" method="POST" style="padding: 0;">
                    <button type="submit" name="delete_cart_item" value="<?=$item['id_item']?>">Excluir</button>
                </form>
            </td>
        </tr>
        <?php 
                }
            } else {
                echo "<h5>Nenhum livro encontrado.</h5>";
            }
        ?>
    </tbody>

    </table>
    <div class="card_total">
        <?php 
            $sql = "SELECT SUM(valor) as total FROM carrinho";
            $query = mysqli_query($conexao, $sql);
            $total = mysqli_fetch_array($query);
        ?>
        <p>Total: R$<?= $total['total'] ?></p>
    </div>
    </main>
</body>
</html>