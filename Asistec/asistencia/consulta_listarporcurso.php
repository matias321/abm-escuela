<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include("../encapie/encabezado.php");
include("../curso/clscurso.php");

error_reporting(0);

	if(isset($_POST['cmbcurso'])){

		$idcurso=$_POST['cmbcurso'];
		$idgrupo = $_POST['cmbgrupo'];

		$fechadesde=$_POST['txtfechadesde'];

		$fechahasta=$_POST['txtfechahasta'];

		include("../alumnosxcurso/clsalumnosxcurso.php");

		$aluxcur = new clsAlumnosxcurso();
		$aluxcur->idcurso=$idcurso;
		$aluxcur->nrogrupo = $idgrupo;
		$regaluxcur = $aluxcur->getTodosLosAlumnosxCurso();
		$INaluxcur="";
		while($cadaaluxcur=mysqli_fetch_array($regaluxcur, MYSQLI_ASSOC))
		{
			if($INaluxcur != ""){
				$INaluxcur .= ",";
			}
			$INaluxcur .= "'".$cadaaluxcur['idalu']."'";

		}

		$totPres=0;
		$totTarde=0;
		$totAusente=0;

		$fechaant="2000-01-01";
		$idturnoant=0;

		include("clsasistencia.php");
		$asistencias=new clsAsistencia();
		$regAsistencias=$asistencias->getTodosAlumnosFechaDesdeHasta($INaluxcur,$fechadesde,$fechahasta);

		if($cadaAsistencia=mysqli_fetch_array($regAsistencias, MYSQLI_ASSOC)){
			$finlectura = false;
		} else {
			$finlectura = true;
		}
		while($cadaAsistencia=mysqli_fetch_array($regAsistencias, MYSQLI_ASSOC)){
			$fechaant = $cadaAsistencia['fecha'];
			$totxdiaPres=0;
			$totxdiaTarde=0;
			$totxdiaAusente=0;
			while($fechaant == $cadaAsistencia['fecha'])
			{
				$idturnoant=$cadaAsistencia['idturno'];
				$totxturnoPres=0;
				$totxturnoTarde=0;
				$totxturnoAusente=0;

				while($idturnoant == $cadaAsistencia['idturno'])
				{
					switch($cadaAsistencia['idestadoasistencia']){
						case 1:
							$totxturnoPres += 1;
							break;
						case 2:
							$totxturnoTarde += 1;
							break;
						case 3:
							$totxturnoAusente += 1;
							break;
					}

					if($cadaAsistencia=mysqli_fetch_array($regAsistencias, MYSQLI_ASSOC)){
						$finlectura = false;
					} else {
						$finlectura = true;
					}
				}

				$totxdiaPres += $totxturnoPres;
				$totxdiaTarde += $totxturnoTarde;
				$totxdiaAusente += $totxturnoAusente;
			}

			$totPres += $totxdiaPres;
			$totTarde += $totxdiaTarde;
			$totAusente += $totxdiaAusente;


		}
		$curso = new clsCurso();
		$curso->idcurso = $aluxcur->idcurso;
		$elcurso = $curso->getUnCurso();
		$datosdelCurso = mysqli_fetch_array($elcurso, MYSQLI_ASSOC);
		$nombrecurso = 	$datosdelCurso['anio']."º".$datosdelCurso['division']." Gr:".$idgrupo;
	}else{
		header('location:consulta_elegircurso.php');
	}
?>
<div class="Separador">
	<div align="center">
		<div align="center">
			<h1 align="center">Asistencia de: <?php echo $nombrecurso?></h1>
			<?php
			$fecdes = substr($fechadesde, 8, 2).'/'.substr($fechadesde, 5, 2).'/'.substr($fechadesde, 0, 4);
			$fechta = substr($fechahasta, 8, 2).'/'.substr($fechahasta, 5, 2).'/'.substr($fechahasta, 0, 4);
			?>
			<h3 align="center">Desde <?php echo $fecdes?> Hasta <?php echo $fechta?></h3>
		</div>
		<table border="0" class="tftable">
			<tr>
				<th align="center">Apellido</th>
				<th align="center">Nombre</th>
				<th align="center">DNI</th>
				<th align="center">Presentes totales</th>
				<th align="center">Tardes totales</th>
				<th align="center">Ausentes totales</th>
			</tr>
			<?php
			include("../alumnos/clsalumno.php");
				
			$aluxcur = new clsAlumnosxcurso();
			$aluxcur->idcurso=$_POST['cmbcurso'];
			$aluxcur->nrogrupo = $_POST['cmbgrupo'];
			$todoslosalumnos = $aluxcur->getTodosLosAlumnosxCurso();
			
			$asistencias=new clsAsistencia();
			$totalpresente = 0;
			$totaltardes = 0;
			$totalausentes = 0;
			
			while($cadaAlumno=mysqli_fetch_array($todoslosalumnos, MYSQLI_ASSOC)){
				$asistencias->idalumno = $cadaAlumno['idalu'];
				$asistenciadelosaumnos = $asistencias->getAsistenciatodoslosalumnos($fechadesde,$fechahasta);
					
					while($asistencia=mysqli_fetch_array($asistenciadelosaumnos, MYSQLI_ASSOC)){
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
					<td width="200"><?php echo $cadaAlumno['apellido']?></td>
					<td width="200"><?php echo $cadaAlumno['nombre']?></td>
					<td width="100"><?php echo $cadaAlumno['dni']?></td>
					<td width="100" align="center"><?php echo $totalpresente?></td>
					<td width="100" align="center"><?php echo $totaltardes?></td>
					<td width="100" align="center"><?php echo $totalausentes?></td>
				</tr>
			<?php
				$totalpresente = 0;
				$totaltardes = 0;
				$totalausentes = 0;		
			}
			?>                   
			<tr>
				<th height="120" colspan="7">
					<h2 style="text-decoration: underline;" align="center">Total General del curso</h2>
					<h4 align="center">Desde <?php echo $fechadesde?> Hasta <?php echo $fechahasta?></h4>
					<h3 align="center">Total de Presentes: <?php echo $totPres?></h3>
					<h3 align="center">Total de Tardes: <?php echo $totTarde?></h3>
					<h3 align="center">Total de Ausentes: <?php echo $totAusente?></h3> 
				</th>
			</tr>            
		</table>
		<br>
		<div align="center">
			<input type="button" value="Generar PDF" align="middle" class="Boton">
			<a href="consulta_elegircurso.php?sSs=<?php echo $_GET['sSs'];?>">
				<input type="button" value="Regresar" class="botonVerde botonGrilla">
			</a>
		</div>
		<br>
	</div>
</div>
		
</body>
</html>