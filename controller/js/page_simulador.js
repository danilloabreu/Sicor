$(document).ready(function(){
 //incialização
var quadra=$(".select-quadra").val();
var lote=$(".select-lote").val();
setValorTabela();
$(".lote-quadra").html(quadra);
$(".lote-lote").html(lote);

//mascaras
$(".lote-valornegociacao").mask('000.000,00', {reverse: true});
$(".entrada-valor").mask('000.000,00', {reverse: true});
$(".entrada-primeirovencimento").datepicker({
dateFormat: 'dd/mm/yy',
dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
nextText: 'Próximo',
prevText: 'Anterior'
});

$(".entrada-primeirovencimento").mask('00/00/0000')

//get
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

function getFinValorParcela(){
    var FinValorParcela=$(".fin-valorparcela").html();
    return FinValorParcela;
}


//função para atualizar o fluxo de pagamentos
function atualizarFluxo(){
var data=$('.entrada-primeirovencimento').val();
var dia=data.slice(0,2);
var mes=data.slice(3,5);
var ano=data.slice(6,10);
var date= new Date(ano+'/'+mes+'/'+'/'+dia);

entradaTotalParcela=toFloat($(".parcela-total").html());
finTotalParcela=toFloat($(".fin-totalparcela").html());
finNumParcela=Number($(".fin-numparcela").val());
entradaNumParcela=Number($(".entrada-numparcela").val());
$(".fluxo").html(fluxoDePagamento(entradaTotalParcela,date,entradaNumParcela,finTotalParcela,finNumParcela,12));
    
var entradaultimovencimento=new Date(ano+'/'+mes+'/'+'/'+dia);
var finprimeirovencimento = new Date(ano+'/'+mes+'/'+'/'+dia);
var finultimovencimento = new Date(ano+'/'+mes+'/'+'/'+dia);

entradaultimovencimento.setMonth(date.getMonth()+Number(entradaNumParcela)-1);
finprimeirovencimento.setMonth(date.getMonth()+Number(entradaNumParcela));
finultimovencimento.setMonth(date.getMonth()+Number(entradaNumParcela)+Number(finNumParcela)-1);

var entradaultimovencimentoformatado=entradaultimovencimento.toLocaleDateString();
var finprimeirovencimentoformatado=finprimeirovencimento.toLocaleDateString();
var finultimovencimentoformatado=finultimovencimento.toLocaleDateString();

$(".entrada-ultimovencimento").text(entradaultimovencimentoformatado);
$(".fin-primeirovencimento").text(finprimeirovencimentoformatado);
$(".fin-ultimovencimento").text(finultimovencimentoformatado);

}//fim da função atualizar fluxo

//função para transformar o dado em valor que possa ser somado
function toFloat (valorFormatado){

 valorFormatado=valorFormatado.replace('.','');
 valorFormatado=valorFormatado.replace(',','.');   

return valorFormatado;
}

//função para buscar no banco o valor de tabela do lote
function setValorTabela(){
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
        parcela["seguro"]=0.0001987*valor;
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

function atualizaValorTabelaValorEntrada(){
var quadra=$(".select-quadra").val();
var lote=$(".select-lote").val();

$(".lote-quadra").html(quadra); //set quadra
$(".lote-lote").html(lote); //set lote
$(".lote-valornegociacao").val("");//zera o valor de negociação do lote

//transmite os dados via post para o controlador da simulação
$.post("/sicor/controller/php/simular.php",{
quadra: quadra,
lote: lote
},
function(data, status){
    $(".lote-valor").html(data['valor']);//set valor de tabela do lote
    var valorFormatado=toFloat(data['valor']);
    $(".entrada-minimo").html(Number(valorFormatado*0.1).toLocaleString('pt-BR',{minimumFractionDigits:2}));
    });//fim da função data,status
    
}

function limparCampos(){
    $(".lote-valornegociacao").val("");//zera o valor de negociação do lote
    $(".entrada-valor").val("");//zera o valor de entrada do lote
    $(".entrada-documentacao").text('');//zera o valor dos emolumentos
    $(".parcela-total").text('');//zera o total da parcela
    $(".entrada-total").text('')//zera o total da entrada
    $(".entrada-ultimovencimento").text('');//zera o último vencimento da entrada
    $(".entrada-numparcela").val('1');//volta o número de parcelas da entrada para 1
    $(".fin-numparcela").val('1');//volta o número de parcelas do financimento para 1
    $(".entrada-primeirovencimento").val('');//zera o valor do primeiro vencimento da entrada
    $(".fin-total").text('');//zera o valor do financiamento total
    $(".fin-valorparcela").text('');//zera o valor da parcela
    $(".fin-valorseguro").text('');//zera o valor do seguro
    $(".fin-totalparcela").text('');//zera o total da parcela
    $(".fin-primeirovencimento").text('');//zera o primeiro vencimento
    $(".fin-ultimovencimento").text('');//zera o ultimo vencimento
    $(".fin-valortxadm").text('')//zera a taxa de adm
    

}

function limparFluxo(){
    
var html="<table><tr><th colspan='3'>Fluxo de Pagamentos</th></tr>";
html+="<tr><td>Ano</td><td>Mes</td><td>Valor</td></tr></table>";
$(".fluxo").html(html);
}


//*************************Controlador de ações Jquery****************************************//

//mudança de lote - set os campos quadra, lote, valor de tabela, entrada mínima 
$(document).on('change','.select-lote',function(){
limparCampos();
limparFluxo();
atualizaValorTabelaValorEntrada();
    
});//fim da função change .select-lote

//mudança de quadra - set os campos quadra, lote, valor de tabela, entrada mínima 
$(document).on('change','.select-quadra',function(){
var quadra=$(".select-quadra").val()

//atualiza o select com os lotes disponíveis da quadra 
$.post("/sicor/controller/php/atualizar_select_lote_disponivel.php",{
quadra: quadra
},
function(data, status){
    $(".select-lote").html(data);//set valor de tabela do lote
    var quadra=$(".select-quadra").val();
    var lote=$(".select-lote").val();
    $(".lote-quadra").html(quadra); //set quadra
    $(".lote-lote").html(lote); //set lote
    
limparCampos();
limparFluxo();
atualizaValorTabelaValorEntrada();

    });//fim da função data,status
});//fim da função change .select-lote

// tela pagamento a vista
$(document).on('change','.avista',function(){
                
                $(".entrada").hide();
                $(".financiamento").hide();
                $(".fluxo").hide();
$('.entrada-valor').prop( "disabled", true );
$('.entrada-numparcela').prop( "disabled", true );
$('.fin-numparcela').prop( "disabled", true );
limparCampos();
limparFluxo();

    });//fim da função click .avista

//tela pagamento a prazo
$(document).on('change','.aprazo',function(){
                //alert("sim");
                $(".entrada").show();
                $(".financiamento").show();
                $(".fluxo").show();
$('.entrada-valor').prop( "disabled", false );
$('.entrada-numparcela').prop( "disabled", false );
$('.fin-numparcela').prop( "disabled", false );    
limparCampos();
    });//fim da função click .aprazo

//inserção do valor de entrada    
$(document).on('blur','.entrada-valor',function(){
    
//get valor de negociação do lote
var entradaValor=toFloat($(this).val());
var vendaValor=toFloat($(".lote-valornegociacao").val());
    
//testes
//se o valor de venda não estiver preenchido
if(vendaValor==""){
    alert("Preencha o valor de negociação");
    $(".lote-valornegociacao").focus();
    return;
}
    
var dezporcento=Number(toFloat($(".lote-valornegociacao").val()))/10    ;
 
//se o valor de venda for inferior a 10% do valor de negociação do lote    
if(entradaValor<dezporcento||entradaValor==""){
    alert("O mínimo da entrada é 10%");
    $(".entrada-valor").val(dezporcento.toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
    $(this).focus();
    return;
}    
//calculo do saldo a financiar   
var a=getLoteValorNegociacao();
var b=getEntradaValor();
var saldoafinanciar= Number(a)-Number(b);             
var entradanumparcela=$(".fin-numparcela").val();

//chamada da função atualizaEmolumento para atualizar os campos           
atualizaEmolumento(vendaValor,entradaValor,entradanumparcela);
});//fim da função focus-out   

//alteração no número de parcelas do financiamento
$(document).on('change','.fin-numparcela',function(){
    ////atualiza o valor da parcela, seguro e taxa adm do financiamento
    var parcela=calculaParcelaFinanciamento(Number(toFloat($(".fin-total").html())),Number(toFloat($(".fin-numparcela").val())));
    $(".fin-valorparcela").html(parcela["parcela"].toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
    $(".fin-valorseguro").html(parcela["seguro"].toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
    $(".fin-valortxadm").html(parcela["txadm"].toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));

    //atualiza o total da parcela a ser pago
    var txadm=Number(parcela["txadm"]);
    var seguro=Number(parcela["seguro"]);
    var totalfinparcela=getFinValorParcela();
    totalfinparcela=Number(toFloat(totalfinparcela))+Number(txadm)+Number(seguro);
    //$(".fin-totalparcela").html(totalfinparcela);
    
    var a=getLoteValorNegociacao();
    var b=getEntradaValor();
    
    var vendaValor=toFloat($(".lote-valornegociacao").val());
    var entradaValor=toFloat($(".entrada-total").html());             
    var entradanumparcela=$(".fin-numparcela").val();

//chamada da função atualizaEmolumento para atualizar os campos           
atualizaEmolumento(vendaValor,entradaValor,entradanumparcela);
    
//atualização do fluxo de pagamentos

if($(".entrada-primeirovencimento").val()!==""){
    atualizarFluxo();
}

});//fim da função change .fin-valorparcela

//alteração no número de parcelas da entrada
$(document).on('change','.entrada-numparcela',function(){
  
    var a= Number(toFloat($(".entrada-total").html()));
    var b= Number(toFloat($(".entrada-numparcela").val()));
    var c= (a/b).toLocaleString('pt-BR',{minimumFractionDigits:2, maximumFractionDigits:2 });
    $(".parcela-total").html(c);
    
    if($(".entrada-primeirovencimento").val()!==""){
    atualizarFluxo();
    }
});//fim da função change .entrada-numparcela

//função para gerar proposta em pdf
//envia requisição get
$(document).on('click','.gerarproposta',function(){
    
//testes    
      
    var vendaValor=toFloat($(".lote-valornegociacao").val());
    var valorTabela=toFloat($(".lote-valor").html());
    var quadra=$(".select-quadra").val();
    var lote=$(".select-lote").val();
    
    //se o valor de venda for menor que o valor de tabela
    if(vendaValor<valorTabela){
        alert("O valor mínimo para negociação é o valor de tabela!");
        //pega o nome da classe do objeto
        var className = $(this).attr('class')
        //muda o foco para o campo a ser alterado
        
         $(".lote-valornegociacao").focus();   
            return;
           
    }
    
    
    
   //coletando as variáveis para o get da proposta em pdf
    var quadra=$('.lote-quadra').html();
    var lote=$('.lote-lote').html();
    var valornegociacao=$(".lote-valornegociacao").val();
    var entradatotal=$(".entrada-total").html();
    var entradaparcela=$(".entrada-numparcela").val();
    var entradavencimento=$(".entrada-vencimento").val();
    var valorparcelaentrada=$(".parcela-total").html();
    var documentacao=$(".entrada-documentacao").html();
    var entradavencimento=$(".entrada-primeirovencimento").val();
    var numparcelafinanciamento=$(".fin-numparcela").val();
    var totalparcela=$(".fin-valorparcela").html();
    var finprimeirovencimento=$(".fin-primeirovencimento").text();
    
    
     if($(".avista").is(':checked')){
     var condicao='0';  
     }else{
     var condicao='1'    
     }
    
    
    
    //gerando o get
    var get="quadra="+quadra+"&lote="+lote+"&valornegociacao="+valornegociacao+"&entradatotal="+entradatotal+"&entradaparcela="+entradaparcela;
    get=get+"&valorparcelaentrada="+valorparcelaentrada+"&documentacao="+documentacao+"&entradavencimento="+entradavencimento;
    get=get+"&numparcelafinanciamento="+numparcelafinanciamento+"&totalparcela="+totalparcela+"&finprimeirovencimento="+finprimeirovencimento+"&condicao="+condicao;
    
    
    
   $(this).attr("href", "/sicor/controller/php/gerar_proposta_pdf.php?"+get);
   //$(this).attr("href", "/sicor/view/page/espelho_proposta_1.php?"+get);
                
    });//fim da função gerar PDF

 //alteração do campo valor de negociação do lote   
$(document).on('blur','.lote-valornegociacao',function(){
    //valor da negociação do lote
    var negociacaoValor=toFloat($(this).val());
    //valor da tabela do lote
    var valorTabela=Number(toFloat($(".lote-valor").html()));
       
    if(negociacaoValor<valorTabela){
        $(".lote-valornegociacao").val(valorTabela.toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
        //var a = toFloat(getLoteValorNegociacao());
        //$(".entrada-minimo").html(Number(a*0.1).toLocaleString('pt-BR',{minimumFractionDigits:2}));   
            
        alert("O valor mínimo da negociação é o valor de tabela");
        $(".lote-valornegociacao").focus();
        
    }
    
 $(".entrada-minimo").html(Number(negociacaoValor*0.1).toLocaleString('pt-BR',{minimumFractionDigits:2}));   
    //var dezporcento=Number(toFloat($(".lote-valornegociacao").val()))/10 
 //$(".entrada-valor").val('');
 //limparCampos();
 
 if($(".entrada-valor").val()!==''){
 
var entradaValor=toFloat($(this).val());
var vendaValor=toFloat($(".lote-valornegociacao").val());       
        
 var dezporcento=Number(toFloat($(".lote-valornegociacao").val()))/10    ;
 $(".entrada-valor").val(dezporcento.toLocaleString('pt-BR',{minimumFractionDigits:2,maximumFractionDigits:2}));
 
 //calculo do saldo a financiar   
var a=getLoteValorNegociacao();
var b=getEntradaValor();
var saldoafinanciar= Number(a)-Number(b);             
var entradanumparcela=$(".fin-numparcela").val();

//chamada da função atualizaEmolumento para atualizar os campos           
atualizaEmolumento(vendaValor,entradaValor,entradanumparcela);
 
 
 
 }
 if($(".entrada-primeirovencimento").val()!==''){
     atualizarFluxo();
 
 }//fim do if
 
});//fim da função focus-out   

$(document).on('focusout change','.entrada-primeirovencimento',function(){

if($('.lote-valornegociacao').val()==''){
        $(this).val("");
        $('.lote-valornegociacao').focus();
        return;
}

if($('.entrada-valor').val()==''&&!$(".avista").is(':checked')){
        $(this).val("");
        $('.entrada-valor').focus();
        return;
}    


if($('.entrada-primeirovencimento').val()==''){
        
var today = new Date();
var dd = today.getDate()+15;
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 
if(mm<10) {
    mm = '0'+mm
} 
today = dd + '/' + mm + '/' + yyyy;
$('.entrada-primeirovencimento').val(today);   
  }  
atualizarFluxo();

});//fim da função change entrada-primeirovencimento  

//função para desenhar fluxo de pagamento
function fluxoDePagamento(entradaTotalParcela,data,entradaNumParcela,finTotalParcela, finNumParcela,meses ){
var nomeMes = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"]

//data = new Date (dataBase);

var html="<table><tr><th colspan='3'>Fluxo de Pagamentos</th></tr>";
html+="<tr><td>Ano</td><td>Mes</td><td>Valor</td></tr>";

//console.log(dataBase);

var entrada = new Array();
var financiamento = new Array();
var total;

for (i=0; i<meses; i++){
    if(i<entradaNumParcela){
        entrada[i]=entradaTotalParcela
    }else{
        entrada[i]=0    
    }
}
for (i=0; i<meses; i++){
    if((i>=entradaNumParcela)&&(i<entradaNumParcela+finNumParcela)){
 
    financiamento[i]=finTotalParcela;
    }else{
        financiamento[i]=0;
    }
}

 
for (i=0; i<meses; i++){
    total=Number(entrada[i])+Number(financiamento[i]);
    
    var ano=data.getFullYear();
    var mes=data.getMonth();
    if(total!==0){
    html+="<tr><td>"+ano+"</td><td>"+nomeMes[mes]+"</td><td><span>R$ </span>"+total.toLocaleString('pt-BR',{minimumFractionDigits:2})+"</td></tr>"
    data.setMonth(data.getMonth()+1);
    }else{
    html+="<tr><td>"+ano+"</td><td>"+nomeMes[mes]+"</td><td> - </td></tr>"
    data.setMonth(data.getMonth()+1);    
    }
}        

html+="</table>";
return html;


}//fim da função fluxoDePagamento();

});//fim da função ready   