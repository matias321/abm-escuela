<?php
class clsAlumnosxcurso {
	public $idalumno;
	public $idcurso;
	public $nrogrupo;
	
	public function insertar(){
		include("../funcionesgenerales/clsSQL.php");
	
		$consulta="insert into alumnosxcurso(idcurso, nrogrupo, idalumno)
		                             values ('".$this->idcurso."',
		                                     '".$this->nrogrupo."',
		                                     '".$this->idalumno."')";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para Insertar al Alumno al Curso --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
    }
	public function actualizar() {
			include("../funcionesgenerales/clsSQL.php");
			
			$consulta="update alumnosxcurso
							set idcurso = '".$this->idcurso."'
							, nrogrupo = '".$this->nrogrupo."'
						where idalumno = '".$this->idalumno."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para actualizar el alumno --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function borrar(){
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="delete from alumnosxcurso
		            where idalumno = '".$this->idalumno."' 
		              and idcurso = '".$this->idcurso."' 
		              and nrogrupo = '".$this->nrogrupo."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para Borrar al Alumno --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getUnAlumnoxCurso() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="select a.idalumno as idalu, apellido, nombre, dni, fechanacimiento, nrotarjeta, foto, genero_alumn, Email, aniolectivo
		             from alumnos a, alumnosxcurso axc
		            where axc.idalumno = '".$this->idalumno."' 
		              and axc.idcurso = '".$this->idcurso."' 
		              and axc.nrogrupo = '".$this->nrogrupo."' 
		              and axc.idalumno = a.idalumno ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer un Alumno --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getTodosLosAlumnosxCurso() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="select a.idalumno as idalu, apellido, nombre, dni, fechanacimiento, nrotarjeta, foto, genero_alumn, Email, aniolectivo
		             from alumnos a, alumnosxcurso axc
		            where axc.idcurso = '".$this->idcurso."' 
		              and axc.nrogrupo = '".$this->nrogrupo."' 
		              and axc.idalumno = a.idalumno 
					order by apellido, nombre   ";
					
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer todos los Alumnos --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getTodosLosAlumnosDELCurso() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno 
		             from alumnosxcurso
		            where idcurso = '".$this->idcurso."' ";
					
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer todos los Alumnos --> " . mysqli_error($conexion));
		mysqli_close($conexion);
		return $registro;
	}
	public function getGrupo_Curso() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="select nrogrupo, idcurso from alumnosxcurso
		            where idalumno = '".$this->idalumno."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer el grupo y el curso de un alumno --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
}
?>