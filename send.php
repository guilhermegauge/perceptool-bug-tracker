<?php
  if(!isset($_POST['local'])) header("Location: index.php");
  session_start();
?>
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
      
      <?php
        // anti flood
        $interval = 120;
        if(isset($_SESSION['ip']) && $_SESSION['last_post'] + $interval < time()) die('<span style="color: #c95c5c">Espere alguns minutos e tente novamente.</span>');
        $_SESSION['last_post'] = time();
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

        // pegando valores
        $local = $_POST['local'];
        $funcionalidade = $_POST['funcionalidade'];
        $classificacao = $_POST['classificacao'];
        $como = $_POST['como'];
        $usuario = $_POST['usuario'];

        // tratamento arquivo
        $arquivo = $_FILES["arquivo"];
        $boundary = "XYZ-".date("dmYis")."-ZYX";
        $fp = fopen($arquivo["tmp_name"], "rb"); // abre o arquivo enviado
        $anexo = fread($fp, filesize($arquivo["tmp_name"])); // calcula o tamanho
        $anexo = base64_encode($anexo); // codifica o anexo em base 64
        fclose($fp); // fecha o arquivo

        // cabeçalho do email
        $headers  = "MIME-Version: 1.0\n";
        $headers .= "Content-Type: multipart/mixed; ";
        $headers .= "boundary="$boundary"\r\n";
        $headers .= "$boundary\n";

        // msg
        $msg  = "--$boundary\n";
        $msg .= "Content-Type: text/plain; charset='utf-8'\n";
        $msg .= "h2. Abertura de chamado";
        $msg .= "{panel:title=Local do problema|borderStyle=solid|borderColor=#ccc|titleBGColor=#ececec|bgColor=#FFFFFF}$local{panel}";
        $msg .= "{panel:title=Funcionalidade|borderStyle=solid|borderColor=#ccc|titleBGColor=#ececec|bgColor=#FFFFFF}$funcionalidade{panel}";
        $msg .= "{panel:title=Classificação|borderStyle=solid|borderColor=#ccc|titleBGColor=#ececec|bgColor=#FFFFFF}$classificacao{panel}";
        $msg .= "{panel:title=Como reproduzir|borderStyle=solid|borderColor=#ccc|titleBGColor=#ececec|bgColor=#FFFFFF}$como{panel}";
        $msg .= "{panel:title=Usuário Perceptool|borderStyle=solid|borderColor=#ccc|titleBGColor=#ececec|bgColor=#FFFFFF}$usuario{panel}";
        $msg .= "--$boundary \n";

        // anexo
        $msg .= "Content-Type: ".$arquivo["type"]."; name="".$arquivo['name']."" \n";
        $msg .= "Content-Transfer-Encoding: base64 \n";
        $msg .= "Content-Disposition: attachment; filename="".$arquivo['name']."" \r\n";
        $msg .= "$anexo \n";
        $msg .= "--$boundary \n";


        require "config.php";
        mail($jiraEmail, "Bug Perceptool - date("d/m/y H:i")", $msg, $headers);
      ?>
      
    <hr class="mag" />
    <span> Enviado com sucesso. Agradecemos sua mensagem! </span>
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
