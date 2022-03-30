<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
	include('../encapie/encabezado.php');
	include("../encriptar/encriptar.php");
	include("clsUsuario.php");

$usuario = new clsUsuario();

$operacion = $_GET['oper'];

switch($operacion){
	case 1:
		// Alta
		$usuario->apellido = $_POST['txtapellido'];
		$usuario->nombre = $_POST['txtnombre'];
		$usuario->pwd = encriptar($_POST['txtpwd']);
		$usuario->idperfil = $_POST['cmbperfil'];
		$usuario->idusuario = $_POST['txtidusuario'];
		$boolean = false;
		
		$todoslosUsuarios = $usuario->getTodosLosUsuarios();
		while($cadausuario=mysqli_fetch_array($todoslosUsuarios, MYSQLI_ASSOC)){
			if($cadausuario['idusuario'] == $usuario->idusuario){
				$mensaje = "El ID del ususario ya esta en uso";
				$boolean = true;
			}
		}
		if(!$boolean == true){
			if ($usuario->insertar() > 0) {
				$mensaje = "Se incorporó correctamente el usuario";
			}	 
		}
		
		break;
	case 2:
		//ACTUALIZACION
		$usuario->apellido = $_POST['txtapellido'];
		$usuario->nombre = $_POST['txtnombre'];
		$usuario->pwd = encriptar($_POST['txtpwd']);
		$usuario->idperfil = $_POST['cmbperfil'];
		$usuario->idusuario = $_POST['txtidusuario'];
		if ($usuario->actualizar() > 0) {
			$mensaje = "Se actualizó correctamente el usuario";
		}
		break;
	case 222:
		// Restablecer contraseña
		$usuario->pwd = "1234";
		$usuario->idusuario = $_GET['idusuario'];
		if ($usuario->actualizarPWD() > 0) {
			$mensaje = "Se restablecio la contraseña del usuario";
		}
		break;
	case 3:
		// BAJA
		$usuario->idusuario = $_GET['idusuario'];

		if ($usuario->borrar() > 0) {
			$mensaje = "Se eliminó correctamente el usuario";
		}
		break;
}	
?>
		<div align="center" class="Separador">
			<br>
			<br>
			<h1>Administracion de usuarios</h1>
			<label><?php echo $mensaje?></label>
			<br>
			<br>
			<a style="text-decoration: none;" href="grillausuario.php?sSs=<?php echo $_GET['sSs'];?>">
				<input class="botonVerde botonGrilla" type="button" value="Regresar">
			</a>
		</div>
	</body>
</html>