<?php
	class clsusuariosxmateria
	{
		public $idmateria;
		public $idusuario;
		public $nombremateria;
		public function insertarususariosxmateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
			
			$consulta="insert into usuariosxmaterias (idusuario, idmateria)
									values ('".$this->idusuario."','".$this->idmateria."')";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para insertar el usuario x materia --> " . mysqli_error($conexion));
		
			mysqli_close($conexion);
			return $registro;
		}
		/*public function actualizarususariosxmateria()
		{
			include("../funcionesgenerales/clsSQL.php");
			
			$consulta="update usuariosxmaterias
							set idusuario = '".$this->idusuario."'
							,	idmateria = '".$this->idmateria."'
						where idusuario = '".$this->idusuario."' and idmateria = '".$this->idmateria."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para actualizar la materia --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}*/
		public function borrarususariosxmateria()
		{
			include("../funcionesgenerales/clsSQL.php");
		
			$consulta="delete from usuariosxmaterias
					   where idusuario = '".$this->idusuario."' and idmateria = '".$this->idmateria."'";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para eliminar la materia --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function getunusuarioxmateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select idusuario, idmateria
			             from usuariosxmaterias
			            where idusuario = '".$this->idusuario."' and idmateria = '".$this->idmateria."' ";
			$registro=mysqli_query($conexion, $consulta) 
			          or die ("Problemas para traer un usuario --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function gettodoslosusuariosxmateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select m.id_materia, m.nombremateria, m.nrogrupo, m.idcurso, u.idusuario, u.nombre, u.apellido, um.idusuario, um.idmateria, c.anio, c.division, c.idcurso, gc.idcurso, gc.nrogrupo, gc.nrogrupo
						 from materias m, usuarios u, usuariosxmaterias um, cursos c, gruposxcurso gc
						 where u.idusuario = um.idusuario and m.id_materia = um.idmateria and m.idcurso = c.idcurso and m.idcurso = gc.idcurso and m.nrogrupo = gc.nrogrupo order by c.idcurso,gc.nrogrupo";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todos los usuarios x materia  --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function gettodaslasmateriasdeunusuario()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select m.id_materia, m.nombremateria, m.idcurso, m.nrogrupo, u.idusuario, u.nombre, u.apellido, um.idusuario, um.idmateria, c.anio, c.division, c.idcurso, gc.idcurso, gc.nrogrupo, gc.nrogrupo
						 from materias m, usuarios u, usuariosxmaterias um, cursos c, gruposxcurso gc
						 where um.idusuario = '".$this->idusuario."' and u.idusuario = um.idusuario and m.id_materia = um.idmateria and m.idcurso = c.idcurso and m.idcurso = gc.idcurso and m.nrogrupo = gc.nrogrupo order by c.idcurso,gc.nrogrupo";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para traer todas las materias de un usuario --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarxusuario()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select m.id_materia, m.nombremateria, m.idcurso, m.nrogrupo, u.idusuario, u.nombre, u.apellido, um.idusuario, um.idmateria, c.anio, c.division, c.idcurso, gc.idcurso, gc.nrogrupo, gc.nrogrupo
						 from materias m, usuarios u, usuariosxmaterias um, cursos c, gruposxcurso gc
						 where um.idusuario = '".$this->idusuario."' and u.idusuario = um.idusuario and m.id_materia = um.idmateria and m.idcurso = c.idcurso and m.idcurso = gc.idcurso and m.nrogrupo = gc.nrogrupo order by c.idcurso";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para buscar una materia por su nombre--> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
		public function buscarxnombremateria()
		{
			include ("../funcionesgenerales/clsSQL.php");
		
			$consulta="select m.id_materia, m.nombremateria, m.idcurso, m.nrogrupo, u.idusuario, u.nombre, u.apellido, um.idusuario, um.idmateria, c.anio, c.division, c.idcurso, gc.idcurso, gc.nrogrupo, gc.nrogrupo
						 from materias m, usuarios u, usuariosxmaterias um, cursos c, gruposxcurso gc
						 where u.idusuario = um.idusuario and m.id_materia = um.idmateria and m.idcurso = c.idcurso and m.nombremateria like '".$this->nombremateria."%"."' and m.idcurso = gc.idcurso and m.nrogrupo = gc.nrogrupo order by c.idcurso";
			$registro=mysqli_query($conexion, $consulta) 
		              or die ("Problemas para buscar una materia por su division --> " . mysqli_error($conexion));
			
			mysqli_close($conexion);
			return $registro;
		}
	}
?>