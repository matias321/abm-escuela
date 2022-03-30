<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
	include('../encapie/encabezado.php');
	include("clsUsuario.php");
	include('../encriptar/encriptar.php');
	$operacion = $_GET['oper'];

	$usuario = new clsUsuario();

		if ($operacion == 1) {
			$Titulo = "Agregar nuevo usuario";
			$valorbtn = "Agregar";
			$apellido = "";
			$nombre = "";
			$pwd = "";
			$idperfil = "";
			$idusuario = "";
		} else {
			$valorbtn = "Guardar";
			$Titulo = "Actualizar datos de un usuario";
			$idusuario = $_GET['idusuario'];
			$usuario->idusuario = $idusuario;
			$registrodedatos = $usuario->getUnUsuario();
			if ($vectordato = mysqli_fetch_array( $registrodedatos, MYSQLI_ASSOC)) {
				$apellido = $vectordato['apellido'];
				$nombre = $vectordato['nombre'];
				$pwd = $vectordato['pwd'];
				$idperfil = $vectordato['idperfil'];
			}
		}
?>
<br>

<div class="Separador" align="center">
	<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Usuarios</label></div>

	<form name="form1" action="mensausuario.php?sSs=<?php echo $_GET['sSs'];?>&oper=<?php echo $operacion?>" method="post">
		<h2><?php echo $Titulo?></h2>
		<div class="Contenedor">
			<div class="input-contenedor">
				<label>ID del usuario</label>
				<input class="textBox" required name="txtidusuario" type="text" 
				   value= "<?php echo $idusuario ?>" placeholder="ID de usuario" />
			</div>
			<div class="input-contenedor" style="position: relative; top:10px;">
				<label>Nombre del usuario</label>
				<input class="textBox" required name="txtnombre" type="text" placeholder="Ingresar Nombre"
				   value="<?php echo $nombre ?>" maxlength="20" />
			</div>
			<div class="input-contenedor" style="position: relative; top:20px;">
				<label>Apellido del usuario</label>
				<input class="textBox" required name="txtapellido" type="text" placeholder="Ingresar Apellido"
					   value="<?php echo $apellido ?>" maxlength="20" />
			</div>
			<div class="input-contenedor" style="position: relative; top:30px;">
				<label>Contraseña del usuario</label>
				<input class="textBox" required id="txtPassword" name="txtpwd" type="password" 
					   placeholder="Ingresar Contraseña" value="<?php echo $pwd ?>" maxlength="12" />
				<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()">
					<img src="../Imagenes/NuevasImagenes/ver_peque.png">
				</button>
			</div>
			<br>
			<div class="input-contenedor" style="position: relative; top:20px;">
				<label for="cmbperfil">Perfiles</label>
				<select class="textBox" id="cmbperfil" name="cmbperfil" required>
					<option selected disabled>Seleccione un perfil</option>
					<?php
						$perfil = new clsPerfil();
						$regperfiles=$perfil->getTodosLosPerfiles();
						while($cadaPerfil=mysqli_fetch_array($regperfiles, MYSQLI_ASSOC))
						{
							if($cadaPerfil['idperfil'] == $idperfil)
							{
								echo "<option value=".$cadaPerfil['idperfil']." selected>".$cadaPerfil['nombreperfil']."</option>";
							} else {
								echo "<option value=".$cadaPerfil['idperfil'].">".$cadaPerfil['nombreperfil']."</option>";
							}
						}
					?>
				</select>
			</div>
			<br>
			<div align="center" style="position: relative; top:15px;">
				<input class="botonAzulOscuro botonGrilla" type="submit" value="<?php echo $valorbtn ?>" />
				<a style="text-decoration: none;" href="grillausuario.php?sSs=<?php echo $_GET['sSs'];?>">
					<input class="botonVerde botonGrilla" type="button" value="Cancelar" class="Boton" />
				</a>
			</div>
		</div>
	</form>
<script type="text/javascript">
	function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
		}else{
			cambio.type = "password";
		}
	} 
</script>
</html>