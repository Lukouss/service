<?php
echo '<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">';
/**
 * Created by PhpStorm.
 * User: Kal-El
 * Date: 11-05-2016
 * Time: 8:38
 */

// Esto nos sirve para incluir Zend de forma directa
set_include_path(get_include_path() .
    PATH_SEPARATOR .
    realpath(dirname(__FILE__) . "/../service/application/"));
?>

<?php
$run="";
$nombre="";
$apellido="";
$mail="";
$telefono="";
$pais="";
$region="";
$ciudad="";
$direccion="";

if((isset($_GET['run'] ))){
    $run=$_GET['run'] ;
}
if((isset($_GET['nombre']))){
    $nombre=$_GET['nombre'];
}
if((isset($_GET['apellido']))){
    $apellido=$_GET['apellido'];
}
if((isset($_GET['mail'] ))){
    $mail=$_GET['mail'] ;
}
if((isset($_GET['telefono'] ))){
    $telefono=$_GET['telefono'] ;
}
if((isset($_GET['pais'] ))){
    $pais=$_GET['pais'] ;
}
if((isset($_GET['region'] ))){
    $region=$_GET['region'] ;
}
if((isset($_GET['ciudad'] ))){
    $ciudad=$_GET['ciudad'] ;
}

if((isset($_GET['direccion'] ))){
    $ciudad=$_GET['direccion'] ;
}

$busquedaAvanzada="";
    require_once("Zend/Soap/Client.php");
    $wsdl_url = "http://localhost:8080/TallerJSP/services/WebServiceProveedor?WSDL";
    $cliente = new Zend_Soap_Client($wsdl_url);

    if ( ($run != "") or ($nombre != "") or ($apellido != "") or ($mail != "") or ($telefono != "") or ($pais!= "")
        or ($region != "")or ($ciudad != "")or ($ciudad != "")) {
        // $empresa= array('empresauid'=>1);
        $contacto=array('run'=>$run, 'nombre'=>$nombre,'apellido'=>$apellido,'mail'=>$mail,'telefono'=>$telefono,'pais'
        =>$pais,'region'=>$region,'ciudad'=>$ciudad,'direccion'=>$direccion);
        //echo json_encode($contacto);
        $busquedaAvanzada=json_encode($contacto);
      
        $response=$cliente->busquedaAvanzada(array("busquedaAvanzada"=>$busquedaAvanzada));
        $contacto2 = json_decode($response->busquedaAvanzadaReturn);
        ?>
        <h1>Búsqueda Avanzada de Contacto</h1>
        <table class="table table-bordered table-hover table-responsive">
            <tr class="success">
                <th>Run</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Mail</th>
                <th>Teléfono</th>
                <th>Pais</th>
                <th>región</th>
                <th>Ciudad</th>
                <th>Dirección</th>
                <th>Imagen</th>
            </tr>
            <?php foreach($contacto2 as $obj) {
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

                </tr>
            <?php } ?>
        </table>
    <?php
}
?>



