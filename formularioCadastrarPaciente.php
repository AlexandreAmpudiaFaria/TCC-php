<?php

session_start();
if (!isset($_SESSION['usuario'])) {
  Header("Location: index.html");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Paciente</title>
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
       <a class="navbar-brand" href="manterProcedimentos.php">Procedimentos <i class="fas fa-user-md"></i></a>
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
	<div class="corpoCadastrarPaciente">
    <br>
		<h1 class="text-black container col-md-12 ">Cadastrar Novo Paciente</h1>
		<form id="frmNovoPaciente" name="frmNovoPaciente" method="POST" action="cadastrarPaciente.php">
		  <br>
		  <div class="form-group col-md-5">
             <label for="lblNome">Nome do paciente :</label>
             <input type="text" class="form-control" id="txtNome" name="txtNome"  placeholder="Digite o nome do paciente" required="">
          </div>

          <div class="form-group col-md-5">
             <label for="lblNome">CPF :</label>
             <input type="text" class="form-control" id="txtCPF" name="txtCPF"  placeholder="Digite o CPF do paciente" required="">
          </div>

          <div class="form-group col-md-5">
             <label for="lblNome">Número SUS :</label>
             <input type="text" class="form-control" id="txtSUS" name="txtSUS"  placeholder="Digite o número do SUS" required="">
          </div>

		      <div class="form-group col-md-5">
             <label for="lblTelefone">Telefone :</label>
             <input type="text" class="form-control" id="txtTelefone" name="txtTelefone"  placeholder="Digite o telefone" required="">
          </div>

          <div class="form-group col-md-5">
             <label for="lblEndereco">Endereço  :</label>
             <input type="text" class="form-control" id="txtEndereco" name="txtEndereco"  placeholder="Digite o endereco" required="">
          </div>


          <div class="form-group col-md-5">
             <label for="lblObservacao">Observação :</label>
             <input type="text" class="form-control" id="txtObservacao" name="txtObservacao"  placeholder="Digite uma observação sobre o paciente">
          </div>

          <div class="form-group col-md-5">
          	<input type="submit" id="botaoEnviar" name="botaoEnviar" class="btn btn-success" 
          	value="Gravar">

            <script src="jquery-3.4.1.min.js"></script>
  <script src="jquery-3.4.1.min.js"></script>
  <script src="toastr.min.js"></script>
  <script>
    $('#botaoEnviar').on('click', function(){
      toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

     toastr["info"]("Data deleted!","Success!")

    })
  </script>



          	<input type="reset" id="botaoLimpar" name="botaoLimpar" class=" btn btn-primary"
          	value="Limpar">
          	<input type="button" id="botaoCancelar" name="botaoCancelar" class="btn btn-danger"
          	value="Cancelar" onclick="javascript:location.href='manterPacientes.php'">
          </div>
          
			
		</form>
	</div>

</body>
</html>