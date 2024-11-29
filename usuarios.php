<?php 
require_once 'php_action/db_connect.php';
require_once 'includes/header.php';
?>

<!-- MOSTRAR OS USUÁRIOS -->
<div class="row">
    <div class="col s12 m6 push-m3 brown">
        <h4>Lista de Usuários</h4>
        <?php
        $sql = "SELECT * FROM usuarios"; // ordem decrescente
        $resultado = mysqli_query($connect, $sql);
        while ($dados = mysqli_fetch_array($resultado)):
        ?>
            <div class="usuario-item">
                <p><strong>Nome:</strong> <?php echo $dados['nome']; ?></p>
                <p><strong>Email:</strong> <?php echo $dados['email']; ?></p>
                <p><strong>Senha:</strong> <?php echo $dados['senha']; ?></p>
                <p><strong>Função:</strong> <?php echo $dados['tipo']; ?></p>
                <p><strong>Data de Nascimento:</strong> <?php echo $dados['data_nascimento']; ?></p>
                <p><strong>Sexo:</strong> <?php echo $dados['sexo']; ?></p>
                <p><strong>Celular:</strong> <?php echo $dados['celular']; ?></p>
                <p><strong>CPF:</strong> <?php echo $dados['CPF']; ?></p>
                <p><strong>RG:</strong> <?php echo $dados['RG']; ?></p>
                <p><strong>Série:</strong> <?php echo $dados['serie']; ?></p>
                <p><strong>Endereço:</strong> <?php echo $dados['endereco']; ?></p>
                <div class="actions">
                    <a href="editarU.php?id_usuario=<?php echo $dados['id_usuario']; ?>" class="btn-floating blue">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="#modal-<?php echo $dados['id_usuario']; ?>" class="btn-floating red modal-trigger">
                        <i class="material-icons">delete</i>
                    </a>
                </div>
            </div>

            <!-- Modal -->
            <div id="modal-<?php echo $dados['id_usuario']; ?>" class="modal">
                <div class="modal-content">
                    <h4>OPA!</h4>
                    <p>Tem certeza que quer excluir isso?</p>
                </div>
                <div class="modal-footer">
                    <form action="php_action/deleteU.php" method="POST">
                        <input type="hidden" name="id_usuario" value="<?php echo $dados['id_usuario']; ?>">
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
