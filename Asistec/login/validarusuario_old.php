<?php
include('../sessiones/clssession.php');
$mensaje="";
if($_POST['txtusuario']!=""){
	if($_POST['txtpwd']!=""){
		if(strtoupper($_POST['txtusuario'])=='SUPERADMIN'){
			if($_POST['txtpwd']=='061197100'){
				$session = new clsSession();

				$session->id = $session->generarSessionId();
				$session->idusuario = 'SUPERADMIN';
				$session->idperfil = 1000;
				$session->apenom = "SUPERADMIN";

				if($session->Insertar() > 0){
					header('location: ../index/index.php?sSs='.$session->id);
				}
			} else {
				$mensaje = "CONTRASEÑA INCORRECTA DE SUPER ADMINISTRADOR";
			}
		} else {
			//aca se comienza a validar el usuario del sistema
			include('../usuario/clsusuario.php');
			$usu = new clsUsuario();
			$usu->idusuario = strtoupper($_POST['txtusuario']);
			$regusuarios=$usu->getUnUsuario();
			if(($elusuario=mysqli_fetch_array($regusuarios,MYSQLI_ASSOC))>0){
				include('../encriptar/encriptar.php');
				$contraBd = $elusuario['pwd'];
				$contra = encriptar($_POST['txtpwd']);
				if($contraBd == '1234' && $_POST['txtpwd'] == 1234){
					header('location: ../usuario/cambiarSoloPWDInicial.php?idusuario='.$elusuario['idusuario']);
				}else{
					if($contra == $contraBd){
						$session = new clsSession();

						$session->id = $session->generarSessionId();
						$session->idusuario = $elusuario['idusuario'];
						$session->idperfil = $elusuario['idperfil'];
						$session->apenom = $elusuario['apellido'].', '.$elusuario['nombre'];

						if($session->Insertar() > 0){
							header('location: ../index/index.php?sSs='.$session->id);
						}
					} else {
						$mensaje = "Contraseña ingresada es incorrecta";
						header('location: mensalogin.php?mensaje='.$mensaje.'');
					}
				}	
			} else {
				$mensaje = "El usuario ingresado no existe";
				header('location: mensalogin.php?mensaje='.$mensaje.'');
			}
		}
	} else {
		$mensaje = "Por favor ingresar la contraseña";
		header('location: mensalogin.php?mensaje='.$mensaje.'');
	}
} else {
	$mensaje = "Por favor ingresar el usuario";
	header('location: mensalogin.php?mensaje='.$mensaje.'');
}
?>
