<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
include("clsUsuario.php");
?>
	<div class="Separador">
			<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Usuarios</label></div>
			<br>
			<div align="center">
				<a style="text-decoration: none;" href="formuusuario.php?sSs=<?php echo $_GET['sSs'];?>&oper=1">
					<button class="botonAzulOscuro botonGrilla">Agregar</button>
				</a>
				<a style="text-decoration: none;" href="../index/Index.php">
					<button class="botonVerde botonGrilla">Regresar</button>
				</a>
				<br>
				<br>
				<form action="grillausuario.php?sSs=<?php echo $_GET['sSs'];?>" method="post">
					<label>Ingresar nombre</label>
					<input class="textBox" type="search" name="buscarxnombreusuariotxt" required placeholder="Nombre de usuario">
					<input class="botonGris botonGrilla" type="submit" name="btnbuscarxnombre" value="Buscar">
				</form>
				<br>
				<form action="grillausuario.php?sSs=<?php echo $_GET['sSs'];?>" method="post">
					<label>Ingresar apellido</label>
					<input class="textBox" type="search" name="buscarxapellidotxt" required placeholder="apellido de usuario">
					<input class="botonGris botonGrilla" type="submit" name="btnbuscarxapellido" value="Buscar">
				</form>
				<br>
				<form action="grillausuario.php?sSs=<?php echo $_GET['sSs'];?>" method="post">
					<label>Seleccione un perfil</label>
					<select class="textBox" id="cmbperfil" name="cmbperfil" required>
						<option disabled>Seleccione un perfil</option>
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
					<input class="botonGris botonGrilla" type="submit" name="btnbuscarxperfil" value="Buscar">
				</form>
				<br>
				<form action="grillausuario.php?sSs=<?php echo $_GET['sSs'];?>" method="post">
					<label>Ingresar apellido</label>
					<input class="textBox" type="text" name="buscarxapellidotxt" required placeholder="apellido de usuario">
					&nbsp;&nbsp;&nbsp;
					<label>Ingresar nombre</label>
					<input class="textBox" type="text" name="buscarxnombreusuariotxt" required placeholder="Nombre de usuario">
					&nbsp;&nbsp;&nbsp;
					<label>Seleccione un perfil</label>
					<select class="textBox" id="cmbperfil" name="cmbperfil" required>
						<option disabled >Seleccione un perfil</option>
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
					<input class="botonGris botonGrilla" type="submit" name="btnbuscarusuarioespecifico" value="Buscar">
				</form>
				<br>
				<a href="grillausuario.php?sSs=<?php echo $_GET['sSs'];?>">
					<input class="botonVerde botonGrilla" type="button" value="Mostrar todos los usuarios">
				</a>
			</div>
			<div align="center" style="position: relative; top:25px;">
				<table border="1" class="tftable" width="80%">
					<!-- CABECERA -->
					<tr>
						<th class="tfencabezado" align="center">ID USUARIO</th>
						<th class="tfencabezado" align="center">APELLIDO</th>
						<th class="tfencabezado" align="center">NOMBRE</th>
						<th class="tfencabezado" align="center">CONTRASEÑA</th>
						<th class="tfencabezado" align="center">PERFIL</th>
						<th class="tfencabezado" align="center" style="text-align: center;">ACCIONES</th>
					</tr>
					<!-- FIN CABECERA -->
					<!-- DETALLE -->
					<?php
					$usuario = new clsUsuario();
					if(isset($_POST['btnbuscarxnombre']))
					{
						$nombreabuscar = $_POST['buscarxnombreusuariotxt'];
						$usuario->nombre = $nombreabuscar;
						$datosTodosLosUsuarios = $usuario->buscarxnombredelusuario();
						mostrartodoslosusuarios($datosTodosLosUsuarios);
					}else
						if(isset($_POST['btnbuscarxapellido']))
						{
							$apellidoabuscar = $_POST['buscarxapellidotxt'];
							$usuario->apellido = $apellidoabuscar;
							$datosTodosLosUsuarios = $usuario->buscarxapellidodelusuario();
							mostrartodoslosusuarios($datosTodosLosUsuarios);
						}else
							if(isset($_POST['btnbuscarxperfil']))
							{
								$perfilabuscar = $_POST['cmbperfil'];
								$usuario->idperfil = $perfilabuscar;
								$datosTodosLosUsuarios = $usuario->buscarxperfildelusuario();
								mostrartodoslosusuarios($datosTodosLosUsuarios);
							}else
								if(isset($_POST['btnbuscarusuarioespecifico']))
								{
									$perfilabuscar = $_POST['cmbperfil'];
									$nombreusuariotxt = $_POST['buscarxnombreusuariotxt'];
									$apellidousuariotxt = $_POST['buscarxapellidotxt'];
									$usuario->idperfil = $perfilabuscar;
									$usuario->nombre = $nombreusuariotxt;
									$usuario->apellido = $apellidousuariotxt;
									$datosTodosLosUsuarios = $usuario->buscarusuarioespecifico();
									mostrartodoslosusuarios($datosTodosLosUsuarios);
								}else{
									$usuario = new clsUsuario();
									$datosTodosLosUsuarios = $usuario->getTodosLosUsuarios();
									mostrartodoslosusuarios($datosTodosLosUsuarios);
								}
					?>
					<!-- FIN DETALLE -->
				</table>
			</div>
		</body>
	</div>
</html>
<?php
	function mostrartodoslosusuarios($datos)
	{
		while($cadaRegistro=mysqli_fetch_array($datos, MYSQLI_ASSOC))
		{
			?>
				<tr>
					<td><?php echo $cadaRegistro['idusuario'] ?></td>
					<td><?php echo $cadaRegistro['apellido'] ?></td>
					<td><?php echo $cadaRegistro['nombre'] ?></td>
					<td><?php echo $cadaRegistro['pwd'] ?></td>
					<td><?php echo $cadaRegistro['nombreperfil'] ?></td>
					<td colspan="2">
						<a style="text-decoration: none;" href="formuusuario.php?sSs=<?php echo $_GET['sSs'];?>&oper=2&idusuario=<?php echo $cadaRegistro['idusuario'] ?>">
							<input class="botonAzul botonGrilla" type="button" value="Editar">
						</a>
						<a style="text-decoration: none;" href="mensausuario.php?sSs=<?php echo $_GET['sSs'];?>&oper=3&idusuario=<?php echo $cadaRegistro['idusuario'] ?>">
							<input class="botonRojo botonGrilla" type="button" value="Borrar">
						</a>
						<a style="text-decoration: none;" href="mensausuario.php?sSs=<?php echo $_GET['sSs'];?>&oper=222&idusuario=<?php echo $cadaRegistro['idusuario'] ?>">
							<input class="botonGris botonGrilla" type="button" value="Restablecer Contraseña">
						</a>
					</td>
				</tr>
			<?php
		}	
	}
?>
