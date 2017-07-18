<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path.'/sicor/controller/php/function.php');

/*
 htmlSelect(1,"Danilo");


$arr = array("melancia", "banana", "laranjas", "abacates");


foreach($arr as $valor) {
    echo ($valor."<br>");
}

*/


/*$valorVenda= 92759022200.02;        


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
return $totalEmolumentos;
}//fim da funcao CalculaEmolumento
    echo "O total de emolumentos é  ".calculaEmolumento($valorVenda);
    */
/*
$array=loteDisponivelArray(1);

foreach($array as $valor) {
    echo ($valor."<br>");
}

htmlSelectArray($array,"lotes");
 */

/*
echo getValor(1,1);


?>
*/

/*
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
 $(document).ready(function(){
    
 //alert("Teste"); 
    
     function parcela (valor,meses){
            var parcela=0;  
              //caso o prazo seja menor que 12 meses, não há incidência de juros
        if (meses<=12){
           parcela=valor/meses;
           return parcela;
            }else{    
                var i=0.009488793;
                var numerador= i*Math.pow(1+i,meses);
                var denominador= Math.pow(1+i,meses)-1; 
                var parcela=valor*(numerador/denominador);
                return parcela;
            }//fim do else
                }//fim da função parcela
      $(document).on('click','.bt',function(){

          alert(parcela(15000,13));
          
      });//fim da função clique disponivel  
});//fim da função ready   
    
    </script>
</head>
<body>
    <div id="test">alguma coisa</div><button class=bt>Aperte</button>   
</body>
</html>
*/

$path = $_SERVER['DOCUMENT_ROOT'];
require ($path.'/sicor/util/extenso.php');

//Vai exibir na tela "um milhão, quatrocentos e oitenta e sete mil, duzentos e cinquenta e sete e cinquenta e cinco"
//echo extenso::valorPorExtenso("0,01", true, false);



$valorLote=200000.00;
$entrada=20000.00;
$saldoRestante=$valorLote-$entrada;

$itbi=$valorLote*0.02;
$taxas=49.82+17.82;
$p1= calculaEmolumento($valorLote);
$p2= calculaEmolumento($saldoRestante);

$total = $p1+$p2+$taxas+$itbi;
echo "<br>";
echo parcela($saldoRestante, 1249);

//echo $total;


?>


