//Validação do campo procedimentos na pagina gerarAtendimento.php
var myform = document.forms.myform;
var message = document.getElementById("campoProcedimento");
var message2 = document.getElementById("campoPaciente");
var message3 = document.getElementById("campoMedico");
var message4 = document.getElementById("campoDescricao");

myform.onsubmit = function(){
   if (myform.txtProcedimentos.value == "Selecione" || myform.txtPacientes.value == "Selecione" 
   	|| myform.txtMedicos.value == "Selecione" || myform.txtDescricao.value == "") {
   	message.innerHTML = "Preencha este campo !!";
   	message2.innerHTML = "Preencha este campo !!";
   	message3.innerHTML = "Preencha este campo !!";
   	message4.innerHTML = "Preencha este campo !!";
   	return false;
   } else{
   	message.innerHTML = "";
   	return true;
   }
   	
 
   
};
