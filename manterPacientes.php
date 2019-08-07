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

    $rs = mysql_query("SELECT * FROM pacientes ORDER BY sus;"); // rs = record set = conjunto de registros da tabela
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Pacientes</title>
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
     
  <div class="table-responsive container table corpoManterPacientes">
     <br>
     <h1 class="text-black ">Lista de Pacientes</h1>
     <br>

     

     <input type="button" id="botaoAdicionar" name="botaoAdicionar" class="btn btn-primary btnAddPaciente"
            value="Adicionar Paciente" onclick="javascript:location.href='formularioCadastrarPaciente.php'">

      <div>
         <form class="BuscarPaciente" id="BuscarPaciente" name="pesquisarPacienteNome.php" method="POST" 
         action="pesquisarPacienteNome.php">
         
            
             <label class="nomePaciente" for="lblNome">Buscar por SUS :</label>
             <input class="form-control col-md-5" type="text" name="txtSus" id="txtSus" required="">
             
             <input type="submit" id="botaoEnviar" name="botaoEnviar" class="btn btn-success btnPesquisarPaciente" 
            value="Pesquisar">
          
         </form>
        </div>
                                    
            
     <br>
     <br>
     <div class="container col-md-10 ListarPacientes">
     <table class="table table-striped">
        <tr>
         <th class=" text-center col-md-1 id" >ID</th>
         <th class=" text-center col-md-1" >Nome</th>
         <th class=" text-center col-md-1" >SUS</th>
         <th class=" text-center col-md-1">Operações</th>
         
        </tr>
        <?php while ($linha = mysql_fetch_array($rs)) {?>
            <tr>
                <td class="text-center"><?php echo $linha ['id'] ?></td>
                <td class="text-center"><?php echo $linha ['nomePaciente']?></td>
                <td class="text-center"><?php echo $linha ['sus']?></td>
                <td class="text-center">
                    <button class="btn btn-primary btn-sm" 
                    onclick="javascript:location.href='fichaPaciente.php?id='+
                    <?php echo $linha['id'] ?>"><i class="fas fa-sign-in-alt"></i></button>
                </td>
            </tr>
        <?php } ?>  

            
     </table>

     

     
     </div>

     

</div>

<div class="btnLogoutManterPacientes"> 
    <input type="button" id="botaoEnviar" name="botaoEnviar" class="btn btn-danger" 
            value="Logout" onclick="javascript:location.href='logout.php'">
  </div>


</body>
</html>