<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path.'/sicor/model/usuario.php');
require_once ($path.'/sicor/controller/php/function.php');

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

        
if($_SESSION['nivel']!=5){
die("Não autorizado");   
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/base.css">
        <link rel="stylesheet" type="text/css" href="/sicor/view/css/page_adm_lote.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="/sicor/controller/js/page_adm_lote.js"></script> 
        <meta charset="utf-8">
        <meta http-equiv="refresh" content=""/>
        <title>Sistema de Reservas - <?php echo usuario::recupera_usuario_cookie() ?> </title>
    </head>
    <body>
        <?php require_once($path.'/sicor/view/header.php'); ?>
        <main>
            <div class="content">
                <div class="adm-lote">
                <span>Quadra </span><?php htmlSelect(12,"select-quadra");?>
                <br>
    <?php require_once($path.'/sicor/view/table/table_adm_lote.php');?>
                </div> 
                <div class="quadro-resumo"><?php require $path.'/sicor/view/frame/resumo_venda.php'; ?></div>
         </div>
        </main>
           
            
        <?php //require_once($path.'/sicor/view/footer.php'); ?>     
        
    </body>
</html>
