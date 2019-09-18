<?php

session_start();
if (!isset($_SESSION['usuario'])) {
  Header("Location: index.html");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastrar Medico</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/validator.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
</head>
<body class="corpo">
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
	<div class="corpoCadastrarMedico">
    <br><br><br>  
		<h1 class="text-black container col-md-12 ">Cadastrar Novo Medico</h1>
		<form id="frmNovoPaciente" name="frmNovoPaciente" method="POST" action="cadastrarMedico.php">
		  <br>
		  <div class="form-group col-md-5">
             <label for="lblNome">Nome do medico :</label>
             <input type="text" class="form-control" id="txtNome" name="txtNome"  placeholder="Digite o nome do paciente" required="">
          </div>

          <div class="form-group col-md-5">
             <label for="lblNome">CPF :</label>
             <input type="text" class="form-control" id="txtCPF" name="txtCPF"  placeholder="Digite o CPF do paciente" required="">
          </div>

		      <div class="form-group col-md-5">
             <label for="lblTelefone">Telefone :</label>
             <input type="text" class="form-control" id="txtTelefone" name="txtTelefone"  placeholder="Digite o telefone" required="">
          </div>

          <div class="form-group col-md-5">
             <label for="lblCRM">CRM :</label>
             <input type="text" class="form-control" id="txtCRM" name="txtCRM"  placeholder="Digite o CRM" required="">
          </div>


          <div class="form-group col-md-5">
          	<input type="submit" id="botaoEnviar" name="botaoEnviar" class="btn btn-success" 
          	value="Gravar">
          	<input type="reset" id="botaoLimpar" name="botaoLimpar" class=" btn btn-primary"
          	value="Limpar">
          	<input type="button" id="botaoCancelar" name="botaoCancelar" class="btn btn-danger"
          	value="Cancelar" onclick="javascript:location.href='manterMedicos.php'">
          </div>
          
			
		</form>
	</div>

</body>
</html>