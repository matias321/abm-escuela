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
				<label style="font-size: 16px; font-weight: bold; color: darkblue;">
					Cursos de : <?php echo $nombreusuario;?>
				</label>
			</div>

			<div align="center" style="position: relative; top:15px;">
				<form name="form1" action="mensacursosxusuario.php?sSs=<?php echo $_GET['sSs'];?>&oper=1&idusuario=<?php echo $idusuario;?> " method="post">
					<div align="center" style="position: relative; top:25px;">
						<label>CURSO</label>
						<select class="textBox" name="cmbcurso">
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
					</div>
					<div align="center" style="position: relative; top:35px;">
						<input type="submit" value="Guardar" class="Boton"/>
						<a href="grillacursosxusuario.php?sSs=<?php echo $_GET['sSs'];?>&idusuario=<?php echo $idusuario;?>">
							<input type="button" value="Cancelar" class="Boton"/>
						</a>
					</div>
				</form>
			</div>
		</body>
	</div>
</html>