<?php
//conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "escola_horarios";

$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect,$db_name);


if(mysqli_connect_error()){
    echo "Erro na conexão:  ". mysqli_connect_error();
}
?>