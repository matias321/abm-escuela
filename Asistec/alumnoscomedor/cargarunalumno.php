<?php
require_once("../funcionesgenerales/ValidarLogeo.php");
include('../encapie/encabezado.php');
?>
	<div class="Separador">
			<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Comedor</label></div>
			<div align="center"><label class="tituloFormulario claseFuente">Selecci&oacute;n de D&iacute;as en el A&ntilde;o</label></div>

			<?php
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
			<div align="center" style="position: relative; top:25px;">
				<label style="font-size: 16px; font-style: italic; font-weight: bold;">DIAS PARA LOS QUE ESTARÁ HABILITADO</label>
			</div>
			<div align="center" style="position: relative; top:45px;">
				<form name="form1" action="guardaralumnocomedor.php?idalumno=<?php echo $idalumno;?> " method="post">
					<table>
						<tr>
							<td>
								<?php
									if($vector[1] == "S")
									{
										echo '
											<label class="container">LUNES
											  <input type="checkbox" name="chkLunes" checked>
											  <span class="checkmark"></span>
											</label>		
										';
									} else {
										echo '
											<label class="container">LUNES
											  <input type="checkbox" name="chkLunes">
											  <span class="checkmark"></span>
											</label>		
										';
									}
								?>
							</td>
							<td>
								<?php
									if($vector[2] == "S")
									{
										echo '
											<label class="container">MARTES
											  <input type="checkbox" name="chkMartes" checked>
											  <span class="checkmark"></span>
											</label>		
										';
									} else {
										echo '
											<label class="container">MARTES
											  <input type="checkbox" name="chkMartes">
											  <span class="checkmark"></span>
											</label>		
										';
									}
								?>
							</td>
							<td>
								<?php
									if($vector[3] == "S")
									{
										echo '
											<label class="container">MIERCOLES
											  <input type="checkbox" name="chkMiercoles" checked>
											  <span class="checkmark"></span>
											</label>		
										';
									} else {
										echo '
											<label class="container">MIERCOLES
											  <input type="checkbox" name="chkMiercoles">
											  <span class="checkmark"></span>
											</label>		
										';
									}
								?>
							</td>
							<td>
								<?php
									if($vector[4] == "S")
									{
										echo '
											<label class="container">JUEVES
											  <input type="checkbox" name="chkJueves" checked>
											  <span class="checkmark"></span>
											</label>		
										';
									} else {
										echo '
											<label class="container">JUEVES
											  <input type="checkbox" name="chkJueves">
											  <span class="checkmark"></span>
											</label>		
										';
									}
								?>
							</td>
							<td>
								<?php
									if($vector[5] == "S")
									{
										echo '
											<label class="container">VIERNES
											  <input type="checkbox" name="chkViernes" checked>
											  <span class="checkmark"></span>
											</label>		
										';
									} else {
										echo '
											<label class="container">VIERNES
											  <input type="checkbox" name="chkViernes">
											  <span class="checkmark"></span>
											</label>		
										';
									}
								?>
							</td>
							<td>
								<?php
									if($vector[6] == "S")
									{
										echo '
											<label class="container">SABADO
											  <input type="checkbox" name="chkSabado" checked>
											  <span class="checkmark"></span>
											</label>		
										';
									} else {
										echo '
											<label class="container">SABADO
											  <input type="checkbox" name="chkSabado">
											  <span class="checkmark"></span>
											</label>		
										';
									}
								?>
							</td>
							<td>
								<?php
									if($vector[0] == "S")
									{
										echo '
											<label class="container">DOMINGO
											  <input type="checkbox" name="chkDomingo" checked>
											  <span class="checkmark"></span>
											</label>		
										';
									} else {
										echo '
											<label class="container">DOMINGO
											  <input type="checkbox" name="chkDomingo">
											  <span class="checkmark"></span>
											</label>		
										';
									}
								?>
						</tr>
					</table>
					<div align="center" style="position: relative; top:25px;">
						<input type="submit" value="Confirmar" class="botonComun botonAzul"/>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="elegiralumno.php?todoelanio=1">
							<input type="button" value="Cancelar"  class="botonComun botonVerde"/>
						</a>
					</div>
				</form>
			</div>
		</body>
	</div>
</html>