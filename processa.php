<?php 

session_start();
    if (!isset($_SESSION['usuario'])) {
    Header("Location: index.html");
    }

requeri_once 'usuarios.php';
$u = new Usuario;

$nome = trim($_POST['nome']);
$telefone = trim($_POST['telefone']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$confSenha = trim($_POST['confSenha']);

$u->conectar("hospital","localhost","root","");
if ($u->msgErro == "") 
{ // esta ok
	if ($senha == $confSenha) {
		if ($u->cadastrar($nome,$telefone,$email,$senha)) {
			echo "Cadastrado com sucesso";
		}
		else
		{
			echo "Email já cadastrado";
		}



		$u->cadastrar($nome,$telefone,$email,$senha)
	}
	else{ echo "Senha e confirmar senha não correspondem"; }
	
}
else
{
	echo "Erro :".$u->msgErro;
}




?>