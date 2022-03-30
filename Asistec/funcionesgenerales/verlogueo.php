<?php
	include('../sessiones/clssession.php');
	$session = new clsSession();

	$session->id = $idsession;
	$regsession = $session->getUnaSession();
	if($rowsession = mysqli_fetch_array($regsession, MYSQLI_ASSOC)){
		if($session->controlarVencimientoSession(5,$rowsession['fecha'], $rowsession['hora']) > 0){
			if($session->Actualizar()){
				$SS_IDUSUARIO = $rowsession['idusuario'];
				$SS_IDPERFIL = $rowsession['idperfil'];
				$SS_APENOM = $rowsession['apenom'];
				$SS_IDSESSION = $idsession;
			} else {
				$session->Cerrar();
				header('location:../login/login.php');
				exit();
			}
		} else {
			$session->Cerrar();
			header('location:../login/login.php');
			exit();
		}
	} else {
		header('location:../login/login.php');
		exit();
	}

?>