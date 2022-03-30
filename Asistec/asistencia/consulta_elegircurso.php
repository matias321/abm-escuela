<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
	include('../encapie/encabezado.php');
?>
	<script type="text/javascript" src="../Jquery/jquery-3.6.0.min.js"></script>
		<script language="javascript">
			 $(document).ready(function(){
				 $("#cmbcurso").click(function(){
					$("#cmbcurso option:selected").each(function(){
						id_curso = $(this).val();
						$.post("../alumnos/Jquery.php", {
							id_curso: id_curso
						}, function(data){
							$("#cmbgrupo").html(data);	
						});
					}); 
				 })
			 });
		</script>
	<div class="Separador">
			<br>
			<br>
			<div align="center"><label class="tituloFormulario claseFuente">Asistencia</label></div>

			<?php
			$hoy=date("Y-m-d");
			?>

			<form name="form1" method="post" action="consulta_listarporcurso.php?sSs=<?php echo $_GET['sSs'];?>">
				<div align="center" style="position: relative; top: 20px;">
					<table border="0">
						<tr>
							<td>
								<label>Curso</label>
							</td>
							<td>
								<select name="cmbcurso" class="textBox" id="cmbcurso">
									<option disabled selected>Seleccione un curso</option>
								<?php
									include("../curso/clscurso.php");
									$curso = new clsCurso();
									$regcursos=$curso->getTodosLosCursos();
									while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
									{
										echo "<option value=".$cadaCurso['idcurso'].">" .$cadaCurso['aniolectivo']." / ". $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
									}
								?>
								</select>
								<a>Grupo</a>
								<select name="cmbgrupo" class="textBox" id="cmbgrupo" required>
								</select>
							</td>
						</tr>
					</table>
				</div>
				<div align="center" style="position: relative; top: 40px;">
					<table border="0">
						<tr>
							<td>
								<label style="font-weight: bolder;">Per&iacute;odo</label>
							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<label>Desde</label>
							</td>
							<td>
								<input type="date" name="txtfechadesde"  class="textBox" value="<?php echo date("Y-m-d");?>"/>
							</td>
							<td>
								<label>Hasta</label>
							</td>
							<td>
								<input type="date" name="txtfechahasta"  class="textBox" value="<?php echo date("Y-m-d");?>"/>
							</td>
						</tr>
					</table>
				</div>
				<div align="center" style="position: relative; top: 50px;">
					<a style="text-decoration: none;" href="../index/Index.php?sSs=<?php echo $_GET['sSs'];?>">
						<input type="button" value="Regresar" class="botonVerde botonGrilla"/>
					</a>
					<input type="submit" value="Buscar Curso" class="botonAzulOscuro botonGrilla"/>
				</div>
			</form>
		</body>
	</div>
</html>
