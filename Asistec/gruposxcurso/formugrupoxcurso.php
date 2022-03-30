<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
?>
	<div class="Separador">
			<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de Grupos de los Cursos</label></div>

			<?php
			if(isset($_GET['idcurso'])){
				$idcurso = $_GET['idcurso'];
			}else{
				header("location:../curso/grillacurso.php?sSs=".$_GET['sSs']);
			}
			// se recibe el curso con el que es llamado
			include("../curso/clscurso.php");
			$curso = new clsCurso();
			$curso->idcurso=$_GET['idcurso'];
			$datoscurso = $curso->getUnCurso();
			$elcurso=mysqli_fetch_array($datoscurso, MYSQLI_ASSOC);

			//------------------------------------------------
			$operacion = $_GET['oper'];

			include("clsGruposxcurso.php");

			$grupo = new clsGruposxcurso();

			$grupo->idcurso = $_GET['idcurso'];
			if ($operacion == 1){
				$grupo->nrogrupo="";
			}else{
				$grupo->nrogrupo=$_GET['nrogrupo'];
				$registrodedatos = $grupo->getUnGrupo();

				if ($vectordato = mysqli_fetch_array($registrodedatos, MYSQLI_ASSOC)){
					$nrogrupo= $vectordato['nrogrupo'];
				}
			}
			?>
			<div align="center" style="position: relative; top:15px;">
				<h3>
					Grupos del Curso: <?php echo $elcurso['anio'].'° '.$elcurso['division'].'  ';?>
				</h3>
			</div>

			<div align="center" style="position: relative; top:25px;">
			<form name="form1" action="mensagrupoxcurso.php?sSs=<?php echo $_GET['sSs'];?>&oper=<?php echo $operacion ?>&idcurso=<?php echo $grupo->idcurso; ?>" method="post">
				<div align="center">
					<label>Numero de Grupo</label>
					<input style="width: 150px; height: 20px" class="textBox" type="text" name="txtnrogrupo" 
						 value="<?php echo $grupo->nrogrupo ?>" placeholder="Ingresar Numero de grupo"
						 maxlength="2" />
					<br>
					<br>
					<input class="botonAzulOscuro botonGrilla" type="submit" value="GUARDAR" class="Boton">
					<a style="text-decoration: none;" href="grillagrupoxcurso.php?sSs=<?php echo $_GET['sSs'];?>&idcurso=<?php echo $_GET['idcurso'];?>"> 
						<input class="botonVerde botonGrilla" type="button" value="CANCELAR" class="Boton"> 
					</a>
				</div>
			</form>
		</body>
	</div>
</html>