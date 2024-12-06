<?php include_once 'includes/header.php'?>

<div class="content-add">    
<!-- CADASTRAR UM NOVO HORARIO -->
<div class="content">
<h1>Cadastrar Horário</h1>
<form action="php_action/horario.php" method="POST" class="content-form">
    
<div class="input-item">
<label for="id_turma"><i class="bi bi-person"></i>Turma</label>
<input type="text" name="id_turma">
</div>
  
<div class="input-item">
<label for="id_materia"><i class="bi bi-person"></i>Materia</label>
<input type="text" name="id_materia">
</div>

<div class="input-item">
<label for="id_professor"><i class="bi bi-person"></i>Professor</label>
<select id="id_usuario" name="id_usuario" required>
    <option value="">Selecione um Professor</option>
    <?php
    $conn = new mysqli('localhost', 'root','','escola_horarios');
    $result = $conn->query("SELECT * FROM usuarios WHERE tipo = professor");
    while ($row = $result->fetch_assoc()){
        echo "<option value='{$row['id']}'>{$row['nome']}</option>";
    }
    $conn->close();
    ?>
    </select>
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

<button type="submit" name="btn-registrar" class="btn-registrar">Cadastrar</button>
</form>
</div>
</div>

<?php include_once 'includes/footer.php'?>
