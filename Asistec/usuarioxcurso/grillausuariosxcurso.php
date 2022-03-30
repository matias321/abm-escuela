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
			?>
			<div align="center" style="position: relative; top:15px;">
				<label>
					Cursos de : <?php echo $nombrecurso;?>
				</label>
			</div>

			<div align="center" style="position: relative; top:35px;">
				<table border="1" class="tftable" width="50%">
					<tr>
						<th class="tfencabezado">Usuario</th>
						<th class="tfencabezado">Estado</th>
					</tr>
					<?php
					include("clsUsuariosxcurso.php");

					$usuariosxcurso = new clsUsuariosxcurso();
					$usuariosxcurso->idcurso = $idcurso;
					$datosTodosLosUsuarios = $usuariosxcurso->getTodosLosUsuariosxCurso();

					while($cadaRegistro=mysqli_fetch_array($datosTodosLosUsuarios, MYSQLI_ASSOC)){
					?>
					<tr>
						<td><?php echo $cadaRegistro['apellido'].', '.$cadaRegistro['nombre'] ?> </td>
						<td>
							<!-- oper 3 borrar -->
							<a href="mensausuariosxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=3&idcurso=<?php echo $idcurso;?>&idusuario=<?php echo $cadaRegistro['idusu']?>">
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
				<a style="text-decoration: none;" href="formuusuariosxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=1&idcurso=<?php echo $idcurso;?>">
					<button class="botonAzulOscuro botonGrilla">Agregar</button>
				</a>
				<a style="text-decoration: none;" href="elegirUsuario_Curso.php?sSs=<?php echo $_GET['sSs'];?>">
					<button class="botonVerde botonGrilla">Regresar</button>
				</a>
		</body>
	</div>
</html>