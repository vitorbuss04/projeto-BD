<?php 
    require 'conexao.php';
    session_start();
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
    <?php 
        include 'header.php';
    ?>
    
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
                    $senha = $_SESSION['senha'];
                    $user = $_SESSION['login'];
                    $sql = "SELECT ID_USER FROM USUARIOS WHERE NOME = '$user' AND SENHA = '$senha'";
                    $query = mysqli_query($conexao, $sql);
                    $usuario = mysqli_fetch_array($query);
                    $userID = $usuario['ID_USER'];

                    $sql = "SELECT * FROM carrinho WHERE id_user = '$userID'";
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
                $sql = "SELECT SUM(valor) as total FROM carrinho WHERE id_user = '$userID'";
                $query = mysqli_query($conexao, $sql);
                $total = mysqli_fetch_array($query);
                
            ?>
            <p class="total-text">Total: R$<?= $total['total'] ?? 0.00 ?></p>
        </div>
    </main>

</body>
</html>