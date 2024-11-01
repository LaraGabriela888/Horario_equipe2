<?php 
include_once 'includes/mensagem.php';
require_once 'php_action/db_connect.php';
require_once 'includes/header.php';
?>

    <!-- MOSTRAR OS CLIENTES -->
    <div class="row">
        <div class="col s12 m6 push-m3 brown">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>CPF:</th>
                    <th>Telefone:</th>
                    <th>Endereço:</th>
                </tr>
            </thead>
    
            <tbody>
                <?php
                $sql ="SELECT * FROM cliente";//ordem decrescente
                $resultado = mysqli_query($connect, $sql);
                while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['nome_cliente']; ?></td>
                    <td><?php echo $dados['cpf_cliente']; ?></td>
                    <td><?php echo $dados['fone_cliente']; ?></td>
                    <td><?php echo $dados['endereco_cliente']; ?></td>
                    <td><?php echo $dados['senha_cliente']; ?></td>
                    <td><a href="editarC.php?id_cliente=<?php echo $dados['id_cliente']; ?>" class="btn-floating blue"><i class="material-icons">edit</a></td>
                    <td><a href="#modal <?php echo $dados['id_cliente']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</a></td>
                    
                    <div id="modal <?php echo $dados['id_cliente']; ?>" class="modal">
                    <div class="modal-content">
                     <h4>OPA!</h4>
                     <p>Tem certeza que quer excluir isso?</p>
                    </div>

                    <div class="modal-footer">
                     <form action="php_action/deleteC.php" method="POST">
                     <input type="hidden" name="id_cliente" value="<?php echo $dados['id_cliente'];?>">
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
