
<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// CADASTRAR UMA NOVA MATERIA
 if(isset($_POST['btn-registrar'])):
    $id = mysqli_escape_string($connect, $_POST['id_materia']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    
//comando sql para inserir dados
$sql = "INSERT INTO materias (nome) 
        VALUES ('$nome')";

$id = "SELECT id_materia FROM materias WHERE id_materia= '$id'";


        if(mysqli_query($connect, $sql))://
            $_SESSION['mensagem'] = "Cadastrado com sucesso! Seu id é ".$id;
            header('Location: ../index.php?sucesso');//levar par index com sucesso
        else:
            $_SESSION['mensagem'] = "Erro ao cadastrar";  
            header('Location: ../index.php?erro');//caso a conexão não funcione erro
        endif;
endif;

?>
