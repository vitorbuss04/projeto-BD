<?php
    require 'conexao.php';
    session_start();

    if(isset($_POST['add_livro'])) {
        
        $capa = mysqli_real_escape_string($conexao, trim($_POST['capa']));
        $valor = mysqli_real_escape_string($conexao, trim($_POST['valor']));
        $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
        $isbn = mysqli_real_escape_string($conexao, trim($_POST['isbn']));
        $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
        $genero = mysqli_real_escape_string($conexao, trim($_POST['genero']));
        $sinopse = mysqli_real_escape_string($conexao, trim($_POST['sinopse']));
        

        $sql = "INSERT INTO livros (titulo, isbn, autor, genero, capa, valor, sinopse) VALUES ('$titulo', $isbn, '$autor', '$genero', '$capa', $valor, '$sinopse')";

        mysqli_query($conexao, $sql);
        header('Location: index.php');
    }

    if(isset($_POST['edit_livro'])) {
        

        $livro_id = mysqli_real_escape_string($conexao, trim($_POST['livro_id']));
        $valor = mysqli_real_escape_string($conexao, trim($_POST['valor']));
        $capa = mysqli_real_escape_string($conexao, trim($_POST['capa']));
        $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
        $isbn = mysqli_real_escape_string($conexao, trim($_POST['isbn']));
        $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
        $genero = mysqli_real_escape_string($conexao, trim($_POST['genero']));

        $sql = "UPDATE livros SET titulo = '$titulo', isbn = $isbn, autor = '$autor', genero = '$genero', capa = '$capa', valor = '$valor' WHERE id = $livro_id";

        mysqli_query($conexao, $sql);
        header('Location: index.php');
    }

    if(isset($_POST['delete_livro'])) {
        

        $livro_id = mysqli_real_escape_string($conexao, trim($_POST['delete_livro']));


        $sql = "DELETE FROM livros WHERE id = '$livro_id'";

        mysqli_query($conexao, $sql);
        
        if(mysqli_affected_rows($conexao) > 0) {
            echo "Usuário deletado com sucesso.";
            header('Location: index.php');
        } else {
            echo "Usuário não foi deletado.";
        }
    }

    if(isset($_POST['add_cart'])) {
        $livro_id = $_POST['add_cart'];
        $user = $_SESSION['login'];
        $senha = $_SESSION['senha'];
        $sql = "SELECT ID_USER FROM USUARIOS WHERE NOME = '$user' AND SENHA = '$senha'";
        $query = mysqli_query($conexao, $sql);
        $usuario = mysqli_fetch_array($query);
        $userID = $usuario['ID_USER'];

        $sql = "SELECT * FROM livros WHERE id = $livro_id";
        $query = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($query) > 0) {
            $livro = mysqli_fetch_array($query);
            $nome = $livro['titulo'];
            $quant = $_POST['quant'];
            $valor = $livro['valor'] * $quant;

            
            $sql = "INSERT INTO carrinho (id_produto, valor, quant, nome_produto, id_user) VALUES ($livro_id, $valor, $quant, '$nome', $userID)";

            mysqli_query($conexao, $sql);

            if(mysqli_affected_rows($conexao) > 0) {
                echo "livro adicionado com sucesso.";
                header('Location: carrinho.php');
            } else {
                echo "livro não foi adicionado.";
            }
        }
        
    }

    if(isset($_POST['delete_cart_item'])) {
        

        $item_id = mysqli_real_escape_string($conexao, trim($_POST['delete_cart_item']));


        $sql = "DELETE FROM carrinho WHERE id_item = '$item_id'";

        mysqli_query($conexao, $sql);
        
        if(mysqli_affected_rows($conexao) > 0) {
            echo "Usuário deletado com sucesso.";
            header('Location: carrinho.php');
        } else {
            echo "Usuário não foi deletado.";
        }
    }
