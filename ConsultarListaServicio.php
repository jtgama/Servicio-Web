<?php 
include_once'Conexion2.php';

$conect= $conectar->prepare("SELECT codigo,nombre,usuario FROM usuarios;");

$conect->execute();

$conect->bind_result($codigo,$nombre,$usuario);

$vector=array();

while ($conect->fetch()) {
	$mostrar=array();
	$mostrar['codigo']=$codigo;
	$mostrar['nombre']=$nombre;
	$mostrar['usuario']=$usuario;
	array_push($vector, $mostrar);
}
echo json_encode($vector);

 ?>