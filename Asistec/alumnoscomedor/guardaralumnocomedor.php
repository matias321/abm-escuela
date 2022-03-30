<?php
require_once("../funcionesgenerales/ValidarLogeo.php");
include('../encapie/encabezado.php');
?>
	<div class="Separador">
		<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Comedor</label></div>
		<div align="center"><label class="tituloFormulario claseFuente">Selecci&oacute;n de D&iacute;as en el A&ntilde;o</label></div>

		<?php
		$diasquecomera="";
		$idalumno = $_GET['idalumno'];
		include('clsalumnocomedor.php');
		// borrar todas las ocurrencias que ya existan para ese idalumno
		$alumnocomedor = new clsAlumnoComedor();
		$alumnocomedor->idalumno=$idalumno;
		$alumnocomedor->borrar();
		// luego insertar lo seleccionado.
		if(isset($_POST['chkLunes'])){
			$alumnocomedor->nrodia = 1;
			$alumnocomedor->insertar();
			if($diasquecomera==""){
				$diasquecomera=" LUNES";
			} else {
				$diasquecomera=$diasquecomera.", LUNES";
			}
		}
		if(isset($_POST['chkMartes'])){
			$alumnocomedor->nrodia = 2;
			$alumnocomedor->insertar();
			if($diasquecomera==""){
				$diasquecomera=" MARTES";
			} else {
				$diasquecomera=$diasquecomera.", MARTES";
			}
		}
		if(isset($_POST['chkMiercoles'])){
			$alumnocomedor->nrodia = 3;
			$alumnocomedor->insertar();
			if($diasquecomera==""){
				$diasquecomera=" MIERCOLES";
			} else {
				$diasquecomera=$diasquecomera.", MIERCOLES";
			}
		}
		if(isset($_POST['chkJueves'])){
			$alumnocomedor->nrodia = 4;
			$alumnocomedor->insertar();
			if($diasquecomera==""){
				$diasquecomera=" JUEVES";
			} else {
				$diasquecomera=$diasquecomera.", JUEVES";
			}
		}
		if(isset($_POST['chkViernes'])){
			$alumnocomedor->nrodia = 5;
			$alumnocomedor->insertar();
			if($diasquecomera==""){
				$diasquecomera=" VIERNES";
			} else {
				$diasquecomera=$diasquecomera.", VIERNES";
			}
		}
		if(isset($_POST['chkSabado'])){
			$alumnocomedor->nrodia = 6;
			$alumnocomedor->insertar();
			if($diasquecomera==""){
				$diasquecomera=" SABADO";
			} else {
				$diasquecomera=$diasquecomera.", SABADO";
			}
		}
		if(isset($_POST['chkDomingo'])){
			$alumnocomedor->nrodia = 0;
			$alumnocomedor->insertar();
			if($diasquecomera==""){
				$diasquecomera=" DOMINGO";
			} else {
				$diasquecomera=$diasquecomera.", DOMINGO";
			}
		}
		?>
		<br>
		<br>
			<div align="center">
				<?php
				if ($diasquecomera!="")
				{
					echo '<label style="font-size: 20px; font-weight: bold; color: darkblue;">
								El alumno comera los dias '.$diasquecomera.'
						  </label>';
				} else {
					echo '<label style="font-size: 20px; font-weight: bold; color: darkblue;">
								El alumno no comera ningun dia
						  </label>';
				} 
				?>
				<br>
				<br>
				<a href="elegiralumno.php">
					<input type="button" value="Regresar" class="botonComun botonVerde"/>
				</a>
			</div>
		</body>
	</div>
</html>
	