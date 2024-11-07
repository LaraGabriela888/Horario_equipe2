<?php 
include_once 'includes/mensagem.php';
require_once 'php_action/db_connect.php';
require_once 'includes/header.php';
?>

    <!-- MOSTRAR AS TURMAS -->
    <div class="row">
        <div class="col s12 m6 push-m3 brown">
            <thead>
                <tr>
                    <th>Nome da Turma:</th>
                </tr>
            </thead>
    
            <tbody>
                <?php
                $sql ="SELECT * FROM turmas";//ordem decrescente
                $resultado = mysqli_query($connect, $sql);
                while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><a href="editarT.php?id_turma=<?php echo $dados['id_turma']; ?>" class="btn-floating blue"><i class="material-icons">edit</a></td>
                    <td><a href="#modal <?php echo $dados['id_turma']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</a></td>
                    
                    <div id="modal <?php echo $dados['id_turma']; ?>" class="modal">
                    <div class="modal-content">
                     <h4>OPA!</h4>
                     <p>Tem certeza que quer excluir isso?</p>
                    </div>

                    <div class="modal-footer">
                     <form action="php_action/deleteT.php" method="POST">
                     <input type="hidden" name="id_turma" value="<?php echo $dados['id_turma'];?>">
                     <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                     <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                     </form>

                    </div>
                    </div>
                    
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>

<?php require_once 'includes/footer.php' ?>
