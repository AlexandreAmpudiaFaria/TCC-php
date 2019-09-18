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
 
    $id = trim($_POST['txtMedicos']);
    
    //$rs = mysql_query("SELECT * FROM atendimentos where id=".$id); // rs = record set = conjunto de registros da tabela

    $rs = mysql_query("SELECT * FROM atendimentos INNER JOIN procedimentos on procedimentos.id=atendimentos.procedimento join pacientes on pacientes.id=atendimentos.paciente join medicos on medicos.id=atendimentos.medico where medico=$id and status=1;"); // rs = record set = conjunto de registros da tabela

    $edita = mysql_fetch_array($rs);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatorio de Atendimentos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/validator.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
</head>
<body class="corpo">

    <div class="imagemRelatorio"><img src="logoHM.png"></div>

    <h1 class="text-black titulo">Relatorio de Atendimentos</h1>

     <div class="corpoPaginaAtendimento">
        <br>

        <div id="d">
        <script language="javascript">
         function imprime(text){
         text=document
         print(text)
          } 
        </script>

        <form>
            <a href="" value="imprimir" class="btn btn-info bt-lg" onclick="imprime()"> Imprimir <i class="fas fa-print"></i></a>
        </form>
        <input type="button" id="botaoCancelar" name="botaoCancelar" class="btn btn-danger CancelarImpressao"
            value="Cancelar" onclick="javascript:location.href='relatorioMedico.php'">
         
     </div>
     <br><br><br>
        
        
        <div class="container col-md-6 ListarPacientes">
     <table class="table table-striped">
        <tr>
         <th class=" text-center col-md-1 id" >ID</th>
         <th class=" text-center col-md-10" >Procedimento</th>
         <th class=" text-center col-md-10" >Paciente</th>
         <th class=" text-center col-md-10" >Medico</th>
         <th class=" text-center col-md-10" >Data</th>
         <th class=" text-center col-md-10" >Descrição</th>
         <th class=" text-center col-md-10" >Laudo</th>
         
        </tr>
        <?php while ($linha = mysql_fetch_array($rs)) {?>
            <tr>
                <td class="text-center"><?php echo $linha ['idAtendimento'] ?></td>
                <td class="text-center"><?php echo $linha ['descricao'] ?></td>
                <td class="text-center"><?php echo $linha ['nomePaciente'] ?></td>
                <td class="text-center"><?php echo $linha ['cpf'] ?></td>
                <td class="text-center"><?php echo $linha ['data'] ?></td>
                <td class="text-center"><?php echo $linha ['descricaoAtendimento'] ?></td>
                <td class="text-center"><?php echo $linha ['laudo'] ?></td>
            </tr>
        <?php } ?>  

            
     </table>

     

     
     </div>

     

 </body>
 </html>