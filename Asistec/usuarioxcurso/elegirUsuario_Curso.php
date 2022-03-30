<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
?>
	<div class="Separador">
		<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Usuarios en los Cursos</label></div>

			<div align="center" style="position: relative; top: 15px;">
				<div align="center" style="position: relative; top: 35px;">
					<form name="form1" action="seleccion.php?sSs=<?php echo $_GET['sSs'];?>&sele=1" method="post">
						<label>Usuario</label>
						<select class="textBox" name="cmbusuario">
							<option selected disabled> Usuario</option>
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
						<input type="submit" value="Buscar por Usuario" class="botonGris botonGrilla">
					</form>
				</div>
				<div align="center" style="position: relative; top: 55px;">
					<form name="form2" action="seleccion.php?sSs=<?php echo $_GET['sSs'];?>&sele=2" method="post">
						<label>Curso</label>
						<select class="textBox" name="cmbcurso">
							<option selected disabled>Curso</option>
						<?php
							include("../curso/clsCurso.php");
							$curso = new clsCurso();
							$regcursos=$curso->getTodosLosCursos();
							while($cadaCurso=mysqli_fetch_array($regcursos, MYSQLI_ASSOC))
							{
								echo "<option value=".$cadaCurso['idcurso']." selected>".$cadaCurso['anio']."° ".$cadaCurso['division']."</option>";
							}
						?>
						</select>
						<input type="submit" value="Buscar por Curso"  class="botonGris botonGrilla">
					</form>
					<br>
					<br>
					<a href="../index/Index.php?sSs=<?php echo $_GET['sSs'];?>">
						<input type="button"  class="botonVerde botonGrilla" value="Regresar"/>
					</a>
				</div>
			</div>
		</body>
	</div>
</html>