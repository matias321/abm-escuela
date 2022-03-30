<?php
	require_once("../funcionesgenerales/ValidarLogeo.php");
	include('../turnosxcurso/clsturnosxcurso.php');
	$curso = $_POST['id_curso'];
		$turno = new clsturnosxcurso();
		$turno->idcurso = $curso;
		$todoslosturnosdelcurso = $turno->gettodoslosturnosdeuncurso();
		while($cadaturno=mysqli_fetch_array($todoslosturnosdelcurso, MYSQLI_ASSOC))
		{
			echo "<option value=".$cadaturno['idturno'].">".$cadaturno['nombreturno']."</option>";
		}

?>