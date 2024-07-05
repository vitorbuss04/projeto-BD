<?php 
    require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/carrinho.css">
</head>
<body>
    <header style="z-index: 999;">

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
        <a href="index.php" class="voltar">Voltar</a>
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
                            <button type="submit" name="delete_cart_item" value="<?=$item['id_item']?>"> <img src="img/deletar.svg" alt="excluir" class="delete-img"> Excluir</button>
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
        <div class="total">
            <?php 
                $sql = "SELECT SUM(valor) as total FROM carrinho";
                $query = mysqli_query($conexao, $sql);
                $total = mysqli_fetch_array($query);
                
            ?>
            <p class="total-text">Total: R$<?= $total['total'] ?></p>
        </div>
    </main>

</body>
</html>