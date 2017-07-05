<?php
//solicitações
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path.'/sicor/controller/php/conexao.php');
require_once($path.'/sicor/model/usuario.php');
//inclusão de arquivo table_alterar_excluir
$emissor=Usuario::recupera_usuario_cookie();
//iniciar a conexão com o banco
$query =$conexao->stmt_init();    
        //testa se o query está correto

$sql="SELECT 
COUNT(IF(status=0,1,null))AS DISPONIVEL,
COUNT(IF(status=1,1,null))AS	RESERVADO,
COUNT(IF(status=2,1,null))AS VENDIDO,
COUNT(*) AS TOTAL
FROM 
lote";
    if($query=$conexao->prepare($sql)){
        try{            
        //executa a query          
        $resultado=$query->execute();
        $query->bind_result($disponivel,$reservado,$vendido,$total);
        
        $resultado="<h1>Quadro Resumo</h1>";
         while ($query->fetch()) {
                
                $resultado.="<p>Disponível : $disponivel</p>";
                $resultado.="<p>Reservado :$reservado</p>";
                $resultado.="<p>Vendido : $vendido</p>";
                $resultado.="<p>Total :$total</p>";
                
                }//fim do while

               //testa o resultado
               if (!$resultado) {
               $message  = 'Invalid query: ' . $conexao->error . "\n";
               //$message .= 'Whole query: ' . $resultado;
               die($message);
                }
            }
            
            catch(Exception $e){
            echo "Há um problema";
            }
        }else{
            echo "Há um problema com a sintaxe inicial da query SQL";
             }
          
echo $resultado;

