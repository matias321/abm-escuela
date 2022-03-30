<?php
	include('../encapie/encabezado.php');
	include('../alumnosxmaterias/clsalumnoxmateria.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>materias por alumno</title>
	</head>
		<body>
			<div align="center">
				<br>
				<br>
				<h1>Grilla de materias por alumno</h1>
				<a href="../index/Index.php">
					<input type="button" value="Regresar">
				</a>
				<a href="formualumnoxmateria.php?oper=1">
					<input type="button" value="Agregar materia a un alumno">
				</a>
				<br>
				<br>
				<form action="grillaalumnoxmateria.php" method="post">
					<label>Ingresar nombre del alumno</label>
					<input type="search" name="buscarxnombrealumnotxt" placeholder="Nombre alumno" required>
					<input type="submit" value="Buscar" name="btnbuscarxnombrealumno">
				</form>
				<br>
				<br>
				<form action="grillaalumnoxmateria.php" method="post">
					<label>Ingresar apellido del alumno</label>
					<input type="search" name="buscarxapellidoalumnotxt" placeholder="Apellido alumno" required>
					<input type="submit" value="Buscar" name="btnbuscarxapellidoalumno">
				</form>
				<br>
				<br>
				<form action="grillaalumnoxmateria.php" method="post">
					<label>Ingresar nombre de la materia</label>
					<input type="search" name="buscarxnombremateriatxt" placeholder="Nombre de la materia" required>
					<input type="submit" value="Buscar" name="btnbuscarxnombremateria">
				</form>
				<br>
				<br>
				<a href="grillaalumnoxmateria.php">
					<input type="button" value="Mostrar todos los alumnos">
				</a>
				<br>
				<br>
				<table border="1" class="tftable">
					<tr>
						<td class="tfencabezado">Nombre</td>
						<td class="tfencabezado">Apellido</td>
						<td class="tfencabezado">Materia</td>
						<td class="tfencabezado">Curso</td>
						<td class="tfencabezado">Division</td>
						<td class="tfencabezado">Grupo</td>
						<td class="tfencabezado">Opciones</td>
					</tr>
					<?php
					$materiasxalumno = new clsalumnoxmateria();
					if(isset($_POST["btnbuscarxnombrealumno"]))
					{
						$nombreabuscar = $_POST['buscarxnombrealumnotxt'];
						$materiasxalumno->nombrealumno = $nombreabuscar;
						$datosdeloscursos = $materiasxalumno->buscarmateriasxnombredelalumno();
						mostrartodosloscursos($datosdeloscursos);
					}else
						if(isset($_POST["btnbuscarxapellidoalumno"]))
						{
							$apellidoabuscar = $_POST['buscarxapellidoalumnotxt'];
							$materiasxalumno->apellidoalumno = $apellidoabuscar;
							$datosdeloscursos = $materiasxalumno->buscarmateriasxapellidodelalumno();
							mostrartodosloscursos($datosdeloscursos);
						}else
							if(isset($_POST["btnbuscarxnombremateria"]))
							{
								$nombremateriabuscar = $_POST['buscarxnombremateriatxt'];
								$materiasxalumno->nombremateria = $nombremateriabuscar;
								$datosdeloscursos = $materiasxalumno->buscarmateriasxnombredelamateria();
								mostrartodosloscursos($datosdeloscursos);
							}else
								{
									$datosdelosalumnos = $materiasxalumno->gettodaslasmateriasdetodoslosalumnos();
									mostrartodosloscursos($datosdelosalumnos);	
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
					<td><?php echo $cadaRegistro['nombre'] ?></td>
					<td><?php echo $cadaRegistro['apellido'] ?></td>
					<td><?php echo $cadaRegistro['nombremateria'] ?></td>
					<td><?php echo $cadaRegistro['anio'] ?></td>
					<td><?php echo $cadaRegistro['division'] ?></td>
					<td><?php echo $cadaRegistro['nrogrupo'] ?></td>
					<td colspan="2">
						<!--<a href="formunotas.php?oper=2&idalumno=<?php echo $cadaRegistro['idalumno'] ?>">
							<button class="botonAzul">Editar</button>
						</a>-->
						<a href="mensaalumnoxmateria.php?oper=3&idalumno=<?php echo $cadaRegistro['idalumno']?>&idmateria= <?php echo $cadaRegistro['id_materia']?>">
							<input type="button" value="Borrar" class="botonRojo">
						</a>
					</td>
				</tr>
			<?php
		}
	}
?>