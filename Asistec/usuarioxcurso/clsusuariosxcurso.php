<?php
class clsUsuariosxcurso {
	public $idusuario;
	public $idcurso;
	public $idnuevo;
	
	public function insertar(){
		include("../funcionesgenerales/clsSQL.php");
	
		$consulta="insert into usuariosxcurso(idusuario,idcurso)
		                             values ('".$this->idusuario."',
		                                     '".$this->idcurso."')";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para Insertar al Usuario del Curso --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
    }
	public function borrar(){
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="delete from usuariosxcurso
		            where idusuario = '".$this->idusuario."' 
		              and idcurso = '".$this->idcurso."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para Borrar al Usuario --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}

	public function getUnUsuarioxCurso() {
		include("../funcionesgenerales/clsSQL.php");
		
		//cambios de idalumno - idusuario
		
		$consulta="select u.idusuario as idusu, apellido, nombre, idperfil
		             from usuarios u, usuariosxcurso uxc
		            where uxc.idusuario = '".$this->idusuario."' 
					  and uxc.idcurso = '".$this->idcurso."'
		              and uxc.idusuario = u.idusuario ";
					  
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer un Usuario --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getTodosLosUsuariosxCurso() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="select u.idusuario as idusu, apellido, nombre
		             from usuarios u, usuariosxcurso uxc
		            where uxc.idcurso = '".$this->idcurso."' 
		              and uxc.idusuario = u.idusuario
		              order by apellido, nombre   ";
					
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer todos los Usuarios --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getTodosLosCursosxUsuario() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="select c.idcurso as idcur, aniolectivo, anio, division 
				     from cursos c, usuariosxcurso uxc
		            where uxc.idusuario = '".$this->idusuario."' 
		              and uxc.idcurso = c.idcurso
		              order by anio, division";
					
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer todos los Cursos de un Usuario --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	
}
?>