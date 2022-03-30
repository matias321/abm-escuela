<?php
require_once("../funcionesgenerales/ValidarLogeo.php");
include('../encapie/encabezado.php');
?>
<div class="Separador">
			<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Comedor</label></div>
			<?php
			if($_GET['todoelanio'] == 1)
			{
				$titulo="Selecci&oacute;n de D&iacute;as en el A&ntilde;o";
			}else{
				$titulo="Selecci&oacute;n de un D&iacute;a";
			}
			?>
			<div align="center"><label class="tituloFormulario claseFuente"><?php echo $titulo;?></label></div>

			<div align="center" style="position: relative; top: 20px;">
				<table border="0">
					<tr>
						<form name="form1" method="post" action="buscaralumno.php?sele=1&todoelanio=<?php echo $_GET['todoelanio'];?>">
							<td>
								<label>DNI</label>
							</td>
							<td>
								<input class="input" type="text" name="txtdni" value="">
							</td>
							<td>
								<input type="submit" value="Buscar por DNI" class="botonComun botonGris">
							</td>
						</form>
					</tr>
					<tr>
					</tr>
					<tr>
					</tr>
					<tr>
						<form name="form2" method="post" action="buscaralumno.php?sele=2&todoelanio=<?php echo $_GET['todoelanio'];?>">
							<td>
								<label>APELLIDO y NOMBRE</label>
							</td>
							<td>
								<select name="cmbalumno" class="select">
								<?php
									include("../alumnos/clsalumno.php");
									$alumno = new clsAlumno();
									$regalumnos=$alumno->getTodosLosAlumnos();
									while($cadaAlumno=mysqli_fetch_array($regalumnos, MYSQLI_ASSOC))
									{
										echo "<option value=".$cadaAlumno['idalumno'].">".$cadaAlumno['apellido'].", ".$cadaAlumno['nombre']."</option>";
									}
								?>
								</select>
							</td>
							<td>
								<input type="submit" value="Buscar por Apellido y Nombre" class="botonComun botonGris">
							</td>
						</form>
					</tr>
				</table>
			</div>
		</body>
	</div>
</html>
