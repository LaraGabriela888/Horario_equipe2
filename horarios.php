
<?php 
require_once 'php_action/db_connect.php';
require_once 'includes/header.php';
?>

<!-- MOSTRAR OS HORÁRIOS -->
<div class="row">
    <div class="col s12 m6 push-m3 brown">
        <h4>Lista de Horários</h4>
        <?php
        $sql = "SELECT * FROM horarios"; // ordem decrescente
        $resultado = mysqli_query($connect, $sql);
        while ($dados = mysqli_fetch_array($resultado)):
        ?>
            <div class="horario-item">
                <p><strong>Turma:</strong> <?php echo $dados['id_turma']; ?></p>
                <p><strong>Matéria:</strong> <?php echo $dados['id_materia']; ?></p>
                <p><strong>Professor:</strong> <?php echo $dados['id_professor']; ?></p>
                <p><strong>Dia:</strong> <?php echo $dados['dia']; ?></p>
                <p><strong>Turno:</strong> <?php echo $dados['turno']; ?></p>
                <p><strong>Hora de Início:</strong> <?php echo $dados['hora_inicio']; ?></p>
                <p><strong>Hora de Fim:</strong> <?php echo $dados['hora_fim']; ?></p>
                <div class="actions">
                    <a href="editarH.php?id_horario=<?php echo $dados['id_horario']; ?>" class="btn-floating blue">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="#modal-<?php echo $dados['id_horario']; ?>" class="btn-floating red modal-trigger">
                        <i class="material-icons">delete</i>
                    </a>
                </div>
            </div>

            <!-- Modal -->
            <div id="modal-<?php echo $dados['id_horario']; ?>" class="modal">
                <div class="modal-content">
                    <h4>OPA!</h4>
                    <p>Tem certeza que quer excluir isso?</p>
                </div>
                <div class="modal-footer">
                    <form action="php_action/deleteH.php" method="POST">
                        <input type="hidden" name="id_horario" value="<?php echo $dados['id_horario']; ?>">
                        <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
    // Abrir o modal
    document.querySelectorAll('.modal-trigger').forEach(trigger => {
        trigger.addEventListener('click', function (e) {
            e.preventDefault();
            const modalId = this.getAttribute('href').replace('#', '');
            const modal = document.getElementById(modalId);
            modal.classList.add('active');
            const overlay = document.createElement('div');
            overlay.classList.add('modal-overlay');
            document.body.appendChild(overlay);

            // Fechar modal ao clicar no overlay
            overlay.addEventListener('click', () => closeModal(modal, overlay));
        });
    });

    // Fechar o modal
    document.querySelectorAll('.modal-close').forEach(btn => {
        btn.addEventListener('click', function () {
            const modal = this.closest('.modal');
            const overlay = document.querySelector('.modal-overlay');
            closeModal(modal, overlay);
        });
    });

    function closeModal(modal, overlay) {
        modal.classList.remove('active');
        if (overlay) overlay.remove();
    }
</script>

