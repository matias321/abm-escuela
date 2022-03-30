<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
?>
	<div class="Separador">
		<div align="center">
			<label class="tituloFormulario claseFuente">Administraci&oacute;n de Alumnos de los Cursos</label>
		</div>
			<?php
			if(isset($_GET['idcurso']) && isset($_GET['nrogrupo'])){
				$idcurso = $_GET['idcurso'];
				$nrogrupo = $_GET['nrogrupo'];
				$Year = date("Y");
			}else{
				header("location:../curso/grillacurso.php?sSs=". $_GET['sSs']);
			}
			// se recibe el curso con el que es llamado
			include("../curso/clscurso.php");
			$curso = new clsCurso();
			$curso->idcurso=$_GET['idcurso'];
			$datoscurso = $curso->getUnCurso();
			$elcurso=mysqli_fetch_array($datoscurso, MYSQLI_ASSOC);
			$nombrecurso = $elcurso['anio'].'° '.$elcurso['division'].' Grupo: '. $nrogrupo;

			$operacion = $_GET['oper'];

			include("../alumnos/clsalumno.php");
			$alumno = new clsAlumno();
				if ($operacion == 1) {
					//ALTA	
					if(isset($_GET['modificar']) && $_GET['modificar'] == 1){
						$id = $alumno->getNuevoIdAlumno();
						$Titulo = 'Ingresar un Alumno';
						$operacionValor = 'Ingresar';
						$dni = $_GET['dni'];
						$apellido = $_GET['apellido']; 
						$nombre = $_GET['nombre'];
						$fechadenacimiento = $_GET['fechanacimiento'];
						$nrodetarjeta = $_GET['nrotarjeta'];
						$genero = $_GET['genero_alumn'];
						$aniolectivo = $_GET['aniolectivo'];
						$correo = $_GET['Email'];
						$fotoalumno = $_GET['foto'];
						$idcurso = $_GET['idcurso'];
						$nrogrupo = $_GET['nrogrupo'];
					}else{
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
						$nacionalidad = "";
						$localidadNacimiento = "";
						$tutor = "";
						$contacto = "";
						$calle = "";
						$piso = "";
						$numerocasa = "";
						$fotoalumno = "";
						$cursoalumno = "";
						$grupoalumno = "";	
					}
					
					
				}else
					if($operacion == 2){
					// MODIFICACION
						if(isset($_GET['modificar']) && $_GET['modificar'] == 1){
							$id = $_GET['id'];
							$Titulo = 'Modificar datos de un Alumno';
							$operacionValor = 'Ingresar';
							$dni = $_GET['dni'];
							$apellido = $_GET['apellido']; 
							$nombre = $_GET['nombre'];
							$fechadenacimiento = $_GET['fechanacimiento'];
							$nrodetarjeta = $_GET['nrotarjeta'];
							$genero = $_GET['genero_alumn'];
							$aniolectivo = $_GET['aniolectivo'];
							$correo = $_GET['Email'];
							$fotoalumno = $_GET['foto'];
							$idcurso = $_GET['idcurso'];
							$nrogrupo = $_GET['nrogrupo'];
						}else{
							$Titulo = 'Modificar datos de un Alumno';
							$operacionValor = 'Guardar';
							$id = $_GET['idalumno'];
							$alumno->id = $id;
							$registrodedatos = $alumno->getUnAlumno();
							include("../alumnosxcurso/clsalumnosxcurso.php");
							$alumxCurso = new clsAlumnosxcurso();
							$alumxCurso->idalumno = $_GET['idalumno'];
							$dato = $alumxCurso->getGrupo_Curso();
							if ($vectordato = mysqli_fetch_array($dato, MYSQLI_ASSOC) ) {
								$cursoalumno = $vectordato['idcurso'];
								$grupoalumno = $vectordato['nrogrupo'];
							}
							if ($vectordato = mysqli_fetch_array($registrodedatos, MYSQLI_ASSOC) ) {
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
						if(isset($_GET['error'])){
							if($_GET['error'] == "dni"){
								$apellido = $_GET['apellido']; 
								$nombre = $_GET['nombre'];
								$fechadenacimiento = $_GET['fechanacimiento'];
								$nrodetarjeta = $_GET['nrotarjeta'];
								$genero = $_GET['genero_alumn'];
								$correo = $_GET['Email'];
								$aniolectivo = $_GET['aniolectivo'];
							}else
								if($_GET['error'] == "correo"){
									$dni = $_GET['dni'];
									$apellido = $_GET['apellido']; 
									$nombre = $_GET['nombre'];
									$fechadenacimiento = $_GET['fechanacimiento'];
									$nrodetarjeta = $_GET['nrotarjeta'];
									$genero = $_GET['genero_alumn'];
									$aniolectivo = $_GET['aniolectivo'];
								}else{
									$dni = $_GET['dni'];
									$apellido = $_GET['apellido']; 
									$nombre = $_GET['nombre'];
									$fechadenacimiento = $_GET['fechanacimiento'];
									$genero = $_GET['genero_alumn'];
									$correo = $_GET['Email'];
									$aniolectivo = $_GET	['aniolectivo'];
								}
							}
						
			?>
			<div align="center" style="position: relative; top:0px;">
				<h3>
					Grupos del Curso: <?php echo $nombrecurso;?>
				</h3>
			</div>
			<?php 
				if(isset($_GET['mensaje'])){
				?>
					<div align="center">
						<label><?php echo $_GET['mensaje']?></label>
					</div>
				<?php
				}
			?>
				
			<div align="center" style="position: relative; top:0px;">
			<form class="form" name="form1" action="formuconfirmacion.php?sSs=<?php echo $_GET['sSs'];?>&oper=<?php echo $operacion ?>&idalumno=<?php echo $id ?>&idcurso=<?php echo $idcurso?>&nrogrupo=<?php echo $nrogrupo?>&aniolectivo=<?php echo $Year?>" method="post" enctype="multipart/form-data">
					<table border="0" width="70%" height="200" align="center">
						<tr>
							<!--Pedimos el nombre del alumno-->
							<th width="1093" rowspan="2" align="center">
								<div align="center">
									<h2><?php echo $Titulo?></h2>
								</div>
								<label>Nombre</label>
								<input style="width: 250px" type="text" name="txtnombre" value="<?php echo $nombre?>"
									    class="textBox" required placeholder="Nombre del alumno" maxlength="40" />
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!--Pedimos el apellido del alumno-->
								<label>Apellido</label>
								<input style="width: 250px" type="text" name="txtapellido" value="<?php echo $apellido ?>"
									   class="textBox" required placeholder="Apellido del alumno"
									   maxlength="30" />
								<br>
								<br>
							<!--Pedimos el DNI del alumno-->
								<label>DNI</label>
								<input style="width: 100px" type="text" name="txtdni" value="<?php echo $dni?>"
									   class="textBox" required placeholder="DNI del alumno"
									   maxlength="8" />
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label>Seleccione Genero</label>
								<?php
								if(strtolower($genero)  == "hombre"){	
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
								<a>Fecha de nacimiento</a>
								<input type="date" name="dateAlumno" value="<?php echo $fechadenacimiento?>"
									   class="textBox"  required />
								<br>
								<br>
								<a>Correo electronico</a>
								<input style="width: 450px;" type="email" name="txtcorreo" 
									   value="<?php echo $correo?>" class="textBox" required
									   placeholder="Correo Electronico del alumno" maxlength="70" />
								<br>
								<br>
							<!--Pedimos el nro de tarjeta del alumno-->
								<a>Numero de Tarjeta</a>
								<input style="width: 300px;" type="text" name="nrotarjeta" 
									   value="<?php echo $nrodetarjeta?>" class="textBox" required
									   placeholder="Numero de tarjeta del alumno" maxlength="10" />
								<br>
								<br>
							<!--Pedimos el genero del alumno-->
								<a>Foto del alumno</a>
								<?php
								if(empty($fotoalumno)){
									?>
									<div>
										<input name="fotoAlumno" type="file" accept="image/x-png" required>	
									</div>	
								<?php
								}else{
									?>
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
									<input class="botonAzulOscuro botonGrilla" type="submit" value="<?php echo $operacionValor?>" name="insertarAlumno" />
									<a style="text-decoration: none;" href="grillaalumnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>&idcurso=<?php echo $idcurso?>&nrogrupo=<?php echo $nrogrupo?>">
										<input class="botonVerde botonGrilla" type="button" value="Regresar" />
									</a>
								</div>
							</th>
						</tr>
					</table>
			  	</form>
			</div>
	</body>
</html>