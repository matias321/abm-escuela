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
			?>

			<div align="center" style="position: relative; top:15px;">
				<label>
					Cursos de : <?php echo $nombreusuario;?>
				</label>
			</div>

			<div align="center" style="position: relative; top:35px;">
				<table border="1" class="tftable" width="50%">
					<tr>
						<td class="tfencabezado">AÑO</td>
						<td class="tfencabezado">DIVISION</td>
						<td class="tfencabezado">Estado</td>
					</tr>
					<?php
					include("clsUsuariosxcurso.php");

					$usuariosxcurso = new clsUsuariosxcurso();
					$usuariosxcurso->idusuario = $idusuario;
					$datosTodosLosCursos = $usuariosxcurso->getTodosLosCursosxUsuario();

					while($cadaRegistro=mysqli_fetch_array($datosTodosLosCursos, MYSQLI_ASSOC)){
					?>
					<tr>
						<td><?php echo $cadaRegistro['anio'] ?> </td>
						<td><?php echo $cadaRegistro['division'] ?> </td>
						<td>
							<!-- oper 3 borrar -->
							<a href="mensacursosxusuario.php?sSs=<?php echo $_GET['sSs'];?>&oper=3&idusuario=<?php echo $idusuario;?>&idcurso=<?php echo $cadaRegistro['idcur']?>">
								<input type="button" value="Borrar" class="botonGrilla botonRojo">
							</a>
						</td>
					</tr>
					<?php
					}
					?>
				</table>
				<br>
				<br>
					<a style="text-decoration: none;"href="formucursosxusuario.php?sSs=<?php echo $_GET['sSs'];?>&oper=1&idusuario=<?php echo $idusuario;?>">
						<button  class="botonAzulOscuro botonGrilla">Agregar</button>
					</a>
				<a style="text-decoration: none;"href="elegirUsuario_Curso.php?sSs=<?php echo $_GET['sSs'];?>">
					<button  class="botonVerde botonGrilla">Regresar</button>
				</a>
			</div>
		</body>
	</div>
</html>