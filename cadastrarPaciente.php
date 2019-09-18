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

    $nome = trim($_POST['txtNome']);
    $cpf = trim($_POST['txtCPF']);
    $sus = trim($_POST['txtSUS']);
    $telefone = trim($_POST['txtTelefone']);
    $endereco = trim($_POST['txtEndereco']);
    $observacao = trim($_POST['txtObservacao']);

    
    
    $sql = "INSERT INTO pacientes (cpf, nomePaciente, sus, telefone, endereco, observacao) VALUES ('$cpf','$nome','$sus', '$telefone', '$endereco', '$observacao' );";
         
    $ins = mysql_query($sql); // comando para inserir no banco

    header("location:home.php");

?>