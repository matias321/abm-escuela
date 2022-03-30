<?php
require_once("../funcionesgenerales/ValidarLogeo.php");
$fechaelegida = $_POST['txtfecha'];

$fechastr = substr($fechaelegida,8,2)."/".substr($fechaelegida,5,2)."/".substr($fechaelegida,0,4);

$diaelegido = date("w", strtotime($fechaelegida));
switch($diaelegido){
	case 0: $diastr = "DOMINGO";
		break;
	case 1: $diastr = "LUNES";
		break;
	case 2: $diastr = "MARTES";
		break;
	case 3: $diastr = "MIERCOLES";
		break;
	case 4: $diastr = "JUEVES";
		break;
	case 5: $diastr = "VIERNES";
		break;
	case 6: $diastr = "SABADO";
		break;
}
// el resultado de los días puede ser:
/*
1=LUNES
2=MARTES
3=MIERCOLES
4=JUEVES
5=VIERNES
6=SABADO
0=DOMINGO
*/
include("clsalumnocomedor.php");
$datosAlumnosComedorDiario = new clsAlumnoComedor();
$datosAlumnosComedorDiario->nrodia = $diaelegido;
$regAlumnosComedorDiario = $datosAlumnosComedorDiario->getTodosLosAlumnosUnDia();
$INIdAlumno = "";
while($filaAlumnosComedorDiario=mysqli_fetch_array($regAlumnosComedorDiario, MYSQLI_ASSOC)){
	if($INIdAlumno != ""){
		$INIdAlumno .= ",";	
	} 
	$INIdAlumno .= $filaAlumnosComedorDiario['idalumno'];
}
// buscar en la tabla temporal
//getTodosLosAlumnosUnDiaTemporal($fecha)
$regAlumnosComedorTemporal = $datosAlumnosComedorDiario->getTodosLosAlumnosUnDiaTemporal($fechaelegida);

while($filaAlumnosComedorTemporal=mysqli_fetch_array($regAlumnosComedorTemporal, MYSQLI_ASSOC)){
	if($INIdAlumno != ""){
		$INIdAlumno .= ",";	
	} 
	$INIdAlumno .= $filaAlumnosComedorTemporal['idalumno'];
}

?>
<?php
include('../encapie/encabezado.php');
?>
	<div class="Separador">
			<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Comedor</label></div>
			<div align="center"><label class="tituloFormulario claseFuente">Listado de Alumnos para una Fecha determinada</label>
			<br>
				<label class="tituloFormulario claseFuente"><?php echo $diastr. " " .$fechastr;?></label>
			</div>

			<div align="center" style="position: relative; top:25px;">
				<table border="1" class="tftable">
					<!-- CABECERA -->
					<tr>
						<td class="tfencabezado">DNI</td>
						<td class="tfencabezado">APELLIDO</td>
						<td class="tfencabezado">NOMBRE</td>
					</tr>
					<!-- FIN CABECERA -->
					<!-- DETALLE -->
					<?php
					include("../alumnos/clsalumno.php");
					if($INIdAlumno != ""){
						$alumnos = new clsAlumno();
						$regAlumnos = $alumnos->getTodosLosAlumnosINIdalumno($INIdAlumno);

						while($cadaRegistro=mysqli_fetch_array($regAlumnos, MYSQLI_ASSOC)){
						?>

						<tr>
							<td><?php echo $cadaRegistro['dni'] ?></td>
							<td><?php echo $cadaRegistro['apellido'] ?></td>
							<td><?php echo $cadaRegistro['nombre'] ?></td>
						</tr>
					<?php
						}
					}
					?>
					<!-- FIN DETALLE -->
				</table>
			</div>
	</div>
</html>


