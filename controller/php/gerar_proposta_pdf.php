<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path.'/sicor/util/mpdf/mpdf.php');


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

/*
$valor=number_format($valor, 2, ',', '.');

if($condicao!=='0'){
$emolumento=number_format($emolumento, 2, ',', '.');
$entradaParcelaValor=number_format($entradaParcelaValor, 2, ',', '.');
$entradaTotal=number_format($entradaTotal, 2, ',', '.');
$finParcelaValor=number_format($finParcelaValor, 2, ',', '.');
}



*/

/*
$quadra=$_GET['quadra'];
$lote=$_GET['lote'];
$valornegociacao=$_GET['valornegociacao'];
$entradatotal=$_GET['entradatotal'];
$entradaparcela=$_GET['entradaparela'];
$entradavencimento=$_GET['entradavencimento'];
$valorparcelaentrada=$GET['valorparcelaentrada'];
*/


 //gerando o get
 $get="quadra=$quadra&lote=$lote&valornegociacao=$valor&entradatotal=$entradaTotal&entradaparcela=$entradaParcelaNum";
 $get.="&valorparcelaentrada=$entradaParcelaValor&documentacao=$emolumento&entradavencimento=$entradaVencimento";
 $get.="&numparcelafinanciamento=$finParcelaNum&totalparcela=$finParcelaValor&finprimeirovencimento=$finParcelaVencimento&condicao=$condicao";
    
//echo $get;


//$mpdf = new mPDF();

//$get="quadra=$quadra&lote=$lote&valornegociacao=$valornegociacao&entradatotal=$entradanotal&entradaparcela=$entradanarcela&entradavencimento=$entradavencimento";

$pdf_url = "http://sicor.quilombonet.com.br/sicor/view/pagina_inicial.php";

//$pdf_url = "http://sicor.quilombonet.com.br:80/sicor/view/page/espelho_proposta_1.php?$get";
//$pdf_url = "http://".$_SERVER[HTTP_HOST]."/sicor/view/page/espelho_proposta_1.php?$get";
$ch = curl_init();
$timeout = 0;
curl_setopt ($ch, CURLOPT_URL, $pdf_url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

// Getting binary data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);

$pdf = curl_exec($ch);
curl_close($ch);

//$pdf="teste";
// display file
echo $pdf;
//$pdf=$file_contents;
//$pdf=file_get_contents("http://"sicor.quilombonet.com.br/sicor/view/page/espelho_proposta_1.php?$get");
//$pdf=file_get_contents($path.'/sicor/view/page/espelho_proposta.php');
//$mpdf->WriteHTML($pdf);
//$mpdf->Output('Proposta_Q'.$quadra.'L'.$lote.'.pdf','D');

?>
