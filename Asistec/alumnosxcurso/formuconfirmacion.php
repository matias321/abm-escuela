<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
	include("../encapie/encabezado.php");
	if(isset($_GET['oper'])){
		if($_GET['oper'] == 1){
			$directorio = '../Imagenes/ImagenesAlumnos/';
			$nombre = $_POST['txtnombre'];
			$apellido = $_POST['txtapellido'];
			$nombrecompleto = $nombre." ".$apellido;
			if(!empty($_FILES['fotomodificada']['name'])){ //usuario regreso y cambio la foto
				$fotoalumno = $_FILES['fotomodificada']['name'];
				move_uploaded_file($_FILES['fotomodificada']['tmp_name'],$directorio.$fotoalumno);
			}else
				if(!empty($_POST['ValorimagenNOcambiada'])){//usuario regreso pero no modifico la foto
				$fotoalumno = $_POST['ValorimagenNOcambiada'];
				move_uploaded_file($fotoalumno,$directorio.$fotoalumno);
			}else{//usuario ingreso sin regresar
				$fotoalumno = $_FILES['fotoAlumno']['name'];
				move_uploaded_file($_FILES['fotoAlumno']['tmp_name'],$directorio.$fotoalumno);
			}
			$titulo = "Confirmacion para ingresar un alumno";
			
			$dni = $_POST['txtdni'];
			$genero = $_POST['optgenero'];
			$fechanacimiento = $_POST['dateAlumno'];
			$correo = $_POST['txtcorreo'];
			$nrotarjeta = $_POST['nrotarjeta'];
			$aniolectivo = $_GET['aniolectivo'];
			$id = $_GET['idalumno'];
			$curso = $_GET['idcurso'];
			$grupo = $_GET['nrogrupo'];
			$operacion = $_GET['oper'];
			$VinculoRegresar ="formualumnoxcurso.php?sSs=". $_GET['sSs']."&oper=1&modificar=1&nombre=$nombre&apellido=$apellido&nrotarjeta=$nrotarjeta&fechanacimiento=$fechanacimiento&genero_alumn=$genero&Email=$correo&aniolectivo=$aniolectivo&dni=$dni&idcurso=$curso$&nrogrupo=$grupo&foto=$fotoalumno";
		}else
			if($_GET['oper'] == 2){
				$directorio = $_SERVER['DOCUMENT_ROOT'].'/AsistecViejo1.0/Imagenes/ImagenesAlumnos/';
				if(!empty($_FILES['fotomodificada']['name'])){ //usuario regreso y cambio la foto
					$fotoalumno = $_FILES['fotomodificada']['name'];
					move_uploaded_file($_FILES['fotomodificada']['tmp_name'],$directorio.$fotoalumno);
				}else
					if(!empty($_POST['ValorimagenNOcambiada'])){//usuario regreso pero no modifico la foto
					$fotoalumno = $_POST['ValorimagenNOcambiada'];
					move_uploaded_file($fotoalumno,$directorio.$fotoalumno);
				}else{//usuario ingreso sin regresar
					$fotoalumno = $_FILES['fotoAlumno']['name'];
					move_uploaded_file($_FILES['fotoAlumno']['tmp_name'],$directorio.$fotoalumno);
				}
				$titulo = "Confirmacion para actualizar un alumno";
				$nombre = $_POST['txtnombre'];
				$apellido = $_POST['txtapellido'];
				$dni = $_POST['txtdni'];
				$genero = $_POST['optgenero'];
				$fechanacimiento = $_POST['dateAlumno'];
				$correo = $_POST['txtcorreo'];
				$nrotarjeta = $_POST['nrotarjeta'];
				$aniolectivo = $_GET['aniolectivo'];
				$curso = $_GET['idcurso'];
				$grupo = $_GET['nrogrupo'];
				$operacion = $_GET['oper'];
				$id = $_GET['idalumno'];
				$VinculoRegresar ="formualumnoxcurso.php?sSs=". $_GET['sSs']."&oper=2&modificar=1&nombre=$nombre&apellido=$apellido&nrotarjeta=$nrotarjeta&fechanacimiento=$fechanacimiento&genero_alumn=$genero&Email=$correo&aniolectivo=$aniolectivo&dni=$dni&idcurso=$curso$&nrogrupo=$grupo&foto=$fotoalumno&id=$id";
			}else{
				$curso = $_GET['idcurso'];
				$grupo = $_GET['nrogrupo'];
				$operacion = $_GET['oper'];
				$id = $_GET['idalumno'];
				$titulo = "Confirmacion para borrar el alumno";
				$nombre = $_GET['nombre'];
				$apellido = $_GET['apellido'];
				$dni = $_GET['dni'];
				$genero = $_GET['genero'];
				$fechanacimiento = $_GET['fechanacimiento'];
				$correo = $_GET['correo'];
				$nrotarjeta = $_GET['nrotarjeta'];
				$aniolectivo = $_GET['aniolectivo'];
				$fotoalumno = $_GET['foto'];
				$VinculoRegresar ="grillaalumnosxcurso.php?sSs=". $_GET['sSs']."&idcurso=$curso$&nrogrupo=$grupo";
			}
		
	}else{
		header("location:../curso/grillacurso.php?sSs=". $_GET['sSs']);
	}
	
?>
<html>
	<div class="Separador" align="center">
		<div align="center">
			<label class="tituloFormulario claseFuente">Administraci&oacute;n de Alumnos de los Cursos</label>
		</div>
		<h3><?php echo $titulo?></h3>
		<br>
			<div>
				<img width="64" height="64" src="../Imagenes/ImagenesAlumnos/<?php echo $fotoalumno?>">
				<br>
				<label style="color: #000000; font-size: 20px"><?php echo $fotoalumno ?></label>
			</div>
			<div>
				<label>Nombre</label>&nbsp;&nbsp;
				<label class="labelMuestra"><?php echo $nombre ?></label>
			</div>
			<div>
				<label>Apellido</label>&nbsp;&nbsp;
				<label class="labelMuestra"><?php echo $apellido ?></label>
			</div>
			<div>
				<label>DNI</label>&nbsp;&nbsp;
				<label class="labelMuestra"><?php echo $dni ?></label>
			</div>
			<div>
				<label>Numero de tarjeta</label>&nbsp;&nbsp;
				<label class="labelMuestra"><?php echo $nrotarjeta ?></label>
			</div>
			<div>
				<label>Correo</label>&nbsp;&nbsp;
				<label class="labelMuestra"><?php echo $correo ?></label>
			</div>
			<div>
				<label>Fecha de Nacimiento</label>&nbsp;&nbsp;
				<label class="labelMuestra"><?php echo $fechanacimiento ?></label>
			</div>
			<div>
				<label>Año lectivo</label>&nbsp;&nbsp;
				<label class="labelMuestra"><?php echo $aniolectivo ?></label>
			</div>
			<div>
				<label>Genero</label>&nbsp;&nbsp;
				<label class="labelMuestra"><?php echo $genero ?></label>
			</div>
			<br>
			<a style="text-decoration: none;" href="<?php echo $VinculoRegresar?>">
				<input class="botonVerde botonGrilla" type="button" class="Boton" value="Regresar">
			</a>
			<a style="text-decoration: none;" href="mensaalumnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=<?php echo $operacion ?>&idalumno=<?php echo $id?>&idcurso=<?php echo $curso?>&nrogrupo=<?php echo $grupo?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&dni=<?php echo $dni ?>&nrotarjeta=<?php echo $nrotarjeta ?>&correo=<?php echo $correo ?>&fechanacimiento=<?php echo $fechanacimiento ?>&aniolectivo=<?php echo $aniolectivo ?>&genero=<?php echo $genero ?>&foto=<?php echo $fotoalumno?>">
				<input class="botonAzulOscuro botonGrilla" type="button" class="Boton" value="Confirmar">
			</a>
	</div>
</html>