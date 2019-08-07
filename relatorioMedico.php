<?php 
session_start();
    if (!isset($_SESSION['usuario'])) {
    Header("Location: index.html");
    }

   $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $dbname = "hospital";
  
  //Criar a conexao
  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
 /*$conexao = mysql_connect("localhost","root",""); //abre a conexao com banco
    if(!$conexao){
      echo "Erro ao se conectar ao banco";
      exit;
    }

    /*$banco = mysql_select_db("hospital"); // seleciona o banco a ser usado
    if(!$banco){
      echo "Erro ao se conectar com o banco trabalho";
      exit;
    }

    //$rs = mysql_query("SELECT * FROM procedimentos;"); // rs = record set = conjunto de registros da tabela*/

    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i');
    echo $date;

?>

<!DOCTYPE html>
<html>
<head>
  <title>Relatorio de Atendimentos</title>
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
   
   <div class="table-responsive container table corpoRelatorioMedico">
    <h1>Relatorio de Atendimentos</h1>

    <div >
      <form class="gerarAtendimento" id="myform" name="myform" method="POST" 
         action="paginaRelatorio.php">        

      <div class="form-group col-md-5">
        <label>Médico: </label>
      <select class="custom-select" name="txtMedicos" id="txtMedicos">
          <option>Selecione</option>
          <?php
            $result_medicos = "SELECT * FROM medicos";
            $resultado_medicos = mysqli_query($conn, $result_medicos);
            while($row_medicos = mysqli_fetch_assoc($resultado_medicos)){ ?>
              <option value="<?php echo $row_medicos['id']; ?>"><?php echo $row_medicos['cpf']; ?></option> <?php
            }
          ?>
        </select>
        <div id="campoMedico" style="color: red;"></div>
         <script src="teste2.js"></script>
        

      </div>



          <div class="form-group col-md-5">
            <input type="submit" id="botaoEnviar" name="botaoEnviar" class="btn btn-success" 
            value="Filtrar">
            <input type="reset" id="botaoLimpar" name="botaoLimpar" class=" btn btn-primary"
            value="Limpar">
            <input type="button" id="botaoCancelar" name="botaoCancelar" class="btn btn-danger"
            value="Cancelar" onclick="javascript:location.href='home.php'">
          </div>
        </form>

    

    </div>
    



   </div>

   <div class="btnLogoutGerarAtendimento"> 
    <input type="button" id="botaoEnviar" name="botaoEnviar" class="btn btn-danger" 
            value="Logout" onclick="javascript:location.href='logout.php'">
  </div>
  

</body>
</html>