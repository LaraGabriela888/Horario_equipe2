<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// CADASTRAR UM NOVO CLIENTE
 if(isset($_POST['btn-registrar'])):
    $id = mysqli_escape_string($connect, $_POST['id_usuario']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    $tipo = mysqli_escape_string($connect, $_POST['tipo']);
    $data_nascimento = mysqli_escape_string($connect, $_POST['data_nascimento']);
    $sexo = mysqli_escape_string($connect, $_POST['sexo']);
    $celular = mysqli_escape_string($connect, $_POST['celular']);
    $CPF = mysqli_escape_string($connect, $_POST['CPF']);
    $RG = mysqli_escape_string($connect, $_POST['RG']);
    $serie = mysqli_escape_string($connect, $_POST['serie']);
    $endereco = mysqli_escape_string($connect, $_POST['endereco']);
    
    
//comando sql para inserir dados
$sql = "INSERT INTO usuarios (nome, email, senha, tipo, data_nascimento, sexo, celular, CPF, RG, serie, endereco) 
        VALUES ('$nome', '$email', '$senha', '$tipo', '$data_nascimento','$sexo', '$celular','$CPF', '$RG','$serie', '$endereco')";

$id = "SELECT id_usuario FROM usuarios WHERE id_usuario= '$id'";


        if(mysqli_query($connect, $sql))://
            $_SESSION['mensagem'] = "Cadastrado com sucesso! Seu id é ".$id;
            header('Location: ../usuarios.php?sucesso');//levar par index com sucesso
        else:
            $_SESSION['mensagem'] = "Erro ao cadastrar";  
            header('Location: ../index.php?erro');//caso a conexão não funcione erro
        endif;
endif;

?>
