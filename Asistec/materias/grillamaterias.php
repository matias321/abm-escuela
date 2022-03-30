<?php
	include('../encapie/encabezado.php');
	include('../materias/clsmaterias.php');
	include('../curso/clscurso.php');
	include('../usuarioxcurso/clsusuariosxcurso.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Grilla de materias</title>
	</head>
		<body>
			<div align="center">
				<br>
				<br>
				<h1>Grilla de materias</h1>
				<a href="formumateria.php?oper=1">
					<input type="button" value="Ingresar nueva materia">
				</a>
				<br>
				<br>
				<form action="grillamaterias.php" method="post">
					<label>Ingresar nombre de la materia</label>
					<input type="search" name="buscarxnombremateriatxt" placeholder="Nombre de la materia" required>
					<input type="submit" value="Buscar" name="btnbuscarxmateria">
				</form>
				<br>
				<br>
				<form action="grillamaterias.php" method="post">
					<label>Seleccione curso a buscar</label>
					<select name="cmbcurso">
						<?php
							if($_SESSION['idperfil'] == 2)
							{
								$cursos = new clsCurso();
								$regcursos = $cursos->getTodosLosCursos();
								while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
								{
									echo "<option value=".$cadaCurso['idcurso'].">".$cadaCurso['aniolectivo']." / ". $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
								}
							}else
							{
								$usuarioxcurso = new clsUsuariosxcurso();
								$usuarioxcurso->idusuario = $_SESSION['usuario'];
								$regcursos = $usuarioxcurso->getTodosLosCursosxUsuario();
								while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
								{
									echo "<option value=".$cadaCurso['idcur'].">" . $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
								}
							}
							
						?>
					</select>
					<input type="submit" value="Buscar" name="btnbuscarxanio">
				</form>
				<br>
				<br>
				<form action="grillamaterias.php" method="post">
					<label>Ingresar division a buscar</label>
					<input type="search" name="buscarxdivisiontxt" placeholder="Division del cuso" required>
					<input type="submit" value="Buscar" name="btnbuscarxdivision">
				</form>
				<br>
				<br>
				<a href="grillamaterias.php">
					<input type="button" value="Mostrar todas las materias">
				</a>
				<br>
				<br>
				<table border="1" class="tftable">
					<tr>
						<td class="tfencabezado">Nombre materia</td>
						<td class="tfencabezado">Curso</td>
						<td class="tfencabezado">Division</td>
						<td class="tfencabezado">Grupo</td>
						<td class="tfencabezado">Opciones</td>
					</tr>
					<?php
					if(isset($_POST["btnbuscarxmateria"]))
					{
						$nombremateriaabuscar = $_POST['buscarxnombremateriatxt'];
						$materia = new clsmaterias();
						$materia->nombremateria = $nombremateriaabuscar;
						$datosdelamateria = $materia->buscarxnombredemateria();
						mostrartodosloscursos($datosdelamateria);
					}else
						if(isset($_POST["btnbuscarxanio"]))
						{
							$anioabuscar = $_POST['cmbcurso'];
							$materia = new clsmaterias();
							$materia->cursomateria = $anioabuscar;
							$datosdelamateria = $materia->buscarxmateriasxcurso();
							mostrartodosloscursos($datosdelamateria);
						}else
							if(isset($_POST['btnbuscarxdivision']))
							{
								$divisionabuscar = $_POST['buscarxdivisiontxt'];
								$materia = new clsmaterias();
								$materia->division = $divisionabuscar;
								$datosdelamateria = $materia->buscarmeteriasxdivision();
								mostrartodosloscursos($datosdelamateria);
							}else
								{
									$materias = new clsmaterias();
									$datosdelasmaterias = $materias->gettodaslasmaterias();
									mostrartodosloscursos($datosdelasmaterias);	
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
					<td colspan="2">
						<a href="formumateria.php?oper=2&idmateria=<?php echo $cadaRegistro['id_materia'] ?>&idcurso=<?php echo $cadaRegistro['idcurso']?>&nombremateria=<?php echo $cadaRegistro['nombremateria']?>">
							<button class="botonAzul">Editar</button>
						</a>
						<a href="mensamaterias.php?oper=3&idmateria=<?php echo $cadaRegistro['id_materia'] ?>">
							<input type="button" value="Borrar" class="botonRojo">
						</a>
					</td>
				</tr>
			<?php
		}
	}
?>