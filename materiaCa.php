<?php include_once 'includes/header.php'?>

<div class="content-add">    
<!-- CADASTRAR UMA NOVA MATERIA -->
<div class="content">
<h1>Cadastrar Matéria</h1>
<form action="php_action/materias.php" method="POST" class="content-form">
  
<div class="input-item">
<label for="nome"><i class="bi bi-person"></i>Nome da Matéria</label>
<input type="text" name="nome">
</div>

<button type="submit" name="btn-registrar" class="btn-registrar">Cadastrar</button>
</form>
</div>
</div>

<?php include_once 'includes/footer.php'?>
