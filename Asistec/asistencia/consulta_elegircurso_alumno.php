<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include("../alumnosxcurso/clsalumnosxcurso.php");
include("../encapie/encabezado.php");
include("../alumnos/clsalumno.php");
include("../curso/clscurso.php");
include("clsasistencia.php");

	if(isset($_POST['dnialumno']))
	{
		$alumnobuscar=$_POST['dnialumno'];
		$fechadesde=$_POST['txtfechadesde'];
		$fechahasta=$_POST['txtfechahasta'];
		$alumno = new clsAlumno();
		$existenumerodni = false;
		$alumno->dni = $alumnobuscar;	
		$todoslosalumnos = $alumno->getTodosLosAlumnos();
			while($datosdelAlumno = mysqli_fetch_array($todoslosalumnos, MYSQLI_ASSOC))
			{
				if($datosdelAlumno['dni'] == $alumno->dni)
				{
					$existenumerodni = true;
				}
			}
				if(!$existenumerodni == false)
				{
					$datosAlumno = $alumno->getUnAlumnoDNI();
					if($datosdelAlumno = mysqli_fetch_array($datosAlumno, MYSQLI_ASSOC))
					{
							$nombre = $datosdelAlumno['nombre'];
							$apellido = $datosdelAlumno['apellido'];
							$id = $datosdelAlumno['idalumno'];
							$dni = $datosdelAlumno['dni'];
					}

				}else
					{
						$mensaje = "El dni ingresado no coincide con ningun alumno";
						header('location:consulta_elegiralumno.php?sSs='.$_GET['sSs'].'&mensa='.$mensaje.'');
					}
		$alumnoxcurso = new clsAlumnosxcurso();
		$alumnoxcurso->idalumno = $id;
		$Grupo_CursodelAlumno = $alumnoxcurso->getGrupo_Curso();
		$datosCurso = mysqli_fetch_array($Grupo_CursodelAlumno, MYSQLI_ASSOC);
		$grupoAlumno = $datosCurso['nrogrupo'];
		$anioAlumno = $datosCurso['idcurso'];

		$curso = new clsCurso();
		$curso->idcurso = $anioAlumno;
		$elcurso = $curso->getUnCurso();
		$datosdelCurso = mysqli_fetch_array($elcurso, MYSQLI_ASSOC);
		$nombrecurso = 	$datosdelCurso['anio']."º".$datosdelCurso['division'];
		$asistenciaAlumno=new clsAsistencia();
		$asistenciaAlumno->idalumno = $id;
		$Asistencia = $asistenciaAlumno->getAsistenciaUnAlumno($fechadesde, $fechahasta);
	}else
		if(isset($_GET['dnialumno']))
		{
			$alumnobuscar=$_GET['dnialumno'];
			$fechadesde=$_GET['fechadesde'];
			$fechahasta=$_GET['fechahasta'];
			$alumno = new clsAlumno();
			$existenumerodni = false;
			$alumno->dni = $alumnobuscar;	
			$todoslosalumnos = $alumno->getTodosLosAlumnos();
				while($datosdelAlumno = mysqli_fetch_array($todoslosalumnos, MYSQLI_ASSOC))
				{
					if($datosdelAlumno['dni'] == $alumno->dni)
					{
						$existenumerodni = true;
					}
				}
					if(!$existenumerodni == false)
					{
						$datosAlumno = $alumno->getUnAlumnoDNI();
						if($datosdelAlumno = mysqli_fetch_array($datosAlumno, MYSQLI_ASSOC))
						{
								$nombre = $datosdelAlumno['nombre'];
								$apellido = $datosdelAlumno['apellido'];
								$id = $datosdelAlumno['idalumno'];
								$dni = $datosdelAlumno['dni'];
						}

					}else
						{
							$mensaje = "El dni ingresado no coincide con ningun alumno";
							header('location:consulta_elegiralumno.php?sSs='.$_GET['sSs'].'&mensa='.$mensaje.'');
						}
			$alumnoxcurso = new clsAlumnosxcurso();
			$alumnoxcurso->idalumno = $id;
			$Grupo_CursodelAlumno = $alumnoxcurso->getGrupo_Curso();
			$datosCurso = mysqli_fetch_array($Grupo_CursodelAlumno, MYSQLI_ASSOC);
			$grupoAlumno = $datosCurso['nrogrupo'];
			$anioAlumno = $datosCurso['idcurso'];

			$curso = new clsCurso();
			$curso->idcurso = $anioAlumno;
			$elcurso = $curso->getUnCurso();
			$datosdelCurso = mysqli_fetch_array($elcurso, MYSQLI_ASSOC);
			$nombrecurso = 	$datosdelCurso['anio']."º".$datosdelCurso['division'];
			$asistenciaAlumno=new clsAsistencia();
			$asistenciaAlumno->idalumno = $id;
			$Asistencia = $asistenciaAlumno->getAsistenciaUnAlumno($fechadesde, $fechahasta);
		}else
			{
				$mensaje = "Datos no ingresados";
				header('location:consulta_elegiralumno.php?sSs='.$_GET['sSs'].'&mensa='.$mensaje.'');
			}
?>
<div class="Separador">
	<body>
		<div align="center">
			<h1>Asistencia total del alumno <?php echo $apellido.", ".$nombre?> de <?php echo $nombrecurso?></h3>
			<?php
			$fecdes = substr($fechadesde, 8, 2).'/'.substr($fechadesde, 5, 2).'/'.substr($fechadesde, 0, 4);
			$fechta = substr($fechahasta, 8, 2).'/'.substr($fechahasta, 5, 2).'/'.substr($fechahasta, 0, 4);
			?>
			<h3 align="center">Desde <?php echo $fecdes?> Hasta <?php echo $fechta?></h3>
			<table border="0" class="tftable">
				<tr>				
					<th width="200" align="center">Apellido</th>
					<th width="200" align="center">Nombre</th>
					<th width="100" align="center">DNI</th>
					<th width="100" align="center">Presentes totales</th>
					<th width="100" align="center">Tardes totales</th>
					<th width="100" align="center">Ausentes totales</th>
				</tr>
				<?php
				$totalpresente = 0;
				$totaltardes = 0;
				$totalausentes = 0;

				while($asistencia=mysqli_fetch_array($Asistencia, MYSQLI_ASSOC)){
						switch($asistencia['idestadoasistencia']){
							case 1:
							  $totalpresente = $totalpresente +1;
								break;
							case 2:
								$totaltardes = $totaltardes +1;
								break;
							case 3:
								$totalausentes = $totalausentes +1;
								break;
						}
				}
					?>
					<tr>
						<td width="200"><?php echo $apellido?></td>
					  	<td width="200"><?php echo $nombre?></td>
						<td width="100"><?php echo $dni?></td>
						<td width="100" align="center"><?php echo $totalpresente?></td>
						<td width="100" align="center"><?php echo $totaltardes?></td>
						<td width="100" align="center"><?php echo $totalausentes?></td>
					</tr>
				<?php
				?>
			</table>
			<br>
			<a href="detalleasistencia_alumno.php?sSs=<?php echo $_GET['sSs'];?>&dnialumno=<?php echo $alumnobuscar?>&fechadesde=<?php echo $fechadesde?>&fechahasta=<?php echo $fechahasta?>">
				<input type="button" value="Detalle de la asistencia" class="botonAzulOscuro botonGrilla">
			</a>
			<br>
			<br>
			<div align="center">
				<input type="button" value="Generar PDF" align="middle" class="Boton">
				<a href="consulta_elegiralumno.php?sSs=<?php echo $_GET['sSs'];?>">
					<input type="button" value="Regresar" class="botonVerde botonGrilla">
				</a>
			</div>
			<br>
	</div>	
 	</body>
</div>
</html>