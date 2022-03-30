<?php
require_once("../funcionesgenerales/ValidarLogeo.php");
$host="localhost";
$user="root";
$pwd="";
$base="asistec";

$conexion=mysqli_connect ($host,$user,$pwd, $base)
	or die ("Problemas para conectar con la base de datos - MySQL Error: ");
	
?>