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

<?php
if ( isset($_GET['textoBusqueda'])) {
    $_POST['textoBusqueda'] = str_replace(" ", "", $_GET['textoBusqueda']);
// Creamos un cliente SOAP
    require_once("Zend/Soap/Client.php");
    $wsdl_url = "http://localhost:8080/TallerJSP/services/WebServiceProveedor?WSDL";
    $cliente = new Zend_Soap_Client($wsdl_url);
    $test = "Texto de prueba...";
    if ( ($_GET['textoBusqueda'] != "") ) {
        $resultado = $cliente->busquedaSimpleCont(array("busqueda"=>$_GET['textoBusqueda']));
        ?>
        <h1>Resultado Busqueda</h1>
        <p>La busqueda es: <?php print_r($resultado); ?></p><br/>
        
        <?php
    }
}
?>