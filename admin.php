<?php

session_start();
if (!isset($_SESSION['usuario'])) {
  Header("Location: index.html");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Área do Administrador</title>
	<meta charset="utf-8">
    <title>Manter Médicos</title>
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
       <a class="navbar-brand" href="home.php">Home <i class="fas fa-home"></i></a>
     </nav>

    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="manterMedicos.php">Manter Medicos <i class="fas fa-archive"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="manterProcedimentos.php">Procedimentos <i class="fas fa-hand-holding-heart"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="areadoMedico.php">Área do Médico <i class="fas fa-shopping-cart"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="login.html">Admin <i class="fas fa-user-tie"></i></a>
    </nav>
	</div>


  <div class="logo">
    <img src="logo.png">
    
  </div>

	<div class="LogoHome">
		<h1> Hospital Pronto Atendimento </h1>
	</div>
	

</body>
</html>