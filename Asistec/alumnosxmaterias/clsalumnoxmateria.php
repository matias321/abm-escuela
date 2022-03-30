<?php
	class clsalumnoxmateria
	{
		public $idalumno;
		public $idmateria;
		public $nombrealumno;
		public $apellidoalumno;
		public $nombremateria;
		public function insertaralumnoxmateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
			
			$consulta="insert into alumnosxmaterias (idalumno, idmateria)
									values ('".$this->idalumno."','".$this->idmateria."')";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para insertar alumno por materia --> " . mysqli_error($conexion));
		
			mysqli_close($conexion);
			return $registro;
		}
		public function borraralumnoxmateria()
		{
			include("../funcionesgenerales/clsSQL.php");
		
			$consulta="delete from alumnosxmaterias
					   where idalumno = '".$this->idalumno."' and idmateria = '".$this->idmateria."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para eliminar la materia por alumno --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function getunalumnoxmateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select idalumno, idmateria
			             from alumnosxmaterias
			            where idalumno = '".$this->idalumno."' and idmateria = '".$this->idmateria."' ";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para traer las notas de un alumno --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function gettodaslasmateriasdetodoslosalumnos()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select a.idalumno, a.nombre, a.apellido, am.idalumno, am.idmateria, m.id_materia, m.nombremateria, m.nrogrupo, m.idcurso,
						 c.idcurso, c.anio, c.division, gc.nrogrupo, gc.idcurso
						 from alumnos a, alumnosxmaterias am, materias m, cursos c, gruposxcurso gc
						 where a.idalumno = am.idalumno and am.idmateria = m.id_materia and c.idcurso = m.idcurso and gc.idcurso = m.idcurso and gc.nrogrupo = m.nrogrupo order by a.idalumno, a.nombre";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function gettodoslosalumnosdeunamateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select a.idalumno, a.nombre, a.apellido, am.idalumno, am.idmateria, m.id_materia, m.nombremateria, m.nrogrupo, m.idcurso,
						 c.idcurso, c.anio, c.division, gc.nrogrupo, gc.idcurso
						 from alumnos a, alumnosxmaterias am, materias m, cursos c, gruposxcurso gc
						 where a.idalumno = am.idalumno and am.idmateria = m.id_materia and c.idcurso = m.idcurso and m.id_materia = '".$this->idmateria."' and gc.nrogrupo = m.nrogrupo and gc.idcurso = m.idcurso order by a.idalumno, a.nombre";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarmateriasxnombredelalumno()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select a.idalumno, a.nombre, a.apellido, am.idalumno, am.idmateria, m.id_materia, m.nombremateria, m.nrogrupo, m.idcurso,
						 c.idcurso, c.anio, c.division, gc.nrogrupo, gc.idcurso
						 from alumnos a, alumnosxmaterias am, materias m, cursos c, gruposxcurso gc
						 where a.idalumno = am.idalumno and am.idmateria = m.id_materia and c.idcurso = m.idcurso and a.nombre like '".$this->nombrealumno."%"."' and gc.nrogrupo = m.nrogrupo and gc.idcurso = m.idcurso order by a.idalumno, a.nombre";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarmateriasxapellidodelalumno()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select a.idalumno, a.nombre, a.apellido, am.idalumno, am.idmateria, m.id_materia, m.nombremateria, m.nrogrupo, m.idcurso,
						 c.idcurso, c.anio, c.division, gc.nrogrupo, gc.idcurso
						 from alumnos a, alumnosxmaterias am, materias m, cursos c, gruposxcurso gc
						 where a.idalumno = am.idalumno and am.idmateria = m.id_materia and c.idcurso = m.idcurso and a.apellido like '".$this->apellidoalumno."%"."' and gc.nrogrupo = m.nrogrupo and gc.idcurso = m.idcurso order by a.idalumno, a.nombre";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarmateriasxnombredelamateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select a.idalumno, a.nombre, a.apellido, am.idalumno, am.idmateria, m.id_materia, m.nombremateria, m.nrogrupo, m.idcurso,
						 c.idcurso, c.anio, c.division, gc.nrogrupo, gc.idcurso
						 from alumnos a, alumnosxmaterias am, materias m, cursos c, gruposxcurso gc
						 where a.idalumno = am.idalumno and am.idmateria = m.id_materia and c.idcurso = m.idcurso and m.nombremateria like '".$this->nombremateria."%"."' and gc.nrogrupo = m.nrogrupo and gc.idcurso = m.idcurso order by a.idalumno, a.nombre";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
	}
?>