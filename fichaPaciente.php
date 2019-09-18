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
 
    $id = trim($_REQUEST['id']);
    
    $rs = mysql_query("SELECT * FROM pacientes where id=".$id); // rs = record set = conjunto de registros da tabela
    $edita = mysql_fetch_array($rs);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ficha do Paciente</title>
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

     <div class="corpoEditarPaciente">
        <br>
        <h1 class="text-black">Ficha do Paciente</h1>
        
        <form id="frmFichaPaciente" name="frmFichaPaciente" method="POST" 
        action="editarPaciente.php">
        <div class="form-group">
            <br>
            <label for="lbltxtId"> ID: <?php echo $edita['id'] ?></label>
            <input type="hidden" name="id" value="<?php echo $edita['id'] ?>">
        </div>

        <div class="form-group">
            <label for="lblnome" required=""> Nome: </label>
            <input type="text" id="txtNome" name="txtNome" class="form-control col-md-4"
            value="<?php echo $edita['nomePaciente'] ?>" required="">
        </div>

        <div class="form-group">
            <label for="lblCPF"> CPF: </label>
            <input type="text" id="txtCPF" name="txtCPF" class="form-control col-md-4"
            value="<?php echo $edita['cpf'] ?>">
        </div>

        <div class="form-group">
            <label for="lblSUS"> SUS: </label>
            <input type="text" id="txtSUS" name="txtSUS" class="form-control col-md-4"
            value="<?php echo $edita['sus'] ?>">
        </div>

        <div class="form-group">
            <label for="lblTelefone"> Telefone: </label>
            <input type="text" id="txtTelefone" name="txtTelefone" class="form-control col-md-4"
            value="<?php echo $edita['telefone'] ?>">
        </div>

        <div class="form-group">
            <label for="lblEndereco"> Endereço :</label>
            <input type="text" id="txtEndereco" name="txtEndereco" class="form-control col-md-6" value="<?php echo $edita['endereco'] ?>" required="">
        </div>

        <div class="form-group">
            <label for="lblObservacao"> Observação : </label>
            <input type="text" id="txtObservacao" name="txtObservacao" class="form-control col-md-4" value="<?php echo $edita['observacao'] ?>">
        </div>

        <div class="form-group">
            <input type="submit" id="botaoEnviar" name="botaoEnviar" class="btn btn-success bt-lg" 
            value="Atualizar"> 
            <input type="reset" id="botaoLimpar" name="botaoLimpar" class=" btn btn-primary bt-lg"
            value="Limpar">
            <input type="button" id="botaoCancelar" name="botaoCancelar" class="btn btn-danger bt-lg"
            value="Voltar" onclick="javascript:location.href='manterPacientes.php'">
  
          </div>
            
        </form>

        <form id="frmHistorico" name="frmHistorico" method="POST" 
        action="historico.php">
        
        
        
        <input type="hidden" id="txtPaciente" name="txtPaciente" class="form-control col-md-4"
            value="<?php echo $edita['id'] ?>" required="">
            <input type="submit" id="botaoEnviar" name="botaoEnviar" class="btn btn-success bt-lg btnHistorico" 
            value="Historico"> 
        </form>
                        

     

     
     </div>

 </body>
 </html>