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
    if($query=$conexao->prepare("SELECT quadra, lote, status, corretor, comprador from lote")){
        try{            
        //executa a query          
        $resultado=$query->execute();
        //desenha o cabeçalho da tabela
        $tabela= "<table><thead><tr><th>Quadra</th><th>Lote</th><th>Situação</th><th>Ação</th><th>Corretor</th><th>Comprador</th></tr></thead>";
        $query->bind_result($quadra,$lote,$status, $corretor, $comprador);
        $linha=1;
            while ($query->fetch()) {
                switch ($status){ 
                    case 0:
                    $status="Disponível";
                    break;
                    case 1: 
                    $status="Proposta";
                    break;
                    case 2: 
                    $status="Vendido";
                    break;
                }//fim do switch

            $tabela.="<tr quadra=\"$quadra\" class='quadra-linha' linha=\"$linha\">"
            . "<td class='quadra' linha=\"$linha\">".$quadra."</td>"
            . "<td class='lote' linha=\"$linha\">".$lote."</td>"
            . "<td class='status' linha=\"$linha\">".$status."</td>"
            . "<td><a href=\"#\"><i  linha=\"$linha\" title=\"Disponível\" class=\"fa fa-check-circle-o disponivel\" aria-hidden=\"true\"></i></a><a href=\"#\"><i linha=\"$linha\" title=\"Vendido\" class=\"fa fa-times-circle-o vendido\" aria-hidden=\"true\"></i></a><a href=\"#\"><i linha=\"$linha\" title=\"Proposta\" class=\"fa fa-address-card-o proposta\" aria-hidden=\"true\"></i></a></td>"
            ."<td><input type='text' class='corretor' name='corretor' value='{$corretor}'></td><td><input type='text' name='proprietario' class='comprador' value='{$comprador}'></td>" 
            ."</tr>";
            $linha++;
            }//fim do laço while
            
        
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
$tabela.="</table>";          
echo $tabela;