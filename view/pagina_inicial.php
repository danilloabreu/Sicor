<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path.'/sicor/model/usuario.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/ico" href="/sicor/view/img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/base.css">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/pagina_inicial.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script type="text/javascript" src="/sicor/controller/js/pagina_inicial.js"></script> 
        <meta charset="utf-8">
       
        
        <title>Sistema de Reservas - <?php echo usuario::recupera_usuario_cookie() ?> </title>
    </head>
    <body>
        <?php require_once($path.'/sicor/view/header.php'); ?>
        <main>
            <div class="content">           
    <?php
    require_once($path.'/sicor/view/table/table_lotes.php');   
    $chamadaQuadra=1;        tabelaLotes($chamadaQuadra);
    $chamadaQuadra=2;        tabelaLotes($chamadaQuadra);
    $chamadaQuadra=3;        tabelaLotes($chamadaQuadra);
    $chamadaQuadra=4;        tabelaLotes($chamadaQuadra);
    $chamadaQuadra=5;        tabelaLotes($chamadaQuadra);
    $chamadaQuadra=6;        tabelaLotes($chamadaQuadra);
    $chamadaQuadra=7;        tabelaLotes($chamadaQuadra);
    $chamadaQuadra=8;        tabelaLotes($chamadaQuadra);
    $chamadaQuadra=9;        tabelaLotes($chamadaQuadra);
    $chamadaQuadra=10;       tabelaLotes($chamadaQuadra);
    $chamadaQuadra=11;       tabelaLotes($chamadaQuadra);
    $chamadaQuadra=12;       tabelaLotes($chamadaQuadra);                   
    ?>
</div>
            <br>
        </main>
        <?php //require_once($path.'/sicor/view/footer.php'); ?>     
        <input type="hidden" class="checksum_estatico">
        <input type="hidden" class="checksum_variavel">
    </body>
</html>