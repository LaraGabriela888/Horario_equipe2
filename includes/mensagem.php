<?php
//sessao
// MENSAGEM DE CADASTRADO COM SUCESSO
session_start();
if(isset($_SESSION['mensagem'])):
?>

        <script>
            //mensagem 
            window.onload = function(){
                M.toast ({html:' <?php echo $_SESSION['mensagem']; ?> '});
            };
        </script>


<?php
endif;
//session_unset();
?>