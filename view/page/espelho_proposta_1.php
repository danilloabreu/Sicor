<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require ($path.'/sicor/util/extenso.php');




//$entradaparcela=$_GET['entradaparela'];
//$entradavencimento=$_GET['entradavencimento'];

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
}else{
    $finParcelaValor="PROPOSTA INVALIDA";
}

//$finParcelaNum=2;
$finParcelaValor=450.00;
$finParcelaVencimento="01/02/1990";


$emolumento=number_format($emolumento, 2, ',', '.');
$valor=number_format($valor, 2, ',', '.');
$entradaParcelaValor=number_format($entradaParcelaValor, 2, ',', '.');
$entradaTotal=number_format($entradaTotal, 2, ',', '.');
$finParcelaValor=number_format($finParcelaValor, 2, ',', '.');
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
            <h2> A Jardim Pacaembu SPE LTDA</h2>
            <h2>Prezados Senhores</h2>
            <div class="intro">
            <p>Venho pela presente propor a compra do lote n° "<?php echo $lote;?>" da quadra "<?php echo $quadra;?>", situado no Loteamento Bairro Pacaembu, cidade de Americana, SP, regularmente aprovado na matricula de incorporação no. 102.282, nas seguintes condições:" </p>
            </div>
            <div class="a">
            <p> A - Preço de Venda: R$ <?php echo ($valor. " ");  echo("(". extenso::valorPorExtenso($valor, true, false).") "); ?>, à serem pagos:
            </p>    
            </div>
            <div class="b">
            <p> B - R$ <?php echo($entradaTotal." "); echo ("(".extenso::valorPorExtenso($entradaTotal, true, false).")") ?>
                como sinal e princípio de pagamento que serão pagos em <?php echo $entradaParcelaNum; echo ("(".extenso::valorPorExtenso($entradaParcelaNum, false, true).")"); if($entradaParcelaNum==1){echo " parcela única fixa e irreajustável";}else{echo "  parcelas fixas e irreajustáveis";}?>
                no valor de R$ <?php echo $entradaParcelaValor; echo (" (".extenso::valorPorExtenso($entradaParcelaValor, true, false).")"); if($entradaParcelaNum==1){echo ", vencendo-se a primeira e única em";}else{echo ", vencendo-se a primeira em";} ?> <?php echo $entradaVencimento; ?>
                Integra o valor do sinal a importância de R$ <?php echo $emolumento; echo("(". extenso::valorPorExtenso($emolumento,true,false).")");?> correspondente as despesas com ITBI - Imposto de Transmissão de Bens Imóveis e os emolumentos de registro de imóveis, com garantia de Alienação Fiduciária. 
            </p>
            </div>
            <div class="c">
                <p></p>
            <?php
            if($finParcelaNum==1){
                $html="<p>C - 1(uma) única parcela no valor de ".$finParcelaValor." sem juros, com vencimento em ".$finParcelaVencimento."</p>";
                echo $html;
            }else{
                $html="<p>C -";
                $html.=$finParcelaNum;
                $html.=" (".extenso::valorPorExtenso($finParcelaNum,false,true).")"." parcelas mensais e sucesivas no valor de R$ ";
                $html.=$finParcelaValor."(".extenso::valorPorExtenso($finParcelaValor,true,false).")"." cada, já acrescidas de juros de 0,9488793% (zero vírgula nove quatro oito oito sete nove três por cento) ao mês calculados pela Tabela Price, vencendo-se a primeira delas no dia";
                $html.=$finParcelaVencimento." Todas as prestações, bem como seu saldo devedor serão reajustados mensalmente pela variação do IPCA-IBGE</p>";
                echo $html;
            }
                
            ?>
             </div>
                <div class="encargo">
                <?php
             if($finParcelaNum>=12){
                $divEncargos="<p>R$25,00 (vinte e cinco reais) mensais, a título de taxa de Administração do Crédito ";
                echo $divEncargos;
             }
            ?>
                </div>
            <div class="seguro">
            <p>Opção de Seguro contra morte ou invalidez permanente (MIP):</p>
            <p>( ) A. Apolice prestamista Jardim Pacaembu SPE LTDA, da seguradora Zurich ao custo mensal de 0,1987% do saldo devedor, equivalente a R$ xxx,ooo (x reais)</p>
            <p>( ) B. Apolice prestamista Jardim Pacaembu SPE LTDA, da seguradora Porto Seguro ao custo mensal de 0,04182% do saldo devedor, equivalente a R$ xxx,ooo (x reais)</p>
            <p>( ) C. Opto pela contratação direta de apólice contra risco de morte e invalidez permanente vigente até a quitação do meu saldo devedor a ser apresentada em até dez dias da assinatura do Instrumento Particular de Compra e Venda do Imóvel</p>
            </div> 
                
            <div class="proponente titulo">
            <h3> Qualificação dos Proponentes</h3>
            <p>Proponente<span class="underline"> </span><p>
            <p>Profissão<span></span>Nascimento<span></span></p>
            <p>CPF<span></span>RG<span></span></p>
            <p>Casado com<span></span></p>
            <p>Profissão<span></span>Nascimento<span></span></p>
            <p>CPF<span></span>RG<span></span></p>
            </div>  
            <div class="declaracao">    
            <p>Declaro para fins de direito que as informações acima expressam a verdade. Em sendo aceita a presente proposta, comprometo-me a assinar o respectivo Instrumento Particular de Compra e Venda de Imóvel com Alienação Fiduciária em Garantia, e outros pactos (Lei nº 9.514/97), tão logo me seja apresentado.</p>                    
            </div>
            <div class="assinatura">
                <p class="data">Americana,     de      de     </p>
                <p>1º Proponente <span></span> 2º proponente<span></span> </p>   
                <p>Testesmunhas:<span></span><p>
            <p>Corretor<p>    
            </div>
        </main> 
    </body>
</html>