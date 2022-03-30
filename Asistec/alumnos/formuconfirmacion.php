<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');

	if(isset($_GET['oper'])){
		include("../encapie/encabezado.php");
		if($_GET['oper'] == 1){
			$directorio = $_SERVER['DOCUMENT_ROOT'].'../Imagenes/ImagenesAlumnos/';
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
			$nombre = $_POST['txtnombre'];
			$apellido = $_POST['txtapellido'];
			$dni = $_POST['txtdni'];
			$genero = $_POST['optgenero'];
			$fechanacimiento = $_POST['dateAlumno'];
			$correo = $_POST['txtcorreo'];
			$nrotarjeta = $_POST['nrotarjeta'];
			$aniolectivo = $_GET['aniolectivo'];
			$id = $_GET['idalumno'];
			$curso = $_POST['cmbcurso'];
			$grupo = $_POST['cmbgrupo'];
			$operacion = $_GET['oper'];
			
			$vinculoregresar ="formualumno.php?sSs=".$_GET['sSs']."&oper=1&modificar=1&nombre=$nombre&apellido=$apellido&nrotarjeta=$nrotarjeta&fechanacimiento=$fechanacimiento&genero=$genero&correo=$correo&aniolectivo=$aniolectivo&dni=$dni&idcurso=$curso&grupo&foto=$fotoalumno";
			
			$vinculoconfirmar = "mensaalumno.php?sSs=".$_GET['sSs']."&oper=$operacion&nombre=$nombre&apellido=$apellido&nrotarjeta=$nrotarjeta&fechanacimiento=$fechanacimiento&genero=$genero&correo=$correo&aniolectivo=$aniolectivo&dni=$dni&foto=$fotoalumno&idalumno=$id&idcurso=$curso&nrogrupo=$grupo";
			
			include("../curso/clscurso.php");
			$cursocls=new clsCurso();
			$cursocls->idcurso=$_POST['cmbcurso'];
			$regcurso=$cursocls->getUnCurso();
			$elcurso=mysqli_fetch_array($regcurso, MYSQLI_ASSOC);
			$CursoNombre = "Curso: " . $elcurso['anio'] . "° " . $elcurso['division'] ." Grupo ".$_POST['cmbgrupo'];
		}else
			if($_GET['oper'] == 2){
				$directorio = $_SERVER['DOCUMENT_ROOT'].'../Imagenes/ImagenesAlumnos/';
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
				$curso = $_POST['cmbcurso'];
				$grupo = $_POST['cmbgrupo'];
				$operacion = $_GET['oper'];
				$id = $_GET['idalumno'];
				
				$vinculoregresar ="formualumno.php?sSs=".$_GET['sSs']."&oper=2&modificar=1&nombre=$nombre&apellido=$apellido&nrotarjeta=$nrotarjeta&fechanacimiento=$fechanacimiento&genero=$genero&correo=$correo&aniolectivo=$aniolectivo&dni=$dni&foto=$fotoalumno&id=$id&idcurso=$curso&nrogrupo=$grupo";
				//-------------------------------------------------------//
				$vinculoconfirmar = "mensaalumno.php?sSs=".$_GET['sSs']."&oper=$operacion&nombre=$nombre&apellido=$apellido&nrotarjeta=$nrotarjeta&fechanacimiento=$fechanacimiento&genero=$genero&correo=$correo&aniolectivo=$aniolectivo&dni=$dni&foto=$fotoalumno&idalumno=$id&idcurso=$curso&nrogrupo=$grupo";
				
				include("../curso/clscurso.php");
				$cursocls=new clsCurso();
				$cursocls->idcurso=$curso;
				$regcurso=$cursocls->getUnCurso();
				$elcurso=mysqli_fetch_array($regcurso, MYSQLI_ASSOC);
				$CursoNombre = "Curso: " . $elcurso['anio'] . "° " . $elcurso['division'] ." Grupo ".$grupo;
			}else{
				$operacion = $_GET['oper'];
				$id = $_GET['idalumno'];
				include("../curso/clscurso.php");

				$cursocls=new clsCurso();
				$cursocls->idcurso = $_GET['idcurso'];
				$regcurso=$cursocls->getUnCurso();
				$elcurso=mysqli_fetch_array($regcurso, MYSQLI_ASSOC);
				$CursoNombre = "Curso: " . $elcurso['anio'] . "° " . $elcurso['division'] ." Grupo ".$_GET['nrogrupo'];
				
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
				$vinculoregresar ="grillaalumno.php";
				$curso = $_GET['idcurso'];
				$grupo = $_GET['nrogrupo'];
				
				$vinculoconfirmar = "mensaalumno.php?sSs=".$_GET['sSs']."&oper=$operacion&idalumno=$id&idcurso=$curso&nrogrupo=$grupo";
			}
		
	}else{
		header("location:../alumnos/grillaalumno.php?sSs=<?php echo $_GET['sSs'];?>");
	}
?>
<html>
	<div class="Separador" align="center">
		<h1><?php echo $titulo?></h1>
		<br>
			<div>
				<img width="64" height="64" src="../Imagenes/ImagenesAlumnos/<?php echo $fotoalumno?>">
				<br>
				<label style="color: #000000; font-size: 20px"><?php echo $fotoalumno ?></label>
			</div>
			<div>
				<label>Nombre</label>
				<label style="color: #000000; font-size: 20px"><?php echo $nombre ?></label>
			</div>
			<div>
				<label>Apellido</label>
				<label style="color: #000000; font-size: 20px"><?php echo $apellido ?></label>
			</div>
			<div>
				<label>DNI</label>
				<label style="color: #000000; font-size: 20px"><?php echo $dni ?></label>
			</div>
			<div>
				<label>Numero de tarjeta</label>
				<label style="color: #000000; font-size: 20px"><?php echo $nrotarjeta ?></label>
			</div>
			<div>
				<label>Correo</label>
				<label style="color: #000000; font-size: 20px"><?php echo $correo ?></label>
			</div>
			<div>
				<label>Fecha de Nacimiento</label>
				<label style="color: #000000; font-size: 20px"><?php echo $fechanacimiento ?></label>
			</div>
			<div>
				<label>Año lectivo</label>
				<label style="color: #000000; font-size: 20px"><?php echo $aniolectivo ?></label>
			</div>
			<div>
				<label>Genero</label>
				<label style="color: #000000; font-size: 20px"><?php echo $genero ?></label>
			</div>
			<div>
				<label style="color: #000000; font-size: 20px"><?php echo $CursoNombre?></label>
			</div>
			<br>
			<br>
		
			<a href="<?php echo $vinculoregresar?>">
				<input type="button" class="Boton" value="Regresar">
			</a>
			<a href="<?php echo $vinculoconfirmar?>">
				<input type="button" class="Boton" value="Confirmar">
			</a>
	</div>
</html>