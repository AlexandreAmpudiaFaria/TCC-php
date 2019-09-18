<?php

session_start();
    if (!isset($_SESSION['usuario'])) {
    Header("Location: index.html");
    }

    $conexao = mysql_connect("localhost","root",""); //abre a conexao com banco
    if(!$conexao){
    	echo "Erro ao se conectar ao banco";
    	exit;
    }

    $banco = mysql_select_db("hospital"); // seleciona o banco a ser usado
    if(!$banco){
    	echo "Erro ao se conectar com o banco trabalho";
    	exit;
    }

    $usuario = trim($_POST['txtUsuario']);
    $senha = trim($_POST['txtSenha']);
    $senha = md5($senha);

    
    
    $sql = "INSERT INTO usuarios (usuario, senha) VALUES ('$usuario','$senha');";
         
    $ins = mysql_query($sql); // comando para inserir no banco

    header("location:home.php");

?>