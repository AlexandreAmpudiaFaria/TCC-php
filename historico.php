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

    $paciente = trim($_POST['txtPaciente']);

    $rs = mysql_query("SELECT * FROM atendimentos INNER JOIN procedimentos on procedimentos.id=atendimentos.procedimento JOIN medicos on medicos.id=atendimentos.medico where paciente=".$paciente); // rs = record set = conjunto de registros da tabela

    //$linha = mysql_fetch_array($rs);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastrar Pacientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/validator.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <script type="text/javascript">

  function Atualizar(){
    window.location.reload();
  }

  </script>
    
</head>
<body class="corpo" onload="setInterval('Atualizar()',10000)">
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
  <div class="table-responsive container table corpoManterPacientes">
     <br>
     <h1 class="text-black ">Historico do Paciente</h1>
     <br>                                 
            
     <br>
     <br>
     <div class="container col-md-10 ListarPacientes">
     <table class="table table-striped">
        <tr>
         <th class=" text-center col-md-1 id" >ID</th>
         <th class=" text-center col-md-1" >Procedimento</th>
         <th class=" text-center col-md-1" >Medico</th>
         <th class=" text-center col-md-1" >Data</th>
         <th class=" text-center col-md-1">Operações</th>
         
        </tr>
        <?php while ($linha = mysql_fetch_array($rs)) {?>
            <tr>
                <td class="text-center"><?php echo $linha ['idAtendimento'] ?></td>
                <td class="text-center"><?php echo $linha ['descricao']?></td>
                <td class="text-center"><?php echo $linha ['cpf']?></td>
                <td class="text-center"><?php echo $linha ['data']?></td>
                <td class="text-center">
                    <button class="btn btn-danger btn-sm" 
                    onclick="javascript:location.href='paginaAtedimento.php?idAtendimento='+
                    <?php echo $linha['idAtendimento'] ?>"><i class="far fa-file-pdf"></i></i></button>
                </td>
            </tr>
        <?php } ?>  

            
     </table>

     

     
     </div>