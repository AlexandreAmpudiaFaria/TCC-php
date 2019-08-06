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
 
    $id = trim($_REQUEST['idAtendimento']);
    
    //$rs = mysql_query("SELECT * FROM atendimentos where id=".$id); // rs = record set = conjunto de registros da tabela

    $rs = mysql_query("SELECT * FROM atendimentos  INNER JOIN procedimentos on procedimentos.id=atendimentos.procedimento join pacientes on pacientes.id=atendimentos.paciente join medicos on medicos.id=atendimentos.medico where idAtendimento='$id';"); // rs = record set = conjunto de registros da tabela

    $edita = mysql_fetch_array($rs);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ficha de Atendimento</title>
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

     <div class="corpoEditarPaciente">
        <br>
        <h1 class="text-black">Ficha do Atendimento</h1>
        
        <form id="frmFichaPaciente" name="frmFichaPaciente" method="POST" 
        action="gravaAtendimento.php">
        <div class="form-group">
            <br>
            <label for="lbltxtId"> ID: <?php echo $edita['idAtendimento'] ?></label>
            <input type="hidden" name="txtID" value="<?php echo $edita['idAtendimento'] ?>">
        </div>

        <div class="form-group">
        <label for="lbltxtId"> Procedimento: <?php echo $edita['descricao'] ?></label>
        <input type="hidden" name="txtProcedimento" value="<?php echo $rs['descricao'] ?>">
        </div>

        <div class="form-group">
        <label for="lbltxtId"> Paciente: <?php echo $edita['nomePaciente'] ?></label>
        <input type="hidden" name="txtPaciente" value="<?php echo $rs['nomePaciente'] ?>">
        </div>

        <div class="form-group">
        <label for="lbltxtId"> médico responsavel: <?php echo $edita['cpf'] ?></label>
        <input type="hidden" name="txtMedico" value="<?php echo $rs['id'] ?>">
        </div>

        <div class="form-group">
        <label for="lbltxtId"> data: <?php echo $edita['data'] ?></label>
        <input type="hidden" name="txtData" value="<?php echo $rs['data'] ?>">
        </div>

        <div class="form-group">
        <label for="lbltxtId"> descricao: <?php echo $edita['descricao'] ?></label>
        <input type="hidden" name="txtDescricao" value="<?php echo $rs['descricao'] ?>">
        </div>

        <div class="form-group">
            <label for="lblLaudo" required=""> Laudo Médico: </label>
            <input type="text" id="txtLaudo" name="txtLaudo" class="form-control col-md-4" required="">
            <input type="hidden" name="txtStatus" value="1">
        </div>

        <div class="form-group">
            <input type="submit" id="botaoEnviar" name="botaoEnviar" class="btn btn-success bt-lg" 
            value="Atualizar"> 
            <input type="reset" id="botaoLimpar" name="botaoLimpar" class=" btn btn-primary bt-lg"
            value="Limpar">
            <input type="button" id="botaoCancelar" name="botaoCancelar" class="btn btn-danger bt-lg"
            value="Voltar" onclick="javascript:location.href='listarClientes.php'">
            <input type="button" id="botaoHistorico" name="botaoHistorico" class="btn btn-info bt-lg"
            value="Historico" onclick="javascript:location.href='historico.php'">
  
          </div>
            
        </form>
                        

     

     
     </div>

 </body>
 </html>