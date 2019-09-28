<?php 
include_once'Conexion2.php';


$json=array();
if (isset($_REQUEST['codigo']) &&isset($_REQUEST['nombre'])  && isset($_REQUEST['usuario']) ) {
	$codigo = $_REQUEST['codigo'];
$nombre = $_REQUEST['nombre'];
$usuario = $_REQUEST['usuario'];

$consulta = "INSERT  INTO usuarios(codigo,nombre,usuario) VALUES('".$codigo."','".$nombre."','".$usuario."')";
$consulta1=mysqli_query($conectar,$consulta);
if ($consulta1) {
	$consulta2 = "SELECT codigo,nombre,usuario FROM usuarios WHERE codigo='{$codigo}'";
$consulta11=mysqli_query($conectar,$consulta2);
}
if ($registro=mysqli_fetch_array($consulta11)) {
	$json['usuarios'][]=$registro;

}else{
	$consulta1['codigo']=0;
	$consulta1['nombre']='No registro';
	$consulta1['usuario']='No registro';
	$json['usuarios'][]=$consulta11;
	
}
mysqli_close($conectar);
header('Content-Type: application/json');
echo json_encode($json);

}else{
	$consulta11['codigo']=0;
	$consulta11['nombre']='No registro';
	$consulta11['usuario']='No registro';
	
	$json['usuarios'][]=$consulta11;
	header('Content-Type: application/json');
	echo json_encode($json);
}

 ?>