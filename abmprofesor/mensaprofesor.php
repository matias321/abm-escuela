
<?php
	include("clsprofesor.php");
	if(isset($_GET['oper'])){
		$operacion = $_GET['oper'];
		if ($operacion == 1) 
		{
				//Desarrollo de ALTA
			

			$profesor = new clsprofesor();
			$profesor->nombre = $_GET['nombre'];
			$profesor->apellido = $_GET['apellido'];
			$profesor->dni = $_GET['dni'];
			$profesor->telefono = $_GET['telefono'];
			$profesor->direccion = $_GET['direccion'];
			

							if ($profesor->insertar() > 0) 
							{
								
									$mensaje= "Se ha insertado correctamente el profesor";
							
							
						
							}else{
								header('informacion.php');
							}
			}
				
		else{

			if ($operacion == 2) 
			{
				$profesor = new clsprofesor();
				$profesor->nombre = $_GET['nombre'];
				$profesor->apellido = $_GET['apellido'];
				$profesor->dni = $_GET['dni'];
				$profesor->telefono = $_GET['telefono'];
				$profesor->direccion = $_GET['direccion'];
				$profesor->idprofesor = $_GET['idprofesor'];
				
			if ($profesor->actualizar() > 0) 
					{
			
						{
							$mensaje = "El profesor se ha Actualizado correctamente";
						}
			}

			else 
				
			{
					$profesor = new clsprofesor();
					$profesor->idprofesor = $_GET['idprofesor'];
					


								if($profesor->borrar() > 0)
								{
									$mensaje = "El profesor fue borrado correctamente";
								}
					
						
				}
	
}	
							
						
?>
<html>
	<body>
		<div align="center" style="position: relative; top:35px;">
			<label ><?php echo $mensaje ?></label>
			<br>
			<br>
			<a href="informacion.php">
				<input type="button" value="Regresar">
			</a>
		</div>

	</body>
</html>
