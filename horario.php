
<?php 
include_once 'includes/mensagem.php';
require_once 'php_action/db_connect.php';
require_once 'includes/header.php';
?>

    <!-- MOSTRAR OS HORARIOS -->
    <div class="row">
        <div class="col s12 m6 push-m3 brown">
            <thead>
                <tr>
                    <th>Turma:</th>
                    <th>Materia:</th>
                    <th>Professor:</th>
                    <th>Dia:</th>
                    <th>Turno:</th>
                    <th>Hora do Início:</th>
                    <th>Hora do Fim:</th>
                </tr>
            </thead>
    
            <tbody>
                <?php
                $sql ="SELECT * FROM horarios";//ordem decrescente
                $resultado = mysqli_query($connect, $sql);
                while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['id_turma']; ?></td>
                    <td><?php echo $dados['id_materia']; ?></td>
                    <td><?php echo $dados['id_professor']; ?></td>
                    <td><?php echo $dados['dia']; ?></td>
                    <td><?php echo $dados['turno']; ?></td>
                    <td><?php echo $dados['hora_inicio']; ?></td>
                    <td><?php echo $dados['hora_fim']; ?></td>
                    <td><a href="editarH.php?id_horario=<?php echo $dados['id_horario']; ?>" class="btn-floating blue"><i class="material-icons">edit</a></td>
                    <td><a href="#modal <?php echo $dados['id_horario']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</a></td>
                    
                    <div id="modal <?php echo $dados['id_horario']; ?>" class="modal">
                    <div class="modal-content">
                     <h4>OPA!</h4>
                     <p>Tem certeza que quer excluir isso?</p>
                    </div>

                    <div class="modal-footer">
                     <form action="php_action/deleteH.php" method="POST">
                     <input type="hidden" name="id_horario" value="<?php echo $dados['id_horario'];?>">
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
