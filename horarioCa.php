<?php 
include_once 'includes/header.php';
include 'php_action/db_connect.php'; // Usando a conexão do db_connect.php
?>

<div class="content-add">    
    <!-- CADASTRAR UM NOVO HORARIO -->
    <div class="content">
        <h1>Cadastrar Horário</h1>
        <form action="php_action/horario.php" method="POST" class="content-form">
        
            <div class="input-item">
                <label for="id_turma"><i class="bi bi-person"></i>Turma</label>
                <select id="id_turma" name="id_turma" required>
                    <option value="">Selecione uma Turma</option>
                    <?php
                    // Usando a conexão criada no db_connect.php
                    $result = $connect->query("SELECT * FROM turmas");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                    }
                    ?>
                </select>
            </div>
        
            <div class="input-item">
                <label for="id_materia"><i class="bi bi-person"></i>Matéria</label>
                <select id="id_materia" name="id_materia" required>
                    <option value="">Selecione uma Matéria</option>
                    <?php
                    // Usando a conexão criada no db_connect.php
                    $result = $connect->query("SELECT * FROM materias");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="input-item">
                <label for="id_professor"><i class="bi bi-person"></i>Professor</label>
                <select id="id_usuario" name="id_usuario" required>
                    <option value="">Selecione um Professor</option>
                    <?php
                    // Usando a conexão criada no db_connect.php
                    $result = $connect->query("SELECT * FROM usuarios WHERE tipo = 'professor'");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                    }
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
                <input type="text" name="hora_inicio"> <!-- Corrigido o name -->
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
