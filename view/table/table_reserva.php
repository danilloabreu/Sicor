<?php


$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path.'/sicor/controller/php/conexao.php');
require_once($path.'/sicor/model/usuario.php');

//inclusão de arquivo table_alterar_excluir

$emissor=Usuario::recupera_usuario_cookie();


$query =$conexao->stmt_init();    
        //testa se o query está correto
        if($query=$conexao->prepare("SELECT reserva.id,reserva.quadra,reserva.lote from reserva WHERE reserva.status = 0 ")){
            //passando variaveis para a query
            try{            
            //$query->bind_param('s',$emissor);           
            $resultado=$query->execute();
            
            $tabela= "<table><tr><th>Nº Reserva</th><th>Quadra</th><th>Lote</th><th>Ação</th></tr>";
            $query->bind_result($id, $quadra,$lote);
            
    
            
               
            while ($query->fetch()) {    
                
                 
                            
                    $tabela.="<tr>"
                    . "<td>".$id."</td>"
                    . "<td>".$quadra."</td>"
                    . "<td>".$lote."</td>"
                    . "<td><i <class=\"fa fa-pencil alterar\" aria-hidden=\"true\"></i><i class=\"fa fa-trash-o excluir\" aria-hidden=\"true\"></i></td>"
                    . "</tr>";
    
                    }//fim do laço while
            
        
               //testa o resultado
               if (!$resultado) {
               $message  = 'Invalid query: ' . $conexao->error . "\n";
               //$message .= 'Whole query: ' . $resultado;
               die($message);
                }
            }
                catch(Exception $e){
                echo "problema";
                }
        
        //while($row = $resultado->fetch_assoc()){
        //echo $row['resumo'] . '<br />';
        }else{
            echo "Há um problema com a sintaxe inicial da query SQL";
             }
             
             echo $tabela;