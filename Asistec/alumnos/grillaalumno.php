<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include("../encapie/encabezado.php");	
include("../curso/clscurso.php");
include('../alumnosxcurso/clsalumnosxcurso.php');
include('../usuarioxcurso/clsusuariosxcurso.php');
?>
		<div align="center">
			<br>
			<br>
			<h1>Administracion de alumnos</h1>
				<a style="text-decoration: none;" href="formualumno.php?sSs=<?php echo $_GET['sSs'];?>&oper=1">
					<input type="button" class="botonAzulOscuro botonGrilla" value="Ingresar Nuevo Alumno">
				</a>
				<br>
				<br>
				<label>Buscar alumno por:</label>
				<br>
				<br>
				<form action="grillaalumno.php?sSs=<?php echo $_GET['sSs'];?>" method="post">
					<label>Nombre:</label>
					<input type="text" name="buscaralumnoxnombre" class="textBox" required placeholder="Nombre del alumno">
					<input type="submit" class="botonGris botonGrilla" name="botonbuscarxnombre" value="Buscar">
				</form>
				<br>
				<form action="grillaalumno.php?sSs=<?php echo $_GET['sSs'];?>" method="post">
					<label>Apellido:</label>
					<input type="text" name="buscaralumnoxapellido" class="textBox" required placeholder="apellido del alumno">
					<input type="submit" class="botonGris botonGrilla" name="botonbuscarxapellido" value="Buscar">
				</form>
				<br>
				<form action="grillaalumno.php?sSs=<?php echo $_GET['sSs'];?>" method="post">
					<label>D.N.I.</label>
					<input type="text" name="buscaralumnoxdni" class="textBox" required placeholder="DNI del alumno">
					<input type="submit" class="botonGris botonGrilla" name="botonbuscarxdni" value="Buscar">
				</form>
				<br>
				<form action="grillaalumno.php?sSs=<?php echo $_GET['sSs'];?>" method="post">
					<label>Tarjeta Nº </label>
					<input type="text" name="buscaralumnoxnrotarjeta" class="textBox" required placeholder="Numero de tarjeta del alumno">
					<input type="submit" class="botonGris botonGrilla" name="botonbuscarxnrotarjeta" value="Buscar">
				</form>
				<br>
				<form action="" method="post" name="form3">
						<label>Selecciona el curso</label>
						<select name="cmbcurso" class="textBox" id="cmbcurso" required>
							<option disabled>Seleccione un curso</option>
							<?php
								if($_SESSION['idperfil'] == 2)
								{
									$cursos = new clsCurso();
									$regcursos = $cursos->getTodosLosCursos();
									while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
									{
										echo "<option value=".$cadaCurso['idcurso'].">" .$cadaCurso['aniolectivo']. " / ".$cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
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
						<a>Grupo</a>
						<select name="cmbgrupo" class="textBox" id="cmbgrupo" required>
							<option disabled>Grupos</option>
						</select>
						<input type="submit" class="botonGris botonGrilla" value="Buscar" name="buscarCursobtn" />
					</form>
				<br>
				<a style="text-decoration: none;" href="grillaalumno.php?sSs=<?php echo $_GET['sSs'];?>">
					<input type="button" class="botonVerde botonGrilla" value="Mostrar todos los alumnos">
				</a>
				<br>
				<br>
				<table border ="1" align="center" class="tftable">
					<!-- CABECERA DE LA GRILLA -->	
						<tr>
							<th class="tfencabezado">FOTO</th>
							<th class="tfencabezado">APELLIDO</th>
							<th class="tfencabezado">NOMBRE</th>
							<th class="tfencabezado">DNI</th>
							<th class="tfencabezado">FEC. NAC.</th>
							<th class="tfencabezado">NRODETARJETA</th>
							<th class="tfencabezado">Genero</th>
							<th class="tfencabezado">Email</th>
							<th class="tfencabezado">Año lectivo</th>
							<th class="tfencabezado">Curso</th>
							<th class="tfencabezado">Grupo</th>
							<th class="tfencabezado">Estado</th>	
						</tr>
						<!-- FINAL DE CABECERA -->
						<!-- INICIO DETALLE DE GRILLA -->
						<?php
						include("clsalumno.php");
						$alumno = new clsAlumno();
						if(isset($_POST['botonbuscarxnombre'])){
							$alumno->nombre = $_POST['buscaralumnoxnombre'];
							$datosTodosLosAlumnos = $alumno->getalumnosxnombre();
							mostrartodoslosalumnos($datosTodosLosAlumnos);
						}else
							if(isset($_POST['botonbuscarxapellido'])){
								$alumno->apellido = $_POST['buscaralumnoxapellido'];
								$datosTodosLosAlumnos = $alumno->getalumnosxapellido();
								mostrartodoslosalumnos($datosTodosLosAlumnos);
							}else	
								if(isset($_POST['botonbuscarxdni'])){
									$alumno->dni = $_POST['buscaralumnoxdni'];
									$datosTodosLosAlumnos = $alumno->getUnAlumnoDNI();
									mostrartodoslosalumnos($datosTodosLosAlumnos);	
								}else
									if(isset($_POST['botonbuscarxnrotarjeta'])){
										$alumno->nrodetarjeta = $_POST['buscaralumnoxnrotarjeta'];
										$datosTodosLosAlumnos = $alumno->getUnAlumnoNroTarjeta();
										mostrartodoslosalumnos($datosTodosLosAlumnos);
									}else
										if(isset($_POST['buscarCursobtn'])){
								
										$aluxcur = new clsAlumnosxcurso();
										$aluxcur->idcurso=$_POST['cmbcurso'];
										$aluxcur->nrogrupo = $_POST['cmbgrupo'];
										$regaluxcur = $aluxcur->getTodosLosAlumnosxCurso();
										
										$curso=new clsCurso();
										$curso->idcurso=$_POST['cmbcurso'];
										$regcurso=$curso->getUnCurso();
										$elcurso=mysqli_fetch_array($regcurso, MYSQLI_ASSOC);
										$subtitulo = $elcurso['anio'] . "° " . $elcurso['division'] . "<br>";
										while($cadaRegistro=mysqli_fetch_array($regaluxcur, MYSQLI_ASSOC)){
												$ruta_img = $cadaRegistro['foto'];
											?>
												<tr>
													<td><img width="32" height="32" src="../Imagenes/ImagenesAlumnos/<?php echo $ruta_img?>"</img></td>
													<td><?php echo $cadaRegistro['apellido'] ?> </td>
													<td><?php echo $cadaRegistro['nombre'] ?> </td>
													<td><?php echo $cadaRegistro['dni'] ?> </td>
													<td><?php echo $cadaRegistro['fechanacimiento'] ?> </td>
													<td><?php echo $cadaRegistro['nrotarjeta'] ?> </td>
													<td><?php echo $cadaRegistro['genero_alumn'] ?> </td>
													<td><?php echo $cadaRegistro['Email'] ?> </td>
													<td><?php echo $cadaRegistro['aniolectivo'] ?> </td>
													<td><?php echo $subtitulo ?> </td>
													<td><?php echo $aluxcur->nrogrupo ?> </td>
													<td colspan="2">
														<!-- oper 2 edicion -->
														<a href="formualumno.php?sSs=<?php echo $_GET['sSs'];?>&oper=2&idalumno=<?php echo $cadaRegistro['idalu']?>&nombre=<?php echo $cadaRegistro['nombre']?>&apellido=<?php echo $cadaRegistro['apellido']?>&dni=<?php echo $cadaRegistro['dni']?>&fechanacimiento=<?php echo $cadaRegistro['fechanacimiento']?>&nrotarjeta=<?php echo $cadaRegistro['nrotarjeta']?>&genero=<?php echo $cadaRegistro['genero_alumn']?>&correo=<?php echo $cadaRegistro['Email']?>&aniolectivo=<?php echo $cadaRegistro['aniolectivo']?>&foto=<?php echo $cadaRegistro['foto']?>&idcurso=<?php echo $curso->idcurso?>&nrogrupo=<?php echo $aluxcur->nrogrupo?>"
															style="text-decoration: none;">
															<input type="button" value="Editar" class="botonGris">
														</a>
														<!-- oper 3 borrar -->
														<a href="formuconfirmacion.php?sSs=<?php echo $_GET['sSs'];?>&oper=3&idalumno=<?php echo $cadaRegistro['idalu']?>&nombre=<?php echo $cadaRegistro['nombre']?>&apellido=<?php echo $cadaRegistro['apellido']?>&dni=<?php echo $cadaRegistro['dni']?>&fechanacimiento=<?php echo $cadaRegistro['fechanacimiento']?>&nrotarjeta=<?php echo $cadaRegistro['nrotarjeta']?>&genero=<?php echo $cadaRegistro['genero_alumn']?>&correo=<?php echo $cadaRegistro['Email']?>&aniolectivo=<?php echo $cadaRegistro['aniolectivo']?>&foto=<?php echo $cadaRegistro['foto']?>&idcurso=<?php echo $curso->idcurso?>&nrogrupo=<?php echo $aluxcur->nrogrupo?>"style="text-decoration: none;">
															<input type="button" value="Borrar" class="botonRojo">
														</a>
													</td>
												</tr>
											<?php
											}
						 			}else{
										$datosTodosLosAlumnos = $alumno->getTodosLosAlumnos();
										mostrartodoslosalumnos($datosTodosLosAlumnos);
						 			}
						?>
						<!-- FINAL DETALLE DE GRILLA -->
				</table>
			</div>
	</body>
	<script type="text/javascript" src="../Jquery/jquery-3.6.0.min.js"></script>
		<script language="javascript">
			 $(document).ready(function(){
				 $("#cmbcurso").click(function(){
					$("#cmbcurso option:selected").each(function(){
						id_curso = $(this).val();
						$.post("Jquery.php", {
							id_curso: id_curso
						}, function(data){
							$("#cmbgrupo").html(data);	
						});
					}); 
				 })
			 });
		</script>
</html>
<?php
	 function mostrartodoslosalumnos($datos){
		while($cadaRegistro=mysqli_fetch_array($datos, MYSQLI_ASSOC)){
			$ruta_img = $cadaRegistro['foto'];

			$aluxcur = new clsAlumnosxcurso();
			$aluxcur->idalumno = $cadaRegistro['idalumno'];
			$regcursoalum = $aluxcur->getGrupo_Curso();
			$elcursodelalumno=mysqli_fetch_array($regcursoalum, MYSQLI_ASSOC);

			$curso=new clsCurso();
			$curso->idcurso= $elcursodelalumno['idcurso'];
			$regcurso=$curso->getUnCurso();
			$elcurso=mysqli_fetch_array($regcurso, MYSQLI_ASSOC);
			$subtitulo = $elcurso['anio'] . "° " . $elcurso['division'] . "<br>";
		?>
			<tr>
				<td><img width="32" height="32" src="../Imagenes/ImagenesAlumnos/<?php echo $ruta_img?>"</img></td>
				<td><?php echo $cadaRegistro['apellido'] ?> </td>
				<td><?php echo $cadaRegistro['nombre'] ?> </td>
				<td><?php echo $cadaRegistro['dni'] ?> </td>
				<td><?php echo $cadaRegistro['fechanacimiento'] ?> </td>
				<td><?php echo $cadaRegistro['nrotarjeta'] ?> </td>
				<td><?php echo $cadaRegistro['genero_alumn'] ?> </td>
				<td><?php echo $cadaRegistro['Email'] ?> </td>
				<td><?php echo $cadaRegistro['aniolectivo'] ?> </td>
				<td><?php echo $subtitulo ?> </td>
				<td><?php echo $elcursodelalumno['nrogrupo'] ?> </td>
				<td colspan="2">
					<!-- oper 2 edicion -->
					<a href="formualumno.php?sSs=<?php echo $_GET['sSs'];?>&oper=2&idalumno=<?php echo $cadaRegistro['idalumno']?>&nombre=<?php echo $cadaRegistro['nombre']?>&apellido=<?php echo $cadaRegistro['apellido']?>&dni=<?php echo $cadaRegistro['dni']?>&fechanacimiento=<?php echo $cadaRegistro['fechanacimiento']?>&nrotarjeta=<?php echo $cadaRegistro['nrotarjeta']?>&genero=<?php echo $cadaRegistro['genero_alumn']?>&correo=<?php echo $cadaRegistro['Email']?>&aniolectivo=<?php echo $cadaRegistro['aniolectivo']?>&foto=<?php echo $cadaRegistro['foto']?>&idcurso=<?php echo $curso->idcurso?>&nrogrupo=<?php echo $elcursodelalumno['nrogrupo']?>"style="text-decoration: none;">
						<input type="button" value="Editar" class="botonGris">
					</a>
					<!-- oper 3 borrar -->
					<a href="formuconfirmacion.php?sSs=<?php echo $_GET['sSs'];?>&oper=3&idalumno=<?php echo $cadaRegistro['idalumno']?>&nombre=<?php echo $cadaRegistro['nombre']?>&apellido=<?php echo $cadaRegistro['apellido']?>&dni=<?php echo $cadaRegistro['dni']?>&fechanacimiento=<?php echo $cadaRegistro['fechanacimiento']?>&nrotarjeta=<?php echo $cadaRegistro['nrotarjeta']?>&genero=<?php echo $cadaRegistro['genero_alumn']?>&correo=<?php echo $cadaRegistro['Email']?>&aniolectivo=<?php echo $cadaRegistro['aniolectivo']?>&foto=<?php echo $cadaRegistro['foto']?>&idcurso=<?php echo $curso->idcurso?>&nrogrupo=<?php echo $elcursodelalumno['nrogrupo']?>"style="text-decoration: none;">
						<input type="button" value="Borrar" class="botonRojo">
					</a>
				</td>
			</tr>
		<?php
		}
		?>
	<?php
	}
	function trarunsoloalumno($datos){
		if($cadaRegistro=mysqli_fetch_array($datos, MYSQLI_ASSOC)){

			$aluxcur = new clsAlumnosxcurso();
			$aluxcur->idalumno = $cadaRegistro['idalumno'];
			$regcursoalum = $aluxcur->getGrupo_Curso();
			$elcursodelalumno=mysqli_fetch_array($regcursoalum, MYSQLI_ASSOC);
			
			$curso=new clsCurso();
			$curso->idcurso= $elcursodelalumno['idcurso'];
			$regcurso=$curso->getUnCurso();
			$elcurso=mysqli_fetch_array($regcurso, MYSQLI_ASSOC);
			$subtitulo = $elcurso['anio'] . "° " . $elcurso['division'] . "<br>";
		?>
			<tr>
				<td><img width="32" height="32" src="../Imagenes/ImagenesAlumnos/<?php echo $cadaRegistro['foto']?>"></td>
				<td><?php echo $cadaRegistro['apellido'] ?> </td>
				<td><?php echo $cadaRegistro['nombre'] ?> </td>
				<td><?php echo $cadaRegistro['dni'] ?> </td>
				<td><?php echo $cadaRegistro['fechanacimiento'] ?> </td>
				<td><?php echo $cadaRegistro['nrotarjeta'] ?> </td>
				<td><?php echo $cadaRegistro['genero_alumn'] ?> </td>
				<td><?php echo $cadaRegistro['Email'] ?> </td>
				<td><?php echo $cadaRegistro['aniolectivo'] ?> </td>
				<td><?php echo $subtitulo ?> </td>
				<td><?php echo $elcursodelalumno['nrogrupo'] ?> </td>
				<td colspan="2">
					<!-- oper 2 edicion -->
					<a href="formualumno.php?sSs=<?php echo $_GET['sSs'];?>&oper=2&idalumno=<?php echo $cadaRegistro['idalumno']?>&nombre=<?php echo $cadaRegistro['nombre']?>&apellido=<?php echo $cadaRegistro['apellido']?>&dni=<?php echo $cadaRegistro['dni']?>&fechanacimiento=<?php echo $cadaRegistro['fechanacimiento']?>&nrotarjeta=<?php echo $cadaRegistro['nrotarjeta']?>&genero=<?php echo $cadaRegistro['genero_alumn']?>&correo=<?php echo $cadaRegistro['Email']?>&aniolectivo=<?php echo $cadaRegistro['aniolectivo']?>&foto=<?php echo $cadaRegistro['foto']?>"style="text-decoration: none;">
						<input type="button" value="Editar" class="botonGris">
					</a>
					<!-- oper 3 borrar -->
					<a href="formuconfirmacion.php?sSs=<?php echo $_GET['sSs'];?>&oper=3&idalumno=<?php echo $cadaRegistro['idalumno']?>&nombre=<?php echo $cadaRegistro['nombre']?>&apellido=<?php echo $cadaRegistro['apellido']?>&dni=<?php echo $cadaRegistro['dni']?>&fechanacimiento=<?php echo $cadaRegistro['fechanacimiento']?>&nrotarjeta=<?php echo $cadaRegistro['nrotarjeta']?>&genero=<?php echo $cadaRegistro['genero_alumn']?>&correo=<?php echo $cadaRegistro['Email']?>&aniolectivo=<?php echo $cadaRegistro['aniolectivo']?>&foto=<?php echo $cadaRegistro['foto']?>"style="text-decoration: none;">
						<input type="button" value="Borrar" class="botonRojo">
					</a>
				</td>
			</tr>
		<?php	
		}
		?>
	<?php
	}
?>