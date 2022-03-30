<?php
require_once("../funcionesgenerales/validarlogeo.php");
include('../encapie/encabezado.php');
?>
<div align="center"><label class="tituloFormulario claseFuente">COMEDOR</label></div>

<body>
<?php
$nrotarjeta = $_POST['txtnrotarjeta'];

$hoy = date('Y') .'-'. date('m') .'-'. date('d');
	
include("../alumnos/clsalumno.php");
$alumno = new clsalumno();

$mensajeerror = "";
$encontrado = false;	

$apellido = "";
$nombre = "";
$foto = "";
$dni = "";
	
	
$alumno->nrodetarjeta = $nrotarjeta;
$regalumno = $alumno->getUnAlumnoNroTarjeta();
if($filaAlumno = mysqli_fetch_array( $regalumno, MYSQLI_ASSOC))
{
	include("clscontrolcomedor.php");
	$alumnocomedor = new clscontrolcomedor();
	$alumnocomedor->idalumno = $filaAlumno['idalumno'];
	$alumnocomedor->fechacomedor = $hoy;
	$regalumnocomedor = $alumnocomedor->getUnAlumno();
	if($filaAlumnoComedor = mysqli_fetch_array( $regalumnocomedor, MYSQLI_ASSOC)){
		if($filaAlumnoComedor['idestadoasistencia'] == 99) //estado de pendiente
		{
			//mostrar alumno y espera confirmación de identidad del comedor para poner en presente
			$apellido = $filaAlumnoComedor['apellido'];
			$nombre = $filaAlumnoComedor['nombre'];
			$foto = $filaAlumnoComedor['foto'];
			$dni = $filaAlumnoComedor['dni'];
			$encontrado = true;
			
		} else {
			$mensajeerror = "EL ALUMNO YA PASÓ POR AQUÍ";
			//grabarLOG
		}
	} else {    // El alumno no está listado y no debe comer
		$mensajeerror = "EL ALUMNO NO SE ENCUENTRA HABILITADO PARA COMER EN EL DÍA DE HOY";
		//grabarLOG
	}
}
	
?>
<div align="center">
	<form name="form1" action="mensacurso.php?oper=<?php echo $operacion?>&idcurso=<?php echo $idcurso?>" method="post">
	<table border="0">
		<tr>
			<td>
				<label><?php echo $apellido.', '.$nombre;?></label>
			</td>
			<td>
				<label>D.N.I.: <?php echo $dni;?></label>
			</td>
		</tr>
	</table>
</div>
	
<div align="center">
	<img src="../fotosalumnos/<?php echo $foto;?>">
</div>
<div align="center">
	<table border="0">
		<tr>
			<td>
				<input type="submit" value="CONFIRMAR" class="botonComun botonAzul"/>
			</td>
			<td align="right">
				<a href="grillacurso.php">
					<input type="button" value="RECHAZAR" class="botonComun botonRojo"/>
				</a>
			</td>
		</tr>
	</table>
</div>
</form>
</body>
</html>