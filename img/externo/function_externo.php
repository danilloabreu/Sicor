<?php

function insereCliente ($conexao,$nome,$telefone,$email,$codigo){
    
$sql="INSERT INTO cliente (id,nome,telefone,email,codigo) VALUES ('','$nome','$telefone','$email','$codigo')";  
    //testa se o query está correto    
if($query=$conexao->prepare($sql)){
        //passando variaveis para a query
    try{
            //executando a consulta
            $resultado=$query->execute();
            //$query->bind_result($valor);
           //colocando resultados no array
            //while ($query->fetch()) {    
              //$valorTabela=$valor;      
            
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
    }else{
        echo "Há um problema com a sintaxe inicial da query SQL";
    }
    //return true;
    //return $valorTabela;
}

function checarCliente ($conexao,$telefone,$codigo){
    
$sql="SELECT telefone,codigo from cliente WHERE telefone=? AND codigo=?";  

 $query =$conexao->stmt_init();    
    //testa se o query está correto
    if($query=$conexao->prepare($sql)){
        
        $query->bind_param('ss',
                $telefone,
                $codigo    
                );

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
            return false;
            die("parou");
        }else{
            return true;
        }
        }//end of try
        catch(Exception $e){
            echo "erro";
        }
    }else{
        echo "Há um problema com a sintaxe inicial da query SQL";
    }

}