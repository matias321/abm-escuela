<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verlogueo.php');
	include('../encapie/encabezado.php');
	include("../curso/clscurso.php");
	include('../turno/clsturno.php');
		if(isset($_POST['cmbcurso'])){
			$curso=new clsCurso();
			$curso->idcurso=$_POST['cmbcurso'];
			$regcurso=$curso->getUnCurso();
			$elcurso=mysqli_fetch_array($regcurso, MYSQLI_ASSOC);
			$cursotxt = $elcurso['anio'] . "° " . $elcurso['division'];
			if(isset($_POST['cmbgrupo'])){
				$cursotxt .= " - Grupo: ".$_POST['cmbgrupo'];
			}
			$subtitulo = "";
			
			$fecha= $_POST['txtfecha'];
			$subtitulo .= "Fecha: " .substr($fecha,8,2) . "/" .substr($fecha,5,2) . "/" .substr($fecha,0,4) .  " -- ";
			
			$turno= $_POST['cmbturno'];	
			$turnos=new clsturno();
			$turnos->idturno=$_POST['cmbturno'];
			$regturno=$turnos->getUnTurno();
			$cadaTurno=mysqli_fetch_array($regturno, MYSQLI_ASSOC);

			$subtitulo .= "Turno: " .$cadaTurno['nombreturno'] . "<br>";
			$contadorDeAlumnos = 0;
			$contador =0;

		}else{
			header('location:elegircurso.php?sss='.$_GET['sss']);
		}
?>
	<div class="Separador">
			<div align="center">
				<h1>Asistencia de <?php echo $cursotxt;?></h1>
			</div>			 
			<form name="form1" method="post" action="aplicarasistencia.php?sss=<?php echo $_GET['sss'];?>&idcurso=<?php echo $_POST['cmbcurso']; ?>&idturno=<?php echo $_POST['cmbturno'];?>&fecha=<?php echo $_POST['txtfecha'];?>" class="form">
					<div align="center">
						<h2><?php echo $subtitulo?></h2>
					</div>
						<br>
						<div align="center" class="contenedorLista">  
							<table width="95%" align="center" class="tftable" border="1" id="tablaAsistencia">
							<!-- CABECERA DE LA GRILLA -->	
								<tr align="center">
									<td align="center" class="tfencabezado">Orden</td>
									<td align="center"  style="display:none">idAlumno</td>
									<td align="center" style="display:none" class="tfencabezado">Foto</td>
									<td align="center" class="tfencabezado">DNI</td>
									<td align="center" class="tfencabezado">ALUMNO</td>
									<td align="center" class="tfencabezado">ESTADO</td>
								</tr>
								<!-- FINAL DE CABECERA -->
								<!-- INICIO DETALLE DE GRILLA -->
								<?php
								include("../alumnosxcurso/clsalumnosxcurso.php");
								$aluxcur = new cls
								alumnosxcurso();
								$aluxcur->nrogrupo = $_POST['cmbgrupo'];
								$aluxcur->idcurso=$elcurso['idcurso'];
								$regaluxcur = $aluxcur->getTodosLosAlumnosxCurso();
								$INaluxcur="";
								while($cadaaluxcur=mysqli_fetch_array($regaluxcur, MYSQLI_ASSOC))
								{
									if($INaluxcur != ""){
										$INaluxcur .= ",";
									}
									$INaluxcur .= "'".$cadaaluxcur['idalu']."'";
								}
								$existeenAsis = 1;
								$existeenAsistencia=false;
								include('buscarcurso_enasistencia.php');
								if (!$existeenAsistencia == true){
									$existeenAsis = 0;
									include('buscarcurso_enalumnos.php');
								}
								?>
								<!-- FINAL DETALLE DE GRILLA -->
							</table>
						</div>
						<br>
						  <div align="center" style="position: static">
						  	<a style="text-decoration: none;" href="elegircurso.php?sss=<?php echo $_GET['sss'];?>">
								<input type="button" class="botonVerde botonGrilla" value="Regresar">
						    </a> 
							<input type="submit" value="Aplicar" class="botonAzulOscuro botonGrilla" name="insertar"/>
							<input type="hidden" value="<?php echo $contadorDeAlumnos; ?>" name="hd_cantidadalumnos">
							<input type="hidden" value="<?php echo $existeenAsis; ?>" name="hd_existeenAsis">
						  </div>
						  <br>
						  <br>
			</form>
	</div>
</body>
</html>	