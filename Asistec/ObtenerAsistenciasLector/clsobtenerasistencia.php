<?php
	$contador = 200000;
	$numero = 0;
	while($contador >= 0){
		if($contador == 0){
			include ("../funcionesgenerales/clsSQL.php");
			$consulta="CALL `ObtenerAsistenciadelosAlumnos`()";
			$registro=mysqli_query($conexion, $consulta)or die ("Problemas para insertar el alumno --> " . mysqli_error($conexion));
			if($registro > 0){
				echo $numero;
			}
		}
		$contador = $contador-1;
		
	}

?>