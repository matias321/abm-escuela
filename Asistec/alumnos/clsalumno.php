<?php
	class clsAlumno {
		public $id;
		public $apellido;
		public $nombre;
		public $fechadenacimiento;
		public $nrodetarjeta;
		public $dni;
		public $aniolectivo;
		public $genero;
		public $nacionalidad;
		public $fotoalumno;
		public $lugarNacimiento;
		public $correo;

		public function insertar() {
			include ("../funcionesgenerales/clsSQL.php");
			
			$consulta="insert into alumnos (idalumno, dni, apellido, nombre, fechanacimiento, nrotarjeta, foto, genero_alumn, Email, aniolectivo)
									values ('".$this->id."','".$this->dni."','".$this->apellido."','"
											.$this->nombre."','"
											.$this->fechadenacimiento."','".$this->nrodetarjeta."','".$this->fotoalumno."','".$this->genero."','".$this->correo."','".$this->aniolectivo."')";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para insertar el alumno --> " . mysqli_error($conexion));
		
			mysqli_close($conexion);
			return $registro;
		}
		public function actualizar() {
			include("../funcionesgenerales/clsSQL.php");
			
			$consulta="update alumnos
							set apellido = '".$this->apellido."'
							,	nombre = '".$this->nombre."'
							,	dni = '".$this->dni."'
							,	fechanacimiento = '".$this->fechadenacimiento."'
							,	nrotarjeta = '".$this->nrodetarjeta."'
							,	foto = '".$this->fotoalumno."'
							,	genero_alumn = '".$this->genero."'
							,	Email = '".$this->correo."'
							,	aniolectivo = '".$this->aniolectivo."'
						where idalumno = '".$this->id."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para actualizar el alumno --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	
	public function borrar() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="delete from alumnos
				   where idalumno = '".$this->id."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para eliminar el alumno --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}

	public function getUnAlumno() {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno, apellido, nombre, dni, fechanacimiento, nrotarjeta, foto, genero_alumn, Email, aniolectivo
		             from alumnos
		            where idalumno = '".$this->id."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer un alumno --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getUnAlumnoNroTarjeta() {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno, apellido, nombre, dni, fechanacimiento, nrotarjeta, foto, genero_alumn, Email, aniolectivo
		             from alumnos
		            where nrotarjeta = '".$this->nrodetarjeta."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer un alumno por nro de tarjeta --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getUnAlumnoDNI() {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno, apellido, nombre, dni, fechanacimiento, nrotarjeta, foto, genero_alumn, Email, aniolectivo
		             from alumnos
		            where dni = '".$this->dni."' ";
		
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer un alumno por DNI --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
    public function getalumnosxnombre() {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno, apellido, nombre, dni, fechanacimiento, nrotarjeta, foto, genero_alumn, Email, aniolectivo
		             from alumnos
		            where nombre like '".$this->nombre.'%'."' ";
		
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer alumnos por nombre --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getalumnosxapellido() {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno, apellido, nombre, dni, fechanacimiento, nrotarjeta, foto, genero_alumn, Email, aniolectivo
		             from alumnos
		            where apellido like '".$this->apellido.'%'."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer alumnos por apellido --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getTodosLosAlumnos() {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno, apellido, nombre, dni, fechanacimiento, nrotarjeta, foto, genero_alumn, Email, aniolectivo
	               from alumnos 
			  	  order by apellido, nombre ";
		$registro=mysqli_query($conexion, $consulta) 
	              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getTodosLosAlumnosINIdalumno($INIdAlumno) {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idalumno, apellido, nombre, dni, fechanacimiento, nrotarjeta, foto, genero_alumn, Email, aniolectivo
	               from alumnos 
				   where idalumno IN ($INIdAlumno)
			  	  order by apellido, nombre ";
		$registro=mysqli_query($conexion, $consulta) 
	              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function gettodoslosalumnosconelcurso() {
		include ("../funcionesgenerales/clsSQL.php");
		$consulta="select a.idalumno, a.apellido, a.nombre, ac.idcurso, ac.idgrupoxcurso, ac.idalumno, c.anio, c.aniolectivo, c.idcurso, c.division, gc.idgrupoxcurso, gc.nrogrupo, gc.idcurso
	               from alumnos a, alumnosxcurso ac, cursos c, gruposxcurso gc
	               where a.idalumno = ac.idalumno and ac.idcurso = c.idcurso and ac.idgrupoxcurso = gc.idgrupoxcurso and ac.idcurso = gc.idcurso
	               order by c.idcurso, ac.nrogrupo, a.apellido, a.nombre";
		$registro=mysqli_query($conexion, $consulta) 
	              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getNuevoIdAlumno() {
		include ("../funcionesgenerales/clsSQL.php");
		$consulta= "select MAX(idalumno) as maximo from alumnos ";
		$registro= mysqli_query ($conexion, $consulta) 
		           or die ('Problemas para buscar el nro máximo de Alumno'. mysqli_error($conexion));
					
		if ($reg=mysqli_fetch_array($registro, MYSQLI_ASSOC))
		{
				$valor= $reg['maximo'] + 1;
		}
		else
		{
			$valor=1;
		}
		
		mysqli_close($conexion);
		return $valor;
	}
}
?>	   