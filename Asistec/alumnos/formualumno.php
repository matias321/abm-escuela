<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
include('../usuarioxcurso/clsusuariosxcurso.php');
include('../curso/clscurso.php');
include("../gruposxcurso/clsgruposxcurso.php");
?>
	<div class="Separador">
			<br>
			<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Alumnos de los Cursos</label></div>

			<?php
			
			if(isset($_GET['oper'])){
				$Year = date("Y");
				$operacion = $_GET['oper'];
			}else{
				header('location:grillaalumno.php?sSs='.$_GET['sSs']);
			}
			include("../alumnos/clsalumno.php");
			$alumno = new clsAlumno();
				if ($operacion == 1) 
				{
					//ALTA	
					if(isset($_GET['modificar']) && $_GET['modificar'] == 1)
					{
						$id = $alumno->getNuevoIdAlumno();
						$Titulo = 'Modificar datos de un Alumno';
						$operacionValor = 'Ingresar';
						$dni = $_GET['dni'];
						$apellido = $_GET['apellido']; 
						$nombre = $_GET['nombre'];
						$fechadenacimiento = $_GET['fechanacimiento'];
						$nrodetarjeta = $_GET['nrotarjeta'];
						$genero = $_GET['genero'];
						$aniolectivo = $_GET['aniolectivo'];
						$correo = $_GET['correo'];
						$fotoalumno = $_GET['foto'];
						$idcurso = $_GET['idcurso'];
						$nrogrupo = $_GET['grupo'];
					}else
						{
							$Titulo = 'Ingresar un Alumno';
							$operacionValor = 'Ingresar';
							$id = $alumno->getNuevoIdAlumno();
							$dni = "";
							$apellido = "";
							$nombre = "";
							$fechadenacimiento = "2000-01-01";
							$nrodetarjeta = "";
							$correo = "";
							$genero = "";
							$fotoalumno = "";
							$idcurso = "";	
							$nrogrupo = "";
						}
				}else
					if($operacion == 2){
					// MODIFICACION
							$Titulo = 'Modificar datos de un Alumno';
							$operacionValor = 'Guardar';

							if(isset($_GET['modificar']) && $_GET['modificar'] == 1)
							{
								$id = $alumno->getNuevoIdAlumno();
								$Titulo = 'Modificar datos de un Alumno';
								$operacionValor = 'Ingresar';
								$dni = $_GET['dni'];
								$apellido = $_GET['apellido']; 
								$nombre = $_GET['nombre'];
								$fechadenacimiento = $_GET['fechanacimiento'];
								$nrodetarjeta = $_GET['nrotarjeta'];
								$genero = $_GET['genero'];
								$aniolectivo = $_GET['aniolectivo'];
								$correo = $_GET['correo'];
								$fotoalumno = $_GET['foto'];
								$idcurso = $_GET['idcurso'];
								$nrogrupo = $_GET['nrogrupo'];
							}else
								{
									$id = $_GET['idalumno'];
									$alumno->id = $id;
									$registrodedatos = $alumno->getUnAlumno();
									include("../alumnosxcurso/clsalumnosxcurso.php");
									$alumxCurso = new clsAlumnosxcurso();
									$alumxCurso->idalumno = $_GET['idalumno'];
									$dato = $alumxCurso->getGrupo_Curso();
									if ($vectordato = mysqli_fetch_array($dato, MYSQLI_ASSOC) ) 
									{
										$idcurso = $vectordato['idcurso'];
										$nrogrupo = $vectordato['nrogrupo'];
									}
									if ($vectordato = mysqli_fetch_array($registrodedatos, MYSQLI_ASSOC) ) 
									{
										$dni = $vectordato['dni'];
										$apellido = $vectordato['apellido']; 
										$nombre = $vectordato['nombre'];
										$fechadenacimiento = $vectordato['fechanacimiento'];
										$nrodetarjeta = $vectordato['nrotarjeta'];
										$fotoalumno = $vectordato['foto'];
										$genero = $vectordato['genero_alumn'];
										$correo = $vectordato['Email'];
										$aniolectivo = $vectordato['aniolectivo'];

									}
								}	
				}
					//errores posibles que pueden haber
						if(isset($_GET['error'])){
							//dni ingresado repetido
							if($_GET['error'] == "dni"){
								$apellido = $_GET['apellido']; 
								$nombre = $_GET['nombre'];
								$fechadenacimiento = $_GET['fechanacimiento'];
								$nrodetarjeta = $_GET['nrotarjeta'];
								$genero = $_GET['genero'];
								$correo = $_GET['correo'];
								$aniolectivo = $_GET['aniolectivo'];
								$fotoalumno = $_GET['foto'];
								$idcurso = $_GET['idcurso'];
								$nrogrupo = $_GET['nrogrupo'];
							}else
								//Correo ingresado repetido
								if($_GET['error'] == "correo"){
									$dni = $_GET['dni'];
									$apellido = $_GET['apellido']; 
									$nombre = $_GET['nombre'];
									$fechadenacimiento = $_GET['fechanacimiento'];
									$nrodetarjeta = $_GET['nrotarjeta'];
									$genero = $_GET['genero'];
									$aniolectivo = $_GET['aniolectivo'];
									$fotoalumno = $_GET['foto'];
									$idcurso = $_GET['idcurso'];
									$nrogrupo = $_GET['nrogrupo'];
								}else{
									//nro de tarjeta repetido ingresado repetido
									$dni = $_GET['dni'];
									$apellido = $_GET['apellido']; 
									$nombre = $_GET['nombre'];
									$fechadenacimiento = $_GET['fechanacimiento'];
									$genero = $_GET['genero'];
									$correo = $_GET['correo'];
									$aniolectivo = $_GET	['aniolectivo'];
									$fotoalumno = $_GET['foto'];
									$idcurso = $_GET['idcurso'];
									$nrogrupo = $_GET['nrogrupo'];
								}
							}
						
			?>
			<br>
				<?php 
					if(isset($_GET['mensaje'])){
					?>
						<div align="center">
							<label><?php echo $_GET['mensaje']?></label>
						</div>
					<?php
					}
				?>
				<form class="form" name="form1" action="formuconfirmacion.php?sSs=<?php echo $_GET['sSs'];?>&oper=<?php echo $operacion ?>&idalumno=<?php echo $id ?>&aniolectivo=<?php echo $Year?>&foto=<?php echo $fotoalumno?>" method="post" enctype="multipart/form-data">
					<table border="1" width="70%" height="600" align="center" style="padding: 10px;margin: auto;border-collapse: collapse;">
						<tr>
							<!--Pedimos el nombre del alumno-->
							<th width="1093" rowspan="3" align="center">
								<div align="center">
									<h1><?php echo $Titulo?></h1>
								</div>
									<br>
									<br>
									<a>Ingresar Nombre</a>
									<input style="width: 250px" type="text" name="txtnombre" value="<?php echo $nombre?>"
										   class="inputTexto" required placeholder="Nombre del alumno" maxlength="40" />
									<br>
									<br>
								<!--Pedimos el apellido del alumno-->
									<a>Ingresar Apellido</a>
										<input style="width: 250px" type="text" name="txtapellido" value="<?php echo $apellido ?>" 
											   class="inputTexto" required placeholder="Apellido del alumno" maxlength="30" />
									<br>
									<br>
								<!--Pedimos el DNI del alumno-->
									<a>Ingresar DNI</a>
										<input style="width: 180px" type="text" name="txtdni" value="<?php echo $dni?>"
											   class="inputTexto" required placeholder="DNI del alumno" maxlength="8" />
									<br>
									<br>
									<a>Seleccione Genero</a>
									<?php
										if(strtolower($genero) == "hombre"){	
									?>
											<input type="radio" value="hombre" id="hombre" name="optgenero" checked>
											<label for="hombre">Hombre</label>
											<input type="radio" value="mujer" id="mujer" name="optgenero">
											<label for="mujer">Mujer</label>
									<?php
										}else {
											if(strtolower($genero) == "mujer"){
									?>
												<input type="radio" value="hombre" id="hombre" name="optgenero" >
												<label for="hombre">Hombre</label>
												<input type="radio" value="mujer" id="mujer" name="optgenero" checked>
												<label for="mujer">Mujer</label>
									<?php
											}else{
									?>
												<input type="radio" value="hombre" id="hombre" name="optgenero" required>
												<label for="hombre">Hombre</label>
												<input type="radio" value="mujer" id="mujer" name="optgenero" required>
												<label for="mujer">Mujer</label>
									<?php
											}
										}
									?>
									
									<br>
									<br>
								<!--Pedimos el Correo del alumno-->
									<a>Ingresar fecha de nacimiento</a>
									<input type="date" name="dateAlumno" value="<?php echo $fechadenacimiento?>"
										   class="select" required />
									<br>
									<br>
									<a>Ingresar Correo electronico</a>
										<input style="width: 450px; height: 30px"type="email" name="txtcorreo" 
											   value="<?php echo $correo?>" class="inputTexto" required
											   placeholder="Correo Electronico del alumno" maxlength="70" />
									<br>
									<br>
								<!--Pedimos el nro de tarjeta del alumno-->
									<a>Ingresar Numero de Tarjeta</a>
										<input style="width: 300px; height: 30px" type="text" name="nrotarjeta" 
										       value="<?php echo $nrodetarjeta?>" class="inputTexto" required 
										       placeholder="Numero de tarjeta del alumno" maxlength="10"/>
									<br>
									<br>
									<a>Seleccione el año</a>
										<select name="cmbcurso" class="select" id="cmbcurso" required>
											<option disabled>Curso</option>	
											<?php
												if($_SESSION['idperfil'] == 2)
												{
													$cursos = new clsCurso();
													$regcursos = $cursos->getTodosLosCursos();
													while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
													{
														if ($idcurso == $cadaCurso['idcurso']) {

															echo "<option value=".$cadaCurso['idcurso']." selected>" .$cadaCurso['aniolectivo']. " / ".$cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
														}else
															{
																echo "<option value=".$cadaCurso['idcurso'].">" .$cadaCurso['aniolectivo']. " / ".$cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
															}
													}
												}else
													{
														$usuarioxcurso = new clsUsuariosxcurso();
														$usuarioxcurso->idusuario = $_SESSION['usuario'];
														$regcursos = $usuarioxcurso->getTodosLosCursosxUsuario();
														while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
														{
															if ($idcurso == $cadaCurso['idcur']) {

																echo "<option value=".$cadaCurso['idcur']." selected>" .$cadaCurso['aniolectivo']. " / ". $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
															}else
																{
																	echo "<option value=".$cadaCurso['idcur'].">" .$cadaCurso['aniolectivo']. " / ". $cadaCurso['anio'] ."° ". $cadaCurso['division'] . "</option>";
																}
															
														}
													}
											?>
										</select>
										<a>Grupo</a>
										<select name="cmbgrupo" class="select" id="cmbgrupo" required>
											<?php
												if (!$nrogrupo == "") {
													$grupo = new clsGruposxcurso();
													$grupo->idcurso = $idcurso;
													$todoslosgrupoxCurso = $grupo->getTodosLosGrupos();
													echo "<option disabled>Seleccione un grupo</option>";
													while($cadagrupo=mysqli_fetch_array($todoslosgrupoxCurso, MYSQLI_ASSOC))
													{
														echo "<option value=".$cadagrupo['nrogrupo']." selected>".$cadagrupo['nrogrupo']."</option>";
													}
												}
											?>
										</select>	
										<br>
										<br>
								<!--Pedimos el genero del alumno-->
									<?php
										if($fotoalumno == ""){
										?>
											<a>Ingresar foto del alumno</a>	
											<br>
											<br>
											<div>
												<input name="fotoAlumno" type="file" accept="image/x-png" required>	
											</div>
									
									<?php
										}else{
										?>
											<a>Foto del alumno actual</a>	
											<br>
												<img width="64" height="64" src="../Imagenes/ImagenesAlumnos/<?php echo $fotoalumno?>">
											<br>	
											<br>
												<input name="fotomodificada" type="file" accept="image/x-png">
												<br>
												<br>
												<input type="hidden" name="ValorimagenNOcambiada" value="<?php echo $fotoalumno?>">	
										<?php
										}
										?>
								<div align="center">
									<br>
									<br>
										
									<a href="grillaalumno.php">
										<input 
										   type="button" 
										   value="Regresar" 
										>
									</a>
										<input 
										   type="submit" 
										   value="<?php echo $operacionValor?>" 
										   name="insertarAlumno"
										>
								</div>
								<br>
								</th>
							
						</tr>
					</table>
			  	</form>
			</div>
		</body>
	</div>
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
