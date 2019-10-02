<?php 

$SERVER="localhost";
$BD="Angelesbici";
$USER="root";
$PASS="";
$con= new PDO("mysql:host={$SERVER}; dbname={$BD}",$USER,$PASS);
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$con->exec('SET CHARACTER SET UTF8');











 ?>