<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
	include('../encapie/encabezado.php');
	include('clsturnosxcurso.php');
	include('../usuarioxcurso/clsusuariosxcurso.php');
	include('../curso/clscurso.php');
	include("../turno/clsturno.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Grilla de turnos y cursos</title>
	</head>
		<body>
			<div align="center">
				<br>
				<br>
				<h1>Grilla de turnos</h1>
				<a href="formuturnoxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=1">
					<input type="button" value="ingresar un turno">
				</a>
				<br>
				<br>
				<form action="grillaturnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>" method="post">
					<label>Seleccione turno a buscar</label>
					<select name="cmbturno">
						<?php
							$turno = new clsTurno();
							$regturnos=$turno->getTodosLosTurnos();
							while($cadaTurno=mysqli_fetch_array($regturnos, MYSQLI_ASSOC))
							{
								echo "<option value=".$cadaTurno['idturno'].">" . $cadaTurno['nombreturno']."</option>";
							}
						?>
					</select>
					<input type="submit" value="Buscar" name="btnbuscarxturno">
				</form>
				<br>
				<br>
				<form action="grillaturnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>" method="post">
					<label>Seleccione curso a buscar</label>
					<select name="cmbcurso">

						<?php
							if($_SESSION['idperfil'] == 2)
							{
								$cursos = new clsCurso();
								$regcursos = $cursos->getTodosLosCursos();
								while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
								{
									echo "<option value=".$cadaCurso['idcurso'].">" . $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
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
					<input type="submit" value="Buscar" name="btnbuscarxcurso">
				</form>
				<br>
				<a href="grillaturnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>">
					<input type="button" value="Mostrar todos cursos y los turnos">
				</a>
				<br>
				<br>
				<table border="1" width="350px" class="tftable">
					<tr>
						<td class="tfencabezado">Curso</td>
						<td class="tfencabezado">Division</td>
						<td class="tfencabezado">Turno</td>
						<td class="tfencabezado">Opciones</td>
					</tr>
					<?php
					if(isset($_POST["btnbuscarxturno"]))
					{
						$turnoabuscar = $_POST['cmbturno'];
						$turno = new clsturnosxcurso();
						$turno->idturno = $turnoabuscar;
						$datosdeloscursos = $turno->buscarxturno();
						mostrartodosloscursos($datosdeloscursos);
					}else
						if(isset($_POST["btnbuscarxcurso"]))
						{
							$cursoabuscar = $_POST['cmbcurso'];
							$turno = new clsturnosxcurso();
							$turno->idcurso = $cursoabuscar;
							$datosdeloscursos = $turno->buscarxcurso();
							mostrartodosloscursos($datosdeloscursos);
						}else
						{
							$turno = new clsturnosxcurso();
							$datosTodosLosCursos = $turno->gettodoslosturnosxcurso();
							mostrartodosloscursos($datosTodosLosCursos);	
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
					<td><?php echo $cadaRegistro['anio'] ?></td>
					<td><?php echo $cadaRegistro['division'] ?></td>
					<td><?php echo $cadaRegistro['nombreturno'] ?></td>
					<td colspan="2">
						<a href="formuturnoxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=2&idcurso=<?php echo $cadaRegistro['idcurso'] ?>&idturno=<?php echo $cadaRegistro['idturno'] ?>">
							<button class="botonAzul">Editar</button>
						</a>
						<a href="mensaturnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=3&idcurso=<?php echo $cadaRegistro['idcurso'] ?>&idturno=<?php echo $cadaRegistro['idturno'] ?>">
							<input type="button" value="Borrar" class="botonRojo">
						</a>
					</td>
				</tr>
			<?php
		}
	}
?>