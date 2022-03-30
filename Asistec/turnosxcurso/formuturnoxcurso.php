<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
	include('../encapie/encabezado.php');
	include('../usuarioxcurso/clsusuariosxcurso.php');
	include('../curso/clscurso.php');
	include("../turno/clsturno.php");
	if(isset($_GET['oper']))
	{
		if($_GET['oper'] == 1)
		{
			$operacion = $_GET['oper'];
			?>
				<div align="center">
					<br>
					<br>
					<h1>Fomulario para ingresar un turno a un curso</h1>
					<form action="mensaturnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=<?php echo $operacion?>" method="post">
						<label>Seleccione la el curso</label>
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
										echo "<option value=".$cadaCurso['idcur'].">".$cadaCurso['aniolectivo']." / ". $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
									}
								}
							?>
						</select>
						<br>
						<br>
						<label>Seleccione el turno</label>
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
						<br>
						<br>
						<a href="grillaturnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>">
							<input type="button" value="Regresar">
						</a>
						<input type="submit" value="Ingresar">
					</form>
				</div>
			<?php
		}else
		{
			$operacion = $_GET['oper'];
			?>
				<div align="center">
					<br>
					<br>
					<h1>Fomulario para actualizar un turno a un curso</h1>
					<form action="mensaturnosxcurso.php?oper=<?php echo $operacion?>" method="post">
						<label>Seleccione la el curso</label>
						<select name="cmbcurso">
							<?php								
								if($_SESSION['idperfil'] == 2)
								{
									$cursoseleccionado = $_GET['idcurso'];
									$cursos = new clsCurso();
									$regcursos = $cursos->getTodosLosCursos();
									while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
									{
										if($cursoseleccionado == $cadaCurso['idcurso'])
										{
											echo "<option value=".$cadaCurso['idcurso']." selected>".$cadaCurso['aniolectivo']." / " . $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
										}else
										{
											echo "<option value=".$cadaCurso['idcurso'].">".$cadaCurso['aniolectivo']." / " . $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
										}
									}
								}else
								{
									$cursoseleccionado = $_GET['idcurso'];
									$usuarioxcurso = new clsUsuariosxcurso();
									$usuarioxcurso->idusuario = $_SESSION['usuario'];
									$regcursos = $usuarioxcurso->getTodosLosCursosxUsuario();
									while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
									{
										if($cursoseleccionado == $cadaCurso['idcur'])
										{
											echo "<option value=".$cadaCurso['idcur']." selected>".$cadaCurso['aniolectivo']." / " . $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
										}else
										{
											echo "<option value=".$cadaCurso['idcur'].">".$cadaCurso['aniolectivo']." / " . $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
										}
									}
								}
							?>
						</select>
						<br>
						<br>
						<label>Seleccione el turno</label>
						<select name="cmbturno">
							<?php
								$turnoseleccionado = $_GET['idturno'];
								$turno = new clsTurno();
								$regturnos=$turno->getTodosLosTurnos();
								while($cadaTurno=mysqli_fetch_array($regturnos, MYSQLI_ASSOC))
								{
									if($turnoseleccionado == $cadaTurno['idturno'])
									{
										echo "<option value=".$cadaTurno['idturno']." selected>" . $cadaTurno['nombreturno']."</option>";
									}else
									{
										echo "<option value=".$cadaTurno['idturno'].">" . $cadaTurno['nombreturno']."</option>";
									}
								}
							?>
						</select>
						<br>
						<br>
						<a href="grillaturnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>">
							<input type="button" value="Regresar">
						</a>
						<input type="submit" value="Ingresar">
					</form>
				</div>
			<?php
		}
	}
?>