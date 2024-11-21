<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// MUDAR INFORMAÇÕES DE UM HORARIO
if(isset($_POST['btn-editar'])):
    $id = mysqli_escape_string($connect, $_POST['id_horario']);
    $id_turma = mysqli_escape_string($connect, $_POST['id_turma']);
    $id_materia = mysqli_escape_string($connect, $_POST['id_materia']);
    $id_professor = mysqli_escape_string($connect, $_POST['id_professor']);
    $dia = mysqli_escape_string($connect, $_POST['dia']);
    $turno = mysqli_escape_string($connect, $_POST['turno']);
    $hora_inicio = mysqli_escape_string($connect, $_POST['hora_inicio']);
    $hora_fim = mysqli_escape_string($connect, $_POST['hora_fim']);


endif;
//comando sql para editar dados
$sql = "UPDATE horarios SET id_turma = '$id_turma', id_materia = '$id_materia', id_professor = '$id_professor', dia = '$dia', turno = '$turno', hora_inicio = '$hora_inicio', hora_fim = '$hora_fim' WHERE id_horario = '$id'";

if(mysqli_query($connect, $sql)){//
    $_SESSION['mensagem'] = "Atualizado com sucesso!";
    header('Location: ../horarios.php?sucesso');//levar par index com sucesso
} else{
    $_SESSION['mensagem'] = "Erro ao atualizar";  
    header('Location: ../horarios.php?erro');//caso a conexão não funcione erro
}

?>
