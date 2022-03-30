<?php
	class clsmaterias
	{
		public $idmateria;
		public $nombremateria;
		public $cursomateria;
		public $division;
		public $idcurso;
		public $nrogrupo;

		public function insertarmateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
			
			$consulta="insert into materias (id_materia, nombremateria, idcurso, nrogrupo)
									values ('".$this->getunnuevoidmateria()."','".$this->nombremateria."','".$this->cursomateria.")";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para insertar la materia --> " . mysqli_error($conexion));
		
			mysqli_close($conexion);
			return $registro;
		}
		public function actualizarmateria()
		{
			include("../funcionesgenerales/clsSQL.php");
			
			$consulta="update materias
							set nombremateria = '".$this->nombremateria."'
							,	idcurso = '".$this->cursomateria."'
							,	nrogrupo = '".$this->nrogrupo."'
						where id_materia = '".$this->idmateria."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para actualizar la materia --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function borrarmateria()
		{
			include("../funcionesgenerales/clsSQL.php");
		
			$consulta="delete from materias
					   where id_materia = '".$this->idmateria."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para eliminar la materia --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function getunamateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select id_materia, nombremateria, idcurso, nrogrupo
			             from materias
			            where id_materia = '".$this->idmateria."' ";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para traer la materia --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function gettodaslasmaterias()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select m.id_materia, m.nombremateria, m.idcurso, m.nrogrupo, c.anio, c.division, c.idcurso, c.aniolectivo, 
						gc.nrogrupo, gc.nrogrupo
						 from materias m, cursos c, gruposxcurso gc
						 where m.idcurso = c.idcurso and m.nrogrupo = gc.nrogrupo and m.idcurso = gc.idcurso order by c.idcurso, m.nrogrupo" ;
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todas las materias --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarxnombredemateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select m.id_materia, m.nombremateria, m.idcurso, m.nrogrupo, c.anio, c.division, c.idcurso, 
						gc.nrogrupo, gc.nrogrupo
						 from materias m, cursos c, gruposxcurso gc
						 where m.idcurso = c.idcurso and m.nombremateria like '".$this->nombremateria."%"."' and m.nrogrupo = gc.nrogrupo 
						 and m.idcurso = gc.idcurso order by id_materia" ;
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para buscar una materia por su nombre--> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarxmateriasxcurso()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select m.id_materia, m.nombremateria, m.idcurso, m.nrogrupo, c.anio, c.division, c.idcurso, 
						gc.nrogrupo, gc.nrogrupo
						 from materias m, cursos c, gruposxcurso gc 
						 where m.idcurso = c.idcurso and m.idcurso = '".$this->cursomateria."'and m.nrogrupo = gc.nrogrupo
						  and m.idcurso = gc.idcurso order by id_materia" ;
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para buscar una materia por su año --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarmeteriasxdivision()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select m.id_materia, m.nombremateria, m.idcurso, m.nrogrupo, c.anio, c.division, c.idcurso, 
						gc.nrogrupo, gc.nrogrupo
						 from materias m, cursos c, gruposxcurso gc 
						 where m.idcurso = c.idcurso and c.division = '".$this->division."' and m.nrogrupo = gc.nrogrupo
						  and m.idcurso = gc.idcurso order by id_materia" ;
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para buscar una materia por su division --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function gettodaslasmateriasxcurso()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select id_materia
						 from materias 
						 where idcurso = '".$this->idcurso."' and nrogrupo = '".$this->nrogrupo."'";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para buscar una materia por su division --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		private function getunnuevoidmateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
			$consulta= "select MAX(id_materia) as maximo from materias ";
			$registro= mysqli_query ($conexion, $consulta) 
			           or die ('Problemas para buscar un nuevo idmateria'. mysqli_error($conexion));
						
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