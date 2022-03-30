<?php
	require_once("../funcionesgenerales/ValidarLogeo.php");
	$contador = 0;
	include ("../alumnos/clsalumno.php");
	$alumnos = new clsAlumno();
	$datosAlumnos = $alumnos->getTodosLosAlumnosINIdalumno($INaluxcur);
	while($cadaAlumno=mysqli_fetch_array($datosAlumnos, MYSQLI_ASSOC)){
	?>
	<tr>
		<td><?php echo $contadorDeAlumnos ?> </td>
			<td style="display:none">
				<input 
					   type="text" 
					   name="lbl<?php echo $contadorDeAlumnos;?>" 
					   value="<?php echo $cadaAlumno['idalumno'];?>"
				> 
			</td>
		<td style="display:none"><img width="32" height="32" src="../Imagenes/ImagenesAlumnos/<?php echo $cadaAlumno['foto']?>"></td>
		<td><?php echo $cadaAlumno['dni'] ?> </td>
		<td><?php echo $cadaAlumno['apellido'].', '.$cadaAlumno['nombre']; ?> </td>
		<td>  
			<!--   ACA VA EL MANEJO DEL ESTADO DE ASISTENCIA   -->
				<input 
					   id="<?php echo $contador?>" 
					   type="radio" 
					   name="opt<?php echo $contadorDeAlumnos?>" 
					   value="1"
					  
				> 
					<label 
						   for="<?php echo $contador;?>">Presente
							<?php $contador += 1?>
					</label>
				<input 
					   id="<?php echo $contador?>" 
					   type="radio" 
					   name="opt<?php echo $contadorDeAlumnos?>" 
					   value="2"   
				>
					<label 
						   for="<?php echo $contador;?>">Tarde
						<?php $contador += 1?>
					</label>
				<input 
					   id="<?php echo $contador?>" 
					   type="radio" 
					   name="opt<?php echo $contadorDeAlumnos?>" 
					   value="3"  
					   checked
				>
					<label 
						   for="<?php echo $contador;?>">Ausente
						 <?php $contador += 1?>
					</label>
		</td>
	</tr>
	<?php
		$contadorDeAlumnos += 1;
	}
?>

					