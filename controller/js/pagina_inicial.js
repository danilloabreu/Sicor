$(document).ready(function(){


$(function() {
            $(".vendido").tooltip({
                track:true,
                items: '[comprador], [corretor]',
                content: function () {
                return 'Comprador: ' + $(this).attr('comprador')+'<br/>Corretor: ' + $(this).attr('corretor');
                }
              
            });
            $("#tooltip-2").tooltip();
         });



function setCheckSum_v (){
    $.get('/sicor/controller/php/check_table.php', function (result){
    //alert(result);
    $(".checksum_variavel").val(result);
    //alert($(".checksum").val());
    
    });
    }//fim da função set checksum
    
 function setCheckSum_e (){
    $.get('/sicor/controller/php/check_table.php', function (result){
    //alert(result);
    $(".checksum_estatico").val(result);
    //alert($(".checksum").val());
     });
    }
    //fim da função set checksum   
   
function verificaMudancaCheckSum(){
    var antigo =$(".checksum_estatico").val();
    //alert ("CheckSum fixo: "+antigo);
    setCheckSum_v();
    var novo =$(".checksum_variavel").val();
   // alert ("CheckSum variavel"+novo)
    if(antigo!==novo){
       //alert ("Mudou"); 
       location.reload(true);
    }

}
//inicio do script
//setar o checksum estatico
setCheckSum_e();
//setar o checksum variavel
setCheckSum_v();

setInterval(function(){
    setCheckSum_v ();
    verificaMudancaCheckSum();}, 3000);    

});//fim da função ready
