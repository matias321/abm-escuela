<?php
	include('../encapie/encabezado.php');
	include('../curso/clscurso.php');
	include('../usuarioxcurso/clsusuariosxcurso.php');
	if(isset($_GET['oper']))
	{
		if($_GET['oper'] == 1)
		{
			$operacion = $_GET['oper'];
			?>
				<div align="center">
					<br>
					<br>
					<h1>Fomulario para ingresar una nueva materia</h1>
					<form action="mensamaterias.php?oper=<?php echo $operacion?>" method="post">
						<label>Ingresar nombre de la materia</label>
						<input type="text" name="nombremateriatxt" placeholder="Nombre de la materia" required>
						<br>
						<br>
						<label>Seleccione un curso</label>
							<select name="cmbcurso" id="cmbcurso" required>
								<option disabled>Seleccione un curso</option>
								<?php
									if($_SESSION['idperfil'] == 2)
									{
										$cursos = new clsCurso();
										$regcursos = $cursos->getTodosLosCursos();
										while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
										{
											echo "<option value=".$cadaCurso['idcurso'].">".$cadaCurso['aniolectivo']. " / ". $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
										}
									}else
										{
											$usuarioxcurso = new clsUsuariosxcurso();
											$usuarioxcurso->idusuario = $_SESSION['usuario'];
											$regcursos = $usuarioxcurso->getTodosLosCursosxUsuario();
											while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
											{
												echo "<option value=".$cadaCurso['idcur'].">" .$cadaCurso['aniolectivo']. " / ". $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
											}
										}
									
								?>
							</select>
						<br>
						<br>
						<label>Seleccionar numero de grupo</label>
							<select name="cmbgrupo" id="cmbgrupo" required>
							</select>
						<br>
						<br>
						<a href="grillamaterias.php">
							<input type="button" value="Regresar">
						</a>
						<input type="submit" value="Ingresar">
					</form>
					<script type="text/javascript" src="../Jquery/jquery-3.6.0.min.js"></script>
						<script language="javascript">
							 $(document).ready(function(){
								 $("#cmbcurso").click(function(){
									$("#cmbcurso option:selected").each(function(){
										id_curso = $(this).val();
										$.post("grupos.php", {
											id_curso: id_curso
										}, function(data){
											$("#cmbgrupo").html(data);	
										});
									}); 
								 })
							 });
						</script>
				</div>
			<?php
		}else
		{
			$operacion = $_GET['oper'];
			$idcurso = $_GET['idcurso'];
			$nombremateria = $_GET['nombremateria'];
			?>
			<div align="center">
					<br>
					<br>
					<h1>Fomulario para ingresar una nueva materia</h1>
					<form action="mensamaterias.php?oper=<?php echo $operacion?>" method="post">
						<label>Ingresar nombre de la materia</label>
						<input type="text" name="nombremateriatxt" placeholder="Nombre de la materia" value="<?php echo $nombremateria ?>" required>
						<br>
						<br>
						<label>Seleccione curso a buscar</label>
							<select name="cmbcurso" id="cmbcurso" required>
								<option disabled>Seleccione un curso</option>
								<?php
									if($_SESSION['idperfil'] == 2)
									{
										$cursos = new clsCurso();
										$regcursos = $cursos->getTodosLosCursos();
										while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
										{
											if($idcurso == $cadaCurso['idcurso'])
											{
												echo "<option value=".$cadaCurso['idcurso']." selected>" . $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
											}else
											{
												echo "<option value=".$cadaCurso['idcurso'].">" . $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
											}
											
										}
									}else
										{
											$usuarioxcurso = new clsUsuariosxcurso();
											$usuarioxcurso->idusuario = $_SESSION['usuario'];
											$regcursos = $usuarioxcurso->getTodosLosCursosxUsuario();
											while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
											{
												if($idcurso == $cadaCurso['idcur'])
												{
													echo "<option value=".$cadaCurso['idcur']." selected>" . $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
												}else
												{
													echo "<option value=".$cadaCurso['idcur'].">" . $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
												}
												
											}
										}
									
								?>
							</select>
							<br>
						<br>
						<label>Seleccionar numero de grupo</label>
							<select name="cmbgrupo" id="cmbgrupo" required>

							</select>
						<br>
						<br>
						<a href="grillamaterias.php">
							<input type="button" value="Regresar">
						</a>
						<input type="submit" value="Guardar">
					</form>
					<script type="text/javascript" src="../Jquery/jquery-3.6.0.min.js"></script>
						<script language="javascript">
							 $(document).ready(function(){
								 $("#cmbcurso").click(function(){
									$("#cmbcurso option:selected").each(function(){
										id_curso = $(this).val();
										$.post("grupos.php", {
											id_curso: id_curso
										}, function(data){
											$("#cmbgrupo").html(data);	
										});
									}); 
								 })
							 });
						</script>
				</div>
			<?php
		}
	}
?>