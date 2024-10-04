<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// CADASTRAR UM NOVO CLIENTE
 if(isset($_POST['btn-registrar'])):
    $id = mysqli_escape_string($connect, $_POST['id_produto']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);
    $endereco = mysqli_escape_string($connect, $_POST['endereco']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    
//comando sql para inserir dados
$sql = "INSERT INTO cliente (nome_cliente, cpf_cliente, fone_cliente, endereco_cliente, senha_cliente) 
        VALUES ('$nome', '$cpf', '$telefone', '$endereco', '$senha')";

$id = "SELECT id_cliente FROM cliente WHERE id_cliente= '$id'";


        if(mysqli_query($connect, $sql))://
            $_SESSION['mensagem'] = "Cadastrado com sucesso! Seu id é ".$id;
            header('Location: ../index.php?sucesso');//levar par index com sucesso
        else:
            $_SESSION['mensagem'] = "Erro ao cadastrar";  
            header('Location: ../index.php?erro');//caso a conexão não funcione erro
        endif;
endif;

?>