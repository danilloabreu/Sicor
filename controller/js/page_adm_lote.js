$(document).ready(function(){
 $("tr").not($("thead").children()).hide();
 $(".resumo-lote").show();
 $("tr[quadra='"+1+"']").show();
  
 $(document).on('click','.disponivel',function(){
     var l=$(this).attr("linha");
     var quadra=$(".quadra[linha='"+l+"']").html();
     var lote=$(".lote[linha='"+l+"']").html();
     var r = confirm("Alterar a situação do Lote "+lote+" da Quadra "+quadra+" ? \nO lote ficará disponível após o comando");
      if (r == true){
                //transmite os dados via post para o controlador de exclusão da tarefa
                $.post("/sicor/controller/php/alterar_sit_lote.php",{
                quadra: quadra,
                lote: lote,
                status: 0
                },
                function(data, status){
                    if(data==true){
                    alert("A situação foi alterada com sucesso");
                    $(".status[linha='"+l+"']").html("Disponível");
                    $('.quadro-resumo').load("/sicor/view/frame/resumo_venda.php");
                    }else{
                    alert("Problema no comando");
                    }
            });//fim da função data,status 
            }else {
                return;//caso o usuário não confirme a solicitação a solicitaçaõ para
            }//fim do if-else
    });//fim da função clique disponivel
    
$(document).on('click','.vendido',function(){
     var l=$(this).attr("linha");
     var quadra=$(".quadra[linha='"+l+"']").html();
     var lote=$(".lote[linha='"+l+"']").html();
     var r = confirm("Alterar a situação do Lote "+lote+" da Quadra "+quadra+" ? \nO lote ficará vendido após o comando");
      if (r == true){
                //transmite os dados via post para o controlador de exclusão da tarefa
                $.post("/sicor/controller/php/alterar_sit_lote.php",{
                quadra: quadra,
                lote: lote,
                status: 2
                },
                function(data, status){
                    if(data==true){
                    alert("A situação foi alterada com sucesso");
                    $(".status[linha='"+l+"']").html("Vendido");
                    $('.quadro-resumo').load("/sicor/view/frame/resumo_venda.php");
                    }else{
                    alert("Problema no comando");
                    }
            });//fim da função data,status 
            }else {
                return;//caso o usuário não confirme a solicitação a solicitaçaõ para
            }//fim do if-else
    });//fim da função clique vendido
    
$(document).on('click','.proposta',function(){
     var l=$(this).attr("linha");
     var quadra=$(".quadra[linha='"+l+"']").html();
     var lote=$(".lote[linha='"+l+"']").html();
     var r = confirm("Alterar a situação do Lote "+lote+" da Quadra "+quadra+" ? \nO lote ficará como proposta após o comando");
     if (r == true){
                //transmite os dados via post para o controlador de exclusão da tarefa
                $.post("/sicor/controller/php/alterar_sit_lote.php",{
                quadra: quadra,
                lote: lote,
                status: 1
                },
                function(data, status){
                    //alert(data);
                    if(data==true){
                    alert("A situação foi alterada com sucesso");
                    $(".status[linha='"+l+"']").html("Proposta");
                    $('.quadro-resumo').load("/sicor/view/frame/resumo_venda.php");
                    }else{
                    alert("Problema no comando");
                    }//mensagem de confirmação da solicitação post
            });//fim da função data,status 
            }else {
                return;//caso o usuário não confirme a solicitação a solicitaçaõ para
            }//fim do if-else
    });//fim da função clique proposta  
 
$(document).on('change','.select-quadra',function(){
    var q=$(this).val();
    //alert(q);
    $("tr").not($("thead").children()).hide();
    $("tr[quadra='"+q+"']").show();
     //$(".resumo-lote").children().show();
    //$("tr[quadra='"+q+"']"").hide();
  
    });//fim da função clique proposta    
    
    
});//fim da função ready