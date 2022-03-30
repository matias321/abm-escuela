<?php
	include('../encapie/encabezado.php');
	include('clsusuariosxmateria.php');
	include('../curso/clscurso.php');
	include('../usuarioxcurso/clsusuariosxcurso.php');
	include("../usuario/clsusuario.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Grilla de materias por profesor</title>
	</head>
		<body>
			<div align="center">
				<br>
				<br>
				<h1>Grilla de materias por profesor</h1>
				<form action="formuusuariosxmateria.php?oper=1" method="post">
					<label>Seleccione el profesor </label>
					<select name="cmbusuario">
						<?php
							if($_SESSION['idperfil'] == 2)
							{

								$usuario = new clsUsuario();
								$regusuarios=$usuario->getTodosLosUsuarios();
								while($cadaUsuario=mysqli_fetch_array($regusuarios, MYSQLI_ASSOC))
								{
									if($cadaUsuario['idperfil'] == 4){
										echo "<option value=".$cadaUsuario['idusuario']." selected>".$cadaUsuario['apellido'].", ".$cadaUsuario['nombre']."</option>";
									}
									
								}
							}
							
						?>
					</select>
					<input type="submit" value="Agregar">
				</form>
				<br>
				<br>
				<form action="grillausuariosxmateria.php" method="post">
					<label>Ingresar nombre de la materia</label>
					<input type="search" name="buscarxnombremateriatxt" placeholder="Nombre de la materia" required>
					<input type="submit" value="Buscar" name="btnbuscarxmateria">
				</form>
				<br>
				<form action="grillausuariosxmateria.php" method="post">
					<label>Seleccione el profesor a buscar</label>
					<select name="cmbusuario">
						<?php
							if($_SESSION['idperfil'] == 2)
							{
								$usuario = new clsUsuario();
								$regusuarios=$usuario->getTodosLosUsuarios();
								
								while($cadaUsuario=mysqli_fetch_array($regusuarios, MYSQLI_ASSOC))
								{
									if($cadaUsuario['idperfil'] == 4){
										echo "<option value=".$cadaUsuario['idusuario']." selected>".$cadaUsuario['apellido'].", ".$cadaUsuario['nombre']."</option>";
									}
									
								}
							}
							
						?>
					</select>
					<input type="submit" value="Buscar" name="btnbuscarxusuario">
				</form>
				<br>
				<a href="grillausuariosxmateria.php">
					<input type="button" value="Mostrar todos los usuarios por materia">
				</a>
				<br>
				<br>
				<table border="1" class="tftable">
					<tr>
						<td class="tfencabezado">Nombre materia</td>
						<td class="tfencabezado">Curso</td>
						<td class="tfencabezado">Division</td>
						<td class="tfencabezado">Grupo</td>
						<td class="tfencabezado">Nombre</td>
						<td class="tfencabezado">Apellido</td>
						<td class="tfencabezado">Opciones</td>
					</tr>
					<?php
					if(isset($_POST["btnbuscarxusuario"]))
					{
						$usuarioabuscar = $_POST['cmbusuario'];
						$usuarioxmateria = new clsusuariosxmateria();
						$usuarioxmateria->idusuario = $usuarioabuscar;
						$datosdelamateria = $usuarioxmateria->buscarxusuario();
						mostrartodosloscursos($datosdelamateria);
					}else
						if(isset($_POST["btnbuscarxmateria"]))
						{
							$nombremateriaabuscar = $_POST['buscarxnombremateriatxt'];
							$usuarioxmateria = new clsusuariosxmateria();
							$usuarioxmateria->nombremateria = $nombremateriaabuscar;
							$datosdelamateria = $usuarioxmateria->buscarxnombremateria();
							mostrartodosloscursos($datosdelamateria);
						}else
							{
								$usuarioxmateria = new clsusuariosxmateria();
								$datosdeusuarioxmateria = $usuarioxmateria->gettodoslosusuariosxmateria();
								mostrartodosloscursos($datosdeusuarioxmateria);	
						 	}
					?>
				</table>
			</div>
		</body>
</html>
<?php
	function mostrartodosloscursos($datos){
		while($cadaRegistro=mysqli_fetch_array($datos, MYSQLI_ASSOC)){
			?>
				<tr>
					<td><?php echo $cadaRegistro['nombremateria'] ?></td>
					<td><?php echo $cadaRegistro['anio'] ?></td>
					<td><?php echo $cadaRegistro['division'] ?></td>
					<td><?php echo $cadaRegistro['nrogrupo'] ?></td>
					<td><?php echo $cadaRegistro['nombre'] ?></td>
					<td><?php echo $cadaRegistro['apellido'] ?></td>
					<td colspan="2">
						<!--<a href="formuusuariosxmateria.php?oper=2&idmateria=<?php echo $cadaRegistro['id_materia'] ?>&idcurso=<?php echo $cadaRegistro['idcurso']?>&nombremateria=<?php echo $cadaRegistro['nombremateria']?>&idusuario=<?php echo $cadaRegistro['idusuario']?>">
							<button class="botonAzul">Editar</button>
						</a>-->
						<a href="mensausuariosxmateria.php?oper=3&idmateria=<?php echo $cadaRegistro['id_materia'] ?>&idusuario=<?php echo $cadaRegistro['idusuario']?>">
							<input type="button" value="Borrar" class="botonRojo">
						</a>
					</td>
				</tr>
			<?php
		}
	}
?>