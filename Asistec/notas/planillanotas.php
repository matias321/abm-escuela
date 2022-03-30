<?php
	include('../encapie/encabezado.php');
	include('../notas/clsnotas.php');
	include('../alumnos/clsalumno.php');
	if(!$_SESSION['usuario'] == 4)
	{
		header('location: ../index/index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Planilla de notas</title>
	</head>
		<body>
			<div align="center">
				<br>
				<br>
				<h1>Planilla de notas de los alumnos</h1>
				<a href="formunotas.php?oper=1">
					<input type="button" value="Ingresar nuevas notas">
				</a>
				<br>
				<br>
				<form action="planillanotas.php" method="post">
					<label>Ingresar nombre del alumno</label>
					<input type="search" name="buscarxnombrealumnotxt" placeholder="Nombre alumno" required>
					<input type="submit" value="Buscar" name="btnbuscarxnombrealumno">
				</form>
				<br>
				<br>
				<form action="planillanotas.php" method="post">
					<label>Ingresar apellido del alumno</label>
					<input type="search" name="buscarxapellidoalumnotxt" placeholder="Apellido alumno" required>
					<input type="submit" value="Buscar" name="btnbuscarxapellidoalumno">
				</form>
				<br>
				<br>
				<a href="planillanotas.php">
					<input type="button" value="Mostrar todas las notas">
				</a>
				<br>
				<br>
				<table border="1" ><!--class="tftable"-->
					<tr>
						<td>Materia</td><!--class="tfencabezado"-->
						<td>Curso</td>
						<td>Division</td>
						<td>Nombre alumno</td>
						<td>Apellido alumno</td>
						<td>Primer trimestre</td>
						<td>Segundo trimestre</td>
						<td>Tercer trimestre</td>
						<td>Promedio</td>
						<td>Opciones</td>
					</tr>
					<?php
					$notas = new clsnotas();
					if(isset($_POST["btnbuscarxnombrealumno"]))
					{
						$nombreabuscar = $_POST['buscarxnombrealumnotxt'];
						$notas->nombrealumno = $nombreabuscar;
						$datosdeloscursos = $notas->buscarnotasxnombredelalumno();
						mostrartodosloscursos($datosdeloscursos);
					}else
						if(isset($_POST["btnbuscarxapellidoalumno"]))
						{
							$apellidoabuscar = $_POST['buscarxapellidoalumnotxt'];
							$notas->apellidoalumno = $apellidoabuscar;
							$datosdeloscursos = $notas->buscarnotasxapellidodelalumno();
							mostrartodosloscursos($datosdeloscursos);
						}else
						{
							$notas->idusuario = $_SESSION['usuario'];
							$datosTodosLosCursos = $notas->gettodaslasnotasdetodoslosalumnos();
							mostrartodosloscursos($datosTodosLosCursos);	
					 	}
					?>
				</table>
			</div>
		</body>
</html>
<?php
	function mostrartodosloscursos($datos){
			$alumno = new clsAlumno();
		while($cadaRegistro=mysqli_fetch_array($datos, MYSQLI_ASSOC)){
				$alumno->id = $cadaRegistro['idalumno'];
				$datosalumno = $alumno->getUnAlumno();
				$cadaregistroalumno=mysqli_fetch_array($datosalumno, MYSQLI_ASSOC)
			?>
				<tr>
					<td><?php echo $cadaRegistro['nombremateria'] ?></td>
					<td><?php echo $cadaRegistro['anio'] ?></td>
					<td><?php echo $cadaRegistro['division'] ?></td>
					<td><?php echo $cadaregistroalumno['nombre'] ?></td>
					<td><?php echo $cadaregistroalumno['apellido'] ?></td>
					<?php
						if($cadaRegistro['nota1ertrimestre'] == 0)
						{
							?>
								<td>Sin calificar</td>
							<?php	
						}else
						{
							?>
								<td><?php echo $cadaRegistro['nota1ertrimestre'] ?></td>
							<?php
						}
						if($cadaRegistro['nota2ertrimestre'] == 0)
						{
							?>
								<td>Sin calificar</td>
							<?php	
						}else
						{
							?>
								<td><?php echo $cadaRegistro['nota2ertrimestre'] ?></td>
							<?php
						}
						if($cadaRegistro['nota3ertrimestre'] == 0)
						{
							?>
								<td>Sin calificar</td>
							<?php	
						}else
						{
							?>
								<td><?php echo $cadaRegistro['nota3ertrimestre'] ?></td>
							<?php
						}
						if($cadaRegistro['promedio'] == 0)
						{
							?>
								<td>Sin calificar</td>
							<?php	
						}else
						{
							?>
								<td><?php echo $cadaRegistro['promedio'] ?></td>
							<?php
						}
					?>
					<td colspan="2">
						<a href="formunotas.php?oper=2&idalumno=<?php echo $cadaRegistro['idalumno']?>&idmateria=<?php echo $cadaRegistro['id_materia']?>&nota1=<?php echo $cadaRegistro['nota1ertrimestre']?>&nota2=<?php echo $cadaRegistro['nota2ertrimestre']?>&nota3=<?php echo $cadaRegistro['nota3ertrimestre']?>">
							<button class="botonAzul">Editar</button>
						</a>
						<a href="mensanotas.php?oper=3&idalumno=<?php echo $cadaRegistro['idalumno'] ?>&idmateria=<?php echo $cadaRegistro['id_materia']?>">
							<input type="button" value="Borrar" class="botonRojo">
						</a>
					</td>
				</tr>
			<?php
		}
	}
?>