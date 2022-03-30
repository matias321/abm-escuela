<?php
	include ("clsasistencia.php");
	$asistencias = new clsAsistencia();

	$asistencias->fecha = $fecha; // viene por POST del formulario anterior
	$asistencias->idturno = $turno; // viene por POST del formulario anterior
	$datosAsistencias = $asistencias->getTodosAlumnos($INaluxcur);
	while($cadaAsistencia=mysqli_fetch_array($datosAsistencias, MYSQLI_ASSOC)){
	?>
	<tr>
		<td><?php echo $contadorDeAlumnos ?></td>
		<td style="display:none"><input type="text" name="lbl<?php echo $contadorDeAlumnos;?>" value="<?php echo $cadaAsistencia['id_alumno'];?>"/> </td>
		<td style="display:none"><img width="32" height="32" src="../Imagenes/ImagenesAlumnos/<?php echo $cadaAlumno['foto']?>"></td>
		<td><?php echo $cadaAsistencia['dni'] ?></td>
		<td><?php echo $cadaAsistencia['apellido'].', '.$cadaAsistencia['nombre']; ?> </td>
		<td>  
			<!--   ACA VA EL MANEJO DEL ESTADO DE ASISTENCIA   -->
			<?php 
			if ($cadaAsistencia['idestadoasistencia'] == 1)
			{
			?>
					<input 
						   id="<?php echo $contador?>" 
						   type="radio" 
						   name="opt<?php echo $contadorDeAlumnos?>" 
						   value="1"
						   checked
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
					>
						<label 
							   for="<?php echo $contador;?>">Ausente
							 <?php $contador += 1?>
						</label>
			<?php
			} else
				if ($cadaAsistencia['idestadoasistencia'] == 2)
				{
				?>
						<input 
						   id="<?php echo $contador?>" 
						   type="radio" 
						   name="opt<?php echo $contadorDeAlumnos?>" 
						   value="1"
						   checked
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
						   checked
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
					>
						<label 
							   for="<?php echo $contador;?>">Ausente
							 <?php $contador += 1?>
						</label>
				<?php
				} else {
				?>
						<input 
						   id="id<?php echo $contador?>" 
						   type="radio" 
						   name="opt<?php echo $contadorDeAlumnos?>" 
						   value="1"
					> 
						<label 
							   for="id<?php echo $contador;?>">Presente
								<?php $contador += 1?>
						</label>
					<input 
						   id="id<?php echo $contador?>" 
						   type="radio" 
						   name="opt<?php echo $contadorDeAlumnos?>" 
						   value="2"   
					>
						<label 
							   for="id<?php echo $contador;?>">Tarde
							<?php $contador += 1?>
						</label>
					<input 
						   id="<?php echo $contador?>" 
							type="radio" 
							name="opt<?php echo $contadorDeAlumnos?>" 
							value="1"
						    checked
					>
						<label 
							   for="id<?php echo $contador;?>">Ausente
							 <?php $contador += 1?>
						</label>
				<?php
					
				}
				?>
		</td>
	</tr>
	<?php
		$existeenAsistencia=true;
		$contadorDeAlumnos = $contadorDeAlumnos+1;
	}
?>