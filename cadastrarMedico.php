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
    $telefone = trim($_POST['txtTelefone']);
    $crm = trim($_POST['txtCRM']);

    
    
    $sql = "INSERT INTO medicos (cpf, nome, telefone,crm) VALUES ('$nome', '$cpf', '$telefone', '$crm');";
         
    $ins = mysql_query($sql); // comando para inserir no banco
    if(!ins){
            echo "Deu erro na consulta de inserir produto";
         }
    
    else { echo "campo descricao em branco"; }

    header("location:manterMedicos.php");
?>