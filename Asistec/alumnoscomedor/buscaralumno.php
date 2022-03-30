<?php
require_once("../funcionesgenerales/ValidarLogeo.php");
?>
	<div class="Separador">	
		<?php
		include('../alumnos/clsalumno.php');

		if($_GET['todoelanio'] == 1)
		{
			$action = "cargarunalumno.php";
		}else{
			$action = "cargarunalumnotemporal.php";
		}

		$alumno = new clsAlumno();
		if($_GET['sele']==1)
		{
			$alumno->dni = $_POST['txtdni'];
			$regalumno=$alumno->getUnAlumnoDNI();
			if(($elalumno = mysqli_fetch_array($regalumno, MYSQLI_ASSOC))>0)
			{
				header('Location: '.$action.'?idalumno='.$elalumno['idalumno']);
			}else {
				$mensaje = "ALUMNO NO ENCONTRADO";
			}
		} else {
			header('Location: '.$action.'?idalumno='.$_POST['cmbalumno']);
		}
		?>
		<h1>Incorporación de Alumnos a Comedor</h1>
		<br>
		<br>
		<label><?php echo $ensaje; ?></label>
		<br>
		<br>
		<a href="elegiralumno.php">
			<input type="button" value="Regresar" />
		</a>

		</body>
	</div>
</html>
	