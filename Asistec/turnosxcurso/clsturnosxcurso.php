<?php
	class clsturnosxcurso
	{
		public $idturno;
		public $idcurso;

		public function insertarturnoxcurso()
		{
			include ("../funcionesgenerales/clsSQL.php");
			
			$consulta="insert into cursosxturno (idcurso, idturno)
									values ('".$this->idcurso."','".$this->idturno."')";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para insertar las notas --> " . mysqli_error($conexion));
		
			mysqli_close($conexion);
			return $registro;
		}
		public function actualizarturnoxcurso()
		{
			include("../funcionesgenerales/clsSQL.php");
			
			$consulta="update cursosxturno
							set idcurso = '".$this->idcurso."'
							,	idturno = '".$this->idturno."'

						where idcurso = '".$this->idcurso."' and idturno = '".$this->idturno."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para actualizar las notas de un alumno --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function borrarturnoxcurso()
		{
			include("../funcionesgenerales/clsSQL.php");
		
			$consulta="delete from cursosxturno
					   where idcurso = '".$this->idcurso."' and idturno = '".$this->idturno."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para eliminar las notas de un alumno --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function getunturnodelcurso()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select ct.idcurso, ct.idturno, c.anio, c.division, c.aniolectivo
			             from cursosxturno ct, cursos c
			            where ct.idcurso = '".$this->idcurso."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para traer las notas de un alumno --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function gettodoslosturnosxcurso()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select ct.idcurso, ct.idturno, c.anio, c.division, c.aniolectivo, t.nombreturno, t.idturno
						 from cursosxturno ct, cursos c, turnos t
						 where ct.idcurso = c.idcurso and ct.idturno = t.idturno
						 order by c.anio";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function gettodoslosturnosdeuncurso()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select ct.idcurso, ct.idturno, t.nombreturno, t.idturno
			             from cursosxturno ct, turnos t
			            where ct.idcurso = '".$this->idcurso."' and ct.idturno = t.idturno";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer turnos de un curso --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarxturno(){
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select ct.idcurso, ct.idturno, c.anio, c.division, c.aniolectivo, t.nombreturno, t.idturno
						 from cursosxturno ct, cursos c, turnos t
						 where ct.idturno = '".$this->idturno."' and ct.idcurso = c.idcurso and ct.idturno = t.idturno order by c.anio";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarxcurso(){
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select ct.idcurso, ct.idturno, c.anio, c.division, c.aniolectivo, t.nombreturno, t.idturno
						 from cursosxturno ct, cursos c, turnos t
						 where ct.idcurso = '".$this->idcurso."' and ct.idcurso = c.idcurso and ct.idturno = t.idturno order by c.anio";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
	}
?>