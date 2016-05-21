<?php
/**
 * Created by PhpStorm.
 * User: Kal-El
 * Date: 04-05-2016
 * Time: 11:15
 */
// Esto nos sirve para incluir Zend de forma directa
set_include_path(get_include_path() .
    PATH_SEPARATOR .
    realpath(dirname(__FILE__) . "/../service/application/"));
?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <meta charset="utf-8">

        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <script type="text/javascript"
                src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
              crossorigin="anonymous" />
        <!-- Optional theme -->
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
              integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX"
              crossorigin="anonymous"/>
        <!-- Latest compiled and minified JavaScript -->
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
            crossorigin="anonymous"></script>

        <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"/>

        <!--- <script src="//oss.maxcdn.com/jquery/1.11.1/jquery.min.js"></script>-->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <title>buscar</title>
    </head>
<body>
<?php
if ( isset($_GET['buscar'])) {
    $_GET['buscar'] = str_replace(" ", "", $_GET['buscar']);
// Creamos un cliente SOAP
    require_once("Zend/Soap/Client.php");
    $wsdl_url = "http://localhost:8080/TallerJSP/services/WebServiceProveedor?WSDL";
    $cliente = new Zend_Soap_Client($wsdl_url);
    if ( ($_GET['buscar'] != "") ) {
        ?>
        <h1>Resultado Busqueda</h1>
        <p>La busqueda es: <?php print_r($cliente->busquedaSimpleCont(array("busqueda"=>$_GET['buscar']))); ?></p><br/>
        <?php
    }
}
?>
<form action="cliente_ws_ejemplo.php" id="cliente_ws_ejemplo.php" method="get"
      class="form-horizontal mitad">
    <div class="form-group">
        <label class="col-lg-3 control-label">Buscar simple</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="buscar" required>
            <br>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-9 col-lg-offset-3">
            <button type="submit" class="btn btn-success left">busqueda</button>
        </div>
    </div>
</form>

</body>
</html>