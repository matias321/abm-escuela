
<?php

	if(isset($_GET['oper'])){
		
		if($_GET['oper'] == 1){
			//aca cambio por los datos del profesor
			
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$dni = $_POST['dni'];
			$telefono = $_POST['telefono'];
			$direccion = $_POST['direccion'];
			
			$vinculoregresar ="formu.php?oper=1&modificar=1&nombre=$nombre&apellido=$apellido&dni=$dni&telefono=$telefono&direccion=$direccion";
			
			$vinculoconfirmar = "mensaprofesor.php?oper=1&nombre=$nombre&apellido=$apellido&dni=$dni&telefono=$telefono&direccion=$direccion";
			
			
		}

		else
			if($_GET['oper'] == 2){
				
				
			
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$dni = $_POST['dni'];
			$telefono = $_POST['telefono'];
			$direccion = $_POST['direccion'];

				$vinculoregresar ="formu.php?oper=2&modificar=1&nombre=$nombre&apellido=$apellido&dni=$dni&telefono=$telefono&direccion=$direccion";
				//-------------------------------------------------------//
				$vinculoconfirmar = "informacion.php?oper=$operacion&nombre=$nombre&apellido=$apellido&dni=$dni&telefono=$telefono&direccion=$direccion";
				
				
			}
			else{


			$operacion = $_GET['oper'];
			$idprofesor = $_GET['idprofesor'];				
			
			$nombre = $_GET['nombre'];
			$apellido = $_GET['apellido'];
			$dni = $_GET['dni'];
			$telefono = $_GET['telefono'];
			$direccion = $_GET['direccion'];

			$vinculoconfirmar = "mensaprofesor.php?oper=$operacion&idprofesor=$idprofesor";
			}
		
	
}
?>
<html>
	<div class="Separador" align="center">
		
		<br>


		<!--  aca cambio por los datos del profesor -->
			
			<div>
				<label>Nombre</label>
				<label style="color: #000000; font-size: 20px"><?php echo $nombre ?></label>
			</div>
			<div>
				<label>Apellido</label>
				<label style="color: #000000; font-size: 20px"><?php echo $apellido ?></label>
			</div>
			<div>
				<label>DNI</label>
				<label style="color: #000000; font-size: 20px"><?php echo $dni ?></label>
			</div>
			<div>
				<label>telefono</label>
				<label style="color: #000000; font-size: 20px"><?php echo $telefono ?></label>
			</div>
			<div>
				<label>direccion</label>
				<label style="color: #000000; font-size: 20px"><?php echo $direccion ?></label>
			</div>
			
			<br>
			<br>
		
			<a href="<?php echo $vinculoregresar?>">
				<input type="button" class="Boton" value="Regresar">
			</a>
			<a href="<?php echo $vinculoconfirmar?>">
				<input type="button" class="Boton" value="Confirmar">
			</a>
	</div>
</html>