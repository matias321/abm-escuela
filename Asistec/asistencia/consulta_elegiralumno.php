<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
	include('../encapie/encabezado.php');
?>
	<div class="Separador">
			<br>
			<br>
			<div align="center"><label class="tituloFormulario claseFuente">Asistencia de un alumno</label></div>
			<?php
				$hoy=date("Y-m-d");
				if(isset($_GET['mensa'])){
				?>
				<div align="center">
					<label><?php echo $_GET['mensa']?></label>
				</div>
				<?php
				}
			?>
			<form name="form1" method="post" action="consulta_elegircurso_alumno.php?sSs=<?php echo $_GET['sSs'];?>">
				<div align="center" style="position: relative; top: 20px;">
					<table border="0">
						<tr>
							<td>
								<div align="center">
									<label>Ingresar DNI del alumno</label>
									<input  style="width: 230px" type="text" name="dnialumno" maxlength="10" 
											placeholder="DNI alumno" class="textBox"/>
									<br>
									<br>
									<label>Desde</label>
									<input type="date" name="txtfechadesde"  class="textBox" value="<?php echo date("Y-m-d");?>"/>
									<label>Hasta</label>
									<input type="date" name="txtfechahasta"  class="textBox" value="<?php echo date("Y-m-d");?>"/>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<div align="center" style="position: relative; top: 50px;">
					<a style="text-decoration: none;" href="../index/Index.php?sSs=<?php echo $_GET['sSs'];?>">
						<input type="button" value="Regresar" class="botonVerde botonGrilla" />
					</a>
					<input type="submit" value="Buscar Alumno" class="botonAzulOscuro botonGrilla"/>
				</div>
			</form>
		</body>
	</div>
</html>

