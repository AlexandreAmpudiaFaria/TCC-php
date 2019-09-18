<?php 

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

    $user = trim($_POST['usuario']);
    $pwd = trim($_POST['senha']);
    $pwd = md5($pwd);

    $rs = mysql_query("SELECT * FROM usuarios where usuario like '$user'");
    $linha = mysql_fetch_array($rs);

    //echo ($linha['user'] . "-" . $linha['pwd']);

    if ($pwd==$linha['senha']) {
        session_start();
        $_SESSION['usuario'] = $user;
        header('location: home.php');
    }
    else
    {
        echo "Usuario ou senha incorretos";
        header('location: index.html' );
    }
  