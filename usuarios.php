<?php 
include_once 'includes/mensagem.php';
require_once 'php_action/db_connect.php';
require 'includes/header.php';
?>

    <!-- MOSTRAR OS USUARIOS -->
    <div class="row">
        <div class="col s12 m6 push-m3 brown">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Email:</th>
                    <th>Senha:</th>
                    <th>Função:</th>
                    <th>Data de Nascimento:</th>
                    <th>Sexo:</th>
                    <th>Celular:</th>
                    <th>CPF:</th>
                    <th>RG:</th>
                    <th>Serie:</th>
                    <th>Endereço:</th>
                </tr>
            </thead>
    
            <tbody>
                <?php
                $sql ="SELECT * FROM usuarios";//ordem decrescente
                $resultado = mysqli_query($connect, $sql);
                while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['email']; ?></td>
                    <td><?php echo $dados['senha']; ?></td>
                    <td><?php echo $dados['tipo']; ?></td>
                    <td><?php echo $dados['data_nascimento']; ?></td>
                    <td><?php echo $dados['sexo']; ?></td>
                    <td><?php echo $dados['celular']; ?></td>
                    <td><?php echo $dados['CPF']; ?></td>
                    <td><?php echo $dados['RG']; ?></td>
                    <td><?php echo $dados['serie']; ?></td>
                    <td><?php echo $dados['endereco']; ?></td>
                    <td><a href="editarU.php?id_usuario=<?php echo $dados['id_usuario']; ?>" class="btn-floating blue"><i class="material-icons">edit</a></td>
                    <td><a href="#modal <?php echo $dados['id_usuario']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</a></td>
                    
                    <div id="modal <?php echo $dados['id_usuario']; ?>" class="modal">
                    <div class="modal-content">
                     <h4>OPA!</h4>
                     <p>Tem certeza que quer excluir isso?</p>
                    </div>

                    <div class="modal-footer">
                     <form action="php_action/deleteU.php" method="POST">
                     <input type="hidden" name="id_usuario" value="<?php echo $dados['id_usuario'];?>">
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
