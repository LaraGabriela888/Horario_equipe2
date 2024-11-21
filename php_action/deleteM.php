<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// DELETAR UMA MATERIA
if(isset($_POST['btn-deletar'])):
    $id = mysqli_escape_string($connect, $_POST['id_materia']);
//comando sql para deletar dados
$sql = "DELETE FROM materias WHERE id_materia = '$id'";

if(mysqli_query($connect, $sql))://
    $_SESSION['mensagem'] = "Deletado com sucesso!";
    header('Location: ../materias.php?sucesso');//levar par index com sucesso
else:
    $_SESSION['mensagem'] = "Erro ao deletar";  
    header('Location: ../materias.php?erro');//caso a conexão não funcione erro
endif;
endif;

?>
