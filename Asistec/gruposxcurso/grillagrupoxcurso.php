<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
include("clsgruposxcurso.php");
include('../alumnosxcurso/clsalumnosxcurso.php');
?>
	<div class="Separador">
			<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Grupos de los Cursos</label></div>

			<body>
			<?php
			if(isset($_GET['idcurso'])){
				$idcurso = $_GET['idcurso'];
			}else{
				header("location:../curso/grillacurso.php");
			}
			// se recibe el curso con el que es llamado
			include("../curso/clscurso.php");
			$curso = new clsCurso();
			$curso->idcurso=$_GET['idcurso'];
			$datoscurso = $curso->getUnCurso();
			$elcurso=mysqli_fetch_array($datoscurso, MYSQLI_ASSOC);

			?>

			<div align="center" style="position: relative; top:15px;">
				<h3>
					Grupos del Curso: <?php echo $elcurso['anio'].'° '.$elcurso['division'].'  ';?>
				</h3>
			</div>
			<div align="center" style="position: relative; top:15px;">
				<a style="text-decoration: none;" href="formugrupoxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=1&idcurso=<?php echo $curso->idcurso; ?>">
					<button class="botonAzulOscuro botonGrilla">Agregar</button>
				</a>
				<a style="text-decoration: none;" href="../curso/grillacurso.php?sSs=<?php echo $_GET['sSs'];?>">
					<button class="botonVerde botonGrilla">Regresar</button>
				</a>
			</div>
			<div align="center" style="position: relative; top:30px;">
				<table border="1" class="tftable" width="50%">
					<!-- CABECERA -->
					<tr>
						<th class="tfencabezado" style="text-align: center">Año</th>
						<th class="tfencabezado" style="text-align: center">Grupo</th>
						<th class="tfencabezado" style="text-align: center">Cantidad de alumnos</th>
						<th class="tfencabezado" style="text-align: center" style="text-align: center;">ACCIONES</th>
					<tr>
					<?php
					$grupo = new clsGruposxcurso();
					$grupo->idcurso = $_GET['idcurso'];
					$datosTodoLosGrupos = $grupo->getTodosLosGrupos();
					$alumnosxgrupo = new clsAlumnosxcurso();
					$alumnosxgrupo->idcurso = $_GET['idcurso'];
					while($cadaRegistro=mysqli_fetch_array($datosTodoLosGrupos, MYSQLI_ASSOC)){
					?>
					<tr>
						<td><?php echo $elcurso['anio'].'° '.$elcurso['division'].'  ';?></td>
						<td><?php echo $cadaRegistro['nrogrupo']; ?></td>
						<?php

						$alumnosxgrupo->nrogrupo = $cadaRegistro['nrogrupo'];
						$todoslosalumnos = $alumnosxgrupo->getTodosLosAlumnosxCurso();
						$rowsAlumnos = mysqli_num_rows($todoslosalumnos);
						?>	
						<td><?php echo $rowsAlumnos?></td>
						<td colspan="2">
							<!-- SE SACA EL BOTON EDITAR PORQUE NO TIENE SENTIDO YA QUE SOLO POSEE UN CAMPO QUE ES CLAVE
								 EXISTE O NO EXISTE	-->
							<a style="text-decoration: none;" href="mensagrupoxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=3&idcurso=<?php echo $curso->idcurso; ?>&nrogrupo=<?php echo $cadaRegistro['nrogrupo']; ?>">
								<input class="botonRojo botonGrilla" type="button" value="Borrar">
							</a>
							<a style="text-decoration: none;" href="../alumnosxcurso/grillaalumnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=3&idcurso=<?php echo $curso->idcurso; ?>&nrogrupo=<?php echo $cadaRegistro['nrogrupo']; ?>">
								<input class="botonGris botonGrilla" type="button" value="Alumnos">
							</a>

						</td>
					</tr>
					<?php
					}
					?>
				<!-- FIN DETALLE -->
				</table>
			</div>
		</body>
	</div>
</html>