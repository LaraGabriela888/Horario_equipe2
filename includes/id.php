<?php 
require_once 'php_action/db_connect.php';
$idcliente = "SELECT id_usuario FROM usuarios WHERE id_usuario = '$id'";
$id = mysqli_query($connect, $idcliente);

$_SESSION['id'] = "$id";

?>

<script>
        window.onload = function(){
         M.toast({hmtl: '<?php echo $_SESSION['id']; ?> '})
        }
</script>