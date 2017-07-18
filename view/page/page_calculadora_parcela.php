<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path.'/sicor/model/usuario.php');
require_once ($path.'/sicor/controller/php/function.php');


?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/base.css">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/page_simulador.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
        crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
       <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
        <script type="text/javascript" src="/sicor/controller/js/page_calculadora_parcela.js"></script>
        <meta charset="utf-8">
        
        <title>Sistema de Reservas - <?php echo usuario::recupera_usuario_cookie() ?> </title>
    </head>
    <body>
        <?php require_once($path.'/sicor/view/header.php'); ?>
        <main>
            <div class="content">
                <h1>Calculadora de Parcelas</h1>    
                
                <div class="borda">
                    <h1>Dados para simulação</h1>            
                    <br>
                    <table>
                        <tr><td>Saldo Devedor</td><td><input type="text" class="saldoDevedor"></td></tr>
                        <tr><td>Nº de Parcelas</td><td><?php htmlSelect(180,"prazo");?></td></tr>
                        <tr><td>Valor da Parcela</td><td class="parcela"></td></tr>
                        <tr><td colspan="1"><button class='calcular'>Calcular</button></td><td><button class='limpar'>Limpar</button></td></tr>
                    </table>   
                    <br>
                    <table>
                        <tr><td>12</td><td>18</td><td>24</td>><td>36</td><td>48</td><td>60</td></tr>
                        <tr><td class='sim-parcela' parcela='12'></td><td class='sim-parcela' parcela='18'></td><td class='sim-parcela' parcela='24'></td><td class='sim-parcela' parcela='36'></td><td class='sim-parcela' parcela='48'></td><td class='sim-parcela' parcela='60'></td></tr>
                    </table>
                
                </div>
        </main>
        <?php //require_once($path.'/sicor/view/footer.php'); ?>     
        
    </body>
</html>
