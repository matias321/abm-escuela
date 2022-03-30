<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
include("clsalumno.php");
include("../alumnosxcurso/clsalumnosxcurso.php");
include('../materias/clsmaterias.php');
include('../alumnosxmaterias/clsalumnoxmateria.php');
include('../gruposxcurso/clsGruposxcurso.php');
include('../notas/clsnotas.php');
include("../asistencia/clsasistencia.php");
?>
<br>
<br>
<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Alumnos</label></div>

<?php
	$operacion = $_GET['oper'];
	if ($operacion == 1) 
	{
			//Desarrollo de ALTA
			$materias = new clsmaterias();
			$materiasxalumno = new clsalumnoxmateria();

			$alumnoxcurso = new clsAlumnosxcurso();
			$alumnoxcurso->idalumno = $_GET['idalumno'];
			$alumnoxcurso->idcurso = $_GET['idcurso'];
			$alumnoxcurso->nrogrupo = $_GET['nrogrupo'];

			$alumno = new clsAlumno();
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
			if(strlen($alumno->dni) < 8)
			{
				$mensaje= "El DNI introducido no cumple con los requisitos, tiene que tener como minimo 8 caracteres";
				$error = "dni";
				header('location:formualumno.php?sSs='.$_GET['sSs'].'&oper=1&mensaje='.$mensaje.'&error='.$error.'&nombre='.$alumno->nombre.'&apellido='.$alumno->apellido.'&nrotarjeta='.$alumno->nrodetarjeta.'&fechanacimiento='.$alumno->fechadenacimiento.'&genero='.$alumno->genero.'&correo='.$alumno->correo.'&aniolectivo='.$alumno->aniolectivo.'&idcurso='.$alumnoxcurso->idcurso.'&nrogrupo='.$alumnoxcurso->nrogrupo.'&foto='.$alumnoxcurso->fotoalumno.'');
				$boolean = true;
			}else
				if(strlen($alumno->nrodetarjeta) < 10)
				{
					$mensaje= "El numero de tarjeta no cumple con los requisitos, tiene que tener como minimo 10 caracteres";
					$error = "nrotarjeta";
					header('location:formualumno.php?sSs='.$_GET['sSs'].'&oper=1&mensaje='.$mensaje.'&error='.$error.'&nombre='.$alumno->nombre.'&apellido='.$alumno->apellido.'&dni='.$alumno->dni.'&fechanacimiento='.$alumno->fechadenacimiento.'&genero='.$alumno->genero.'&correo='.$alumno->correo.'&aniolectivo='.$alumno->aniolectivo.'&idcurso='.$alumnoxcurso->idcurso.'&nrogrupo='.$alumnoxcurso->nrogrupo.'&foto='.$alumnoxcurso->fotoalumno.'');
					$boolean = true;
				}else{
					$todoslosalumnos = $alumno->getTodosLosAlumnos();
					while($cadaRegistro=mysqli_fetch_array($todoslosalumnos, MYSQLI_ASSOC))
					{
						if($cadaRegistro['dni'] == $alumno->dni && $cadaRegistro['nrotarjeta'] == $alumno->nrodetarjeta && $cadaRegistro['Email'] == $alumno->correo )
						{
							$alumnoyaExistente = true;
						}else
							if($cadaRegistro['dni'] == $alumno->dni && $cadaRegistro['idalumno'] != $curso->idalumno)
							{
								$mensaje= "DNI del alumno repetido";
								$error = "dni";
								header('location:formualumno.php?sSs='.$_GET['sSs'].'&oper=1&mensaje='.$mensaje.'&error='.$error.'&nombre='.$alumno->nombre.'&apellido='.$alumno->apellido.'&nrotarjeta='.$alumno->nrodetarjeta.'&fechanacimiento='.$alumno->fechadenacimiento.'&genero='.$alumno->genero.'&correo='.$alumno->correo.'&aniolectivo='.$alumno->aniolectivo.'&idcurso='.$alumnoxcurso->idcurso.'&nrogrupo='.$alumnoxcurso->nrogrupo.'&foto='.$alumnoxcurso->fotoalumno.'');
								$boolean = true;
							}else
								if($cadaRegistro['nrotarjeta'] == $alumno->nrodetarjeta && $cadaRegistro['idalumno'] != $curso->idalumno)
								{
									$mensaje= "Numero de tarjeta del alumno repetido";
									$error = "nrotarjeta";
									header('location:formualumno.php?sSs='.$_GET['sSs'].'&oper=1&mensaje='.$mensaje.'&error='.$error.'&nombre='.$alumno->nombre.'&apellido='.$alumno->apellido.'&dni='.$alumno->dni.'&fechanacimiento='.$alumno->fechadenacimiento.'&genero='.$alumno->genero.'&correo='.$alumno->correo.'&aniolectivo='.$alumno->aniolectivo.'&idcurso='.$alumnoxcurso->idcurso.'&nrogrupo='.$alumnoxcurso->nrogrupo.'&foto='.$alumnoxcurso->fotoalumno.'');
									$boolean = true;
								}else
									if($cadaRegistro['Email'] == $alumno->correo && $cadaRegistro['idalumno'] != $curso->idalumno)
									{
										$mensaje= "Correo electronico del alumno repetido";
										$error = "correo";
										header('location:formualumno.php?sSs='.$_GET['sSs'].'&oper=1&mensaje='.$mensaje.'&error='.$error.'&nombre='.$alumno->nombre.'&apellido='.$alumno->apellido.'&nrotarjeta='.$alumno->nrodetarjeta.'&fechanacimiento='.$alumno->fechadenacimiento.'&genero='.$alumno->genero.'&dni='.$alumno->dni.'&aniolectivo='.$alumno->aniolectivo.'&idcurso='.$alumnoxcurso->idcurso.'&nrogrupo='.$alumnoxcurso->nrogrupo.'&foto='.$alumnoxcurso->fotoalumno.'');
										$boolean = true;
									}

					}

					if($alumnoyaExistente != true)
					{
						if($boolean != true)
						{
							if ($alumno->insertar() > 0) 
							{
								if($alumnoxcurso->insertar() > 0)
								{
									$mensaje= "Se ha insertado correctamente el alumno";
								}
							}
						}
					}else{
						header('grillaalumno.php?sSs='.$_GET['sSs']);
					}
				}
		} else 
			if ($operacion == 2) 
			{
				$alumnoxcurso = new clsAlumnosxcurso();
				$alumnoxcurso->idalumno = $_GET['idalumno'];
				$alumnoxcurso->idcurso = $_GET['idcurso'];
				$alumnoxcurso->nrogrupo = $_GET['nrogrupo'];

				$alumno = new clsAlumno();
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

					if ($alumno->actualizar() > 0) 
					{
						if($alumnoxcurso->actualizar() > 0)
						{
							$mensaje = "El Alumno se ha Actualizado correctamente";
						}
					}
			}else 
				if ($operacion == 3) 
				{
					$alumnoxcurso = new clsAlumnosxcurso();


					$alumno = new clsAlumno();
					$alumno->id = $_GET['idalumno'];


					$asistencia = new clsAsistencia();
					$asistencia->idalumno = $_GET['idalumno'];
					$alumnoxcurso->idalumno = $_GET['idalumno'];
					$alumnoxcurso->idcurso = $_GET['idcurso'];
					$alumnoxcurso->nrogrupo = $_GET['nrogrupo'];


					$notas = new clsnotas();
					$notas->idalumno = $_GET['idalumno'];

					if($asistencia->borrarasistenciasalumno() > 0)//borramos la asistencia del alumno
					{
						if($notas->borrartodaslasnotasdelalumno() > 0)//borramos las notas del alumno
						{
							if ($alumnoxcurso->borrar() > 0)//borramos al alumno del curso
							{

								if($alumno->borrar() > 0)//borramos al alumno
								{
									$mensaje = "El alumno fue borrado correctamente";
								}
							}
						}
					}
							
					
				}	
?>
<html>
	<body>
		<div align="center" style="position: relative; top:35px;">
			<label class="claseFuente"><?php echo $mensaje?></label>
			<br>
			<br>
			<a href="grillaalumno.php?sSs=<?php echo $_GET['sSs'];?>">
				<input type="button" value="Regresar" class="botonComun botonVerde">
			</a>
		</div>

	</body>
</html>