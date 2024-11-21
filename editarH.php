<?php
//conexão
require_once 'php_action/db_connect.php';
require_once 'includes/header.php';
//select

//SELECIONAR PELO ID
if(isset($_GET['id_horario'])){
    $id = mysqli_escape_string($connect, $_GET['id_horario']);
    $sql = "SELECT * FROM horarios WHERE id_horario = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<!-- EDITAR INFORMAÇÕES DO HORARIO-->
<div class="row">
    <div class="col s12 m6 push-m3 ">
        <h3 class="light"> Editar horário </h3>
        <form action="php_action/updateH.php" method="POST">
            <input type="hidden" name="id"  value="<?php echo $dados['id_horario']; ?>"><!-- nao permite mudar o id-->
            <div class="input-field col s12">
                <input type="text" name="id_turma" id="id_turma" value="<?php echo $dados['id_turma']; ?>">
                <label for="nome">Turma</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="id_materia" id="id_materia" value="<?php echo $dados['id_materia']; ?>">
                <label for="preco">Materia</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="id_professor" id="id_professor" value="<?php echo $dados['id_professor']; ?>">
                <label for="email">Professor</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="dia" id="dia" value="<?php echo $dados['dia']; ?>">
                <label for="validade">Dia</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="turno" id="turno" value="<?php echo $dados['turno']; ?>">
                <label for="fabricacao">Turno</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="hora_inicio" id="hora_inicio" value="<?php echo $dados['hora_inicio']; ?>">
                <label for="fabricacao">Hora do Início</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="hora_fim" id="hora_fim" value="<?php echo $dados['hora_fim']; ?>">
                <label for="fabricacao">Hora do Fim</label>
            </div>
          
            <button type="submit" name="btn-editar" class="btn">Editar</button> <!--SÓ PODE TER UM SUBMIT O RESTO TER QUE SER LINK-->
            <a href="horarios.php" type="submit" class="btn green">Lista de Horários</a>
        </form>
    </div>
</div>





<?php
require_once 'includes/footer.php';
?>
