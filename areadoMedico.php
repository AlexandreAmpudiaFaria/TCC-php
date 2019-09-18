<?php

session_start();
if (!isset($_SESSION['usuario'])) {
  Header("Location: index.html");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Área do Médico</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/validator.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  </head>
<body class="fundo">
  <div>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary teste">
       <a class="navbar-brand testee" href="home.php" >Home <i class="fas fa-home"></i></a>

     </nav>

    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="manterPacientes.php">Manter Pacientes <i class="fas fa-procedures"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="gerarAtendimento.php">Gerar Atendimento <i class="fas fa-clipboard-list"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="areadoMedico.php">Area do Médico <i class="fas fa-user-md"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="manterMedicos.php">Manter Medicos <i class="fas fa-user-md"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="manterProcedimentos.php">Procedimentos <i class="fas fa-hand-holding-heart"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="relatorioMedico.php">Relatorio <i class="fas fa-user-tie"></i></a>
    </nav>

    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="formularioCadastrarUsuario.php">Usuarios <i class="fas fa-user-tie"></i></a>
    </nav>
  </div>


  <div class="logo">
    <img src="logoMedico2.png">
    
  </div>

	<div class="LogoMedico">
		<h1> Área do Médico </h1>
	</div>

  <div class="buttonAreaMedicoAtendimentos">
    <input type="button" id="botaoAdicionar" name="botaoAdicionar" class="btn btn-primary btnAddPaciente"
            value="Atendimentos" onclick="javascript:location.href='atendimentosRegistrados.php'">
  </div>
  <div class="buttonAreaMedicoAtendimentosRealizados">
    <input type="button" id="botaoAdicionar" name="botaoAdicionar" class="btn btn-primary btnAddPaciente"
            value="Atendimentos Realizados" onclick="javascript:location.href='realizados.php'">
  </div>

	<div class="btnLogoutAreaDoMedico"> 
    <input type="button" id="botaoEnviar" name="botaoEnviar" class="btn btn-danger" 
            value="Logout" onclick="javascript:location.href='logout.php'">
  </div>

</body>
</html>