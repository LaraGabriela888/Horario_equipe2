<?php
// conexão
session_start();// sessão SEMPRE em primeiro
require_once 'db_connect.php';

// CADASTRAR UM NOVO HORARIO
 if(isset($_POST['btn-registrar'])):
    $id = mysqli_escape_string($connect, $_POST['id_horario']);
    $id_turma = mysqli_escape_string($connect, $_POST['id_turma']);
    $id_materia = mysqli_escape_string($connect, $_POST['id_materia']);
    $id_professor = mysqli_escape_string($connect, $_POST['id_professor']);
    $dia = mysqli_escape_string($connect, $_POST['dia']);
    $turno = mysqli_escape_string($connect, $_POST['turno']);
    $hora_inicio = mysqli_escape_string($connect, $_POST['hora_inicio']);
    $hora_fim = mysqli_escape_string($connect, $_POST['hora_fim']);
    
//comando sql para inserir dados
$sql = "INSERT INTO horarios (id_turma, id_materia, id_professor, dia, turno, hora_inicio, hora_fim) 
        VALUES ('$id_turma', '$id_materia', '$id_professor', '$dia', '$turno', '$hora_inicio', '$hora_fim')";

$id = "SELECT id_horario FROM horarios WHERE id_horario= '$id'";


        if(mysqli_query($connect, $sql))://
            $_SESSION['mensagem'] = "Cadastrado com sucesso! Seu id é ".$id;
            header('Location: ../index.php?sucesso');//levar par index com sucesso
        else:
            $_SESSION['mensagem'] = "Erro ao cadastrar";  
            header('Location: ../index.php?erro');//caso a conexão não funcione erro
        endif;
endif;

?>
