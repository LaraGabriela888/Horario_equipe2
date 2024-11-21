<?php
//conexão
require_once 'php_action/db_connect.php';
require_once 'includes/header.php';
//select

//SELECIONAR PELO ID
if(isset($_GET['id_usuario'])){
    $id = mysqli_escape_string($connect, $_GET['id_usuario']);
    $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<!-- EDITAR INFORMAÇÕES DO USUARIO-->
<div class="row">
    <div class="col s12 m6 push-m3 ">
        <h3 class="light"> Editar Usuário </h3>
        <form action="php_action/updateU.php" method="POST">
            <input type="hidden" name="id"  value="<?php echo $dados['id_usuario']; ?>"><!-- nao permite mudar o id-->
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email']; ?>">
                <label for="preco">E-mail</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="senha" id="senha" value="<?php echo $dados['senha']; ?>">
                <label for="email">Senha</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="tipo" id="tipo" value="<?php echo $dados['tipo']; ?>">
                <label for="validade">Função</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="data_nascimento" id="data_nascimento" value="<?php echo $dados['data_nascimento']; ?>">
                <label for="fabricacao">Data de Nascimento</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sexo" id="sexo" value="<?php echo $dados['sexo']; ?>">
                <label for="fabricacao">Sexo</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="celular" id="celular" value="<?php echo $dados['celular']; ?>">
                <label for="fabricacao">Celular</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="CPF" id="CPF" value="<?php echo $dados['CPF']; ?>">
                <label for="fabricacao">CPF</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="RG" id="RG" value="<?php echo $dados['RG']; ?>">
                <label for="fabricacao">RG</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="serie" id="serie" value="<?php echo $dados['serie']; ?>">
                <label for="fabricacao">Serie</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="endereco" id="endereco" value="<?php echo $dados['endereco']; ?>">
                <label for="fabricacao">Endereço</label>
            </div>
          
            <button type="submit" name="btn-editar" class="btn">Editar</button> <!--SÓ PODE TER UM SUBMIT O RESTO TER QUE SER LINK-->
            <a href="usuarios.php" type="submit" class="btn green">Lista de Usuários</a>
        </form>
    </div>
</div>





<?php
require_once 'includes/footer.php';
?>
