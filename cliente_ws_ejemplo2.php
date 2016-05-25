<?php
echo '<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">';
echo '<script type="text/javascript" src="./js/cargarImg.js"></script>';
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


    $array = array("busqueda"=>$_GET['textoBusqueda']);

    if ( ($_GET['textoBusqueda'] != "") ) {
        $response=$cliente->busquedaSimpleCont(array("busqueda" => $_GET['textoBusqueda']));
        $contacto = json_decode($response->busquedaSimpleContReturn);

        ?>
        <h1>Búsqueda Simple de Contacto</h1>
        <table class="table table-bordered table-hover table-responsive">
            <tr class="success">
                <th>Run</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Mail</th>
                <th>Teléfono</th>
                <th>País</th>
                <th>región</th>
                <th>Ciudad</th>
                <th>Dirección</th>
                <th>Imagen</th>

            </tr>
            <?php foreach($contacto as $obj) {
                $run = $obj->run;
                $nombre = $obj->nombre;
                $apellido = $obj->apellido;
                $mail = $obj->mail;
                $telefono = $obj->telefono;
                $pais = $obj->pais;
                $region = $obj->region;
                $ciudad = $obj->ciudad;
                $direccion = $obj->direccion;
                $imagen = $obj->imagen;

                ?>
                <tr>
                    <td><?php echo $run ?></td>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $apellido ?></td>
                    <td><?php echo $mail ?></td>
                    <td><?php echo $telefono ?></td>
                    <td><?php echo $pais ?></td>
                    <td><?php echo $region ?></td>
                    <td><?php echo $ciudad ?></td>
                    <td><?php echo $direccion ?></td>

                    <?php

                        

                        $imagen = '<td ><img src='. $imagen .' width="100px" class = "thumbnail"></td>';
                        echo $imagen;
                    ?>

                    
                    <?php //en lo posible, hacer con json ?>
                    
                        <td>
                            <form action="visualizarPerfil.php" method="POST" >
                                <?php echo "<input type='hidden' name='run' value='$run'>"?>
                                <?php echo "<input type='hidden' name='nombre' value='$nombre'>"?>
                                <?php echo "<input type='hidden' name='apellido' value='$apellido'>"?>
                                <?php echo "<input type='hidden' name='mail' value='$mail'>"?>
                                <?php echo "<input type='hidden' name='telefono' value='$telefono'>"?>
                                <?php echo "<input type='hidden' name='pais' value='$pais'>"?>
                                <?php echo "<input type='hidden' name='region' value='$region'>"?>
                                <?php echo "<input type='hidden' name='ciudad' value='$ciudad'>"?>
                                <?php echo "<input type='hidden' name='direccion' value='$direccion'>"?>

                                <input type="submit" value="Ver Perfil" class="btn btn-primary"/>
                            </form >
                        </td>


                    
                </tr>
            <?php } ?>
        </table>
        <?php
    }
}
?>