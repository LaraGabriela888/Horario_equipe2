<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// DELETAR UM USUARIO
if(isset($_POST['btn-deletar'])):
    $id = mysqli_escape_string($connect, $_POST['id_usuario']);
//comando sql para deletar dados
$sql = "DELETE FROM usuarios WHERE id_usuario = '$id'";

if(mysqli_query($connect, $sql))://
    $_SESSION['mensagem'] = "Deletado com sucesso!";
    header('Location: ../usuarios.php?sucesso');//levar par index com sucesso
else:
    $_SESSION['mensagem'] = "Erro ao deletar";  
    header('Location: ../usuarios.php?erro');//caso a conexão não funcione erro
endif;
endif;

?>
