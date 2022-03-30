<?php
include('../encapie/encabezado.php');
	include('../usuario/clsUsuario.php');
	$usuario = new clsUsuario();
	$idusuario = $_SESSION['usuario'];
	$usuario->idusuario = $idusuario;
	$registrodedatos = $usuario->getUnUsuario();
	if ($vectordato = mysqli_fetch_array( $registrodedatos, MYSQLI_ASSOC)) {
		$apellido = $vectordato['apellido'];
		$nombre = $vectordato['nombre'];
		$pwd = $vectordato['pwd'];
		$idperfil = $vectordato['idperfil'];
    }
?>
<div class="Separador">
			<div align="center" style="position: relative; top: 50px;">
				<h1>Configuracion de datos del usuario</h1>
				<div>
					<form method="post" action="validaridentificacion.php?oper=1">
						<label>Cambiar nombre de usuario</label>
						<input type="password" name="idusuariotxt" disabled value="<?php echo $usuario->idusuario ?>" placeholder="Ingresar nombre de Usuario">
						<input type="submit" value="Cambiar">
					</form>
				</div>
				<br>

				<div>
					<form method="post" action="validaridentificacion.php?oper=2">
						<label>Cambiar nombre</label>
						<input type="password" name="nombretxt" disabled value="<?php echo $nombre?>" placeholder="Ingresar nombre de Usuario">
						<input type="submit" value="Cambiar">
					</form>
				</div>
				<br>

				<div>
					<form method="post" action="validaridentificacion.php?oper=3">
						<label>Cambiar apellido</label>
						<input type="password" name="apellidotxt" disabled value="<?php echo $apellido ?>" placeholder="Ingresar nombre de Usuario">
						<input type="submit" value="Cambiar">
					</form>
				</div>
				<br>

				<div>
					<form method="post" action="validaridentificacion.php?oper=4">
						<label>Cambiar Contraseña</label>
						<input type="password" name="pwdtxt" disabled value="<?php echo $pwd ?>" placeholder="Ingresar nombre de Usuario">
						<input type="submit" value="Cambiar">
					</form>
					
				</div>
			</div>
		</div>
	</body>
</html>