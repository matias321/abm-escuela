<?php
	require_once("../funcionesgenerales/ValidarLogeo.php");
	include("../materias/clsmaterias.php");
		$curso = $_POST['id_curso'];
		$grupo = $_POST['id_grupo'];
		$materias = new clsmaterias();
		$materias->idcurso = $curso;
		$materias->idgrupo = $grupo;
		$todaslasmateriasdelcurso = $materias->gettodaslasmateriasxcurso();

		echo "<option disabled>Seleccione una materia</option>";
		while($cadamateria=mysqli_fetch_array($todaslasmateriasdelcurso, MYSQLI_ASSOC))
		{
			echo "<option value=".$cadamateria['id_materia'].">".$cadamateria['anio']."º".$cadamateria['division']." / ".$cadamateria['nrogrupo']." / ".$cadamateria['nombremateria']."</option>";
		}
?>