<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path.'/sicor/util/mpdf/mpdf.php');

$quadra=$_GET['quadra'];
$lote=$_GET['lote'];
$valornegociacao=$_GET['valornegociacao'];
$entradatotal=$_GET['entradatotal'];
$entradaparcela=$_GET['entradaparela'];
$entradavencimento=$_GET['entradavencimento'];
$valorparcelaentrada=$GET['valorparcelaentrada'];

$mpdf = new mPDF();

$get="quadra=$quadra&lote=$lote&valornegociacao$valornegociacao&entradatotal$entradanotal&entradaparcela=$entradanarcela&entradavencimento=$entradavencimento";

$pdf=file_get_contents("http://".$_SERVER[HTTP_HOST]."/sicor/view/page/espelho_proposta_1.php?$get");
//$pdf=file_get_contents($path.'/sicor/view/page/espelho_proposta.php');
$mpdf->WriteHTML($pdf);

$mpdf->Output("Report.pdf","D");


?>
