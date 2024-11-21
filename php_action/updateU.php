<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// MUDAR INFORMAÇÕES DE UM USUARIO
if(isset($_POST['btn-editar'])):
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


endif;
//comando sql para editar dados
$sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', tipo = '$tipo', data_nascimento = '$data_nascimento', sexo = '$sexo', celular = '$celular', CPF = '$CPF', RG = '$RG', serie = '$serie', endereco = '$endereco' WHERE id_usuario = '$id'";

if(mysqli_query($connect, $sql)){//
    $_SESSION['mensagem'] = "Atualizado com sucesso!";
    header('Location: ../produtos.php?sucesso');//levar par index com sucesso
} else{
    $_SESSION['mensagem'] = "Erro ao atualizar";  
    header('Location: ../produtos.php?erro');//caso a conexão não funcione erro
}

?>
