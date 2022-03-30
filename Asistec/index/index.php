<?php
	$idsession =  $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
	include("../encapie/encabezado.php");
	$perfil = new clsPerfil();
	if($SS_IDPERFIL == 1000){
		$nombrePerfil = "Super ADMINISTRADOR";
	} else {
		$perfil->idperfil = $SS_IDPERFIL;
		$regperfiles=$perfil->getUnPerfil();
		$elperfil=mysqli_fetch_array($regperfiles,MYSQLI_ASSOC);
		$nombrePerfil = $elperfil['nombreperfil'];		
	}
?>
<br>
<br>
	<div align="center">
		<h1>INICIO</h1>
		<label>Bienvenido al sistema: </label>
		<a style="font-size: 20px"><?php echo $SS_APENOM?></a>
		<br>
		<label>Usted posee el cargo de: </label>
		<a style="font-size: 20px"><?php echo $nombrePerfil; ?> </a>
	</div>