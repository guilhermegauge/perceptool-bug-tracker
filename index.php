<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Perceptool - Abertura de chamados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">

    

      <h1 class="head-top">Abertura de chamados - Perceptool</h1>
      <hr />
      <form action="send.php" method="POST" enctype="multipart/form-data">
       <div class="row mtop">
        <div class="span4">
          <label> Local do problema </label>
          <select name="local" class="herolist select-block span3">
            <option value="0" selected="selected">Escolher</option>
            <option value="Monitoramento">Monitoramento</option>
            <option value="Captura">Captura</option>
            <option value="Dashboard">Dashboard</option>
            <option value="Login">Login</option>
          </select>
        </div>
        <div class="span4">
          <label> Funcionalidade 
          <input type="text" value="" name="funcionalidade" class="span4 minimargin" />
          </label>
        </div>
        <div class="span4">
          <label> Classificação </label>
          <select name="classificacao" class="herolist select-block span3">
            <option value="0" selected="selected">Escolher</option>
            <option value="Critico">Critico</option>
            <option value="Importante">Importante</option>
            <option value="Prejudicial">Prejudicial</option>
            <option value="Melhoria">Melhoria</option>
          </select>

        </div>
      </div>

      <div class="row">
        <div class="span12">
          <label> Como reproduzir <small style="font-weight: normal; font-size: 12px; display: block; margin-right: 10px; color: gray; float: right">Limite de 500 caracteres</small>
           <textarea name="como" class="span12 minimargin"></textarea>
          </label>
        </div>
      </div>

      <div class="row">
         <div class="span3">
            <label> Usuário Perceptool 
            <input type="text" value="" name="usuario" class="span3 minimargin" />
            </label>
          </div>
        <div class="span9">
          <label>Anexar um arquivo </label>
         <div class="fileupload fileupload-new" data-provides="fileupload">
            <span class="btn btn-file"><span class="fileupload-new">Selecione um arquivo</span><span class="fileupload-exists">Trocar de arquivo</span><input type="file" name="arquivo" /></span>
            <span class="fileupload-preview"></span>
            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
          </div>
        </div>
        
      </div>

    <div class="row">
      <div class="span3 right">
        <button class="btn btn-large btn-block btn-inverse" onclick="document.forms[0].submit()">Enviar</button>
      </div>
    </div>
    </form>
    <hr class="mag" />

    <footer>
      <span>PERCEPTOOL &copy; <?php echo date('Y'); ?></span>
      <span style="float: right;">GAUGE</span>
    </footer>
   </div>   
    
    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery.stacktable.js"></script>    
    <script src="js/application.js"></script>
  </body>
</html>
