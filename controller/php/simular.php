<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path.'/sicor/controller/php/function.php');

$quadra = $_POST['quadra'];
$lote = $_POST['lote'];
$valor=getValor($quadra,$lote);

$data = [ 'quadra' => "$quadra", 'lote' => "$lote",'valor' => "$valor"];
    
header('Content-type: application/json');
echo json_encode( $data );