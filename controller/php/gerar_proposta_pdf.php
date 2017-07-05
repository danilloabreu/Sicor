<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path.'/sicor/util/mpdf/mpdf.php');

$quadra=$_GET['quadra'];
$lote=$_GET['lote'];

$mpdf = new mPDF();


$pdf=file_get_contents("http://".$_SERVER[HTTP_HOST]."/sicor/view/page/espelho_proposta_1.php?quadra=$quadra&lote=$lote");
//$pdf=file_get_contents($path.'/sicor/view/page/espelho_proposta.php');
$mpdf->WriteHTML($pdf);

$mpdf->Output("Report.pdf","D");


?>
