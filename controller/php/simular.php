<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path.'/sicor/controller/php/function.php');


if(isset($_POST['quadra'])){
$quadra = $_POST['quadra'];
}else{
die("Problema com a quadra");
}
if(isset($_POST['lote'])){
$lote = $_POST['lote'];
}else{
die("Problema com o lote");
}
$valor=getValor($quadra,$lote);


//echo $quadra;
//echo $lote;

//$arr = array('quadra' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5)
$data = array ('quadra' => $quadra, 'lote' => $lote, 'valor' => $valor);
    
header('Content-type: application/json');
echo json_encode( $data );