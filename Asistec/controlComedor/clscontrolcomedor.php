<?php
	class clsControlComedor {
		public $idalumno;
		public $fechacomedor;
		public $idestadoasistencia;
		public $observaciones;
		
		public function getUnAlumno() {
			include ("../funcionesgenerales/clsSQL.php");

			$consulta="select idalumno, idestadoasistencia 
						 from asistenciacomedor
						where idalumno = '".$this->idalumno."' 
				          and fechacomedor = '". $this->fechacomedor."' " ;
			
			$registro=mysqli_query($conexion, $consulta) 
					  or die ("Problemas para traer un alumno --> " . mysqli_error($conexion));

			mysqli_close($conexion);
			return $registro;
		}
		
		public function insertar() {// funcion insertar
			include("../funcionesgenerales/clsSQL.php");

			$consulta="insert into asistenciacomedor (idalumno, fechacomedor, idestadoasistencia, observaciones)
			values ('".strtoupper($this->idalumno)."', 
					'".$this->fechacomedor."',
					'99', '')";

			$registro=mysqli_query($conexion, $consulta) or die ("Problemas para insertar el alumno en asistencia comedor: " . mysqli_error($conexion));

			mysqli_close($conexion);
			return $registro;
		}

	}

?>