<?php
session_start();
    if (!isset($_SESSION['usuario'])) {
    Header("Location: index.html");
    }

define{'HOST','127.0.0.1'};
define{'USUARIO', 'root'};
define{'SENHA', ''};
define{'DB','hospital'}

$conexao= mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar');

?>
