<?php
	include('../encapie/encabezado.php');
	include('../usuariosxmaterias/clsusuariosxmateria.php');
	include('../alumnos/clsalumno.php');
	include('../materias/clsmaterias.php');
	if($_SESSION['idperfil'] == 2 || $_SESSION['idperfil'] == 1){
		if(isset($_GET['oper']))
		{
			if($_GET['oper'] == 1)
			{
				?>
					<div align="center">
						<br>
						<br>
						<h1>Fomulario para ingresar notas de un alumno</h1>
						<form action="mensaalumnoxmateria.php?oper=1" method="post">
							<br>
							<label>Seleccione una materia</label>
							<select name="cmbmateria" required>
								<option disabled>Seleccione una materia</option>
								<?php
									$materia = new clsmaterias();
									$todaslasmateriasexistentes = $materia->gettodaslasmaterias();
									while($cadamateria=mysqli_fetch_array($todaslasmateriasexistentes, MYSQLI_ASSOC))
									{
										echo "<option value=".$cadamateria['id_materia'].">" .$cadamateria['aniolectivo'] ." / ".$cadamateria['anio']." º ".$cadamateria['division']." / ".$cadamateria['nrogrupo']." / ". $cadamateria['nombremateria']."</option>";
									}
								?>
							</select>
							<br>
							<br>
							<label>Seleccione un alumno</label>
							<select name="cmbalumno" required>
								<option disabled>Seleccione un alumno</option>
								<?php
									$alumno = new clsAlumno();
									$todoslosalumnosexistentes = $alumno->gettodoslosalumnosconelcurso();
									while($cadaalumno=mysqli_fetch_array($todoslosalumnosexistentes, MYSQLI_ASSOC))
									{
										echo "<option value=".$cadaalumno['idalumno'].">".$cadaalumno['aniolectivo'] ." / ".$cadaalumno['anio']." º ".$cadaalumno['division']." / ".$cadaalumno['nrogrupo']." / ". $cadaalumno['apellido']." ".$cadaalumno['nombre']."</option>";
									}
								?>
							</select>
							<br>
							<br>
							<a href="grillaalumnoxmateria.php">
								<input type="button" value="Regresar">
							</a>
							<input type="submit" value="Confirmar">
						</form>
					</div>
				<?php
			}
		}
	}else{
		header('location:../index/Index.php');
	}
	
?>