<?php
require_once("../funcionesgenerales/ValidarLogeo.php");
include('../encapie/encabezado.php');
?>
	<div class="Separador">
		<div align="center"><label class="tituloFormulario claseFuente">COMEDOR</label></div>
		<body>
			<div align="center">
				<form name="form1" action="mostraralumno.php" method="post">
					<table border="0">
						<tr>
							<td>
								<label>C&oacute;digo de Tarjeta</label>
							</td>
							<td>
								<input class="input" type="text" name="txtnrotarjeta" value="">
								<input type="submit" value="Buscar" class="botonComun botonAzul"/>
							</td>
							
						</tr>
								
					</table>
				</form>
			</div>
		</body>
	</div>
</html>