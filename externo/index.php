<html>
    <head>
       <link rel="stylesheet" type="text/css" href="/sicor/view/css/reset.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
       <meta charset="utf-8">
       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
       <script type="text/javascript" src="/sicor/util/mask/dist/jquery.mask.js"></script>
       <link rel="stylesheet" type="text/css" href="index.css">
       <script type="text/javascript" src="index.js"></script> 
        <title>Sistema de Reservas</title>
    </head>
    <body>
        
            
      
<div class="container">

  <form class="well form-horizontal" action="/sicor/externo/page_simulador_externo.php " method="get"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>Acesse o simulador e veja os preços e condições especiais!</legend>

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Telefone</label>  
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="telefone" placeholder="(XX)9XXXX-XXXX" class="form-control telefone" type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       <div class="form-group">
           <label class="col-md-4 control-label">Código de Acesso<br><a href="solicita_codigo.php">Peça aqui o seu!</a></label>  
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="codigo" placeholder="Codigo de Acesso" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Acessar! <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

<!--<div class="col-md-4">
    <p>Não possui código de acesso?<a href="solicita_codigo.php"> Clique aqui.</a> É rápido!</p>
  </div>-->

</fieldset>
</form>
</div>
    </div><!-- /.container -->	
     
</div>        
                         
</body>
    

</html>