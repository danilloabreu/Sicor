<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require ($path.'/sicor/util/extenso.php');

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

$saldoDevedor=$valor-$entradaTotal;
$seguroZurich=0.01987*($saldoDevedor/100);
$seguroPacaembu=0.04182*($saldoDevedor/100);



//formatação de campos de valores monetários
$valor=number_format($valor, 2, ',', '.');
$seguroZurich=number_format($seguroZurich,2,',','.');
$seguroPacaembu=number_format($seguroPacaembu,2,',','.');

if($condicao!=='0'){
$emolumento=number_format($emolumento, 2, ',', '.');
$entradaParcelaValor=number_format($entradaParcelaValor, 2, ',', '.');
$entradaTotal=number_format($entradaTotal, 2, ',', '.');
$finParcelaValor=number_format($finParcelaValor, 2, ',', '.');
}


?>




<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/ico" href="/sicor/view/img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/reset.css">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/base.css">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/espelho_proposta.css">
        <meta charset="utf-8">
    </head>
    <body>
        <main>
            
            <h1 class="titulo">Proposta de Compra Nº <?php echo ("$quadra/$lote");?> </h1>
            <div class="subtitulo"><h2> A Jardim Pacaembu SPE LTDA</h2>
            <h2>Prezados Senhores</h2><div>
            <div class="intro">
            <p>Venho pela presente propor a compra do lote n° "<?php echo $lote;?>" da quadra "<?php echo $quadra;?>", situado no Loteamento Bairro Pacaembu, cidade de Americana, SP, regularmente aprovado na matricula de incorporação no. 102.282, nas seguintes condições:" </p>
            </div>
            <div class="a">
            <p> A - Preço de Venda: R$ <?php echo ($valor. " ");  echo("(". extenso::valorPorExtenso($valor, true, false).") "); ?>, à serem pagos:
            </p>    
            </div>
            <div class="b">
            <p> B - <?php
            
                //se a condição for a vista
                if($condicao=='0'){
                $html="R$ $valor (".extenso::valorPorExtenso($valor, true, false).")";
                $html.=" em parcela única com vencimento em $entradaVencimento.";
                echo $html;
                    
                }//fim da condição a vista
                
                //se a condição for parcelado em parcela única
                if ($entradaParcelaNum=='1' and $condicao=='1'){
                $html="$entradaTotal (".extenso::valorPorExtenso($entradaTotal, true, false).")";
                $html.=" como sinal e princípio de pagamento que será pago em $entradaParcelaNum (".extenso::valorPorExtenso($entradaParcelaNum, false, true).") "."parcela fixa e irreajustável ";
                $html.="no valor de R$ $entradaParcelaValor ( ".extenso::valorPorExtenso($entradaParcelaValor, true, false).") "." com vencimento em $entradaVencimento.";
                $html.=" Integra o valor do sinal a importância de R$ $emolumento (".extenso::valorPorExtenso($emolumento,true,false).") correspondente as despesas com ITBI - Imposto de Transmissão de Bens Imóveis e os emolumentos de registro de imóveis, com garantia de Alienação Fiduciária.";
                echo $html;
                }//fim da condição parcelado em parcela única
                
                //se a condição for parcelado em mais de uma parcela
                if ($entradaParcelaNum!=='1' and $condicao=='1'){
                $html="$entradaTotal ( ".extenso::valorPorExtenso($entradaTotal, true, false)." ) ";
                $html.="como sinal e princípio de pagamento que serão pagos em $entradaParcelaNum ( ".extenso::valorPorExtenso($entradaParcelaNum, false, true)." ) "."parcelas fixas e irreajustáveis ";
                $html.="no valor de R$ $entradaParcelaValor ( ".extenso::valorPorExtenso($entradaParcelaValor, true, false).")"." com vencimento em $entradaVencimento";
                $html.=". Integra o valor do sinal a importância de R$ $emolumento ( ".extenso::valorPorExtenso($emolumento,true,false).")correspondente as despesas com ITBI - Imposto de Transmissão de Bens Imóveis e os emolumentos de registro de imóveis, com garantia de Alienação Fiduciária.";
                echo $html;
                }//fim da condição parcelado em mais de uma parcela
       
                ?>
            </p>
            </div>
            <div class="c">
                <p></p>
            <?php
                //se o número de parcelas =1 e o pagamento for parcelado
            if($finParcelaNum=='1' and $condicao=='1'){
                $html="<p>C - 1 (uma) única parcela no valor de R$ ".$finParcelaValor." (".extenso::valorPorExtenso($finParcelaValor,true,false).") "." sem juros, com vencimento em ".$finParcelaVencimento.".</p>";
                echo $html;
            }   //se o número de parcelas=1 e a condição de pagamento for parcelado
            if($finParcelaNum!=='1' and $condicao=='1'){
                $html="<p>C -";
                $html.=$finParcelaNum;
                $html.=" ( ".extenso::valorPorExtenso($finParcelaNum,false,true)." )"." parcelas mensais e sucessivas no valor de R$ ";
                $html.=$finParcelaValor."(".extenso::valorPorExtenso($finParcelaValor,true,false)." )";
                if($finParcelaNum<=12){
                $html.=" sem juros, irreajustáveis, vencendo-se a primeira no dia $finParcelaVencimento.";
                }else{                
                $html.=" cada, já acrescidas de juros de 0,9488793% (zero vírgula nove quatro oito oito sete nove três por cento) ao mês calculados pela Tabela Price, vencendo-se a primeira delas no dia ";
                $html.=$finParcelaVencimento." Todas as prestações, bem como seu saldo devedor serão reajustados mensalmente pela variação do IPCA-IBGE.</p>";
                }
                echo $html;
            }
            
            ?>
             </div>
                <div class="encargo">
                <?php
             if($finParcelaNum>=12){
                $divEncargos="<p>D - R$25,00 (vinte e cinco reais) mensais, a título de taxa de Administração do Crédito, reajustado anualmente pelo IPCA-IBGE  ";
                echo $divEncargos;
             }else{
                $divEncargos="<p>D - R$0,00 (zero reais) mensais, a título de taxa de Administração do Crédito.";
                //echo $divEncargos;
                         
             }
            ?>
                </div>
            <?php
            
            if($condicao!=='0'){
            $html="<div class='seguro'>";    
            $html.="<p>Opção de Seguro contra morte ou invalidez permanente (MIP):</p>";
            $html.="<p>(__) A. Apólice prestamista Jardim Pacaembu SPE LTDA, da seguradora Zurich ao custo mensal de 0,01987% do saldo devedor, equivalente a R$ $seguroZurich (".extenso::valorPorExtenso($seguroZurich,true,false).").</p>";
            $html.="<p>(__) B. Apólice prestamista Jardim Pacaembu SPE LTDA, da seguradora Porto Seguro ao custo mensal de 0,04182% do saldo devedor, equivalente a R$ $seguroPacaembu (".extenso::valorPorExtenso($seguroPacaembu,true,false).").</p>";
            $html.="<p>(__) C. Opto pela contratação direta de apólice contra risco de morte e invalidez permanente vigente até a quitação do meu saldo devedor a ser apresentada em até dez dias da assinatura do Instrumento Particular de Compra e Venda do Imóvel.</p>";
            $html.="</div>";
            echo $html;
            }
            ?>
            
            <div class="proponente titulo">
            <h3> Qualificação dos Proponentes</h3>
            <p>Proponente:<span class="underline1"> </span><p>
            <p>Profissão:<span></span>Nascimento<span></span></p>
            <p>CPF:<span></p>
            <p></span>RG:<span></span></p>
            <p>Casado com:<span></span></p>
            <p>Profissão:<span></p>
            <p></span>Nascimento:<span></span></p>
            <p>CPF:<span></span></p>
            <p>RG:<span></span></p>
            </div>  
            <div class="declaracao">    
            <p>Declaro para fins de direito que as informações acima expressam a verdade. Em sendo aceita a presente proposta, comprometo-me a assinar o respectivo Instrumento Particular de Compra e Venda de Imóvel com Alienação Fiduciária em Garantia, e outros pactos (Lei nº 9.514/97), tão logo me seja apresentado.</p>                    
            </div>
            <div class="assinatura">
                <p class="data">Americana,___de______de______ </p>
                <p>1º Proponente: <span></span></p>
                <p>2º proponente:<span></span> </p>   
                <p>Testesmunhas:<span></span><p>
            <p>Corretor<p>    
            </div>
        </main> 
    </body>
</html>