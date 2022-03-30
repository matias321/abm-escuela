<?php
	include('../encapie/encabezado.php');
	include('../usuariosxmaterias/clsusuariosxmateria.php');
	if($_SESSION['idperfil'] == 4){
		if(isset($_GET['oper']))
		{
			$operacion = $_GET['oper'];
			if($_GET['oper'] == 1)
			{
				$nota1 = "";
				$nota2 = "";
				$nota3 = "";
				$idmateria = "";
				$idalumno = "";
				$titulo = "Fomulario para ingresar notas de un alumno";
				$valorbtn = "Ingresar";
			}else{
				$nota1 = $_GET['nota1'];
				$nota2 = $_GET['nota2'];
				$nota3 = $_GET['nota3'];
				$idmateria = $_GET['idmateria'];
				$idalumno = $_GET['idalumno'];
				$valorbtn = "Guardar";
				$titulo = "Formulario para editar una nota";
			}
				?>
				<script type="text/javascript" src="../Jquery/jquery-3.6.0.min.js"></script>
					<div align="center">
						<br>
						<br>
						<h1><?php echo $titulo?></h1>
						<form action="mensanotas.php?oper=<?php echo $operacion?>" method="post">
							<label>Seleccione la materia</label>
							<select name="cmbmateria" id="cmbmateria">
								<option disabled>Seleccione una materia</option>
								<?php
									$materiasxusuario = new clsusuariosxmateria();
									$materiasxusuario->idusuario = $_SESSION['usuario'];
									$todaslasmateriasdeunusuario = $materiasxusuario->gettodaslasmateriasdeunusuario();
									if($idmateria == "")
									{
										while($cadamateria=mysqli_fetch_array($todaslasmateriasdeunusuario, MYSQLI_ASSOC))
										{
											echo "<option value=".$cadamateria['id_materia'].">" .$cadamateria['anio']." º ".$cadamateria['division']." / ".$cadamateria['nrogrupo']." / ". $cadamateria['nombremateria']."</option>";
										}
									}else
										{
											while($cadamateria=mysqli_fetch_array($todaslasmateriasdeunusuario, MYSQLI_ASSOC))
											{
												if($idmateria == $cadamateria['id_materia'])
												{
													echo "<option value=".$cadamateria['id_materia']." selected>" .$cadamateria['anio']." º ".$cadamateria['division']." / ".$cadamateria['nrogrupo']." / ". $cadamateria['nombremateria']."</option>";
												}
											}
										}
									
								?>
							</select>
							<br>
							<br>
							<label>Ingresar nota del primer trimestre</label>
							<select name="cmbnotaprimertrimestre" required>
								<option disabled>Seleccione una nota</option>
								<?php 
									if($nota1 == "")
									{
										?>
											<option value="0" selected>Sin calificar</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
										<?php
									}else
										{
											$contador = 0;
											while($contador <= 10){
												if($contador == $nota1)
												{
													echo"<option selected>$contador</option>";
												}else
													{
														echo"<option>$contador</option>";
													}
												$contador++;
											}
										}
								?>
							</select>
							<br>
							<br>
							<label>Ingresar nota del segundo trimestre</label>
							<select name="cmbnotasegundotrimestre" required>
								<option disabled>Seleccione una nota</option>
								<?php 
									if($nota2 == "")
									{
										?>
											<option value="0" selected>Sin calificar</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
										<?php
									}else
										{
											$contador = 0;
											while($contador <= 10){
												if($contador == $nota2)
												{
													echo"<option selected>$contador</option>";
												}else
													{
														echo"<option>$contador</option>";
													}
												$contador++;
											}
										}
								?>
							</select>
							<br>
							<br>
							<label>Ingresar nota del tercer trimestre</label>
							<select name="cmbtercertrimestre" required>
								<option disabled>Seleccione una nota</option>
								<?php 
									if($nota3 == "")
									{
										?>
											<option value="0" selected>Sin calificar</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
										<?php
									}else
										{
											$contador = 0;
											while($contador <= 10){
												if($contador == $nota3)
												{
													echo"<option selected>$contador</option>";
												}else
													{
														echo"<option>$contador</option>";
													}
												$contador++;
											}
										}
								?>
							</select>
							<br>
							<br>
							<label>Seleccione el alumno</label>
							<select name="cmbalumno" id="cmbalumno"> 
								<option disabled>Seleccione un alumno</option>
								<?php

								?>
							</select>
							<br>
							<br>
							<a href="planillanotas.php">
								<input type="button" value="Regresar">
							</a>
							<input type="submit" value="<?php echo $valorbtn?>">
						</form>		
							<script language="javascript">
								 $(document).ready(function(){
									 $("#cmbmateria").click(function(){
										$("#cmbmateria option:selected").each(function(){
											idmateria = $(this).val();
											$.post("alumnoxmateria.php", {
												idmateria: idmateria
											}, function(data){
												$("#cmbalumno").html(data);	
											});
										}); 
									 })
								 });
							</script>
					</div>
				<?php
		}
	}else{
		header('location:../index/Index.php');
	}
	
?>