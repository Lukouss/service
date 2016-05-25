<?php
echo '<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">';
echo '<script type="text/javascript" src="./js/cargarImg.js"></script>';
/**
 * Created by PhpStorm.
 * User: kal-el
 * Date: 24-05-16
 * Time: 13:10
 */
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <title>Perfil de Contacto</title>
</HEAD>
<BODY>

<?php
$run = $_POST['run'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mail = $_POST['mail'];
$telefono = $_POST['telefono'];
$pais = $_POST['pais'];
$region = $_POST['region'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
?>

<table class="table">
    <tr>
        <td><h1 id="titulo">Perfil de <?php echo $nombre." ".$apellido?></h1></td>
    </tr>
</table>

<div id="datos">
    <table class="table table-bordered table-hover table-responsive">
        <tr class="dato">
            <td>Run: <?php echo $run?></td>
        </tr>

        <tr class="dato">
            <td>Nombre: <?php echo $nombre." ".$apellido?></td>
        </tr>

        <tr class="dato">
            <td>Mail: <?php echo $mail?></td>
        </tr>

        <tr class="dato">
            <td>Teléfono: <?php echo $telefono?></td>
        </tr>

        <tr class="dato">
            <td>País: <?php echo $pais?></td>
        </tr>

        <tr class="dato">
            <td>Región: <?php echo $region?></td>
        </tr>

        <tr class="dato">
            <td>Ciudad: <?php echo $ciudad?></td>
        </tr>

        <tr class="dato">
            <td>Dirección: <?php echo $direccion?></td>
        </tr>
    </table>
</div>
</BODY>
</HTML>