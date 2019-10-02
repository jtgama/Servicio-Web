<?php 

include_once'Conexion.php';


$nombre = $_REQUEST['nombre'];
$usuario = $_REQUEST['usuario'];

$consulta = $con->query("INSERT  INTO usuarios(nombre,usuario) VALUES('".$nombre."','".$usuario."')");

 
 
 ?>