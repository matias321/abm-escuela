<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
?>
	<div class="Separador">
		<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Alumnos de los Cursos</label></div>
		<?php
		if(isset($_GET['idcurso']) && isset($_GET['nrogrupo'])){
				$idcurso = $_GET['idcurso'];
				$nrogrupo = $_GET['nrogrupo'];
			}else{
				header("location:../curso/grillacurso.php?sSs=". $_GET['sSs']);
			}
		// se recibe el curso con el que es llamado
		include("../curso/clscurso.php");
		$curso = new clsCurso();
		$curso->idcurso=$_GET['idcurso'];
		$datoscurso = $curso->getUnCurso();
		$elcurso=mysqli_fetch_array($datoscurso, MYSQLI_ASSOC);
		$nombrecurso = $elcurso['anio'].'° '.$elcurso['division'].' Grupo: '. $nrogrupo;
		?>
		<div align="center" style="position: relative; top:15px;">
			<h3>
				Grupos del Curso: <?php echo $nombrecurso;?>
			</h3>
		</div>

		<?php
		//aca hay que recibir a que curso y grupo vienen a dar de alta
		//uno de los llamadores es ABM de GruposxCurso
		?>
		<div align="center" style="position: relative; top:15px;">
			<a style="text-decoration: none;" href="formualumnoxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=1&idcurso=<?php echo $idcurso;?>&nrogrupo=<?php echo $nrogrupo;?>">
				<button class="botonAzulOscuro botonGrilla">Agregar</button>
			</a>
				<a style="text-decoration: none;" href="../gruposxcurso/grillagrupoxcurso.php?sSs=<?php echo $_GET['sSs'];?>&idcurso=<?php echo $idcurso;?>">
					<button class="botonVerde botonGrilla">Regresar</button>
			</a>
		</div>
		<div align="center" style="position: relative; top:35px;">
			<table border="1" class="tftable" width="80%">
				<tr>
					<th class="tfencabezado">ID</th>
					<th class="tfencabezado">FOTO</th>
					<th class="tfencabezado">NOMBRE</th>
					<th class="tfencabezado">APELLIDO</th>
					<th class="tfencabezado">DNI</th>
					<th class="tfencabezado">FEC. NAC.</th>
					<th class="tfencabezado">NRODETARJETA</th>
					<th class="tfencabezado">Genero</th>
					<th class="tfencabezado">Email</th>
					<th class="tfencabezado">Año lectivo</th>
					<th class="tfencabezado" style="text-align: center;">ACCIONES</th>	
				</tr>
				<?php
				include("clsAlumnosxcurso.php");

				$alumnoxcurso = new clsAlumnosxcurso();
				$alumnoxcurso->idcurso = $idcurso;
				$alumnoxcurso->nrogrupo = $nrogrupo;
				$datosTodosLosAlumnos = $alumnoxcurso->getTodosLosAlumnosxCurso();

				while($cadaRegistro=mysqli_fetch_array($datosTodosLosAlumnos, MYSQLI_ASSOC)){
					$ruta_img = $cadaRegistro['foto'];
				?>
				<tr>
					<td><?php echo $cadaRegistro['idalu'] ?> </td>
					<td><img width="32" height="32" src="../Imagenes/ImagenesAlumnos/<?php echo $ruta_img?>"</img></td>
					<td><?php echo $cadaRegistro['nombre'] ?> </td>
					<td><?php echo $cadaRegistro['apellido'] ?> </td>
					<td><?php echo $cadaRegistro['dni'] ?> </td>
					<td><?php echo $cadaRegistro['fechanacimiento'] ?> </td>
					<td><?php echo $cadaRegistro['nrotarjeta'] ?> </td>
					<td><?php echo strtoupper($cadaRegistro['genero_alumn']) ?> </td>
					<td><?php echo $cadaRegistro['Email'] ?> </td>
					<td><?php echo $cadaRegistro['aniolectivo'] ?> </td>
					<td colspan="2">
						<!-- oper 2 edicion -->
						<a style="text-decoration: none;" href="formualumnoxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=2&idcurso=<?php echo $idcurso;?>&nrogrupo=<?php echo $nrogrupo;?>&idalumno=<?php echo $cadaRegistro['idalu'] ?>">
							<input class="botonAzul botonGrilla" type="button" value="Editar" class="botonGris">
						</a>
						<!-- oper 3 borrar -->
						<a style="text-decoration: none;" href="formuconfirmacion.php?sSs=<?php echo $_GET['sSs'];?>&oper=3&idcurso=<?php echo $idcurso;?>&nrogrupo=<?php echo $nrogrupo;?>&idalumno=<?php echo $cadaRegistro['idalu']?>&nombre=<?php echo $cadaRegistro['nombre']?>&apellido=<?php echo $cadaRegistro['apellido']?>&dni=<?php echo $cadaRegistro['dni']?>&fechanacimiento=<?php echo $cadaRegistro['fechanacimiento']?>&nrotarjeta=<?php echo $cadaRegistro['nrotarjeta']?>&genero=<?php echo $cadaRegistro['genero_alumn']?>&correo=<?php echo $cadaRegistro['Email']?>&aniolectivo=<?php echo $cadaRegistro['aniolectivo']?>&foto=<?php echo $cadaRegistro['foto']?>">
							<input class="botonRojo botonGrilla" type="button" value="Borrar" class="botonRojo">
						</a>
					</td>
				</tr>
				<?php
				}
				?>
			</table>
		</div>
	</body>
</html>