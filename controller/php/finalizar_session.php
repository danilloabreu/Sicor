<?php

    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);

 //variavel para o redirecionamento 
 $redirect = "/sicor/view/form/form_login.html";
 
 //redirecionamento
 header("location:$redirect");

?>

