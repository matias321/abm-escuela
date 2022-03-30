<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
include('../asistencia/clsasistencia.php');
include('../notas/clsnotas.php');
?>
<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Alumnos de los Cursos</label></div>
<?php
	if(isset($_GET['idcurso']) && isset($_GET['nrogrupo'])){
		$idcurso = $_GET['idcurso'];
		$nrogrupo = $_GET['nrogrupo'];
	}else{
		header("location:../curso/grillacurso.php?sSs=". $_GET['sSs']);
	}

	include("../curso/clscurso.php");
	$curso = new clsCurso();
	$curso->idcurso= $idcurso;
	$datoscurso = $curso->getUnCurso();
	$elcurso=mysqli_fetch_array($datoscurso, MYSQLI_ASSOC);
	$nombrecurso = $elcurso['anio'].'° '.$elcurso['division'].' Grupo: '. $nrogrupo;

	include("clsalumnosxcurso.php");
	$alumnoxcurso = new clsAlumnosxcurso();

	$operacion = $_GET['oper'];
	$alumnoxcurso->idalumno = $_GET['idalumno'];
	$alumnoxcurso->idcurso = $idcurso;
	$alumnoxcurso->nrogrupo = $nrogrupo;
	include("../alumnos/clsalumno.php");
	$alumno = new clsAlumno();

	if ($operacion == 1) {
			//Desarrollo de ALTA
			$alumno->dni = $_GET['dni'];
			$alumno->apellido = $_GET['apellido'];
			$alumno->nombre = $_GET['nombre'];
			$alumno->fechadenacimiento = $_GET['fechanacimiento'];
			$alumno->nrodetarjeta = $_GET['nrotarjeta'];
			$alumno->fotoalumno = $_GET['foto'];
			$alumno->aniolectivo = $_GET['aniolectivo'];
			$alumno->genero = $_GET['genero'];
			$alumno->correo = $_GET['correo'];
			$alumno->id = $_GET['idalumno'];
			$boolean = false;
			$alumnoyaExistente = false;
		
			if(strlen($alumno->dni) < 8){
				$mensaje= "El DNI introducino no cumple con los requisitos, tiene que tener como minimo 8 caracteres";
				$error = "dni";
				header('location:formualumnoxcurso.php?sSs='. $_GET['sSs'].'&oper=1&mensaje='.$mensaje.'&error='.$error.'&nombre='.$alumno->nombre.'&apellido='.$alumno->apellido.'&nrotarjeta='.$alumno->nrodetarjeta.'&fechanacimiento='.$alumno->fechadenacimiento.'&genero_alumn='.$alumno->genero.'&Email='.$alumno->correo.'&aniolectivo='.$alumno->aniolectivo.'&idcurso='.$alumnoxcurso->idcurso.'&nrogrupo='.$alumnoxcurso->nrogrupo.'');
				$boolean = true;
			}else
				if(strlen($alumno->nrodetarjeta) < 10){
					$mensaje= "El numero de tarjeta no cumple con los requisitos, tiene que tener como minimo 10 caracteres";
					$error = "nrotarjeta";
					header('location:formualumnoxcurso.php?sSs='. $_GET['sSs'].'&oper=1&mensaje='.$mensaje.'&error='.$error.'&nombre='.$alumno->nombre.'&apellido='.$alumno->apellido.'&dni='.$alumno->dni.'&fechanacimiento='.$alumno->fechadenacimiento.'&genero_alumn='.$alumno->genero.'&Email='.$alumno->correo.'&aniolectivo='.$alumno->aniolectivo.'&idcurso='.$alumnoxcurso->idcurso.'&nrogrupo='.$alumnoxcurso->nrogrupo.'');
					$boolean = true;
				}else{
					$todoslosalumnos = $alumno->getTodosLosAlumnos();
					while($cadaRegistro=mysqli_fetch_array($todoslosalumnos, MYSQLI_ASSOC)){
						if($cadaRegistro['dni'] == $alumno->dni && $cadaRegistro['nrotarjeta'] == $alumno->nrodetarjeta && $cadaRegistro['Email'] == $alumno->correo ){
							$alumnoyaExistente = true;
						}else
							if($cadaRegistro['dni'] == $alumno->dni && $cadaRegistro['idalumno'] != $curso->idalumno){
								$mensaje= "DNI del alumno repetido";
								$error = "dni";
								header('location:formualumnoxcurso.php?sSs='. $_GET['sSs'].'&oper=1&mensaje='.$mensaje.'&error='.$error.'&nombre='.$alumno->nombre.'&apellido='.$alumno->apellido.'&nrotarjeta='.$alumno->nrodetarjeta.'&fechanacimiento='.$alumno->fechadenacimiento.'&genero_alumn='.$alumno->genero.'&Email='.$alumno->correo.'&aniolectivo='.$alumno->aniolectivo.'&idcurso='.$alumnoxcurso->idcurso.'&nrogrupo='.$alumnoxcurso->nrogrupo.'');
							$boolean = true;
						}else
							if($cadaRegistro['nrotarjeta'] == $alumno->nrodetarjeta && $cadaRegistro['idalumno'] != $curso->idalumno){
								$mensaje= "Numero de tarjeta del alumno repetido";
								$error = "nrotarjeta";
								header('location:formualumnoxcurso.php?sSs='. $_GET['sSs'].'&oper=1&mensaje='.$mensaje.'&error='.$error.'&nombre='.$alumno->nombre.'&apellido='.$alumno->apellido.'&dni='.$alumno->dni.'&fechanacimiento='.$alumno->fechadenacimiento.'&genero_alumn='.$alumno->genero.'&Email='.$alumno->correo.'&aniolectivo='.$alumno->aniolectivo.'&idcurso='.$alumnoxcurso->idcurso.'&nrogrupo='.$alumnoxcurso->nrogrupo.'');
								$boolean = true;
							}else
								if($cadaRegistro['Email'] == $alumno->correo && $cadaRegistro['idalumno'] != $curso->idalumno){
									$mensaje= "Correo electronico del alumno repetido";
									$error = "correo";
									header('location:formualumnoxcurso.php?sSs='. $_GET['sSs'].'&oper=1&mensaje='.$mensaje.'&error='.$error.'&nombre='.$alumno->nombre.'&apellido='.$alumno->apellido.'&nrotarjeta='.$alumno->nrodetarjeta.'&fechanacimiento='.$alumno->fechadenacimiento.'&genero_alumn='.$alumno->genero.'&dni='.$alumno->dni.'&aniolectivo='.$alumno->aniolectivo.'&idcurso='.$alumnoxcurso->idcurso.'&nrogrupo='.$alumnoxcurso->nrogrupo.'');
									$boolean = true;
								}

					}
					if(!$alumnoyaExistente == true){
						if($boolean != true){
							if ($alumno->insertar() > 0) {
								if($alumnoxcurso->insertar() > 0){
										$mensaje= "Se ha insertado correctamente el alumno";
								}
							}
						}
					}else{
						header('grillaalumno.php?sSs='.$_GET['sSs']);
					}
				}
		} else { 
			if ($operacion == 2) {
				//Desarrollo de MODIFICACION
				$alumno->dni = $_GET['dni'];
				$alumno->apellido = $_GET['apellido'];
				$alumno->nombre = $_GET['nombre'];
				$alumno->fechadenacimiento = $_GET['fechanacimiento'];
				$alumno->nrodetarjeta = $_GET['nrotarjeta'];
				$alumno->fotoalumno = $_GET['foto'];
				$alumno->aniolectivo = $_GET['aniolectivo'];
				$alumno->genero = $_GET['genero'];
				$alumno->correo = $_GET['correo'];
				$alumno->id = $_GET['idalumno'];

					if ($alumno->actualizar() > 0) {
						if($alumnoxcurso->actualizar() > 0){
							$mensaje = "El Alumno se ha Actualizado correctamente";
						}
					}
			} else { 
				if ($operacion == 3) {

					$alumnoxcurso->id = $_GET['idalumno'];


					$alumno->id = $_GET['idalumno'];


					$asistencia = new clsAsistencia();
					$asistencia->idalumno = $_GET['idalumno'];


					$notas = new clsnotas();
					$notas->idalumno = $_GET['idalumno'];


					if($asistencia->borrarasistenciasalumno() > 0){//borramos la asistencia del alumno

						if($notas->borrartodaslasnotasdelalumno() > 0)//borramos las notas del alumno
						{
							if ($alumnoxcurso->borrar() > 0) {//borramos al alumno del curso
						
								if($alumno->borrar() > 0){//borramos al alumno

									$mensaje = "El alumno fue borrado correctamente";
								}
							}
						}			
					}
				}
			}
		}	
?>
<div align="center" style="position: relative; top:15px;">
	<h3>
		Grupos del Curso: <?php echo $nombrecurso;?>
	</h3>
</div>

<div align="center" style="position: relative; top:0px;">
	<br>
	<label><?php echo $mensaje?></label>
	<br>
	<br>
	<a href="grillaalumnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>&idcurso=<?php echo $idcurso;?>&nrogrupo=<?php echo $nrogrupo;?>">
		<input type="button" value="Regresar" class="botonComun botonVerde">
	</a>
</div>


</body>
</html>