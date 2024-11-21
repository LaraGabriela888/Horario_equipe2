<?php
//conexão
require_once 'php_action/db_connect.php';
require_once 'includes/header.php';
//select

//SELECIONAR PELO ID
if(isset($_GET['id_turma'])){
    $id = mysqli_escape_string($connect, $_GET['id_turma']);
    $sql = "SELECT * FROM turmas WHERE id_turma = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<!-- EDITAR INFORMAÇÕES DA TURMA-->
<div class="row">
    <div class="col s12 m6 push-m3 ">
        <h3 class="light"> Editar Turma </h3>
        <form action="php_action/updateT.php" method="POST">
            <input type="hidden" name="id"  value="<?php echo $dados['id_turma']; ?>"><!-- nao permite mudar o id-->
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
                <label for="nome">Nome</label>
            </div>
          
            <button type="submit" name="btn-editar" class="btn">Editar</button> <!--SÓ PODE TER UM SUBMIT O RESTO TER QUE SER LINK-->
            <a href="turmas.php" type="submit" class="btn green">Lista de Turmas</a>
        </form>
    </div>
</div>





<?php
require_once 'includes/footer.php';
?>
