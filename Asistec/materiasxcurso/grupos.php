<?php
	require_once("../funcionesgenerales/ValidarLogeo.php");
	include("../gruposxcurso/clsgruposxcurso.php");
		$curso = $_POST['id_curso'];
		$grupo = new clsGruposxcurso();
		$grupo->idcurso = $curso;
		$todoslosgrupoxCurso = $grupo->getTodosLosGrupos();
		echo "<option disabled>Seleccione un grupo</option>";
		while($cadagrupo=mysqli_fetch_array($todoslosgrupoxCurso, MYSQLI_ASSOC))
		{
			echo "<option value=".$cadagrupo['idgrupoxcurso'].">".$cadagrupo['nrogrupo']."</option>";
		}
?>