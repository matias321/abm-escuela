<?php
	require_once("../funcionesgenerales/ValidarLogeo.php");
	include('../alumnosxmaterias/clsalumnoxmateria.php');
		$idmateriaseleccionada = $_POST['idmateria'];
		$alumnoxmateria = new clsalumnoxmateria();
		$alumnoxmateria->idmateria = $idmateriaseleccionada;
		$todoslosalumnosxmateria = $alumnoxmateria->gettodoslosalumnosdeunamateria();
		echo "<option disabled>Seleccione un alumno</option>";
		while($cadaalumno=mysqli_fetch_array($todoslosalumnosxmateria, MYSQLI_ASSOC))
		{
			echo "<option value=".$cadaalumno['idalumno'].">".$cadaalumno['nombre']." ".$cadaalumno['apellido']."</option>";
		}
?>