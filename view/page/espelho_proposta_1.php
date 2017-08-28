<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require ($path.'/sicor/util/extenso.php');
require_once ($path.'/sicor/util/mpdf/mpdf.php');

//testes do get
if (isset($_GET['quadra'])){
    $quadra=$_GET['quadra'];
}else{
    $quadra="PROPOSTA INVALIDA";
}

if (isset($_GET['lote'])){
    $lote=$_GET['lote'];
}else{
    $lote="PROPOSTA INVALIDA";
}

if (isset($_GET['valornegociacao'])){
    $valor=$_GET['valornegociacao'];
    $valor=str_replace('.','',$valor);
    $valor=str_replace(',','.',$valor);
}else{
    $valor="PROPOSTA INVALIDA";
}

if (isset($_GET['entradatotal'])){
    $entradaTotal=$_GET['entradatotal'];
    $entradaTotal=str_replace('.','',$entradaTotal);
    $entradaTotal=str_replace(',','.',$entradaTotal);
   
}else{
    $valor="PROPOSTA INVALIDA";
}

if (isset($_GET['entradaparcela'])){
    $entradaParcelaNum=$_GET['entradaparcela'];
}else{
    $entradaParcelaNum="PROPOSTA INVALIDA";
}


if (isset($_GET['valorparcelaentrada'])){
    $entradaParcelaValor=$_GET['valorparcelaentrada'];
    $entradaParcelaValor=str_replace('.','',$entradaParcelaValor);
    $entradaParcelaValor=str_replace(',','.',$entradaParcelaValor);
}else{
    $entradaParcelaValor="PROPOSTA INVALIDA";
}

if (isset($_GET['documentacao'])){
    $emolumento=$_GET['documentacao'];
    $emolumento=str_replace('.','',$emolumento);
    $emolumento=str_replace(',','.',$emolumento);
   
}else{
    $emolumento="PROPOSTA INVALIDA";
}

if (isset($_GET['entradavencimento'])){
    $entradaVencimento=$_GET['entradavencimento'];
    
}else{
    $entradaVencimento="PROPOSTA INVALIDA";
}

if (isset($_GET['numparcelafinanciamento'])){
    $finParcelaNum=$_GET['numparcelafinanciamento'];
}else{
    $finParcelaNum="PROPOSTA INVALIDA";
}

if (isset($_GET['totalparcela'])){
    $finParcelaValor=$_GET['totalparcela'];
    $finParcelaValor=str_replace('.','',$finParcelaValor);
    $finParcelaValor=str_replace(',','.',$finParcelaValor);
   
}else{
    $finParcelaValor="PROPOSTA INVALIDA";
}

if (isset($_GET['finprimeirovencimento'])){
    $finParcelaVencimento=$_GET['finprimeirovencimento'];
 
}else{
    $finParcelaVencimento="PROPOSTA INVALIDA";
}

if (isset($_GET['condicao'])){
    $condicao=$_GET['condicao'];
    
}else{
    $condicao="PROPOSTA INVALIDA";
}

//echo $condicao;

$saldoDevedor=$valor-($entradaTotal-$emolumento);
$seguroZurich=0.019*($saldoDevedor/100);
$seguroPacaembu=0.04182*($saldoDevedor/100);

$saldoDevedorFormatado=$saldoDevedor;

//formatação de campos de valores monetários
$valor=number_format($valor, 2, ',', '.');
$seguroZurich=number_format($seguroZurich,2,',','.');
$seguroPacaembu=number_format($seguroPacaembu,2,',','.');

<<<<<<< HEAD
if($entradaTotal!=($entradaParcelaValor*$entradaParcelaNum)){
    $entradaParcelaValor=round($entradaParcelaValor,2);
    $entradaParcelaNum=round($entradaParcelaNum,2);
    $diferenca=$entradaTotal-($entradaParcelaNum*$entradaParcelaValor);
    $diferenca=round($diferenca,2);
    
    $entradaTotal=$entradaParcelaValor*$entradaParcelaNum;
    //echo $diferenca;
    
    //$entradaTotal=$entradaTotal+$diferenca;
    $emolumento=$emolumento-$diferenca;
    
    
}


=======
$entradaTotal=$entradaParcelaValor*$entradaParcelaNum;
>>>>>>> 9927d6e247be247e87965247ceaaf7a1cf6486bb


//se a condição for parcelado
if($condicao!=='0'){
$emolumento=number_format($emolumento, 2, ',', '.');
$entradaParcelaValor=number_format($entradaParcelaValor, 2, ',', '.');
$entradaTotal=number_format($entradaTotal, 2, ',', '.');
$finParcelaValor=number_format($finParcelaValor, 2, ',', '.');
$saldoDevedorFormatado=number_format($saldoDevedorFormatado, 2, ',', '.');
}




$dataGeracao=date('d-m-Y H:i:s');


$html="<!DOCTYPE html>";
$html.="<html>";
$html.="<head>";
$html.="<link rel='icon' type='image/ico' href='/sicor/view/img/favicon.ico'>";
$html.="<link rel='stylesheet' type='text/css' href='/sicor/view/css/reset.css'>";
$html.="<link rel='stylesheet' type='text/css' href='/sicor/view/css/base.css'>";
$html.="<link rel='stylesheet' type='text/css' href='/sicor/view/css/espelho_proposta.css'>";
$html.="<meta charset='utf-8'>";
$html.="</head>";
$html.="<body>";
$html.="<main>";
$html.="<h1 class='titulo'>Proposta de Compra Nº $quadra/$lote</h1>";
$html.="<div class='subtitulo'><h2> A Jardim Pacaembu SPE LTDA.</h2>";
$html.="<h2>Prezados Senhores,</h2><div>";
$html.="<div class='intro'>";
$html.="<p>Venho pela presente propor a compra do lote n° $lote da quadra $quadra , situado no Loteamento Bairro Pacaembu, cidade de Americana, SP, regularmente aprovado na matrícula de incorporação no. 102.282, nas seguintes condições:</p>";
$html.="</div>";

$html.="<div class='a'>";
$html.="<p> A - Preço de Venda: R$ $valor(".extenso::valorPorExtenso($valor, true, false).") à serem pagos:";
$html.="</p>";    
$html.="</div>";

$html.="<div class='b'>";
$html.="<p> B - ";

    //se a condição for a vista
    if($condicao=='0'){
    $html.="R$ $valor (".extenso::valorPorExtenso($valor, true, false).")";
    $html.=" em parcela única com vencimento em $entradaVencimento.";
    }//fim da condição a vista

    //se a condição for parcelado em parcela única
    if ($entradaParcelaNum=='1' and $condicao=='1'){
    $html.="R$ $entradaTotal (".extenso::valorPorExtenso($entradaTotal, true, false).")";
    $html.=" como sinal e princípio de pagamento que será pago em $entradaParcelaNum (".extenso::valorPorExtenso($entradaParcelaNum, false, true).") "."parcela fixa e irreajustável ";
    $html.="no valor de R$ $entradaParcelaValor ( ".extenso::valorPorExtenso($entradaParcelaValor, true, false)." ) "." com vencimento em $entradaVencimento.";
    $html.=" Integra o valor do sinal a importância de R$ $emolumento (".extenso::valorPorExtenso($emolumento,true,false).") correspondente as despesas com ITBI - Imposto de Transmissão de Bens Imóveis e os emolumentos de registro de imóveis, com garantia de Alienação Fiduciária.";
    }//fim da condição parcelado em parcela única
                
    //se a condição for parcelado em mais de uma parcela
    if ($entradaParcelaNum!=='1' and $condicao=='1'){
    $html.="R$ $entradaTotal ( ".extenso::valorPorExtenso($entradaTotal, true, false)." ) ";
    $html.="como sinal e princípio de pagamento que serão pagos em $entradaParcelaNum ( ".extenso::valorPorExtenso($entradaParcelaNum, false, true)." ) "."parcelas fixas e irreajustáveis ";
    $html.="no valor de R$ $entradaParcelaValor ( ".extenso::valorPorExtenso($entradaParcelaValor, true, false).")"." com vencimento em $entradaVencimento";
    $html.=". Integra o valor do sinal a importância de R$ $emolumento ( ".extenso::valorPorExtenso($emolumento,true,false).") correspondente as despesas com ITBI - Imposto de Transmissão de Bens Imóveis e os emolumentos de registro de imóveis, com garantia de Alienação Fiduciária.";
    }//fim da condição parcelado em mais de uma parcela
     
$html.="</p>";
$html.="</div>";

$html.="<div class='c'>";
$html.="<p></p>";


//se a condição for a vista
    if($condicao=='0'){
    $html.="<p>C - 0 (zero) parcelas mensais.";
    }//fim da condição a vista
    //se o número de parcelas =1 e o pagamento for parcelado
    
    if($finParcelaNum=='1' and $condicao=='1'){
    $html.="<p>C - R$ " ;
    $html.=$saldoDevedorFormatado." ( ".extenso::valorPorExtenso($saldoDevedorFormatado,true,false)." ) em ";
    $html.="parcela única vencendo no dia ".$finParcelaVencimento.".</p>";
    }   //se o número de parcelas=1 e a condição de pagamento for parcelado
    
    if($finParcelaNum!=='1' and $condicao=='1'){
    $html.="<p>C - R$ ";
    $html.=$saldoDevedorFormatado." ( ".extenso::valorPorExtenso($saldoDevedorFormatado,true,false)." ) em ";
    $html.=$finParcelaNum;
    $html.=" ( ".extenso::valorPorExtenso($finParcelaNum,false,true)." )"." parcelas mensais e sucessivas no valor de R$ ";
    $html.=$finParcelaValor." ( ".extenso::valorPorExtenso($finParcelaValor,true,false)." )";
    
    if($finParcelaNum<=12){
    $html.=" sem juros, irreajustáveis, vencendo-se a primeira no dia $finParcelaVencimento.";
    }else{                
    $html.=" cada, já acrescidas de juros de 0,9488793% (zero vírgula nove quatro oito oito sete nove três por cento) ao mês calculados pela Tabela Price, vencendo-se a primeira delas no dia ";
    $html.=$finParcelaVencimento.". Todas as prestações, bem como seu saldo devedor serão reajustados mensalmente pela variação do IPCA-IBGE.</p>";
    }
    }
$html.="</div>";
$html.="<div class='encargo d'>";
    //se o número de parcelas for maior que 12  
    if($finParcelaNum>=12){
    $html.="<p>D - R$ 25,00 (vinte e cinco reais) mensais, a título de taxa de Administração do Crédito, reajustado anualmente pelo IPCA-IBGE.";
    }else{
    $html.="<p>D - R$ 0,00 (zero reais) mensais, a título de taxa de Administração do Crédito.";         
    }       
$html.="</div>"; 

    //se a condição for a vista ou menor que 12 parcelas
    if($condicao=='0' OR $finParcelaNum<=12){
    $html.="<div class='seguro' style='text-align: center; height:16em;'>";    
    $html.="<p class='seguro-titulo'>Opção de Seguro contra morte ou invalidez permanente (MIP):</p>";
    $html.="<p>Não aplicável";   
    $html.="</div>";
    }


    //se a condição for a prazo
    if($condicao!=='0' AND $finParcelaNum>12){
    $html.="<div class='seguro' style='height:16em;'>";    
    $html.="<p class='seguro-titulo'>Opção de Seguro contra morte ou invalidez permanente (MIP):</p>";
    $html.="<p>(__) A. Apólice prestamista Jardim Pacaembu SPE LTDA, da seguradora Zurich ao custo mensal de 0,019% do saldo devedor, equivalente a R$ $seguroZurich (".extenso::valorPorExtenso($seguroZurich,true,false).").</p>";
    $html.="<p>(__) B. Apólice prestamista Jardim Pacaembu SPE LTDA, da seguradora Porto Seguro ao custo mensal de 0,04182% do saldo devedor, equivalente a R$ $seguroPacaembu (".extenso::valorPorExtenso($seguroPacaembu,true,false).").</p>";
    $html.="<p>(__) C. Opto pela contratação direta de apólice na modalidade PRESTAMISTA contra risco de morte e invalidez permanente vigente até a quitação do meu saldo devedor a ser apresentada em até dez dias da assinatura do Instrumento Particular de Compra e Venda do Imóvel.</p>";
    $html.="</div>";
    }
//$html.="<p class='numpag'>Página 1 de 2 - Gerado em $dataGeracao </p>";    
$html.="<p class='numpag'>Página 1 de 2</p>";    
$html.="<div class='proponente titulo'>";
$html.="<h3> Qualificação dos Proponentes</h3>";
$html.="<p>Proponente:<span class='underline'></span><p>";
$html.="<p>Profissão:</p>";
$html.="<p>Nascimento:</p>";
$html.="<p>CPF:<span></p>";
$html.="<p></span>RG:<span></span></p>";
$html.="<p>Proponente:<span></span></p>";
$html.="<p>Profissão:<span></p>";
$html.="<p></span>Nascimento:<span></span></p>";
$html.="<p>CPF:<span></span></p>";
$html.="<p>RG:<span></span></p>";
$html.="</div>";  
$html.="<div class='declaracao'>";    
$html.="<p>Declaro para fins de direito que as informações acima expressam a verdade. Em sendo aceita a presente proposta, comprometo-me a assinar o respectivo Instrumento Particular de Compra e Venda de Imóvel com Alienação Fiduciária em Garantia, e outros pactos (Lei nº 9.514/97), tão logo me seja apresentado.</p>";                    
$html.="</div>";
$html.="<p class='data'>Americana,_____de__________de_________ </p>";
$html.="<div class='assinatura'>";
$html.="<p>1º Proponente: <span></span></p>";
$html.="<p>2º proponente:<span></span> </p>";   
$html.="<p>Testesmunhas:<span></span><p>";
$html.="<p>Corretor:<p>";    
$html.="</div>";
$html.="<div class='branco'>";
$html.="</div>";
$html.="<p class='numpag'>Página 2 de 2</p>"; 
//$html.="<p class='numpag'>Página 2 de 2 - Gerado em $dataGeracao </p>"; 
$html.="</main>"; 
$html.="</body>";
$html.="</html>";

//echo $html;

$mpdf = new mPDF();

$mpdf->WriteHTML($html);

$mpdf->Output('Proposta_Q'.$quadra.'L'.$lote.'.pdf','D');

//echo $html;