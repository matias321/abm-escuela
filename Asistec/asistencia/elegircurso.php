<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
	include('../encapie/encabezado.php');
	include('../usuarioxcurso/clsusuariosxcurso.php');
	include('../curso/clscurso.php');
	//Esta pantalla es para que el usuario elija el curso, el grupo, el turno y la fecha para tomar asistencia
?>
	<div class="Separador">
	<div align="center">
		<h1 class="tituloFormulario claseFuente">Tomar Asistencia</h1>
	</div>
		<?php
			$hoy=date("Y-m-d");
		?>
		<form name="form1" method="post" action="buscarcurso.php?sSs=<?php echo $_GET['sSs'];?>">
			<div align="center" style="position: relative; top: 20px;">
				<table border="0" align="center">
					<tr>
						<td>
							<label>Curso</label>
						</td>
						<td>
							<select name="cmbcurso" class="textBox" id="cmbcurso">
								<option disabled>Seleccione un curso</option>
								<?php
									if($SS_IDPERFIL == 2)
									{
										// solo los cursos de $SS_IDUSUARIO
										$cursos = new clsCurso();
										$regcursos = $cursos->getTodosLosCursos();
										while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
										{
											echo "<option value=".$cadaCurso['idcurso'].">" .$cadaCurso['aniolectivo']. " / ".$cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
										}
									}else
										{
											$usuarioxcurso = new clsUsuariosxcurso();
											$usuarioxcurso->idusuario = $SS_IDUSUARIO;
											$regcursos = $usuarioxcurso->getTodosLosCursosxUsuario();
											while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
											{
												echo "<option value=".$cadaCurso['idcur'].">" .$cadaCurso['aniolectivo']. " / ". $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
											}
										}
								?>
							</select>
							<label>Grupo</label>
								<select name="cmbgrupo" class="textBox" id="cmbgrupo" required>
								</select>
						</td>
					</tr>
				</table>
			</div>
			<div align="center" style="position: relative; top: 30px;">
				<table border="0">
					<tr>
						<td>
							<label>Turno</label>
						</td>
						<td>
							<select name="cmbturno" class="textBox" id="cmbturno">
							</select>
						</td>
					</tr>
				</table>
			</div>
			<div align="center" style="position: relative; top: 40px;">
				<table border="0">
					<tr>
						<td>
							<label>Fecha</label>
						</td>
						<td>
							<input type="date" name="txtfecha"  class="textBox" value="<?php echo date("Y-m-d");?>"/>
						</td>
					</tr>
				</table>
			</div>
			<br>
			<br>
			<br>
			<div align="center" >
				<a style="text-decoration: none;" href="../index/Index.php?sSs=<?php echo $_GET['sSs'];?>">
					<input type="button" value="Regresar" class="botonVerde botonGrilla"/>
				</a>
				<input type="submit" value="Tomar Asistencia" class="botonAzulOscuro botonGrilla"/>
			</div>
		</form>
	</div>
	</body>
		<script type="text/javascript" src="../Jquery/jquery-3.6.0.min.js"></script>
			<script language="javascript">
				 $(document).ready(function(){
					 $("#cmbcurso").click(function(){
						$("#cmbcurso option:selected").each(function(){
							id_curso = $(this).val();
							$.post("gruposxcurso.php", {
								id_curso: id_curso
							}, function(data){
								$("#cmbgrupo").html(data);	
							});
						}); 
					 })
				 });
				 $(document).ready(function(){
					 $("#cmbcurso").click(function(){
						$("#cmbcurso option:selected").each(function(){
							id_curso = $(this).val();
							$.post("turnosxcurso.php", {
								id_curso: id_curso
							}, function(data){
								$("#cmbturno").html(data);	
							});
						}); 
					 })
				 });
			</script>
</html>
