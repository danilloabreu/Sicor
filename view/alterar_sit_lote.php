<?php
$path = $_SERVER['DOCUMENT_ROOT'];

/*Requisições*/

require ($path.'/sicor/controller/php/conexao.php');

/*Variáveis*/

//$quadra=$_POST["quadra"];
//$lote=$_POST["lote"];
//$status=$_POST["status"];

$quadra=1;
$lote=1;
$status=2;

$sql="UPDATE lote SET status='$status' WHERE  quadra='$quadra' AND lote='$lote'";

//eco $sql;

$query =$conexao->stmt_init();    
        //testa se o query está correto
        if($query=$conexao->prepare($sql)){
            //passando variaveis para a query
            try{            
                       
            $resultado=$query->execute();
               //testa o resultado
               if (!$resultado) {
               $message  = 'Invalid query: ' . $conexao->error . "\n";
               die($message);
                }
            }
                catch(Exception $e){
                echo "Problema";
                }
        }else{
            echo "Há um problema com a sintaxe inicial da query SQL";
             }
             
   echo "A situação foi alterada com sucesso";
?>