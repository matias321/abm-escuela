<?php
	class clsmateriasxcurso
	{
		public $idcurso;
		public $idmateria;
		public $idmateriaxcurso;
		public $division;
		public $nombremateria;
		public function insertarmateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
			
			$consulta="insert into materiasxcurso (idmateriaxcurso, idcurso, idmateria)
									values ('".$this->getunnuevoidmateriaxcurso()."','".$this->idcurso."','".$this->idmateria."')";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para insertar la materiaxcurso --> " . mysqli_error($conexion));
		
			mysqli_close($conexion);
			return $registro;
		}
		public function actualizarmateria()
		{
			include("../funcionesgenerales/clsSQL.php");
			
			$consulta="update materiasxcurso
							set idmateria = '".$this->idmateria."'
							,	idcurso = '".$this->idcurso."'
						where idmateriaxcurso = '".$this->idmateriaxcurso."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para actualizar la materia --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function borrarmateria()
		{
			include("../funcionesgenerales/clsSQL.php");
		
			$consulta="delete from materiasxcurso
					   where idmateriaxcurso = '".$this->idmateriaxcurso."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para eliminar la materia --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function getunamateriaxcurso()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select idmateriaxcurso, idcurso, idmateria
			             from materiasxcurso
			            where idmateriaxcurso = '".$this->idmateriaxcurso."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para traer la materia --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function gettodaslasmateriasxcurso()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select mxc.idcurso, mxc.idmateria, c.anio, c.division, c.idcurso, c.aniolectivo, m.id_materia, m.nombremateria, idmateriaxcurso
						 from materiasxcurso mxc, cursos c, materias m
						 where mxc.idcurso = c.idcurso and m.id_materia = mxc.idmateria order by c.idcurso" ;
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todas las materias --> " . mysqli_error($conexion));
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarxnombredemateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select mxc.idcurso, mxc.idmateria, c.anio, c.division, c.idcurso, c.aniolectivo, m.id_materia, m.nombremateria, idmateriaxcurso
						 from materiasxcurso mxc, cursos c, materias m
						 where m.idcurso = c.idcurso and m.id_materia = mxc.idmateria and m.nombremateria like '".$this->nombremateria."%"."' order by id_materia" ;
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para buscar una materia por su nombre--> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarxmateriasxcurso()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select mxc.idcurso, mxc.idmateria, c.anio, c.division, c.idcurso, c.aniolectivo, m.id_materia, m.nombremateria, idmateriaxcurso
						 from materiasxcurso mxc, cursos c, materias m 
						 where m.idcurso = c.idcurso and m.id_materia = mxc.idmateria and m.idcurso = '".$this->idcurso."' order by id_materia" ;
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para buscar una materia por su año --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarmeteriasxdivision()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select mxc.idcurso, mxc.idmateria, c.anio, c.division, c.idcurso, c.aniolectivo, m.id_materia, m.nombremateria, idmateriaxcurso
						 from materiasxcurso mxc, cursos c, materias m 
						 where m.idcurso = c.idcurso and m.id_materia = mxc.idmateria and c.division = '".$this->division."' order by id_materia" ;
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para buscar una materia por su division --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		private function getunnuevoidmateriaxcurso()
		{
			include ("../funcionesgenerales/clsSQL.php");
			$consulta= "select MAX(idmateriaxcurso) as maximo from materiasxcurso ";
			$registro= mysqli_query ($conexion, $consulta) 
			           or die ('Problemas para buscar un nuevo idmateriaxcurso'. mysqli_error($conexion));
						
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