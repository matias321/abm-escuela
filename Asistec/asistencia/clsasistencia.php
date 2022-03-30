<?php
class clsAsistencia {
	public $fecha;
	public $idturno;
	public $idalumno;
	public $observaciones;
	public $idestadoasistencia;
	public $idusuario;
	public function insertar() {
		include ("../funcionesgenerales/clsSQL.php");

		$consulta="insert into asistencia (fecha, idturno, idalumno, observaciones, 
		                                    idestadoasistencia, idusuario)
								    values ('".$this->fecha."','".$this->idturno."',
									        '".$this->idalumno."','".$this->observaciones."',
											'".$this->idestadoasistencia."','".$this->idusuario."')";
		$registro=mysqli_query($conexion, $consulta) 
				  or die ("Problemas para insertar la asistencia --> " . mysqli_error($conexion));

		mysqli_close($conexion);
		return $registro;
	}
	public function actualizar() {
			include("../funcionesgenerales/clsSQL.php");
			
			$consulta="update asistencia
							set fecha = '".$this->fecha."'
							, idturno = '".$this->idturno."'
							, observaciones = '".$this->observaciones."'
							, idestadoasistencia = '".$this->idestadoasistencia."'
							, idusuario = '".$this->idusuario."'
							, idalumno = '".$this->idalumno."'
						where idalumno = '".$this->idalumno."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para actualizar planilla de asistencia --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	
	public function borrarElAlumnoUnDiaTurno() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="delete from asistencia
					where fecha = '".$this->fecha."' 
					  and idturno = '".$this->idturno."' 
					  and idalumno = '".$this->idalumno."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para eliminar el alumno --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function borrarasistenciasalumno() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="delete from asistencia
					where idalumno = '".$this->idalumno."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para eliminar el alumno --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	
	public function getUnAlumnosUnDia() {// funcion traer un solo alumno
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno, idestadoasistencia 
		             from asistencia
					where fecha = '".$this->fecha."'
					  and idalumno = '".$this->idalumno."'
					  and idturno = '".$this->idturno."' ";

		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para traer un alumno de un dia: " . mysqli_error($conexion));
		
		mysqli_close($conexion);
			
		return $registro;
	}

	public function getTodosAlumnos($INIdAlumno) {// funcion traer todos los alumnos
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select asi.idalumno as id_alumno, dni, apellido, nombre, 
		                  idestadoasistencia 
		             from asistencia asi, alumnos a
					where fecha = '".$this->fecha."'
					  and asi.idalumno IN (".$INIdAlumno.")
					  and idturno = '".$this->idturno."' 
					  and asi.idalumno = a.idalumno 
					order by apellido, nombre ";

		$registro=mysqli_query($conexion, $consulta) or die ("No se han encontrado alumnos de este curso");
		
		mysqli_close($conexion);
			
		return $registro;
	}
	public function getTodosAlumnosFechaDesdeHasta($INIdAlumno,$desde, $hasta) {// funcion traer todos los alumnos
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select asi.idalumno as id_alumno, dni, apellido, nombre, nrotarjeta,
		                  idestadoasistencia, fecha, idturno
		             from asistencia asi, alumnos a
					where fecha >= '".$desde."'
					  and fecha <= '".$hasta."'
					  and asi.idalumno IN (".$INIdAlumno.")
					  and asi.idalumno = a.idalumno 
					order by fecha, idturno, idestadoasistencia, id_alumno";

		$registro=mysqli_query($conexion, $consulta) or die ("No se han encontrado alumnos de este curso desde/hasta");
		
		mysqli_close($conexion);
			
		return $registro;
	}
	public function getAsistenciaUnAlumno($desde,$hasta) {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select fecha, idturno, observaciones, idestadoasistencia, idusuario
		             from asistencia where idalumno = '".$this->idalumno."' and fecha >= '".$desde."'
					  and fecha <= '".$hasta."'";

		$registro=mysqli_query($conexion, $consulta) or die ("No se han encontrado alumnos de este curso desde/hasta");
		
		mysqli_close($conexion);
			
		return $registro;
	}

	public function getAsistenciatodoslosalumnos($desde,$hasta) {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idestadoasistencia 
		             from asistencia where idalumno = '".$this->idalumno."' and fecha >= '".$desde."'
					  and fecha <= '".$hasta."'";

		$registro=mysqli_query($conexion, $consulta) or die ("No se han encontrado alumnos de este curso desde/hasta");
		
		mysqli_close($conexion);
			
		return $registro;
	}
}




?>