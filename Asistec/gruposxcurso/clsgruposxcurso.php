<?php
class clsGruposxcurso{
	public $nrogrupo;
	public $idcurso;
	public $idgrupoxcurso;
	public function insertar(){
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta="insert into gruposxcurso (idcurso, nrogrupo)
					values ('".$this->idcurso."',
					        '".$this->nrogrupo."')";
		
		$registro=mysqli_query($conexion, $consulta) or die ("problemas para insertar el grupo --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function borrar(){
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta = "delete from gruposxcurso
					  where idcurso = '".$this->idcurso."'
					    and nrogrupo = '".$this->nrogrupo."' ";
		$registro=mysqli_query($conexion, $consulta) or die ("problemas para eliminar el grupo --> " . mysqli_error($conexion) );
		
		mysqli_close($conexion);
		return $registro;
		 
	}
	public function getUnGrupo(){
		include("../funcionesgenerales/clsSQL.php");
		
		$consulta = "select nrogrupo from gruposxcurso
					where idcurso = '".$this->idcurso."'";
		$registro=mysqli_query($conexion, $consulta) or die ("problemas para traer un grupo --> " . mysqli_error($conexion) );
		
		mysqli_close($conexion);
		return $registro;
		
	}
	public function getTodosLosGrupos(){
		include("../funcionesgenerales/clsSQL.php");
			
		$consulta = "select nrogrupo from gruposxcurso 
					where idcurso = '".$this->idcurso."' 
		             order by nrogrupo";
		$registro=mysqli_query($conexion, $consulta) or die ("problemas para traer todos los grupos --> " . mysqli_error($conexion) );
		
		mysqli_close($conexion);
		return $registro;
	}
}

?>