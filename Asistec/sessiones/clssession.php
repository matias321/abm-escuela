<?php

class clsSession {
	public $id;
	public $idusuario;
	public $fecha;
	public $hora;
	public $idperfil;
	public $apenom;


	public function Insertar() {
		include ("../funcionesgenerales/clsSQL.php");

		//Establece la hora de Argentina
		date_default_timezone_set('America/Argentina/Buenos_Aires');

		$consulta="insert into sessions (idsession, idusuario, fecha, hora, idperfil, apenom)
								values ('".$this->id."','".$this->idusuario."','".date('Y-m-d')."','".date('H:i:s')."','"
								          .$this->idperfil."','".$this->apenom."')";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para insertar la sesión --> " . mysqli_error($conexion));
	
		mysqli_close($conexion);
		return $registro;
	}
	public function Actualizar() {
		include ("../funcionesgenerales/clsSQL.php");

		//Establece la hora de Argentina
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		
		$consulta="update sessions 
		              set fecha = '".date('Y-m-d')."'
		                , hora = '".date('H:i:s')."'
		            where idsession = '".$this->id."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para actualizar la sesión --> " . mysqli_error($conexion));
	
		mysqli_close($conexion);
		return $registro;
	}
	public function Cerrar() {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="delete from sessions 
		            where idsession = '".$this->id."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para Cerrar la sesión --> " . mysqli_error($conexion));
	
		mysqli_close($conexion);
		return $registro;
	}
	public function Limpiar() {
		include ("../funcionesgenerales/clsSQL.php");
	
		$hoy = date('Y-m-d');
		$consulta="delete from sessions 
		            where fecha < '".$hoy."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para Cerrar la sesión --> " . mysqli_error($conexion));
	
		mysqli_close($conexion);
		return $registro;
	}
	public function getUnaSession() {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idsession, idusuario, fecha, hora, idperfil, apenom
		             from sessions
		            where idsession = ".$this->id." ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer una sesión --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		
		return $registro;
	}
	public function getUnUsuario() {
		include ("../funcionesgenerales/clsSQL.php");
		
		$consulta="select idsession, idusuario, fecha, hora, idperfil, apenom
		             from sessions
		            where idusuario = '".$this->idusuario."' ";
		$registro=mysqli_query($conexion, $consulta) 
		          or die ("Problemas para traer una sesión del usuario --> " . mysqli_error($conexion));
		
		mysqli_close($conexion);
		
		return $registro;
	}
	public function generarSessionId() {
		return random_int(1213141516,9897969594);
	}
	public function controlarVencimientoSession($cantidadMinutosSession, $fechasession, $horasession){

		$resultado = 1;

		//Establece la fecha y hora de Argentina
		date_default_timezone_set('America/Argentina/Buenos_Aires');

		$hoy = date('Y-m-d');
		$dia=substr($hoy,8,2);
		$mes=substr($hoy,5,2);
		$anio=substr($hoy,0,4);

		$diass=substr($fechasession,8,2);
		$messs=substr($fechasession,5,2);
		$anioss=substr($fechasession,0,4);

		if(($dia == $diass) && ($mes == $messs) && ($anio == $anioss)){
			$ahora = date('H:i:s');
			$haux=substr($ahora,0,2).substr($ahora,3,2).substr($ahora,6,2);

			$hss=substr($horasession,0,2);
			$mss=substr($horasession,3,2);
			$sss=substr($horasession,6,2);

			$mss += $cantidadMinutosSession;
			if($mss >= 60){
				$mss = $mss - 60;
				$hss += 1;
				if ($hss >= 24){
					$resultado = 0;
				} else {
					if ($mss < 10){
						$hss = $hss."0".$mss.$sss;
					} else {
						$hss = $hss.$mss.$sss;
					}
				}
			} else {
				if ($mss < 10){
					$hss = $hss."0".$mss.$sss;
				} else {
					$hss = $hss.$mss.$sss;
				}
			}

			if ($resultado > 0){
				if($hss >= $haux){
					$resultado = 1;
				} else {
					$resultado = 0;
				}
			}
		} else {
			// SESSION VENCIDA POR CAMBIO DE DÍA
			$resultado = 0;
		}

		return $resultado;
	}
}



?>