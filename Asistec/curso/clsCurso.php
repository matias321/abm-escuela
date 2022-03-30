<?php
class clscurso {
	public $idcurso;
	public $aniolectivo;
	public $anio;
	public $division;
	
	public function insertar() {
		include("../funcionesgenerales/clssql.php");
		
		$consulta="insert into cursos (idcurso,aniolectivo,anio,division)
				values ('".$this->idcurso."'
					   ,'".$this->aniolectivo."'
					   ,'".$this->anio."'
					   ,'".strtoupper($this->division)."')";
		
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder insertar el curso --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function actualizar() {
		include("../funcionesgenerales/clssql.php");
		
		$consulta="update cursos
						set aniolectivo = '".$this->aniolectivo."'
						  , anio = '".$this->anio."'
						  , division = '".strtoupper($this->division)."'
						  
					where idcurso = '".$this->idcurso."' ";	
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder actualizar el curso --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function borrar() {
		include("../funcionesgenerales/clssql.php");
		
		$consulta="delete from cursos
				where idcurso = '".$this->idcurso."' ";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder borrar el curso --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;	
	}
	public function getUnCurso() {
		include("../funcionesgenerales/clssql.php");
		
		$consulta="select idcurso, aniolectivo, anio, division from cursos
				where idcurso = '".$this->idcurso."'";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder traer el curso --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getTodosLosCursos() {
		include("../funcionesgenerales/clssql.php");
		
		$consulta="select idcurso, aniolectivo, anio, division from cursos order by anio, division";
		$registro=mysqli_query($conexion, $consulta) or die ("Problemas para poder traer todos los cursos " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function getNuevoIdCurso() {
		include("../funcionesgenerales/clssql.php");
		
		$consulta="select MAX(idcurso) as maximo from cursos";
		$registro= mysqli_query($conexion,$consulta) or die ('Problemas para buscar el numero maximo de los cursos' . mysqli_error($conexion));
		
		if ($reg=mysqli_fetch_array($registro, MYSQLI_ASSOC)) { 
			$valor=$reg['maximo'] + 1;
		} else { 
			$valor=1;
		}
		mysqli_close($conexion);
		return $valor;
	}
	public function buscarcursoxaniolectivo(){
		include ("../funcionesgenerales/clssql.php");
		
		$consulta="select idcurso, aniolectivo, anio, division
		             from cursos
		            where aniolectivo = '".$this->aniolectivo."'";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer curso por el aniolectivo --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function buscarxnombredelcurso(){
		include ("../funcionesgenerales/clssql.php");
		
		$consulta="select idcurso, aniolectivo, anio, division
		             from cursos
		            where anio = '".$this->anio."'";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer curso por el aniolectivo --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function buscarxdivisiondelcurso(){
		include ("../funcionesgenerales/clssql.php");
		
		$consulta="select idcurso, aniolectivo, anio, division
		             from cursos
		            where division = '".$this->division."'";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer curso por el aniolectivo --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
	public function buscarCursoespecifico(){
		include ("../funcionesgenerales/clssql.php");

		$consulta="select idcurso, aniolectivo, anio, division
		             from cursos
		            where anio = '".$this->anio."' and division = '".$this->division."' and aniolectivo = '".$this->aniolectivo."'";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer curso por el aniolectivo --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		return $registro;
	}
}
?>