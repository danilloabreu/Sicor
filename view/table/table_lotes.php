<?php

function tabelaLotes($chamadaQuadra){

$path = $_SERVER['DOCUMENT_ROOT'];

require ($path.'/sicor/controller/php/conexao.php');
//require_once ($path.'/sitar/model/usuario.php');
//require_once ($path.'/sitar/model/br.com.sitar.Tarefa/br.com.sitar.Tarefa.php');

//$destinatario=Usuario::recupera_usuario_cookie();

$query =$conexao->stmt_init();  
$sql="SELECT lote.quadra, lote.lote, lote.area, lote.status FROM sicor.lote WHERE lote.quadra=$chamadaQuadra";
//$sql="SELECT idmovimento,idtarefa,emissor,descricao,datainicio,datalimite FROM movimento WHERE destinatario = ? AND finished IS NULL";
//$sql="SELECT * FROM movimento WHERE destinatario = ? AND finished IS NULL";
//testa se o query está correto
        
    if($query=$conexao->prepare($sql)){
        //passando variaveis para a query
        try{           
            //$query->bind_param('s',$destinatario);           
            $resultado=$query->execute();
            $tabela= "<table class=\"lotes\">";
                    $tabela.="<tr><td colspan=\"2\">Quadra ".$chamadaQuadra."</td></tr>"
                    . "<tr><td>Lote</td>"
                    . "<td>Área</td></tr>" ;
            $query->bind_result($quadra,$lote,$area,$status);
            
            //$disabled="";
            
            
            
            while ($query->fetch()) {    
                
            switch ($status){ 
                case 0:
                    $status="disponivel";
                    break;
                case 1: 
                    $status="proposta";
                    break;
                case 2: 
                    $status="vendido";
                    break;
            }
                
                $tabela.="<tr class=\"$status\"><td>".$lote."</td>"
                        . "<td>".$area."</td>";
            } 
           //testa o resultado
            if (!$resultado) {
                $message  = 'Invalid query: ' . $conexao->error . "\n";
                //$message .= 'Whole query: ' . $resultado;
                die($message);
            }//end of if
        }//end of try
        catch(Exception $e){
            echo "erro";
        }
    //while($row = $resultado->fetch_assoc()){
    //echo $row['resumo'] . '<br />';
    }else{
        echo "Há um problema com a sintaxe inicial da query SQL";
    }
             
echo $tabela;

}
?>