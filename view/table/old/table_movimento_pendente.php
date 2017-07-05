<?php
$path = $_SERVER['DOCUMENT_ROOT'];

//require_once ($path.'/sitar/controller/php/conexao.php');
//require_once ($path.'/sitar/model/usuario.php');
//require_once ($path.'/sitar/model/br.com.sitar.Tarefa/br.com.sitar.Tarefa.php');

//$destinatario=Usuario::recupera_usuario_cookie();

$query =$conexao->stmt_init();  
$sql='SELECT lote.quadra, lote.lote, lote.area, lote.status FROM sicor.lote';
//$sql="SELECT idmovimento,idtarefa,emissor,descricao,datainicio,datalimite FROM movimento WHERE destinatario = ? AND finished IS NULL";
//$sql="SELECT * FROM movimento WHERE destinatario = ? AND finished IS NULL";
//testa se o query está correto
        
    if($query=$conexao->prepare($sql)){
        //passando variaveis para a query
        try{           
            //$query->bind_param('s',$destinatario);           
            $resultado=$query->execute();
            $tabela= "<table class=\"lotes\">"
                    . "<tr><td>Quadra</td>"
                    . "<td>Lote</td>"
                    . "<td>Quadra</td>" ;
            $query->bind_result($quadra,$lote,$area,$status);
            
            //$disabled="";
            while ($query->fetch()) {    
                
                $tabela.="<tr><td>".$quadra."</td>"
                        . "<td> <a href=\"#\" onclick=\"window.open('table/table_movimento.php?idtarefa=".$idtarefa."', 'Movimentos', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=50, LEFT=50, WIDTH=770, HEIGHT=400');\">".$idtarefa."</a></td>"
                        . "<td>".$emissor."</td>"
                        . "<td>".$descricao."</td>"
                        . "<td>".$datainicio."</td>"
                        . "<td>".$datalimite."</td>"
                        //. "<td>".$prazo"</td>"
                        ."<td><div id=\"myProgress\"><div class=\"myBar\" style= \"width:".$prazo."; background-color: ".$cor."\";\" id=\"".$prazo."\"></div></div></td>"
                        . "<td><i class=\"fa fa-forward\" aria-hidden=\"true\" title=\"Encaminhar\"></i>   <i class=\"fa fa-check-square\" aria-hidden=\"true\" title=\"Finalizar\"> </i></td></tr>";
            } 
           //testa o resultado
            if (!$resultado) {
                $message  = 'Invalid query: ' . $conexao->error . "\n";
                //$message .= 'Whole query: ' . $resultado;
                die($message);
            }//end of if
        }//end of try
        catch(Exception $e){
            echo "fudeu";
        }
    //while($row = $resultado->fetch_assoc()){
    //echo $row['resumo'] . '<br />';
    }else{
        echo "Há um problema com a sintaxe inicial da query SQL";
    }
             
echo $tabela;
//echo "</div>";
//echo "</html>";
?>