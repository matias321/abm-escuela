<?php
	require_once("../funcionesgenerales/ValidarLogeo.php");
	include('../usuario/clsusuario.php');
	if(isset($_GET['oper'])){
		$error = false;
		$operacion = $_GET['oper'];
		$usuario = new clsUsuario();
		switch($_GET['oper']){
			case 1://idusuario
				if(strtoupper($_POST['idviejotxt'])!= $_SESSION['usuario']){
					$mensaje ="El id ingresado no coincide con el id actual";
					$error = true;
				}else{
					$usuario->idusuario = $_SESSION['usuario'];
					$usuario->idnuevo = $_POST['idnuevotxt'];
					if($usuario->actualizarIDusuario() > 0){
						$mensaje = "El ID usuario se ha actualizado correctamente";
					}
				}
				break;
			case 2://nombre
				if($_POST['nuevonombretxt'] != $_POST['repetirnuevonombretxt']){
					$mensaje = "Los nombres ingresados no coinciden";
					$error = true;
				}else{
					$usuario->idusuario = $_SESSION['usuario'];
					$usuario->nombre = strtoupper($_POST['nuevonombretxt']);
					if($usuario->actualizarNombre() > 0){
						$mensaje = "El nombre se ha actualizado correctamente";
					}
				}
				break;
			case 3://apellido
				if($_POST['nuevoapellidotxt'] != $_POST['repetirnuevoapellidotxt']){
					$mensaje = "Los apellidos ingresados no coinciden";
					$error = true;
				}else{
					$usuario->idusuario = $_SESSION['usuario'];
					$usuario->apellido = strtoupper($_POST['nuevoapellidotxt']);
					if($usuario->actualizarapellido() > 0){
						$mensaje = "El apellido se ha actualizado correctamente";
					}
				}
				break;
		}
	}else{
		header("location:CPerfil.php");
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Cambiar contraseña</title>
	</head>
	<body>
		<link rel="stylesheet" href="../css/eest1pinamar.css" type="text/css" charset="utf-8" />
			<div width="100%">
				<img src="../Imagenes/postaslider1.jpg" alt="" width="100%">
			</div>
			<div class="navbar" style="width: 100%">
				<a href="#"></a>
			</div>
		<div align="center" class="Separador">
			<br>
			<br>
			<label><?php echo $mensaje?></label>
			<br>
			<?php
				if(!$error == true){
				?>
					<a href="../login/cerrarsesion.php">
						<input type="button" value="Confirmar">
					</a>
				<?php
				}else{
				?>
					<a href="CPerfil.php">
						<input type="button" value="Confirmar">
					</a>
				<?php
				}
			?>
			
		</div>
	</body>
</html>