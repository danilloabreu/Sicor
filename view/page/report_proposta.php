<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path.'/sicor/util/mpdf/mpdf.php');

//echo "danilo";

$mpdf = new mPDF();

//$pdf="<html><head><body><p>Hello World</p></body></head></html>";
//echo ($path."/sicor/view/page/espelho_proposta_1.php");
//$actual_link = "http://$_SERVER[HTTP_HOST]";
//echo $actual_link;
//echo ($_SERVER['REMOTE_ADDR']);
$pdf=file_get_contents("http://".$_SERVER[HTTP_HOST]."/sicor/view/page/espelho_proposta_1.php");
//$pdf=file_get_contents($path.'/sicor/view/page/espelho_proposta.php');
$mpdf->WriteHTML($pdf);

$mpdf->Output("Report.pdf","D");
$mpdf->Output("//.pdf","F");


?>
