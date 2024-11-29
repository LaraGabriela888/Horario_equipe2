<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// CADASTRAR UMA NOVA TURMA
 if(isset($_POST['btn-registrar'])):
    $id = mysqli_escape_string($connect, $_POST['id_turma']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    
//comando sql para inserir dados
$sql = "INSERT INTO turmas (nome) 
        VALUES ('$nome')";

$id = "SELECT id_turma FROM turmas WHERE id_turma= '$id'";


        if(mysqli_query($connect, $sql))://
            $_SESSION['mensagem'] = "Cadastrado com sucesso! Seu id é ".$id;
            header('Location: ../turmas.php?sucesso');//levar par index com sucesso
        else:
            $_SESSION['mensagem'] = "Erro ao cadastrar";  
            header('Location: ../index.php?erro');//caso a conexão não funcione erro
        endif;
endif;

?>

