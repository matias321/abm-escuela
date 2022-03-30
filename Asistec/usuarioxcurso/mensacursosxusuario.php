<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
?>
	<div class="Separador">
			<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Cursos de los Usuarios</label></div>
			<?php
			$idusuario = $_GET['idusuario'];

			// se recibe el usuario con el que es llamado

			include("../usuario/clsusuario.php");
			$usuario = new clsUsuario();
			$usuario->idusuario=$idusuario;
			$datosusuario = $usuario->getUnUsuario();
			$elusuario=mysqli_fetch_array($datosusuario, MYSQLI_ASSOC);
			$nombreusuario = $elusuario['apellido'].', '.$elusuario['nombre'];

			include("clsUsuariosxcurso.php");
			$usuarioxcurso = new clsUsuariosxcurso();

			$operacion = $_GET['oper'];
			$usuarioxcurso->idusuario = $_GET['idusuario'];

			if ($operacion == 3){
				//baja del usuario del curso
				$usuarioxcurso->idcurso = $_GET['idcurso'];
				if ($usuarioxcurso->borrar() > 0){
					$mensaje = "SE ELIMINÓ CORRECTAMENTE EL CURSO DE ".$nombreusuario;
				}else{
					$mensaje = "NO SE PUDO ELIMINAR EL CURSO DE ".$nombreusuario;
				}
			} else {
				$boolean = false;
				$usuarioxcurso = new clsUsuariosxcurso();
				$usuarioxcurso->idcurso = $_POST['cmbcurso'];
				$usuarioxcurso->idusuario = $_GET['idusuario'];
				
				$todosloscursos = $usuarioxcurso->getTodosLosCursosxUsuario();
				while($cadaRegistro=mysqli_fetch_array($todosloscursos, MYSQLI_ASSOC)){
					if($cadaRegistro['idcur'] == $usuarioxcurso->idcurso){
						$mensaje= "Este usuario ya esta insertado en este curso";
						$boolean = true;
					}
				}
				if(!$boolean == true){
					if ($usuarioxcurso->insertar() > 0) {
						$mensaje = "SE INCORPORÓ EL CURSO A ".$nombreusuario;
					}
				}
				
				
			}

			?>
			<div align="center" style="position: relative; top:15px;">
				<label style="font-size: 16px; font-weight: bold; color: darkblue;">
					Cursos de : <?php echo $nombreusuario;?>
				</label>
			</div>


			<div align="center" style="position: relative; top:25px;">
				<br>
				<label class="claseFuente"><?php echo $mensaje?></label>
				<br>
				<br>
				<a href="grillacursosxusuario.php?sSs=<?php echo $_GET['sSs'];?>&idusuario=<?php echo $idusuario;?>"> 
					<input type="button" value="REGRESAR"  class="botonComun botonVerde"> 
				</a>    
			</div>
		</body>
	</div>
</html>
	