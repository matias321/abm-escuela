<?php
class clsUsuario {
	public $idusuario;
	public $idnuevo;
	public $apellido;
	public $nombre;
	public $pwd;
	public $idperfil;
	
	public function insertar() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="insert into usuarios (idusuario,apellido,nombre,pwd,idperfil)
				values ('".strtoupper($this->idusuario)."'
					   ,'".strtoupper($this->apellido)."'
					   ,'".strtoupper($this->nombre)."'
					   ,'".$this->pwd."'
					   ,'".$this->idperfil."')";
		
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder insertar el usuario --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function actualizar() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="update usuarios
						set apellido = '".strtoupper($this->apellido)."'
						  , nombre = '".strtoupper($this->nombre)."'
						  , pwd = '".$this->pwd."'
						  , idperfil = '".$this->idperfil."'
						  
					where idusuario = '".strtoupper($this->idusuario)."' ";	
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder actualizar el usuario --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function borrar() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="delete from usuarios
				where idusuario = '".strtoupper($this->idusuario)."' ";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder borrar el usuario --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;	
	}
	public function getUnUsuario() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idusuario, apellido, nombre, pwd, idperfil 
		             from usuarios
				where idusuario = '".$this->idusuario."'";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder traer el usuario --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getTodosLosUsuarios() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idusuario, apellido, nombre, pwd, u.idperfil, nombreperfil 
		             from usuarios u, perfiles p
				where u.idperfil = p.idperfil 
				order by idusuario";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder traer todos los usuario " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function actualizarPWD() {
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="update usuarios
		              set pwd = '".$this->pwd."'
				where idusuario = '".strtoupper($this->idusuario)."' ";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para actualizar la PWD del usuario --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;	
	}
	public function actualizarIDusuario(){
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="update usuarios set idusuario = '".strtoupper($this->idnuevo)."'
				where idusuario = '".strtoupper($this->idusuario)."' ";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para actualizar el ID del usuario-> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function actualizarNombre(){
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="update usuarios set nombre = '".$this->nombre."'
				where idusuario = '".strtoupper($this->idusuario)."' ";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para actualizar el nombre del usuario --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function actualizarapellido(){
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="update usuarios set apellido = '".$this->apellido."'
				where idusuario = '".strtoupper($this->idusuario)."' ";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para actualizar el apellido del usuario --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function buscarxnombredelusuario(){
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select u.idusuario, u.apellido, u.nombre, u.pwd, u.idperfil, p.nombreperfil  
		             from usuarios u, perfiles p
		            where u.nombre like '".$this->nombre.'%'."' and u.idperfil = p.idperfil";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer usuarios por nombre --> " . mysqli_error($conexion));
		mysqli_close($conexion);
		return $registro;
	}
	public function buscarxapellidodelusuario(){
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select u.idusuario, u.apellido, u.nombre, u.pwd, u.idperfil, p.nombreperfil  
		             from usuarios u, perfiles p
		            where u.apellido like '".$this->apellido.'%'."' and u.idperfil = p.idperfil";
		
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer usuarios por nombre --> " . mysqli_error($conexion));
		mysqli_close($conexion);
		return $registro;
	}
	public function buscarxperfildelusuario(){
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select u.idusuario, u.apellido, u.nombre, u.pwd, u.idperfil, p.nombreperfil  
		             from usuarios u, perfiles p
		            where u.idperfil = '".$this->idperfil."' and p.idperfil = '".$this->idperfil."'";
		
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer usuarios por perfil --> " . mysqli_error($conexion));
		mysqli_close($conexion);
		return $registro;
	}
	public function buscarusuarioespecifico(){
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select u.idusuario, u.apellido, u.nombre, u.pwd, u.idperfil, p.nombreperfil  
		             from usuarios u, perfiles p
		            where u.nombre like '".$this->nombre.'%'."' and  u.apellido like '".$this->apellido.'%'."' and u.idperfil = '".$this->idperfil."' and p.idperfil = u.idperfil";
		
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer usuario especifico --> " . mysqli_error($conexion));
		mysqli_close($conexion);
		return $registro;
	}
}
?>