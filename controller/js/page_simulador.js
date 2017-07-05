$(document).ready(function(){
 //incialização
var quadra=$(".select-quadra").val();
var lote=$(".select-lote").val();
valorInicial();
var isFocus=true;


$(".lote-quadra").html(quadra);
$(".lote-lote").html(lote);

//mascaras
$(".lote-valornegociacao").mask('000.000,00', {reverse: true});
$(".entrada-valor").mask('000.000,00', {reverse: true});
$(".entrada-primeirovencimento").datepicker();

function toFloat (valorFormatado){

 valorFormatado=valorFormatado.replace('.','');
 valorFormatado=valorFormatado.replace(',','.');   

return valorFormatado;
}

function getLoteQuadra(){
    
    var quadra=$(".lote-quadra").html();
    return quadra
}

function getLoteLote(){
    
    var lote=$(".lote-lote").html();
    return lote;
}

function getLoteValorTabela(){
    var ValorTabela = Number(toFloat($(".lote-valor").html()));
    return ValorTabela;
}

function getLoteValorNegociacao(){
   var loteValorNegociacao=Number(toFloat($(".lote-valornegociacao").val()));
   return loteValorNegociacao;  
}

function getEntradaMinimo(){
    var entradaMinimo=Number(toFloat($(".entrada-minimo").html()));
    return entradaMinimo;
}

function getEntradaValor(){
    var entradaValor=Number(toFloat($(".entrada-valor").val()));
    return entradaValor;   
}

function valorInicial(){
            var lote=$(".select-lote").val();
     
                //transmite os dados via post para o controlador da simulação
                $.post("/sicor/controller/php/simular.php",{
                quadra: quadra,
                lote: lote
                },
                function(data, status){
                    $(".lote-valor").html(data['valor']);  
                    var valorFormatado=data['valor'];
                    valorFormatado=valorFormatado.replace('.','');
                    valorFormatado=valorFormatado.replace(',','.');
                    $(".entrada-minimo").html(Number(valorFormatado*0.1).toLocaleString('pt-BR',{minimumFractionDigits:2}));
            });//fim da função data,status    
        }
            
function dadosParcela (valor,meses){
    var parcela={parcela:0, seguro:0, txadm:0};  
    //caso o prazo seja menor que 12 meses, não há incidência de juros
    if (meses<=12){
        parcela["parcela"]=valor/meses;
        
        return parcela;
    }else{    
        var i=0.009488793;
        var numerador= i*Math.pow(1+i,meses);
        var denominador= Math.pow(1+i,meses)-1; 
        var valorparcela=valor*(numerador/denominador);
        
        parcela["parcela"]=valorparcela;
        parcela["seguro"]=0.0001987*valor;
        parcela["txadm"]=25.00;
        return parcela;
        
    }//fim do else
}//fim da função parcela    
 
function atualizaEmolumento (vendaValor,entradaValor,numParcela){
        //transmite os dados via post para o controlador de exclusão da tarefa
                $.post("/sicor/controller/php/recuperar_emolumento.php",{
                vendaValor: vendaValor,
                entradaValor: entradaValor,
                numParcela: numParcela
                },
                function(data, status){
                    //seta o valor do emolumento
                    $(".entrada-documentacao").html(Number(data['emolumento']).toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
                    //soma o valor do emolumento com o da entrada para gerar o valor total da entrada
                    $(".entrada-total").html((Number(toFloat($(".entrada-valor").val()))+Number(toFloat($(".entrada-documentacao").html()))).toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));    
                    //divide o valor total da entrada pelas parcelas para gerar o valor das parcelas
                    var a = Number(toFloat($(".entrada-total").html()));
                    var b=  Number(toFloat($(".entrada-numparcela").val()));
                    var c= (a/b).toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2});
                    $(".parcela-total").html(c);
                    //acha o valor total a ser financiado
                    $(".fin-total").html((Number(toFloat($(".lote-valornegociacao").val()))-Number(toFloat($(".entrada-valor").val()))).toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
                    //valor da parcela,seguro e taxa adm do financiamento
                    var parcela=dadosParcela(Number(toFloat($(".fin-total").html())),Number(toFloat($(".fin-numparcela").val())));
                    $(".fin-valorparcela").html(parcela["parcela"].toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
            });//fim da função data,status
    }

function format (valor){
    var valor=valor.toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2});
    return valor;
}



$(document).on('change','.select-lote',function(){
                var quadra=$(".select-quadra").val();
                var lote=$(".select-lote").val();
                
                $(".lote-quadra").html(quadra);
                $(".lote-lote").html(lote);
                
                
                $(".lote-valornegociacao").val("");
                
                //transmite os dados via post para o controlador da simulação
                $.post("/sicor/controller/php/simular.php",{
                quadra: quadra,
                lote: lote
                },
                function(data, status){
                    $(".lote-valor").html(data['valor']);
                    var valorFormatado=data['valor'];
                    valorFormatado=valorFormatado.replace('.','');
                    valorFormatado=valorFormatado.replace(',','.');
                    $(".entrada-minimo").html(Number(valorFormatado*0.1).toLocaleString('pt-BR',{minimumFractionDigits:2}));
            });//fim da função data,status
    });//fim da função change .select-lote
    
    
//pagamento a vista
$(document).on('click','.avista',function(){
                //alert("sim");
                $(".entrada").hide();
                $(".financiamento").hide();
                $(".fluxo").hide();
         
    });
 //pagamento a prazo
$(document).on('click','.aprazo',function(){
                //alert("sim");
                $(".entrada").show();
                $(".financiamento").show();
                $(".fluxo").show();
         
    });
//quando o valor de entrada perde o foco    
$(document).on('blur','.entrada-valor',function(){
    
    //variavel valor do lote
    var entradaValor=toFloat($(this).val());
    var vendaValor=toFloat($(".lote-valornegociacao").val());
                
    if(vendaValor==""){
        alert("Preencha o valor de negociação");
        $(".lote-valornegociacao").focus();
        return;
        }
    
    var dezporcento=Number(toFloat($(".lote-valornegociacao").val()))/10    ;       
    
    if(entradaValor<dezporcento||entradaValor==""){
        alert("O mínimo da entrada é 10%");
        $(".entrada-valor").val(dezporcento.toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
        return;
        }    
                                                      
                
                
                
    atualizaEmolumento(vendaValor,entradaValor,111);
    });//fim da função focus-out   
     
$(document).on('change','.fin-numparcela',function(){
        ////atualiza o valor da parcela, seguro e taxa adm do financiamento
        var parcela=dadosParcela(Number(toFloat($(".fin-total").html())),Number(toFloat($(".fin-numparcela").val())));
        $(".fin-valorparcela").html(parcela["parcela"].toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
        $(".fin-valorseguro").html(parcela["seguro"].toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
        $(".fin-valortxadm").html(parcela["txadm"].toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
    });//fim da função change .fin-valorparcela
   
$(document).on('change','.entrada-numparcela',function(){
        ////altera o valor da parcela
        var a= Number(toFloat($(".entrada-total").html()));
        var b= Number(toFloat($(".entrada-numparcela").val()));
        var c= (a/b).toLocaleString('pt-BR',{minimumFractionDigits:2, maximumFractionDigits:2 });
       $(".parcela-total").html(c);
    });//fim da função change .entrada-numparcela
       
$(document).on('click','.gerarproposta',function(){
    //alert("Passou");
    
    alert(format(getEntradaValor()));
    
    return;
    
    var vendaValor=toFloat($(".lote-valornegociacao").val());
    var valorTabela=toFloat($(".lote-valor").html());
    var quadra=$(".select-quadra").val();
    var lote=$(".select-lote").val();
    
    
    if(vendaValor<=valorTabela){
        alert("O valor mínimo para negociação é o valor de tabela!");
        //pega o nome da classe do objeto
        var className = $(this).attr('class')
        //muda o foco para o campo a ser alterado
        
         $(".lote-valornegociacao").focus();   
            return;
           
    }
    
    
    
   // alert(toFloat($(".lote-valornegociacao").val()));
    //alert($(".lote-valornegociacao").val());
    
    var get="quadra="+quadra+"&lote="+lote;
    $(this).attr("href", "/sicor/controller/php/gerar_proposta_pdf.php?"+get);
                
    });//fim da função gerar PDF
//quando o valor do lote perde o foco   
$(document).on('blur','.lote-valornegociacao',function(){
    //valor da negociação do lote
    var negociacaoValor=toFloat($(this).val());
    //valor da tabela do lote
    var valorTabela=Number(toFloat($(".lote-valor").html()));
       
    if(negociacaoValor<valorTabela){
        alert("O valor mínimo da negociação é o valor de tabela");
        $(".lote-valornegociacao").val(valorTabela.toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
        $(".lote-valornegociacao").focus();
        $(".entrada-minimo").html(Number(a*0.1).toLocaleString('pt-BR',{minimumFractionDigits:2}));   
        return;
    }
 $(".entrada-minimo").html(Number(negociacaoValor*0.1).toLocaleString('pt-BR',{minimumFractionDigits:2}));   
    
    
    
});//fim da função focus-out   



});//fim da função ready   