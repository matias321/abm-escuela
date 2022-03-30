<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
?>
	<div class="Separador">
		<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Usuarios en los Cursos</label></div>


		<?php
		$idcurso = $_GET['idcurso'];

		// se recibe el usuario con el que es llamado

		include("../curso/clscurso.php");
		$curso = new clsCurso();
		$curso->idcurso=$idcurso;
		$datoscurso = $curso->getUnCurso();
		$elcurso=mysqli_fetch_array($datoscurso, MYSQLI_ASSOC);
		$nombrecurso = $elcurso['anio'].'º '.$elcurso['division'];

		include("clsUsuariosxcurso.php");
		$usuarioxcurso = new clsUsuariosxcurso();

		$operacion = $_GET['oper'];
		$usuarioxcurso->idcurso = $_GET['idcurso'];

		if ($operacion == 3){
			//baja del usuario del curso
			$usuarioxcurso->idusuario = $_GET['idusuario'];
			if ($usuarioxcurso->borrar() > 0){
				$mensaje = "SE ELIMINÓ CORRECTAMENTE EL USUARIO DE ".$nombrecurso;
			}else{
				$mensaje = "NO SE PUDO ELIMINAR EL USUARIO DE ".$nombrecurso;
			}
		} else {
			$boolean = false;
			$usuarioxcurso->idusuario = $_POST['cmbusuario'];
			$todosloscursos = $usuarioxcurso->getTodosLosUsuariosxCurso();
				while($cadaRegistro=mysqli_fetch_array($todosloscursos, MYSQLI_ASSOC)){
					if($cadaRegistro['idusu'] == $usuarioxcurso->idusuario){
						$mensaje= "Este usuario ya esta insertado en este curso";
						$boolean = true;
					}
				}
			
			if(!$boolean == true){
				if ($usuarioxcurso->insertar() > 0) {
					$mensaje = "SE INCORPORÓ EL USUARIO A ".$nombrecurso;
				} 
			}
			
		}

		?>
		<div align="center" style="position: relative; top:15px;">
			<label style="font-size: 16px; font-weight: bold; color: darkblue;">
				Cursos de : <?php echo $nombrecurso;?>
			</label>
			&nbsp;&nbsp;&nbsp;
		</div>


		<div align="center" style="position: relative; top:25px;">
			<br>
			<label class="claseFuente"><?php echo $mensaje?></label>
			<br>
			<br>
			<a href="grillausuariosxcurso.php?sSs=<?php echo $_GET['sSs'];?>&idcurso=<?php echo $idcurso;?>"> 
				<input type="button" value="REGRESAR"  class="botonComun botonVerde"> 
			</a>    
		</div>
		</body>
	</div>
</html>
	