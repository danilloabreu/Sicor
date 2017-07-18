$(document).ready(function(){

//mascaras
$(".saldoDevedor").mask('000.000,00', {reverse: true});


//função para transformar o dado em valor que possa ser somado
function toFloat (valorFormatado){

 valorFormatado=valorFormatado.replace('.','');
 valorFormatado=valorFormatado.replace(',','.');   

return valorFormatado;
}

//calcula a parcela do financiamento    
//retorna o array [parcela,seguro,txadm]
function calculaParcelaFinanciamento (valor,meses){
    var parcela={parcela:0, seguro:0, txadm:0};  
    //caso o prazo seja menor que 12 meses, não há incidência de juros
    if (meses<=12){
        parcela["parcela"]=valor/meses;
        
        return parcela;
    }else{
    //caso contrário, procede ao cálculo financeiro    
        var i=0.009488793;
        var numerador= i*Math.pow(1+i,meses);
        var denominador= Math.pow(1+i,meses)-1; 
        var valorparcela=valor*(numerador/denominador);
        
        parcela["parcela"]=valorparcela;
        parcela["seguro"]=0.00019*valor;
        parcela["txadm"]=25.00;
       
        return parcela;
        
    }//fim do else
}//fim da função calculaParcelaFinanciamento    

//função que busca no banco de dados o valor dos emolumentos 
function atualizaEmolumento (vendaValor,entradaValor,numParcela){
//transmite os dados via post para a calculadora de emolumentos
$.post("/sicor/controller/php/recuperar_emolumento.php",{
    vendaValor: vendaValor,
    entradaValor: entradaValor,
    numParcela: numParcela
    },
    function(data, status){
        //atualiza o valor dos emolumentos
        $(".entrada-documentacao").html(Number(data['emolumento']).toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
        
        //atualiza o valor do emolumento com o valor da entrada para gerar o valor total da entrada
        $(".entrada-total").html((Number(toFloat($(".entrada-valor").val()))+Number(toFloat($(".entrada-documentacao").html()))).toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));    
        
        //atualiza o valor das parcelas da entrada
        var a = Number(toFloat($(".entrada-total").html())); 
        var b=  Number(toFloat($(".entrada-numparcela").val()));
        var c= (a/b).toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2});
        $(".parcela-total").html(c);
        
        //atualiza o valor total a ser financiado
        $(".fin-total").html((Number(toFloat($(".lote-valornegociacao").val()))-Number(toFloat($(".entrada-valor").val()))).toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));

        //atualiza o valor total das parcelas do financiamento (inclui seguro e taxa de adm)
        var a=getLoteValorNegociacao();
        var b=getEntradaValor();
        var saldoafinanciar= Number(a)-Number(b);
        var numparcela=$(".fin-numparcela").val();
        ////atualiza o valor da parcela, seguro e taxa adm do financiamento
        var parcela=calculaParcelaFinanciamento(saldoafinanciar,numparcela);
        
    $(".fin-valorparcela").html(parcela["parcela"].toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
    $(".fin-valorseguro").html(parcela["seguro"].toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
    $(".fin-valortxadm").html(parcela["txadm"].toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
        
    var totalfinparcela=Number(parcela["parcela"])+Number(parcela["seguro"])+Number(parcela["txadm"]);
    $(".fin-totalparcela").html(format(totalfinparcela));      
    
     if($(".entrada-primeirovencimento").val()!==''){
     atualizarFluxo();
 
 }//fim do if
    
        
        
    });//fim da função data,status
}//fim da função atualizaEmolumento()

//função para formatar um valor para numérico
function format (valor){
    var valor=valor.toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2});
    return valor;
}

//*************************Controlador de ações Jquery****************************************//

$(document).on('click','.calcular',function(){

var saldoDevedor=Number(toFloat($('.saldoDevedor').val()));
var prazo = $('.prazo').val();
var parcela=calculaParcelaFinanciamento(saldoDevedor,prazo);
$('.parcela').text(format((parcela['parcela'])));

$(".sim-parcela").each(function(){
    prazo=Number($(this).attr('parcela'));    
    
    var parcela=calculaParcelaFinanciamento(saldoDevedor,prazo);
  
    $(this).text(format((parcela['parcela'])));
    });



});
    
$(document).on('change','.prazo',function(){

var saldoDevedor=Number(toFloat($('.saldoDevedor').val()));
var prazo = $('.prazo').val();
var parcela=calculaParcelaFinanciamento(saldoDevedor,prazo);
$('.parcela').text(format((parcela['parcela'])));

$(document).on('click','.limpar',function(){

$('.saldoDevedor').val('').focus();
$('.prazo').val('1');
$('.parcela').text('');

});




});



});//fim da função ready   