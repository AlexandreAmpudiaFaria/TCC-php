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

    $rs = mysql_query("SELECT * FROM procedimentos;"); // rs = record set = conjunto de registros da tabela
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Manter Procedimentos</title>
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
     <h1 class="text-black ">Lista de Procedimentos</h1>
     <br>

     <input type="button" id="botaoAdicionar" name="botaoAdicionar" class="btn btn-primary btnAddPaciente"
            value="Adicionar Procedimento" onclick="javascript:location.href='formularioCadastrarProcedimento.php'">

      <form class="BuscarPaciente" id="frmRemoverCliente" name="pesquisarPacienteNome.php" method="POST" 
        action="pesquisarPacienteNome.php">
         <div class="form-group col-md-5">
             <label class="nomePaciente" for="lblNome">Buscar por nome :</label>
             <input  class="form-control caixaNomePaciente" id="txtNome" name="txtNome"  placeholder="Digite o nome do paciente" required="">
             <input type="submit" id="botaoEnviar" name="botaoEnviar" class="btn btn-success btnPesquisarPaciente" 
            value="Pesquisar">
          </div>
     </form>
                                    
            
     <br>
     <br>
     <div class="container col-md-6 ListarPacientes">
     <table class="table table-striped">
        <tr>
         <th class=" text-center col-md-1 id" >ID</th>
         <th class=" text-center col-md-10" >Descrição</th>
         <th colspan="2" class="text-center ">Operações</th>
         
        </tr>
        <?php while ($linha = mysql_fetch_array($rs)) {?>
            <tr>
                <td class="text-center"><?php echo $linha ['id'] ?></td>
                <td class="text-center"><?php echo $linha ['descricao'] ?></td>
                <td>
                    <button class="btn btn-primary btn-sm" 
                    onclick="javascript:location.href='fichaCliente.php?id='+
                    <?php echo $linha['id'] ?>"><i class="fas fa-sign-in-alt"></i></button>
                </td>
                <td>
                    <button class="btn btn-warning btn-sm" 
                    onclick="javascript:location.href='frmEditarCliente.php?id='+
                    <?php echo $linha['id'] ?>"><i class="fas fa-pen-square"></i></button>
                </td>
            </tr>
        <?php } ?>  

            
     </table>

     

     
     </div>