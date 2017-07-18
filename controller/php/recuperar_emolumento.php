<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path.'/sicor/controller/php/function.php');

$valorVenda = (float) $_POST['vendaValor'];
$valorEntrada= (float) $_POST['entradaValor'];
$numParcela= (float) $_POST['numParcela'];

if($numParcela<=12){
    $emolumento=0;
}else{
$saldoRestante=$valorVenda-$valorEntrada;
$emolumentoValorVenda=calculaEmolumento($valorVenda);
$emolumentoSaldoRestante=calculaEmolumento($saldoRestante);
$itbi=$valorVenda*0.02;
$taxas=67.64;
$emolumento=$emolumentoSaldoRestante+$emolumentoValorVenda+$itbi+$taxas;
}

$data = array( 'emolumento' => "$emolumento");
    
header('Content-type: application/json');
echo json_encode( $data );