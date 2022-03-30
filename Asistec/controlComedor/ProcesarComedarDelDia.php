<?php
require_once("../funcionesgenerales/validarlogeo.php");
$fecha = date('Y') .'-'. date('m') .'-'. date('d');;

$diaelegido = date("w", strtotime($fecha));

include("../alumnoscomedor/clsalumnocomedor.php");
$datosAlumnosComedorDiario = new clsalumnocomedor();
$datosAlumnosComedorDiario->nrodia = $diaelegido;
$regAlumnosComedorDiario = $datosAlumnosComedorDiario->getTodosLosAlumnosUnDia();
$INIdAlumno = array();
while($filaAlumnosComedorDiario=mysqli_fetch_array($regAlumnosComedorDiario, MYSQLI_ASSOC)){
	array_push($INIdAlumno, $filaAlumnosComedorDiario['idalumno']);
}
// buscar en la tabla temporal
//getTodosLosAlumnosUnDiaTemporal($fecha)
$regAlumnosComedorTemporal = $datosAlumnosComedorDiario->getTodosLosAlumnosUnDiaTemporal($fechaelegida);

while($filaAlumnosComedorTemporal=mysqli_fetch_array($regAlumnosComedorTemporal, MYSQLI_ASSOC)){
	array_push($INIdAlumno, $filaAlumnosComedorTemporal['idalumno']);
}

include("../asistencia/clsasistencia.php");
include("../controlcomedor/clscontrolcomedor.php");
if(sizeof($INIdAlumno) > 0){
	$asist = new clsasistencia();
	$asist->fecha = $fecha;

	$controlComedor = new clscontrolcomedor();
	$ind = 0;
	while(ind < sizeof($INIdAlumno)){
		//por cada alumno encontrado
		$asist->idalumno = $INIdAlumno[ind];
		$regAlumnos = $asist->getUnAlumnosUnDia();
		
		if($cadaRegistro=mysqli_fetch_array($regAlumnos, MYSQLI_ASSOC))
		{
			//PRESENTE = 1 -- TARDE = 2
			if(($cadaRegistro['idestadoasistencia'] == 1) || ($cadaRegistro['idestadoasistencia'] == 2))
			{
				//INSERTAR EN ASISTENCIA COMEDOR
				$controlComedor->idalumno = $INIdAlumno[ind];
				$controlComedor->fechacomedor = $fecha;
				$controlComedor->idestadoasistencia = 99;
				$controlComedor->observaciones = "";
				if($controlComedor->insertar() == 0){
					//grabar LOG de ERRORES
				}
			} else {
				//grabar LOG con FALTO A LA ESCUELA.
			}
		}
		
		$ind += 1;
	}
}





?>