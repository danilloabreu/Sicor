<?php
$path = $_SERVER['DOCUMENT_ROOT'];

/*Requisições*/

require ($path.'/sicor/controller/php/conexao.php');


/*Variáveis*/

$quadra=$_POST["quadra"];
$lote=$_POST["lote"];
$status=$_POST["status"];
$corretor=$_POST["corretor"];
$comprador=$_POST["comprador"];

//$quadra=1;
//$lote=1;
//$status=2;

//$corretor="danilo";
//$comprador="abreu";

$query =$conexao->stmt_init();    
        //testa se o query está correto
        if($query=$conexao->prepare("UPDATE lote SET status='$status',corretor='$corretor', comprador='$comprador' WHERE  quadra='$quadra' AND lote=$lote")){
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
             
   echo true;
?>
