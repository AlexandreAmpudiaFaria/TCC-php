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

    $id = trim($_POST['id']);
    $nome = trim($_POST['txtNome']);
    $cpf = trim($_POST['txtCPF']);
    $telefone = trim($_POST['txtTelefone']);
    $crm = trim($_POST['txtCRM']);

    
    
    $sql = "UPDATE medicos set nome='$nome',cpf='$cpf', telefone='$telefone',crm='$crm' where id='$id';";
         
    $ins = mysql_query($sql); // comando para inserir no banco

    if(!ins){
            echo "Deu erro ao atualizar o produto";
         }
    
    else { echo "campo descricao em branco"; }
    

    header("location:manterMedicos.php");
?>