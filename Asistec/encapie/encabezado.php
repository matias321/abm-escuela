<?php
		include("../perfil/clsPerfil.php");
		$perfil = new clsPerfil();
		$perfil->idperfil = $SS_IDPERFIL;
		if($SS_IDPERFIL == 1000){
			$tipoperfil = "SUPER ADMINISTRADOR";
		} else {
			$regperfiles=$perfil->getUnPerfil();
			$elperfil=mysqli_fetch_array($regperfiles,MYSQLI_ASSOC);
			$tipoperfil = strtolower($elperfil['nombreperfil']);
		}
?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
		<html>
			<meta charset="utf-8">
			<link rel="stylesheet" href="../fonts/fonts.css?1.3" type="text/css" charset="utf-8" />
			<link rel="stylesheet" href="../css/eest1pinamar.css?1.3" type="text/css" charset="utf-8" />
			<link rel="stylesheet" href="../css/tablas.css?1.3" type="text/css" charset="utf-8" />
			<link rel="stylesheet" href="../css/botones.css?1.3" type="text/css" charset="utf-8" />
			<link rel="stylesheet" href="../css/elementosForm.css?1.3" type="text/css" charset="utf-8" />
			<link rel="stylesheet" href="../css/checkBox.css?1.3" type="text/css" charset="utf-8" />
			<link rel="stylesheet" href="../css/labels.css" type="text/css" charset="utf-8" />
			<title>Sistema Asistec</title>
		</html>
		<?php
		switch($SS_IDPERFIL){
			case 0:
					include('perfil0.php');
					break;
			case 1:
					include('perfilPreceptor.php');
					break;
			case 2:
					include('perfilAdministrador.php');
					break;
			case 3:  //salchilas con pure :)  <-- Mateo Soto 7º2º 2021
					include('perfilEOE.php');
					break;
			case 4:
					include('perfilProfesor.php');
					break;
			case 1000:
					include('perfilAdministrador.php');
					break;
		}
?>
