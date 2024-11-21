<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// DELETAR UM HORARIO
if(isset($_POST['btn-deletar'])):
    $id = mysqli_escape_string($connect, $_POST['id_horario']);
//comando sql para deletar dados
$sql = "DELETE FROM horarios WHERE id_horario = '$id'";

if(mysqli_query($connect, $sql))://
    $_SESSION['mensagem'] = "Deletado com sucesso!";
    header('Location: ../horarios.php?sucesso');//levar par index com sucesso
else:
    $_SESSION['mensagem'] = "Erro ao deletar";  
    header('Location: ../horarios.php?erro');//caso a conexão não funcione erro
endif;
endif;

?>
