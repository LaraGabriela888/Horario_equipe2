<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// MUDAR INFORMAÇÕES DE UMA MATERIA
if(isset($_POST['btn-editar'])):
    $id = mysqli_escape_string($connect, $_POST['id_materia']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);


endif;
//comando sql para editar dados
$sql = "UPDATE materias SET nome = '$nome' WHERE id_materia = '$id'";

if(mysqli_query($connect, $sql)){//
    $_SESSION['mensagem'] = "Atualizado com sucesso!";
    header('Location: ../materias.php?sucesso');//levar par index com sucesso
} else{
    $_SESSION['mensagem'] = "Erro ao atualizar";  
    header('Location: ../materias.php?erro');//caso a conexão não funcione erro
}

?>
