<?php 
include_once'Conexion2.php';


$json=array();
if (isset($_REQUEST['codigo'])) {
	$codigo = $_REQUEST['codigo'];


$consulta = "SELECT codigo,nombre,usuario FROM usuarios WHERE codigo='{$codigo}'";
$consulta1=mysqli_query($conectar,$consulta);

if ($registro=mysqli_fetch_array($consulta1)) {
	$json['usuarios'][]=$registro;

}else{
	$consulta1['codigo']=0;
	$consulta1['nombre']='No registro';
	$consulta1['usuario']='No registro';
	$json['usuarios'][]=$consulta1;
	
}
mysqli_close($conectar);
echo json_encode($json);

}else{
	$consulta1["success"]=0;
	$consulta1["message"]='No retorna';
	
	$json['usuarios'][]=$consulta1;
	echo json_encode($json);
}

 ?>