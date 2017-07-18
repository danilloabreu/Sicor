<?php

//função para cria select com quantidade e classe
function htmlSelect ($qtd, $class){
    
    $select="<select class='$class'>";
        
        for ($i=1; $i<=$qtd; $i++){
            $select.="<option value='$i'>$i</option>";
        }
$select.="</select>";
    echo $select;
}//fim da função htmlSelect

//função para criar select a partir de um array
function htmlSelectArray ($array, $class){
    
    $select="<select class='$class'>";
        
        foreach($array as $val ){
        $select.="<option value='$val'>$val</option>";    
        }
            
$select.="</select>";
    echo $select;
}//fim da função criar select a partir de um array

//função para contar quantos lotes tem uma quadra
function contarLotes ($quadra){
    
}

function getValor ($quadra, $lote){
    $valorTabela=0;
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once ($path.'/sicor/controller/php/conexao.php');
    $query =$conexao->stmt_init();  
    $sql="SELECT valor FROM lote WHERE quadra='$quadra' AND lote='$lote'";  
    //testa se o query está correto    
    if($query=$conexao->prepare($sql)){
        //passando variaveis para a query
        try{
            //executando a consulta
            $resultado=$query->execute();
            $query->bind_result($valor);
           //colocando resultados no array
            while ($query->fetch()) {    
              $valorTabela=$valor;      
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
    }else{
        echo "Há um problema com a sintaxe inicial da query SQL";
    }
    return number_format($valorTabela, 2, ',', '.');
    //return $valorTabela;
}

//função que retona os emolulentos devidos
function calculaEmolumento($valorVenda){
    $totalEmolumentos=169.89;
    
 //<editor-fold desc=" Array de tetos e valores devidos" defaultstate="collapsed">
    $teto=array(
    1505.00,
    3759.00,
    6266.00,
    12535.00,
    25070.00,
    75210.00,
    125350.00,
    150420.00,
    175490.00,
    200560.00,
    225630.00,
    250700.00,
    501400.00,
    752100.00,
    1002800.00,
    1253500.00,
    1504200.00,
    2507000.00,
    3760500.00,
    5014000.00,
    6267500.00,
    7521000.00,
    8774500.00,
    10028000.00,
    11281500.00,
    12535000.00,
    15042000.00,
    17549000.00,
    20056000.00,
    22563000.00,
    25070000.00,
    27577000.00,
    30084000.00,
    32591000.00,
    35098000.00,
    37605000.00,
    42619000.00,
    47633000.00,
    52647000.00,
    57661000.00,
    62675000.00,
    67689000.00,
    72703000.00,
    77717000.00,
    82731000.00,
    87745000.00,
    92759000.00,
    92759000.01,
);
$emolumentos=array(
    169.89,
    272.63,
    489.11,
    725.71,
    882.30,
    983.94,
    1255.87,
    1527.23,
    1662.64,
    1798.84,
    1896.32,
    1945.76,
    2169.52,
    2540.74,
    2925.01,
    3309.31,
    3508.00,
    4501.39,
    6289.49,
    8276.27,
    10263.05,
    12249.84,
    14236.62,
    16223.40,
    18210.18,
    20196.97,
    23177.14,
    27150.71,
    31124.27,
    35097.84,
    39071.40,
    43044.97,
    47018.53,
    50992.09,
    54965.66,
    58939.22,
    64899.56,
    72846.69,
    80793.82,
    88740.95,
    96688.07,
    104635.20,
    112582.34,
    120529.47,
    128476.60,
    136423.73,
    144370.86,
    152780.90,
 );
//</editor-fold>    

    $i=0; 
    
    if($valorVenda>92759000.01){
    $totalEmolumentos=152780.90;
    return $totalEmolumentos;    
    }
    
    foreach($teto as $valorTeto){
        if($valorTeto<$valorVenda){
            $totalEmolumentos=$emolumentos[$i+1];
            $i++;
        }else{
         break;
        }
        }
//return number_format($totalEmolumentos, 2, ',', '.');        
return $totalEmolumentos;
}//fim da funcao CalculaEmolumento
    
    
function loteDisponivelArray($quadra){
    $lotes=array();
    //array_push($lotes,1,2,3,4,5);
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once ($path.'/sicor/controller/php/conexao.php');
    $query =$conexao->stmt_init();  
    $sql="SELECT lote FROM lote WHERE quadra='$quadra' AND (status=0 OR status=1)";  
    //testa se o query está correto    
    if($query=$conexao->prepare($sql)){
        //passando variaveis para a query
        try{
            //executando a consulta
            $resultado=$query->execute();
            $query->bind_result($lote);
           //colocando resultados no array
            while ($query->fetch()) {    
              array_push($lotes,$lote);      
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
    }else{
        echo "Há um problema com a sintaxe inicial da query SQL";
    }
    return $lotes;
}//fim da função loteDisponivelArray



function parcela($valor, $meses){
    //caso o prazo seja menor que 12 meses, não há incidência de juros
    if ($meses<=12){
       $parcela=$valor/$meses;
       return $parcela;
    }else{    
        $i=0.009488793;
        $numerador=$i*pow(1+$i, $meses);
        $denominador= pow(1+$i,$meses)-1; 
        $parcela=$valor*($numerador/$denominador);
        return $parcela;}//fim do else
}//fim da função parcela


?>
