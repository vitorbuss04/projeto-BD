<?php 
    require 'conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta</title>
    <link rel="stylesheet" href="styles/register-login.css">
</head>
<body>
    <main>
        <div class="main-content">
            <h1 class="titulo">Criar Conta</h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" class="form" method="post">
                <div class="input-group">
                    <label for="usuario" class="label">Usuário</label>
                    <input type="text" class="input" name="usuario" id="usuario">
                </div>
                <div class="input-group">
                    <label for="senha" class="label">Senha</label>
                    <input type="password" class="input" name="senha" id="senha">
                </div>
                <div class="input-group">
                    <input type="submit" class="submit" name="add_usuario" value="Registrar">
                </div>
                <div class="link-registrar">
                    <p style="font-family: 'Poppins', sans-serif; color: #fff;">Já tem uma conta? <a href="login.php" style="color: #fff;">Faça login</a></p>
                </div>
            </form>

            <?php 
            
                if(isset($_POST['add_usuario'])) {

                    $usuario = $_POST['usuario'];
                    $senha = $_POST['senha'];
            
                    $sql = "SELECT NOME FROM USUARIOS WHERE NOME = '$usuario'";
                    $query = mysqli_query($conexao, $sql);
            
                    if (mysqli_affected_rows($conexao) > 0) {
            ?>
            <p style="font-family: 'Poppins', sans-serif; color: orange;">Já existe um usuario de nome <?= $usuario ?>.</p> 
            <?php
            
                    } else {
                        $sql = "INSERT INTO USUARIOS (NOME, SENHA) VALUES ('$usuario', '$senha')";
                        mysqli_query($conexao, $sql);
            
                        if(mysqli_affected_rows($conexao) > 0) {
                            header('Location: login.php');
                        } else {
                            echo "erro ao adicionar usuario";
                        }
                    }
            
                }
            
            ?>

        </div>
    </main>
</body>
</html>