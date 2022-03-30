<?php
	class clsnotas
	{
		public $nota1ertrimestre;
		public $nota2ertrimestre;
		public $nota3ertrimestre;
		public $idalumno;
		public $idusuario;
		public $idmateria;
		public $nombrealumno;
		public $apellidoalumno;
		public $borrado = false;
		public function insertarnotas()
		{
			include ("../funcionesgenerales/clsSQL.php");
			
			$consulta="insert into notas (idnotas, nota1ertrimestre, nota2ertrimestre, nota3ertrimestre, promedio, idusuario, idalumno, id_materia, borrado)
									values ('".$this->getnuevoidnota()."','".$this->nota1ertrimestre."','".$this->nota2ertrimestre."','".$this->nota3ertrimestre."','".$this->sacarpromedio()."','".$this->idusuario."','".$this->idalumno."','".$this->idmateria."','".$this->borrado."')";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para insertar las notas --> " . mysqli_error($conexion));
		
			mysqli_close($conexion);
			return $registro;
		}
		private function sacarpromedio()
		{
			$promedioalumno = ($this->nota1ertrimestre + $this->nota2ertrimestre + $this->nota3ertrimestre) /3;
			number_format($promedioalumno,2);
			return $promedioalumno;
		}
		public function actualizarnotas()
		{
			include("../funcionesgenerales/clsSQL.php");
			
			$consulta="update notas
							set nota1ertrimestre = '".$this->nota1ertrimestre."'
							,	nota2ertrimestre = '".$this->nota2ertrimestre."'
							,	nota3ertrimestre = '".$this->nota3ertrimestre."'
							,	promedio = '".$this->sacarpromedio()."'
							,	idusuario = '".$this->idusuario."'
							,	idalumno = '".$this->idalumno."'
						where idalumno = '".$this->idalumno."' and id_materia = '".$this->idmateria."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para actualizar las notas de un alumno --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function borrarnotas()
		{
			include("../funcionesgenerales/clsSQL.php");
		
			$consulta="update notas set
						borrado = '".true."'
					   where idalumno = '".$this->idalumno."' and id_materia = '".$this->idmateria."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para eliminar la nota del un alumno --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function borrartodaslasnotasdelalumno()
		{
			include("../funcionesgenerales/clsSQL.php");
		
			$consulta="delete from notas
					   where idalumno = '".$this->idalumno."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para eliminar las notas de un alumno --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function getnotasdeunalumno()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select nota1ertrimestre, nota2ertrimestre, nota3ertrimestre, promedio, idusuario, idalumno, borrado
			             from notas
			            where idalumno = '".$this->idalumno."' ";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para traer las notas de un alumno --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function gettodaslasnotasdetodoslosalumnos()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select n.idnotas, n.nota1ertrimestre, n.nota2ertrimestre, n.nota3ertrimestre, n.promedio, 
						n.idusuario, n.idalumno, n.borrado,a.idalumno, n.id_materia, m.id_materia, m.nombremateria, m.idcurso, c.anio, c.division, c.idcurso, um.idmateria, um.idusuario
						 from notas n, alumnos a,materias m, cursos c, usuariosxmaterias um
						 where n.idalumno = a.idalumno and m.idcurso = c.idcurso and n.id_materia = um.idmateria and um.idusuario = '".$this->idusuario."' and n.idusuario = um.idusuario and m.id_materia = n.id_materia and n.borrado = '".$this->borrado."' order by idnotas";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarnotasxnombredelalumno()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select n.idnotas, n.nota1ertrimestre, n.nota2ertrimestre, n.nota3ertrimestre, n.promedio, 
						n.idusuario, n.idalumno, n.borrado,a.idalumno, a.nombre,n.id_materia, m.id_materia, m.nombremateria, m.idcurso, c.anio, c.division, c.idcurso, um.idmateria, um.idusuario
						from notas n, alumnos a,materias m, cursos c, usuariosxmaterias um
						 where n.idalumno = a.idalumno and a.nombre like '".$this->nombrealumno."%"."' and n.borrado = '".$this->borrado."' and m.idcurso = c.idcurso and n.id_materia = um.idmateria and m.id_materia = n.id_materia and n.idusuario = um.idusuario
						 order by idnotas";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarnotasxapellidodelalumno()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select n.idnotas, n.nota1ertrimestre, n.nota2ertrimestre, n.nota3ertrimestre, n.promedio, 
						n.idusuario, n.idalumno, n.borrado,a.idalumno, a.nombre, a.apellido,n.id_materia, m.id_materia, m.nombremateria, m.idcurso, c.anio, c.division, c.idcurso, um.idmateria, um.idusuario
						from notas n, alumnos a,materias m, cursos c, usuariosxmaterias um
						 where n.idalumno = a.idalumno and a.apellido like '".$this->apellidoalumno."%"."' and n.borrado = '".$this->borrado."' and m.idcurso = c.idcurso and n.id_materia = um.idmateria and m.id_materia = n.id_materia and n.idusuario = um.idusuario
						 order by idnotas";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los alumnos --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		private function getnuevoidnota()
		{
			include ("../funcionesgenerales/clsSQL.php");
			$consulta= "select MAX(idnotas) as maximo from notas ";
			$registro= mysqli_query ($conexion, $consulta) 
			           or die ('Problemas para buscar un nuevo idnota'. mysqli_error($conexion));
						
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