<?php 

include_once'Conexion.php';

$codigo = $_REQUEST['codigo'];

$consulta = $con->query("DELETE FROM usuarios WHERE  codigo='".$codigo."' ");

 
 
 ?>