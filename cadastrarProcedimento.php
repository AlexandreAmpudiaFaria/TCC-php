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

    $descricao = trim($_POST['txtDescricao']);
    

    $sql = "INSERT INTO procedimentos (descricao) VALUES ('$descricao');";
         
    $ins = mysql_query($sql); // comando para inserir no banco
    if(!ins){
            echo "Deu erro na consulta de inserir produto";
         }
    
    else { echo "campo descricao em branco"; }

    header("location:manterProcedimentos.php");
?>