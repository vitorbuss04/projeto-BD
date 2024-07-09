<?php 
    require 'conexao.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer login</title>
    <link rel="stylesheet" href="styles/register-login.css">
</head>
<body>
    <main>
        <div class="main-content">
            <h1 class="titulo">Fazer Login</h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form">
                <div class="input-group">
                    <label for="usuario" class="label">Usuário</label>
                    <input type="text" class="input" name="usuario" id="usuario">
                </div>
                <div class="input-group">
                    <label for="senha" class="label">Senha</label>
                    <input type="password" class="input" name="senha" id="senha">
                </div>
                <div class="input-group">
                    <input type="submit" class="submit" name="log_usuario" value="Entrar">
                </div>
            </form>
            <div class="link-registrar">
                <p style="font-family: 'Poppins', sans-serif; color: #fff;">Não tem uma conta? <a href="register.php" style="color: #fff;">Registre-se</a></p>
            </div>

            <?php 
            
                if(isset($_POST['log_usuario'])) {
                    $login = $_POST['usuario'];
                    $senha = $_POST['senha'];

                    $sql = "SELECT * FROM USUARIOS WHERE NOME = '$login' and SENHA = '$senha'";
                    $query = mysqli_query($conexao, $sql);
                
                    if(mysqli_num_rows($query) > 0) {

                        $_SESSION['login'] = $login;
                        $_SESSION['senha'] = $senha;


                        header('Location: index.php');
                    } else {
                        unset($_SESSION['login']);
                        unset($_SESSION['senha']);
                    ?>
                    
                    <p style=" font-family: 'Poppins', sans-serif; color: orange;">Usuario ou senha incorreta</p>

                    <?php

                            }
                        }
                    ?>

        </div>
    </main>
</body>
</html>