<?php include_once 'includes/header.php'?>

<div class="content-add">    
<!-- CADASTRAR UM NOVO HORARIO -->
<div class="content">
<h1>Cadastrar Horário</h1>
<form action="php_action/usuario.php" method="POST" class="content-form">
    
<div class="input-item">
<label for="id_turma"><i class="bi bi-person"></i>Turma</label>
<select id="id_turma" name="id_turma" required>
    <option value=""> Selecione uma turma</option>
    <?php
     $sql ="SELECT * FROM turmas";
     $resultado = mysqli_query($connect, $sql);
     while($dados = mysqli_fetch_array($resultado)): {
        echo "<option value= '{$dados['id']}'>{$dados['nome']} </option>";
     }
     $resultado->close();
     ?>
</select>

</div>
  
<div class="input-item">
<label for="id_materia"><i class="bi bi-person"></i>Materia</label>
<input type="text" name="id_materia">
</div>

<div class="input-item">
<label for="id_professor"><i class="bi bi-person"></i>Professor</label>
<input type="text" name="id_professor">
</div>

<div class="input-item">
<label for="dia"><i class="bi bi-person"></i>Dia</label>
<input type="text" name="dia">
</div>

<div class="input-item">
<label for="turno"><i class="bi bi-person"></i>Turno</label>
<input type="text" name="turno">
</div>

<div class="input-item">
<label for="hora_inicio"><i class="bi bi-person"></i>Horário do Início</label>
<input type="text" name="sexo">
</div>

<div class="input-item">
<label for="hora_fim"><i class="bi bi-person"></i>Horário do Fim</label>
<input type="text" name="hora_fim">
</div>

<button type="submit" name="btn-registrar" class="btn-registrar">Registrar</button>
</form>
</div>
</div>

<?php include_once 'includes/footer.php'?>
