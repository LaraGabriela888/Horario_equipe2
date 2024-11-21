<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// MUDAR INFORMAÇÕES DE UMA TURMA
if(isset($_POST['btn-editar'])):
    $id = mysqli_escape_string($connect, $_POST['id_turma']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);


endif;
//comando sql para editar dados
$sql = "UPDATE turmas SET nome = '$nome' WHERE id_turma = '$id'";

if(mysqli_query($connect, $sql)){//
    $_SESSION['mensagem'] = "Atualizado com sucesso!";
    header('Location: ../turmas.php?sucesso');//levar par index com sucesso
} else{
    $_SESSION['mensagem'] = "Erro ao atualizar";  
    header('Location: ../turmas.php?erro');//caso a conexão não funcione erro
}

?>
