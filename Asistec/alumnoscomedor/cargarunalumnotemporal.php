<?php
require_once("../funcionesgenerales/ValidarLogeo.php");
include('../encapie/encabezado.php');
?>
	<div class="Separador">
			<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Comedor</label></div>
			<div align="center"><label class="tituloFormulario claseFuente">Selecci&oacute;n de un D&iacute;a</label></div>

			<?php

			$hoy = date('Y') .'-'. date('m') .'-'. date('d');

			$idalumno = $_GET['idalumno'];

			include("../alumnos/clsalumno.php");
			$alumno = new clsAlumno();
			$alumno->id=$idalumno;
			$datosalumno = $alumno->getUnAlumno();
			$elalumno=mysqli_fetch_array($datosalumno, MYSQLI_ASSOC);

			//falta ver que dias ya come para cargar la data en los checkbox
			include('clsalumnocomedor.php');
			$alumnoComedor = new clsAlumnoComedor();
			$alumnoComedor->idalumno = $idalumno;
			$diasComedor = $alumnoComedor->getTodosLosDiasUnAlumno();
			$vector= array("","","","","","","");
			while($cadadia = mysqli_fetch_array($diasComedor, MYSQLI_ASSOC))
			{
				$vector[$cadadia['nrodiasemana']] = "S";
			}
			?>

			<div align="center" style="position: relative; top:15px;">
				<label style="font-size: 16px; font-weight: bold; color: darkblue;">
					Alumno: <?php echo $elalumno['apellido'].', '.$elalumno['nombre'];?>
				</label>
				<br>
				<label style="font-size: 16px; font-weight: bold; color: darkblue;">
					DNI: <?php echo $elalumno['dni'];?>
				</label>
			</div>
			<div align="center" style="position: relative; top:45px;">
				<form name="form1" action="guardaralumnocomedor.php?idalumno=<?php echo $idalumno;?> " method="post">
					<table>
						<tr>
							<td>
								<label>Fecha elegida</label>			
							</td>
							<td>
								<input class="textBox" type="date" name="txtfecha" value="<?php echo $hoy;?>"/>
							</td>
						</tr>
					</table>
					<div align="center" style="position: relative; top:25px;">
						<input type="submit" value="Confirmar" class="botonComun botonAzul"/>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="elegiralumno.php?todoelanio=2">
							<input type="button" value="Cancelar"  class="botonComun botonVerde"/>
						</a>
					</div>
				</form>
			</div>
		</body>
	</div>
</html>