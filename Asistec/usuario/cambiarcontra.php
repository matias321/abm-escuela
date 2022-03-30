<?php
if(isset($_GET['sSs'])){
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
} else {
	$SS_IDPERFIL = 0;
	$idsession = 0;
}
	include('../encapie/encabezado.php');

include('../usuario/clsusuario.php');
include('../encriptar/encriptar.php');
$err=false;
	if($_GET['vengode']!=1){
		if($_POST['txtpwdnueva']!=$_POST['txtpwdrepetir']){
			$mensaje="La nueva contraseña y la contraseña repetida no coinciden";
			$ir_a = "cambiarPWD.php?sSs=".$idsession;
			$err=true;
		}
		$pwdvieja = encriptar($_POST['txtpwdvieja']);
		if($pwdvieja != $_SESSION['PWD']){
			$mensaje="La contraseña actual es incorrecta";
			$ir_a = "cambiarPWD.php?sSs=".$idsession;
			$err=true;
		}else{
			if(!$err == true){
				$usu = new clsUsuario();
				$usu->idusuario = $_GET['idusuario'];
				$usu->pwd = encriptar($_POST['txtpwdnueva']);
				if(($usu->actualizarPWD())>0){
					$mensaje = "La contraseña se actualizo correctamente";
					$ir_a = "../login/cerrarsesion.php?sSs=".$idsession;
				}
			}
		}
	}else{
		if($_POST['txtpwdnueva']!=$_POST['txtpwdrepetir']){
			$err=true;
		}
		if($err == true){
			$mensaje = "Las contraseñas no coinciden";
			$ir_a = 'cambiarSoloPWDInicial.php?sSs='.$idsession.'&idusuario='.$_GET['idusuario'];
		} else {
			$usu = new clsUsuario();
			$usu->idusuario = $_GET['idusuario'];
			$usu->pwd = encriptar($_POST['txtpwdnueva']);
			if(($usu->actualizarPWD())>0){
				$mensaje = "La contraseña se actualizo correctamente";
				$ir_a = "../login/cerrarsesion.php?sSs=".$idsession;
			}
		}
	}
?>

		<div align="center" class="Separador">
			<br>
			<br>
			<h1>Cambiar Contraseña</h1>
			<label><?php echo $mensaje?></label>
			<br>
			<br>
			<a style="text-decoration: none;" href="<?php echo $ir_a?>">
				<input class="botonVerde botonGrilla" type="button" value="Regresar">
			</a>
		</div>
	</body>
</html>
