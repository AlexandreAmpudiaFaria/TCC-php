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

    $rs = mysql_query("SELECT * FROM atendimentos INNER JOIN procedimentos on procedimentos.id=atendimentos.procedimento join pacientes on pacientes.id=atendimentos.paciente join medicos on medicos.id=atendimentos.medico where status=1;"); // rs = record set = conjunto de registros da tabela

    $edita = mysql_fetch_array($rs);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ficha do Atendimento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/validator.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
</head>
<body class="corpo">

    <div class="imagemRelatorio"><img src="logoHM.png"></div>

    <h1 class="text-black titulo">Ficha do Atendimento</h1>

     <div class="corpoPaginaAtendimento">
        <br>
        
        
        <form id="frmFichaPaciente" name="frmFichaPaciente" method="POST" 
        action="gravaAtendimento.php">
        <div class="form-group">
            <br>
            <label class="relatorio" for="lbltxtId"> ID: <?php echo $edita['idAtendimento'] ?></label>
            <input type="hidden" name="txtID" value="<?php echo $edita['idAtendimento'] ?>">
        </div>

        <div class="form-group">
        <label class="relatorio" for="lbltxtId"> Procedimento: <?php echo $edita['descricao'] ?></label>
        </div>

        <div class="form-group">
        <label class="relatorio" for="lbltxtId"> Paciente: <?php echo $edita['nomePaciente'] ?></label>
        </div>

        <div class="form-group">
        <label class="relatorio" for="lbltxtId"> Médico responsavel: <?php echo $edita['cpf'] ?></label>
        </div>

        <div class="form-group">
        <label class="relatorio" for="lbltxtId"> Data: <?php echo $edita['data'] ?></label>
        </div>

        <div class="form-group">
        <label class="relatorio" for="lbltxtId"> Descrição: <?php echo $edita['descricao'] ?></label>
        </div>

        <div class="form-group">
            <label class="relatorio" for="lbltxtId"> Laudo: <?php echo $edita['laudo'] ?></label>
        </div>
            
        </form>
                        

     

     
     </div>

     <div id="d">
        <script language="javascript">
         function imprime(text){
         text=document
         print(text)
          } 
        </script>
         
     </div>

 </body>
 </html>