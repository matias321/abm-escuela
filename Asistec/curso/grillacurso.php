<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verlogueo.php');
	include('../encapie/encabezado.php');
	$year = date("Y");
	include("clscurso.php");
	include('../alumnosxcurso/clsalumnosxcurso.php');
	include("../gruposxcurso/clsgruposxcurso.php");
?>
		<div class="Separador">
			<div align="center">
				<h1 class="tituloFormulario claseFuente">Administraci&oacute;n de cursos</h1>
			</div>
			<br>
			<div align="center">
				<!--Boton agregar un curso-->
				<a style="text-decoration: none;" href="formucurso.php?sss=<?php echo $_GET['sss'];?>&oper=1">
					<button class="botonAzulOscuro botonGrilla" >Agregar Curso</button>
				</a>
				<!--Boton para regresar al menu-->
				<a style="text-decoration: none;" href="../index/index.php?sss=<?php echo $_GET['sss'];?>">
					<button class="botonVerde botonGrilla">Regresar</button>
				</a>
				<br>
				<br>
					<form action="grillacurso.php?sss=<?php echo $_GET['sss'];?>" method="post" name="formbuscarxaniolectivo">
						<label>Ingresar año lectivo</label>
						<input type="text" name="buscarxaniolectivotxt" class="textBox" style="width:200px" required placeholder="Ingresar Año">
						<input class="botonGris botonGrilla" type="submit" name="botonbuscarxaniolectivo" value="Buscar">
					</form>
					<br>
					<form action="grillacurso.php?sss=<?php echo $_GET['sss'];?>" method="post" name="formbuscarxnumerocurso">
						<label>Ingresar numero del cuso</label>
						<input type="text" name="buscarxnumerocurso" class="textBox" style="width:200px" required placeholder="Ingresar numero del curso"> 
						<input class="botonGris botonGrilla" type="submit" name="botonbuscarxnumerocurso" value="Buscar">
					</form>
					<br>
					<form action="grillacurso.php?sss=<?php echo $_GET['sss'];?>" method="post" name="formbuscarxdivision">
						<label>Ingresar division</label>
						<input type="text" name="buscarxdivision" class="textBox" style="width:200px" required placeholder="Ingresar division del curso">
						<input class="botonGris botonGrilla" type="submit" name="botonbuscarxdivision" value="Buscar">
					</form>
					<br>
					<form action="grillacurso.php?sss=<?php echo $_GET['sss'];?>" method="post" name="formbuscarcursoespecifico">
						<label>Ingresar año lectivo</label>
						<input type="text" name="aniolectivotxt" class="textBox" style="width:100px" required placeholder="Año lectivo">
						<label>Ingresar numero del cuso</label>
						<input type="text" name="numerocursotxt" class="textBox" style="width:100px" required placeholder="Numero curso"> 
						<label>Ingresar division</label>
						<input type="text" name="divisiontxt" class="textBox" style="width:100px" required placeholder="Division">
						<input class="botonGris botonGrilla" type="submit" name="botonbuscarcursoespecifico" value="Buscar">
					</form>
					<br>
					<a href="grillaCurso.php?sss=<?php echo $_GET['sss'];?>">
						<input class="botonVerde botonGrilla" value="Mostrar todos los cursos" type="button">
					</a>
					
			</div>
			<br>
			<div align="center">
				<table border="0" class="tftable" width="80%">
					<!-- CABECERA -->
					<tr>
						<th class="tfencabezado">AÑO LECTIVO</th>
						<th class="tfencabezado">AÑO</th>
						<th class="tfencabezado">DIVISION</th>
						<th class="tfencabezado">Grupos</th>
						<th class="tfencabezado">Cantidad Alumnos</th>
						<th class="tfencabezado" style="text-align: center;">ACCIONES</th>
					</tr>
						
					<!-- FIN CABECERA -->
					<!-- DETALLE -->
					<?php
					if(isset($_POST["botonbuscarxaniolectivo"])){
						$valor_a_buscar = $_POST['buscarxaniolectivotxt'];
						$curso = new clscurso();
						$curso->aniolectivo = $valor_a_buscar;
						$datosdeloscursos = $curso->buscarcursoxaniolectivo();
						mostrartodosloscursos($datosdeloscursos);
					}else
						if(isset($_POST["botonbuscarxnumerocurso"])){
							$valor_a_buscar = $_POST['buscarxnumerocurso'];
							$curso = new clscurso();
							$curso->anio = $valor_a_buscar;
							$datosdeloscursos = $curso->buscarxnombredelcurso();
							mostrartodosloscursos($datosdeloscursos);
						}else
							if(isset($_POST["botonbuscarxdivision"])){
								$valor_a_buscar = $_POST['buscarxdivision'];
								$curso = new clscurso();
								$curso->division = $valor_a_buscar;
								$datosdeloscursos = $curso->buscarxdivisiondelcurso();
								mostrartodosloscursos($datosdeloscursos);
							}else
								if(isset($_POST["botonbuscarcursoespecifico"])){
									$numerocurso = $_POST['numerocursotxt'];
									$division = $_POST['divisiontxt'];
									$aniolectivo = $_POST['aniolectivotxt'];
									$curso = new clscurso();
									$curso->division = $division;
									$curso->anio = $numerocurso;
									$curso->aniolectivo = $aniolectivo;
									$datosdeloscursos = $curso->buscarCursoespecifico();
									mostrartodosloscursos($datosdeloscursos);
								}else{
									$curso = new clscurso();
									$datosTodosLosCursos = $curso->getTodosLosCursos();
									mostrartodosloscursos($datosTodosLosCursos);	
								}
								?>
					
					<!-- FIN DETALLE -->
				</table>
			</div>
		</div>
	</body>
</html>
<?php
	function mostrartodosloscursos($datos){
		$alumno = new clsalumnosxcurso();
		$grupo = new clsgruposxcurso();
		while($cadaRegistro=mysqli_fetch_array($datos, MYSQLI_ASSOC)){

			$id_curso = $cadaRegistro['idcurso'];
			$alumno->idcurso = $id_curso;
			$todoslosalumnos = $alumno->getTodosLosAlumnosDELCurso();
			$rowsAlumnos = mysqli_num_rows($todoslosalumnos);

			$grupo->idcurso = $id_curso;
			$todoslosgrupos = $grupo->getTodosLosGrupos();
			$rowsGrupos = mysqli_num_rows($todoslosgrupos);
			?>
				<tr>
					<td><?php echo $cadaRegistro['aniolectivo'] ?></td><!--Muesta el año lectivo de los cursos-->
					<td><?php echo $cadaRegistro['anio'] ?></td><!--Muesta el año de los cursos-->
					<td><?php echo $cadaRegistro['division'] ?></td><!--Muesta la division de los cursos-->
					<td><?php echo $rowsGrupos ?></td><!--Muesta la cantidad de grupos de cada curso-->
					<td><?php echo $rowsAlumnos ?></td><!--Muesta la cantidad de alumnos que hay en cada curso-->
					<td colspan="2">
						<!--Boton editar datos del curso-->
						<a style="text-decoration: none;" href="formucurso.php?sss=<?php echo $_GET['sss'];?>&oper=2&idcurso=<?php echo $cadaregistro['idcurso'] ?>">
							<button class="botonAzul botonGrilla">Editar</button>
						</a>
						<!--Boton Eliminar curso-->
						<a style="text-decoration: none;" href="mensacurso.php?sss=<?php echo $_GET['sss'];?>&oper=3&idcurso=<?php echo $cadaregistro['idcurso'] ?>">
							<input type="button" value="Borrar" class="botonRojo botonGrilla">
						</a>
						<!--Boton para administrar grupos del curso-->
						<a style="text-decoration: none;" href="../gruposxcurso/grillagrupoxcurso.php?sss=<?php echo $_GET['sss'];?>&idcurso=<?php echo $cadaregistro['idcurso'] ?>">
							<input type="button" value="Grupos" class="botonGris botonGrilla">
						</a>
					</td>
				</tr>
		<?php
		}
	}
?>

