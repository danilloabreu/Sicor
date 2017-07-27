<?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

if(isset($_SESSION['nivel'])){
$nivel=$_SESSION['nivel'];
//echo $nivel;
}else{
    die("Faça seu login!");
}
?>
<header class="header"><div>
                <nav>
                    <ul class="menu">
                            <li>
                                <a href="/sicor/view/pagina_inicial.php">Dashboard</a>
                            </li>
                            <?php if(false){
                            $cab_reserva="<li><a href='#'>Reservas</a>";
                            $cab_reserva.="<ul>";
                            $cab_reserva.="<li><a href='/sicor/view/page/page_reserva.php'>Verificar reservas</a>";
                            $cab_reserva.="</li>";
                            $cab_reserva.="</ul>";
                            $cab_reserva.="</li>";
                            echo $cab_reserva;
                            }
                            ?>        
                            <!--<li><a href="#">Sobre</a></li>-->
                            <li><a href="#">Arquivos Úteis</a>
                                <ul>
                                <li><a target="_blank" href="/sicor/files/mapa.pdf">Mapa em PDF</a></li>
                                <li><a href="/sicor/files/PropostaAvulsa.dotx">Proposta Avulsa</a></li>
                                <li><a href="/sicor/files/cnpj_spe.pdf">Cartão CNPJ SPE</a></li>
                                <li><a href="#">Aprovação Graprohab</a></li>
                                <li><a href="#">Registro da Incorporação</a></li>
                                </ul>
                            </li>
                            <?php 
                            if(true){
                            $cab_simulador="<li><a href='/sicor/view/page/page_simulador.php'>Simulador</a>";
                            $cab_simulador.="</li>";
                            echo $cab_simulador;}
                             ?>
                            <?php 
                            if($nivel==5){
                            $cab_adm="<li>";
                            $cab_adm.="<a href='#'>Administração </a>";
                            $cab_adm.="<ul>";
                            $cab_adm.="<li><a href='/sicor/view/page/page_adm_lote.php'>Administrar lotes</a></li>";                    
                            $cab_adm.="<li><a href='/sicor/view/page/page_contrato.php'>Contrato</a></li>";                    
                            $cab_adm.="</ul>";
                            $cab_adm.="</li>";                            
                            echo $cab_adm;
                            }
                            ?>
                            <?php if(false){
                           $cab_calc='<li>';
                           $cab_calc.="<a href='#' >Calculadoras</a>";
                           $cab_calc.=" <ul>";
                           $cab_calc.="<li><a href='/sicor/view/page/page_calculadora_parcela.php' >Parcelas</a></li>";
                           $cab_calc.="<li><a href='/sicor/view/page/page_calculadora_parcela.php'>Emolumentos</a></li>";
                           $cab_calc.="</ul>";
                           $cab_cal.="</li>";
                           echo $cab_calc;
                           
                            }
                           ?>
                                <li>
                                <a href="/sicor/controller/php/finalizar_session.php" >Sair</a>
                            
                            </li>                
                    </ul>             
                </nav></div>
                <div class="clearfloat"></div>
</header>