<?php
	$idsession =  $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
	include('../encapie/encabezado.php');
?>
	<div class="Separador">
		<div align="center"><label class="tituloFormulario claseFuente">Administraci&oacute;n de cursos</label></div>

		<body>
		<?php
		$operacion = $_GET['oper'];

		include("clsCurso.php");
		$curso = new clsCurso();

		if ($operacion == 1) {

			$aniolectivo = "";
			$anio = "";
			$division = "";

			$idcurso = $curso->getNuevoIdCurso();
		} else {
			$idcurso = $_GET['idcurso'];
			$curso->idcurso = $idcurso;
			$registrodedatos = $curso->getUnCurso();

			if ($vectordato = mysqli_fetch_array( $registrodedatos, MYSQLI_ASSOC)) {
				$aniolectivo = $vectordato['aniolectivo'];
				$anio = $vectordato['anio'];
				$division = $vectordato['division'];
			}
		}
		?>
		<div align="center">
			<form name="form1" action="mensaCurso.php?sSs=<?php echo $SS_IDSESSION;?>&oper=<?php echo $operacion?>&idcurso=<?php echo $idcurso?>" method="post">
				<h2>Agregar Curso</h2>
					<div class="Contenedor">
						<div class="input-contenedor">
							<label>Año Lectivo</label>
							<br>
							<input required class="textBox" name="txtaniolectivo" type="text" value="<?php echo $aniolectivo ?>"
							   placeholder="Año lectivo"/>
						</div>
						<div class="input-contenedor">
							<label>Año</label>
							<br>
							<input class="textBox" required name="txtanio" type="text" value="<?php echo $anio ?>"
							   placeholder="Año" />
						</div>
						<div class="input-contenedor">
							<label>División</label>
							<br>
							<input class="textBox" required name="txtdivision" type="text" value= "<?php echo $division ?>"
							   placeholder="Division" />
						</div>
						<br>
						<input class="botonAzulOscuro botonGrilla" name="boton_ingresar" type="submit" value="Guardar" class="Boton" />
						<a href="grillaCurso.php?sSs=<?php echo $SS_IDSESSION;?>">
							<input class="botonVerde botonGrilla" type="button" value="Cancelar" class="Boton" />
						</a>
					</div>
				</form>
			</div>
		</body>
	</div>
</html>