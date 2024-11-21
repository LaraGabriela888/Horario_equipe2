<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// DELETAR UMA TURMA
if(isset($_POST['btn-deletar'])):
    $id = mysqli_escape_string($connect, $_POST['id_turma']);
//comando sql para deletar dados
$sql = "DELETE FROM turmas WHERE id_turma = '$id'";

if(mysqli_query($connect, $sql))://
    $_SESSION['mensagem'] = "Deletado com sucesso!";
    header('Location: ../turmas.php?sucesso');//levar par index com sucesso
else:
    $_SESSION['mensagem'] = "Erro ao deletar";  
    header('Location: ../turmas.php?erro');//caso a conexão não funcione erro
endif;
endif;

?>
