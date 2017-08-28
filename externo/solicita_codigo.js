$(document).ready(function(){

$('.telefone').mask('(00)00000-0000');


function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function validar(){
    let x=true;
        
        if($(".nome").val().length<=5){
            alert("Preencha seu nome");
            $(".nome").focus();
            x=false;
            return;
        }
    
    
        if(!isEmail($(".email").val())){
            alert("Preencha seu email");
            $(".email").focus();
            return;
            x=false;
        }
        
        if($(".telefone").val().length<14){
            alert("Preencha seu telefone");
            $(".telefone").focus();
            x=false;
            return;
        }
        
     return x;
}//fim da função validar


$(document).on('click','.enviar',function(){
    
    if(validar()){ 
    $('#contact_form').submit();
    }
});// fim da função clique enviar



});//fim da função ready   