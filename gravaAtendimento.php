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

    $id = trim($_POST['txtID']);
    $procedimento = trim($_POST['txtProcedimento']);
    $paciente = trim($_POST['txtPaciente']);
    $medico = trim($_POST['txtMedico']);
    $data = trim($_POST['txtData']);
    $descricao = trim($_POST['txtDescricao']);
    $laudo = trim($_POST['txtLaudo']);
    $status = trim($_POST['txtStatus']);

    
    $sql = "UPDATE atendimentos SET laudo='$laudo',status='$status' where idAtendimento='$id';";
         
    $ins = mysql_query($sql); // comando para inserir no banco
    if(!ins){
            echo "Deu erro na consulta de inserir produto";
         }
    
    else { echo "campo descricao em branco"; }

    header("location:redirecionamento.php");
?>