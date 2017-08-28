<?php
//requisições 
$path = $_SERVER['DOCUMENT_ROOT'];
require ($path.'/sicor/controller/php/conexao.php');
require($path.'/sicor/controller/php/function.php');
require($path.'/sicor/externo/function_externo.php');


$telefone=$_GET['telefone'];
$codigo=$_GET['codigo'];

if(!checarCliente($conexao, $telefone, $codigo)){
    die("Você deve logar");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/base.css">
        <link rel="stylesheet" type="text/css" href="page_simulador_externo.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
        <script type="text/javascript" src="/sicor/controller/js/page_simulador_function.js"></script>
        <script type="text/javascript" src="/sicor/controller/js/page_simulador.js"></script>
       
        <meta charset="utf-8">
        <title>Simulador - Jardim Pacaembu</title>
    </head>
    <body>
        <?php //require_once($path.'/sicor/view/header.php'); //header ?>
        <main>
            <div class="content">
                <h1> </h1>    
                <div class="borda">
                    <h1>Simulador Jardim Pacaembu</h1>
                    <span>Quadra</span>
                    <?php htmlSelect(12,"select-quadra");?>
                    <span>Lote</span>
                    <?php htmlSelectArray(loteDisponivelArray(1),"select-lote");?> 
                    <br>
                    <input type="radio" name='avista' value='avista' class="avista">A vista<input type="radio" name='avista' value='avista' class="aprazo" checked >Parcelado
                    <br>
                    <table>
                        <tr><th colspan="5">Dados para Simulação</th></tr>
                        <tr><td>Valor de negociação</td><td>Valor da Entrada</td><td>Nº de parcelas da entrada</td><td>Nº de parcelas do Financiamento</td><td>Primeiro Vencimento</td></tr>
                        <tr><td><span>R$</span><input type="text" class="lote-valornegociacao"></td><td><span>R$</span><input type="text" class="entrada-valor"></td>    
                        <td>
                            <select class="entrada-numparcela">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </td>
                        <td>
                        <?php htmlSelect(180,"fin-numparcela");?>
                        </td>        
                        <td><input type="text" class="entrada-primeirovencimento"></td>        
                    </table>    
                    <div class="dados lote">
                        <table>
                            <tr><th colspan="2">Lote</th></tr>
                            <tr><td>Quadra</td><td><span class="lote-quadra"></span></td>
                            <tr><td>Lote</td><td><span class="lote-lote"></span></td></tr>
                            <tr><td>Valor de <br>Tabela</td><td><span>R$</span><span class="lote-valor"></span></td></tr>
                        </table>            
                    </div>
                    <div class="dados entrada">
                    <table>
                        <tr><th colspan="2">Entrada</th></tr>
                        <tr><td>Entrada Mínima</td><td><span>R$</span><span class="entrada-minimo"></span></td></tr>
                        <tr><td>Documentação</td><td><span>R$</span><span class="entrada-documentacao"></span></td></tr>
                        <tr><td>Total da Entrada</td><td><span>R$</span><span class="entrada-total"></span></td></tr>
                        <tr><td>Total da Parcela</td><td><span>R$ </span><span class="parcela-total"></span></td></tr>
                        <tr><td>Último Vencimento</td><td class="entrada-ultimovencimento"></td></tr>
                    </table>
                    </div>
                    <div class="dados financiamento">
                        <table>
                            <tr><th colspan="2">Financiamento</th></tr>
                            <tr><td>Valor a financiar</td><td><span>R$</span><span class="fin-total"></span></td></tr>
                            <tr><td>Valor das parcelas</td><td><span>R$</span><span class="fin-valorparcela"></span></td></tr>
                            <tr><td>Seguro</td><td><span>R$</span><span class="fin-valorseguro"></span></td></tr>
                            <tr><td>Taxa de Administração</td><td><span>R$</span><span class="fin-valortxadm"></span></td></tr>
                            <tr><td>Total da Parcela</td><td><span>R$ </span><span class="fin-totalparcela"><span></td></tr>
                            <tr><td>Primeiro Vencimento</td><td class="fin-primeirovencimento"></td></tr>
                            <tr><td>Último Vencimento</td><td class="fin-ultimovencimento"></td></tr>
                        </table>
                    </div>
                    <br>
                    <div class="dados fluxo">
                        <h1>Fluxo de Pagamentos - Primeiro Ano</h1>
                        <table>
                            <tr><th colspan="3">Fluxo de Pagamentos - Primeiro Ano</th></tr>
                            <tr><td>Ano</td><td>Mês</td><td>Total Parcela</td></tr>
                        </table>
                    </div>
                    <br>
                    <div>
                     <!--   <a href="#" class="gerarproposta">Gerar Proposta</a>-->
                    </div>
                </div>
            </div>
        </main>
        <?php //require_once($path.'/sicor/view/footer.php'); //footer ?>     
    </body>
    
    
     <script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500,domain:'condoplan.web7607.kinghost.net/chat/'};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//condoplan.web7607.kinghost.net/chat/index.php/por/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true?r='+referrer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
</html>
