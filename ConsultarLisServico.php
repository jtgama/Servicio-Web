<?php 

if ($_SERVER['REQUEST_METHOD']=='GET') {
	
	require_once'Conexion3.php';

    $conect = new db();

    $recorer= array();
     
     $conexion = "SELECT * FROM usuarios";

     $conect->query($conexion);
     $resultado=$conect->resultado();

     if ($resultado) {
     	
     	$recorer['usuarios']=$resultado;
     	$recorer['status']=true;

     }
     else{
     	$recorer['status']=false;
     }
     echo json_encode($recorer);
}








 ?>