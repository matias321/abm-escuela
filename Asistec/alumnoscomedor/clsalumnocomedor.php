<?php
class clsAlumnoComedor { //caracteristicas 
	public $idalumno; 
	public $nrodia;
	
	public function insertar() {// funcion insertar
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="insert into habilitadoscomedor (idalumno, nrodiasemana)
		values ('".strtoupper($this->idalumno)."', 
				'".strtoupper($this->nrodia)."')";
				
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para insertar el alumno: " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function borrar() {// funcion borrar
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta= "delete from habilitadoscomedor
					where idalumno= '".$this->idalumno."' ";
					
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para borrar el alumno: " . mysqli_error($conexion));
		mysqli_close($conexion);
		
		return $registro;					
	}
	public function getTodosLosDiasUnAlumno() {// funcion traer un solo alumno
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno, nrodiasemana 
		             from habilitadoscomedor
					where idalumno = '".$this->idalumno."' 
					order by nrodiasemana ";

		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para traer los dias del alumno: " . mysqli_error($conexion));
		
		mysqli_close($conexion);
			
		return $registro;
	}
	public function getTodosLosAlumnosUnDia() {// funcion traer un solo alumno
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno 
		             from habilitadoscomedor
					where nrodiasemana = '".$this->nrodia."' " ;

		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para traer los alumnos de un dia: " . mysqli_error($conexion));
		
		mysqli_close($conexion);
			
		return $registro;
	}
	public function getTodosLosAlumnosUnDiaTemporal($fecha) {// funcion traer alumnos tabla temporal
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno 
		             from habilitadostemporalmente
					where fechacomedor = '".$fecha."' " ;

		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para traer los alumnos de un dia: " . mysqli_error($conexion));
		
		mysqli_close($conexion);
			
		return $registro;
	}
}
?>