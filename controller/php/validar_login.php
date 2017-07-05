<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path."/sicor/controller/php/conexao.php");
require_once ($path."/sicor/util/log.php");

 $usuario =    $_POST['usuario'];
 $entrar =     $_POST['entrar'];
 $senha =      $_POST['senha'];
 
 
 $sql="SELECT * FROM usuario WHERE nome ='$usuario' AND senha='$senha'";
    //inicia a conexão com o banco
    $query =$conexao->stmt_init();    
    //testa se o query está correto
    if($query=$conexao->prepare($sql)){
        try{            
        //executa a query          
        $resultado=$query->execute();
        $query->store_result();
        
        //testa o resultado
               if (!$resultado) {
               $message  = 'Invalid query: ' . $conexao->error . "\n";
               die($message);
                }
         if ($query->num_rows<=0){
            echo false;
            die("Não tem esse resultado");
        }else{
          setcookie("usuario",$usuario,0,"/");
          $mensagem= "Sucesso no login: ".$usuario." senha: ".$senha;
          salvaLog($mensagem);
          echo (true);
        }//fim do else
        
         $query->close();
         $conexao->close();
        }//fim do try
        
        catch(Exception $e){
                echo "Problema";
                }//fim do catch
        }else{
            echo "Há um problema com a sintaxe inicial da query SQL";
             }//fim do else
   