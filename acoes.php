<?php
    require 'conexao.php';

    if(isset($_POST['add_livro'])) {
        
        $capa = mysqli_real_escape_string($conexao, trim($_POST['capa']));
        $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
        $isbn = mysqli_real_escape_string($conexao, trim($_POST['isbn']));
        $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
        $genero = mysqli_real_escape_string($conexao, trim($_POST['genero']));

        $sql = "INSERT INTO livros (titulo, isbn, autor, genero, capa) VALUES ('$titulo', $isbn, '$autor', '$genero', '$capa')";

        mysqli_query($conexao, $sql);
        header('Location: index.php');
    }

    if(isset($_POST['edit_livro'])) {
        

        $livro_id = mysqli_real_escape_string($conexao, trim($_POST['livro_id']));
        
        $capa = mysqli_real_escape_string($conexao, trim($_POST['capa']));
        $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
        $isbn = mysqli_real_escape_string($conexao, trim($_POST['isbn']));
        $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
        $genero = mysqli_real_escape_string($conexao, trim($_POST['genero']));

        $sql = "UPDATE livros SET titulo = '$titulo', isbn = $isbn, autor = '$autor', genero = '$genero', capa = '$capa' WHERE id = $livro_id";

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
    
?>