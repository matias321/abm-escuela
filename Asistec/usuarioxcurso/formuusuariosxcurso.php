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
			<label style="font-size: 16px; font-weight: bold; color: darkblue;">
				Cursos de : <?php echo $nombrecurso;?>
			</label>
			&nbsp;&nbsp;&nbsp;
		</div>

			<form name="form1" action="mensausuariosxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=1&idcurso=<?php echo $idcurso;?> " method="post">
				<div align="center" style="position: relative; top:25px;">
					<label>USUARIO</label>
					<select class="textBox" name="cmbusuario">
					<?php
						include("../usuario/clsusuario.php");
						$usuario = new clsUsuario();
						$regusuarios=$usuario->getTodosLosUsuarios();
						while($cadaUsuario=mysqli_fetch_array($regusuarios, MYSQLI_ASSOC))
						{
							if($cadaUsuario['idperfil'] == 1 || $cadaUsuario['idperfil'] == 4){
									echo "<option value=".$cadaUsuario['idusuario']." selected>".$cadaUsuario['apellido'].", ".$cadaUsuario['nombre']."</option>";
								}
						}
					?>
					</select>
				</div>
				<div align="center" style="position: relative; top:35px;">
					<input type="submit" value="Guardar" class="Boton" />
					<a href="grillausuariosxcurso.php?sSs=<?php echo $_GET['sSs'];?>&idcurso=<?php echo $idcurso;?>">
						<input type="button" value="Cancelar" class="Boton"/>
					</a>
				</div>
			</form>
		</body>
	</div>
</html>