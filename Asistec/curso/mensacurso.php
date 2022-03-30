<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verlogueo.php');
	include('../encapie/encabezado.php');
	include("clscurso.php");

$curso = new clscurso();

$operacion = $_GET['oper'];

if ($operacion == 1) {
	// Alta
	$curso->aniolectivo = $_POST['txtaniolectivo'];
	$curso->anio = $_POST['txtanio'];
	$curso->division = strtoupper($_POST['txtdivision']); 
	$curso->idcurso = $_GET['idcurso'];
	$boolean = false;
	$todoslosCursos = $curso->getTodosLosCursos();
	while($cadaRegistro=mysqli_fetch_array($todoslosCursos, MYSQLI_ASSOC)){
		if($cadaRegistro['anio'] == $curso->anio && $cadaRegistro['division'] == $curso->division && $cadaRegistro['aniolectivo'] == $curso->aniolectivo){
			$boolean = true;
			$mensaje = "El curso ingresado ya existe";
		}
	}
	if($boolean != true){
		if ($curso->insertar() > 0) {
			$mensaje = "Se incorporó correctamente el curso";
		}
	}
	
} else {
	if ($operacion == 2) {
		//ACTUALIZACION
		$curso->aniolectivo = $_POST['txtaniolectivo'];
		$curso->anio = $_POST['txtanio'];
		$curso->division = strtoupper($_POST['txtdivision']);
		$curso->idcurso = $_GET['idcurso'];
		
		$boolean = false;
		$todoslosCursos = $curso->getTodosLosCursos();
		while($cadaRegistro=mysqli_fetch_array($todoslosCursos, MYSQLI_ASSOC)){
			if($cadaRegistro['anio'] == $curso->anio && $cadaRegistro['division'] == $curso->division){
				$boolean = true;
				$mensaje = "El curso ingresado ya existe";
			}else{
			}
		}
		if($boolean != true){
			if ($curso->actualizar() > 0) {
				$mensaje = "Se actualizó correctamente el curso";
			}
		}
		
	} else {
		if ($operacion == 3) {
			// BAJA
			$curso->idcurso = $_GET['idcurso'];
			include('../alumnosxcurso/clsalumnosxcurso.php');
			include("../gruposxcurso/clsgruposxcurso.php");
			$alumno = new clsalumnosxcurso();
			$alumno->idcurso = $_GET['idcurso'];
			$todoslosalumnos = $alumno->getTodosLosAlumnosDELCurso();
			$rowsAlumnos = mysqli_num_rows($todoslosalumnos);
			$grupo = new clsgruposxcurso();
			$grupo->idcurso = $_GET['idcurso'];
			$todoslosgrupos = $grupo->getTodosLosGrupos();
			
			$rowsGrupos = mysqli_num_rows($todoslosgrupos);
			if($rowsAlumnos > 0){
				$mensaje = "No se puede eliminar el curso por que tiene alumnos cargados";
			}else{
				if($rowsGrupos >= 1){
					  $mensaje = "No se puede eliminar el curso por que tiene grupos cargados";
				}else{
					if ($curso->borrar() > 0) {
						$mensaje = "El curso se elimino correctamente";
					}
				}
			}
		}	
	}
}
?>
<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de cursos</label></div>
	<body>
		<div class="Separador">
			<div align="center">
				<br>
				<label class="claseFuente"><?php echo $mensaje?></label>
				<br>
				<br>
				<a href="grillaCurso.php?sSs=<?php echo $SS_IDSESSION;?>">
					<input type="button" value="Regresar" class="botonComun botonVerde">
				</a>
			</div>
		</div>
	</body>
</html>