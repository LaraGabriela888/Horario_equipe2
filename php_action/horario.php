<?php
session_start(); // Iniciar a sessão
require_once 'db_connect.php'; // Conectar ao banco de dados

// Verificar se o formulário foi enviado
if (isset($_POST['btn-registrar'])):

    // Obter os valores do formulário e garantir que não sejam vazios
    $id_turma = trim($_POST['id_turma']);
    $id_materia = trim($_POST['id_materia']);
    $id_professor = trim($_POST['id_usuario']); // Alterado para refletir o nome do campo no formulário
    $dia = trim($_POST['dia']);
    $turno = trim($_POST['turno']);
    $hora_inicio = trim($_POST['hora_inicio']);
    $hora_fim = trim($_POST['hora_fim']);

    // Verificar se os campos obrigatórios não estão vazios
    if (empty($id_turma) || empty($id_materia) || empty($id_professor) || empty($dia) || empty($turno) || empty($hora_inicio) || empty($hora_fim)) {
        $_SESSION['mensagem'] = "Todos os campos são obrigatórios!";
        header('Location: ../index.php?erro');
        exit;
    }

    // Exibir os dados recebidos (para depuração)
    echo "Dados recebidos: <br>";
    echo "Turma: $id_turma <br>";
    echo "Matéria: $id_materia <br>";
    echo "Professor: $id_professor <br>";
    echo "Dia: $dia <br>";
    echo "Turno: $turno <br>";
    echo "Hora Início: $hora_inicio <br>";
    echo "Hora Fim: $hora_fim <br>";

    // Usar prepared statements para evitar SQL Injection
    $sql = "INSERT INTO horarios (id_turma, id_materia, id_professor, dia, turno, hora_inicio, hora_fim) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Preparar a consulta
    if ($stmt = mysqli_prepare($connect, $sql)) {

        // Vincular os parâmetros à consulta
        mysqli_stmt_bind_param($stmt, "iiissss", $id_turma, $id_materia, $id_professor, $dia, $turno, $hora_inicio, $hora_fim);

        // Executar a consulta
        if (mysqli_stmt_execute($stmt)) {
            // Se o cadastro for bem-sucedido, definir a mensagem de sucesso
            $_SESSION['mensagem'] = "Horário cadastrado com sucesso!";
            header('Location: ../horarios.php?sucesso'); // Redirecionar para a página de sucesso
            exit;
        } else {
            // Exibir o erro SQL caso o cadastro falhe
            $_SESSION['mensagem'] = "Erro ao cadastrar o horário: " . mysqli_error($connect);
            echo "Erro SQL: " . mysqli_error($connect); // Exibir erro SQL diretamente
            header('Location: ../index.php?erro'); // Redirecionar para a página de erro
            exit;
        }

        // Fechar a declaração preparada
        mysqli_stmt_close($stmt);
    } else {
        // Se não for possível preparar a consulta
        $_SESSION['mensagem'] = "Erro ao preparar a consulta: " . mysqli_error($connect);
        echo "Erro ao preparar a consulta: " . mysqli_error($connect);
        header('Location: ../index.php?erro'); // Redirecionar para a página de erro
        exit;
    }

endif;
?>
