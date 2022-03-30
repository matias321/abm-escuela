<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verlogueo.php');
	include('../encapie/encabezado.php');
?>
<div class="Separador">
		<div align="center">
			<label class="tituloFormulario claseFuente">Asistencia del <?php echo $_GET['fecha']; ?></label>
		</div>
		<?php
		include('../curso/clscurso.php');
		$curso=new clscurso();
		$curso->idcurso = $_GET['idcurso'];
		$regCurso=$curso->getUnCurso();
		$elcurso=mysqli_fetch_array($regCurso, MYSQLI_ASSOC);

		include('../turno/clsturno.php');
		$turno=new clsturno();
		$turno->idturno = $_GET['idturno'];
		$regTurno=$turno->getUnTurno();
		$elturno=mysqli_fetch_array($regTurno, MYSQLI_ASSOC);
		?>
		<div align="center" style="position: relative; top: 5px;">
			<label class="subtituloFormulario claseFuente">
				Curso:&nbsp;<?php echo $elcurso['anio'].'° '.$elcurso['division']; ?>&nbsp;&nbsp;&nbsp;Turno:&nbsp;<?php echo $elturno['nombreturno'];?>  
			</label>
		</div>	
		<div align="center" style="position: relative; top: 15px;">
			<label class="subtituloFormulario claseFuente">
				Total Cantidad de Alumnos:&nbsp;<?php echo $_POST['hd_cantidadalumnos'];?>  
			</label>
		</div>	
		<?php
	
		$total = $_POST['hd_cantidadalumnos'];
		$enAsist = $_POST['hd_existeenAsis'];
		$cont = 0;
		//borrar los estados de ese dia/turno/curso
		include('clsasistencia.php');
		$asistencia=new clsasistencia();
		$contaPresentes=0;
		$contaAusentes=0;
		$contaTardes=0;
		$asistencia->fecha = $_GET['fecha'];
		$asistencia->idturno = $_GET['idturno'];
		$asistencia->idusuario= $SS_IDUSUARIO;
		//insertar la anueva informacion
		while($cont < $total){
			$idalumnolbl = "lbl".$cont;
			$asistenciaopt = "opt".$cont;
			$asistencia->idalumno = $_POST[$idalumnolbl];
			$asistencia->idestadoasistencia=$_POST[$asistenciaopt];
			if ($enAsist == 1){
				$asistencia->borrarElAlumnoUnDiaTurno();
			}
				switch($_POST[$asistenciaopt])
				{	
					case 1:
						$asistencia->observaciones="El alumno llego a tiempo";
						break;
					case 2:
						$asistencia->observaciones="El alumno llego tarde";
						break;
					case 3:
						$asistencia->observaciones="El alumno estuvo ausente";
						break;
				}
				switch($_POST[$asistenciaopt])
				{
					case 1:
						$contaPresentes += 1;
						break;
					case 2:
						$contaTardes += 1;
						break;
					case 3:
						$contaAusentes += 1;
						break;
				}
				
				$asistencia->insertar();
				$cont = $cont +1;
		}

		?>
		<div align="center" style="position: relative; top: 35px;">
			<label class="subtituloFormulario claseFuente">
				Total de Presentes:&nbsp;<?php echo $contaPresentes;?>  
			</label>
		</div>	
		<div align="center" style="position: relative; top: 40px;">
			<label class="subtituloFormulario claseFuente">
				Total de Tardes:&nbsp;<?php echo $contaTardes;?>  
			</label>
		</div>	
		<div align="center" style="position: relative; top: 45px;">
			<label class="subtituloFormulario claseFuente">
				Total de Ausentes:&nbsp;<?php echo $contaAusentes;?>  
			</label>
		</div>	
		<div align="center" style="position: relative; top: 50px;">
			<a style="text-decoration: none;" href="elegircurso.php?sSs=<?php echo $_GET['sSs'];?>">
				<input type="submit" value="Finalizar" class="botonVerde botonGrilla"/>
			</a>
		</div>	
</div>