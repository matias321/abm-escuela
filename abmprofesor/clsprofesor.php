<?php
	class clsprofesor {
		public $idprofesor;
		public $nombre;
		public $apellido;
		public $dni;
		public $telefono;
		public $direccion;


	public function getprofesores () {
		include ("../conexion.php");
		
		$consulta="select idprofesor,nombre,apellido,dni,telefono,direccion
	               from profesores
			  	  order by nombre,apellido ";
		$registro=mysqli_query($conexion, $consulta) 
	              or die ("Problemas para traer todos los profesores -->".mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}

	 public function insertar() {
            include ("../conexion.php");
           
            $consulta="insert into profesores (idprofesor, dni, nombre, apellido, telefono, direccion)
                                    values ('','".$this->dni."','".$this->nombre."',  '"
                                            .$this->apellido."','".$this->telefono."','".$this->direccion."')";
            $registro=mysqli_query($conexion, $consulta)
                      or die ("Problemas para insertar a un profesor--> " . mysqli_error($conexion));
       
            mysqli_close($conexion);
            return $registro;
     }
	
		public function actualizar() {
			include("../conexion.php");
			
			$consulta="update profesores
							, idprofesor = '".$this->idprofesor."'
							,	dni = '".$this->dni."'
							,	nombre = '".$this->nombre."'
							,	apellido = '".$this->apellido."'
							,	telefono = '".$this->telefono."'
							,	direccion = '".$this->direccion."'
						
						where idprofesor = '".$this->id."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para actualizar el profesor --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	
	public function borrar() {
		include("../conexion.php");
		
		$consulta="delete from profesores
				   where idprofesor = '".$this->idprofesor."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para eliminar el profesor --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
}
?>	   
