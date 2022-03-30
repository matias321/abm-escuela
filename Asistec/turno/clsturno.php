<?php
class clsTurno {
	public $idturno;
	public $nombreturno;

	public function getTodosLosTurnos() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idturno, nombreturno from turnos order by idturno";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder traer todos los cursos " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getUnTurno() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idturno, nombreturno 
		             from turnos 
					where idturno = '".$this->idturno."'";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder traer el turno " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
}

?>