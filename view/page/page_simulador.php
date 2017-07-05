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
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/base.css">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/page_simulador.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script><script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
        <script type="text/javascript" src="/sicor/controller/js/base.js"></script>
        <script type="text/javascript" src="/sicor/controller/js/page_simulador.js"></script>
        <meta charset="utf-8">
        
        <title>Sistema de Reservas - <?php echo usuario::recupera_usuario_cookie() ?> </title>
    </head>
    <body>
        <?php require_once($path.'/sicor/view/header.php'); ?>
        <main>
            <div class="content">
                <h1> Simulador Jardim Pacaembu</h1>    
                
                <div class="borda">
                    <h1>Dados para simulação</h1>
                    <span>Quadra</span>
                       <?php htmlSelect(12,"select-quadra");?>
                    <span>Lote</span>
                     <?php htmlSelectArray(loteDisponivelArray(1),"select-lote");?> 
                    <br>
                    <input type="radio" name='avista' value='avista' class="avista">A vista<input type="radio" name='avista' value='avista' class="aprazo" checked >Parcelado
                    <br>
                <div class="dados lote">
                    <table>
                        <tr><th colspan="2">Lote</th></tr>
                        <tr><td>Quadra</td><td><span class="lote-quadra"></span></td>
                        <tr><td>Lote</td><td><span class="lote-lote"></span></td></tr>
                        <tr><td>Valor de <br>Tabela</td><td><span>R$</span><span class="lote-valor"></span></td></tr>
                        <tr><td>Valor de <br>Negociação</td><td><span>R$</span><input type="text" class="lote-valornegociacao"></td></tr>
                      
                    </table>            
                </div>
                <div class="dados entrada">
                    <table>
                        <tr><th colspan="2">Entrada</th></tr>
                        <tr><td>Entrada Mínima</td><td><span>R$</span><span class="entrada-minimo"></span></td></tr>
                        <tr><td>Entrada</td><td><span>R$</span><input type="text" class="entrada-valor"></td></tr>
                        <tr><td>Documentação</td><td><span>R$</span><span class="entrada-documentacao"></span></td></tr>
                        <tr><td>Total da Entrada</td><td><span>R$</span><span class="entrada-total"></span></td></tr>
                        <tr><td>Parcelas</td><td>
                            <select class="entrada-numparcela">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select></td>
                        </tr>
                        <tr><td>Total da Parcela</td><td><span>R$ </span><span class="parcela-total"></span></td></tr>
                        <tr><td>Primeiro Vencimento</td><td><input type="text" class="entrada-primeirovencimento"></td></tr>
                        <tr><td>Ultimo Vencimento</td><td>01/07/2017</td></tr>
                    </table>
                </div>
                    
                <div class="dados financiamento">
                    <table>
                        <tr><th colspan="2">Financiamento</th></tr>
                        <tr><td>Valor a financiar</td><td><span>R$</span><span class="fin-total"></span></td></tr>
                        <tr><td>N de parcelas</td><td>
                          <?php htmlSelect(180,"fin-numparcela");?>
                        </td>
                        </tr>
                        <tr><td>Valor das parcelas</td><td><span>R$</span><span class="fin-valorparcela"></span></td></tr>
                        <tr><td>Seguro</td><td><span>R$</span><span class="fin-valorseguro"></span></td></tr>
                        <tr><td>Taxa de Administração</td><td><span>R$</span><span class="fin-valortxadm"></span></td></tr>
                        <tr><td>Total da Parcela</td><td><span>R$ </span>37.500,00</td></tr>
                        <tr><td>Primeiro Vencimento</td><td ><input type="date"></td></tr>
                        <tr><td>Ultimo Vencimento</td><td>01/07/2017</td></tr>
                    </table>
                </div>
                    <br>
                    <div class="dados fluxo">
                        <h1>Fluxo de Pagamentos</h1>
                    <table>
                        <tr><th colspan="3">Fluxo de Pagamentos</th></tr>
                        <tr><td>Ano</td><td>Mês</td><td>Total Parcela</td></tr>
                        <tr><td>2018</td><td>Janeiro</td><td><span>R$ </span>15.800,00</td></tr>
                        <tr><td>2018</td><td>Fevereiro</td><td><span>R$ </span>15.800,00</td></tr>
                        
                        
                    </table>
                    </div><br>
                    <div>
                       <a href="#" class="gerarproposta">Gerar Proposta</a>
              </div>
                    
                
                
</div>
                </div>
        </main>
        <?php //require_once($path.'/sicor/view/footer.php'); ?>     
        
    </body>
</html>
