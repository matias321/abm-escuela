<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
?>

<?php
// se recibe el curso con el que es llamado
include("../curso/clscurso.php");
if(!isset($_GET['idcurso'])){
	header('location:grillagrupoxcurso.php?sSs='.$_GET['sSs']);
}
$curso = new clsCurso();
$curso->idcurso=$_GET['idcurso'];
$datoscurso = $curso->getUnCurso();
$elcurso=mysqli_fetch_array($datoscurso, MYSQLI_ASSOC);
include ("clsGruposxcurso.php");

$grupo=new clsGruposxcurso();
	
$operacion = $_GET['oper'];
/* Se quitó la ACTUALIZACION porque no tiene sentido ya que posee un campo solo que es clave
   EXISTE o NO EXISTE
*/
if ($operacion ==1){

	$grupo->nrogrupo= $_POST['txtnrogrupo'];
	$grupo->idcurso= $_GET['idcurso'];
	
	$todoslosgrupoxCurso = $grupo->getTodosLosGrupos();
	$boolean = false;
	while($cadagrupo=mysqli_fetch_array($todoslosgrupoxCurso, MYSQLI_ASSOC)){
		if($cadagrupo['nrogrupo'] == $grupo->nrogrupo){
			$mensaje = "El grupo ingresado ya existe";
			$boolean = true;
		}else{
			
		}
	}
	if(!$boolean == true){
		if ($grupo->insertar() >0){
			$mensaje="El grupo ha sido insertado correctamente";
		}
	}

}else{
	if ($operacion ==3){
		$grupo->idcurso= $_GET['idcurso'];
		$grupo->nrogrupo= $_GET['nrogrupo'];
		include('../alumnosxcurso/clsalumnosxcurso.php');
		$alur = new clsAlumnosxcurso();
		$alur->idcurso = $_GET['idcurso'];
		$alur->nrogrupo = $_GET['nrogrupo'];
		$todoslosalumnos = $alur->getTodosLosAlumnosxCurso();
		$rowsAlumnos = mysqli_num_rows($todoslosalumnos);
		if($rowsAlumnos > 0){
			$mensaje="No se puede eliminar el grupo por que tiene alumnos cargados";
		}else{
			if ($grupo->borrar() >0){
				$mensaje="El grupo ha sido borrado correctamente";
			}
		}
	}
}
?>
	<div class="Separador">
		<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Grupos de los Cursos</label></div>
			<div align="center" style="position: relative; top:15px;">
				<h3>
					Grupos del Curso: <?php echo $elcurso['anio'].'° '.$elcurso['division'].'  ';?>
				</h3>
			</div>
			<div align="center" style="position: relative; top:15px;">
				<label class="claseFuente"><?php echo $mensaje?></label>
				<br>
				<br>
				<a style="text-decoration: none;" href="grillagrupoxcurso.php?sSs=<?php echo $_GET['sSs'];?>&idcurso=<?php echo $_GET['idcurso'];?>"> 
					<input class="botonVerde botonGrilla" type="button" value="REGRESAR"  class="Boton"> 
				</a>    
			</div>
		</body>
	</div>
</html>