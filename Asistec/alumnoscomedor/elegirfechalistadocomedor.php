<?php
require_once("../funcionesgenerales/ValidarLogeo.php");
include('../encapie/encabezado.php');
?>
	<div class="Separador">
			<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Comedor</label></div>
			<div align="center"><label class="tituloFormulario claseFuente">Listado de Alumnos para una Fecha determinada</label></div>

			<div align="center" style="position: relative; top: 20px;">
				<table border="0">
					<tr>
						<form name="form1" method="post" action="buscaralumnosparalistado.php?sele=1">
							<td>
								<label>Fecha deseada</label>
							</td>
							<td>
								<input class="select" type="date" name="txtfecha" value="">
							</td>
							<td>
								<input type="submit" value="Buscar" class="botonComun botonGris">
							</td>
						</form>
					</tr>
				</table>
			</div>
		</body>
	</div>
</html>
