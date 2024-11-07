<?php include_once 'includes/header.php'?>

<div class="content-add">    
<!-- CADASTRAR UM NOVO CLIENTE -->
<div class="content">
<h1>Registrar-se</h1>
<form action="php_action/usuario.php" method="POST" class="content-form">
    
<div class="input-item">
<label for="nome"><i class="bi bi-person"></i>Nome</label>
<input type="text" name="nome">
</div>
  
<div class="input-item">
<label for="email"><i class="bi bi-person"></i>E-mail</label>
<input type="text" name="email">
</div>

<div class="input-item">
<label for="senha"><i class="bi bi-person"></i>Senha</label>
<input type="text" name="senha">
</div>

<div class="input-item">
<label for="tipo"><i class="bi bi-person"></i>Função</label>
<input type="text" name="tipo">
</div>

<div class="input-item">
<label for="data_nascimento"><i class="bi bi-person"></i>Data de Nascimento</label>
<input type="text" name="data_nascimento">
</div>

<div class="input-item">
<label for="sexo"><i class="bi bi-person"></i>Sexo</label>
<input type="text" name="sexo">
</div>

<div class="input-item">
<label for="celular"><i class="bi bi-person"></i>Celular</label>
<input type="text" name="celular">
</div>

<div class="input-item">
<label for="CPF"><i class="bi bi-person"></i>CPF</label>
<input type="number" name="CPF">
</div>

<div class="input-item">
<label for="RG"><i class="bi bi-person"></i>RG</label>
<input type="number" name="RG">
</div>

<div class="input-item">
<label for="serie"><i class="bi bi-envelope"></i>Serie</label>
<input type="number" name="serie">
</div>

<div class="input-item">
<label for="endereco"><i class="bi bi-person-vcard"></i>Endereço</label>
<input type="text" name="endereco">
</div>

<button type="submit" name="btn-registrar" class="btn-registrar">Registrar</button>
</form>
</div>
</div>

<?php include_once 'includes/footer.php'?>
