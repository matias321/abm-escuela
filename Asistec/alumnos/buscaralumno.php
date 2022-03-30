<?php
require_once("../funcionesgenerales/ValidarLogeo.php");
include('../encapie/encabezado.php');
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Documento sin título</title>
	</head>

	<body>
		<div align="center">
			<?php
				if(isset($_POST['cmbfiltros'])){
					$fitro = $_POST['cmbfiltros'];
					if($fitro == "buscarxnombre"){
					?>
						<br>
						<br>
						<form method="post" action="grillaalumno.php" name="formNombre">
							<h1>Buscar alumno por nombre</h1>
							<label>Ingresar nombre del alumno</label>
							<input type="search" name="nombretxt" placeholder="Ingresar nombre del alumno" style="width: 250px">
							<br>
							<br>
							<input type="submit" value="Buscar alumno">
							<a href="grillaalumno.php">
								<input type="button" value="Regresar">
							</a>
						</form>
					<?php
					}else
						if($fitro == "buscarxapellido"){
						?>
							<br>
							<br>
							<form method="post" action="grillaalumno.php" name="formapellido">
								<h1>Buscar alumno por apellido</h1>
								<label>Ingresar nombre del alumno</label>
								<input type="search" name="apellidotxt" placeholder="Ingresar nombre del apellido" style="width: 250px">
								<br>
								<br>
								<input type="submit" value="Buscar alumno">
								<a href="grillaalumno.php">
									<input type="button" value="Regresar">
								</a>
							</form>
						<?php
						}else
							if($fitro == "buscarxdni"){
							?>
								<br>
								<br>
								<form method="post" action="grillaalumno.php" name="formdni">
									<h1>Buscar alumno por DNI</h1>
									<label>Ingresar nombre del alumno</label>
									<input type="search" name="dnitxt" placeholder="Ingresar DNI del alumno" style="width: 250px">
									<br>
									<br>
									<input type="submit" value="Buscar alumno">
									<a href="grillaalumno.php">
										<input type="button" value="Regresar">
									</a>
								</form>
							<?php
							}else{
							?>
								<br>
								<br>
								<form method="post" action="grillaalumno.php" name="fromtarjeta">
									<h1>Buscar alumno por numero de tarjeta</h1>
									<label>Ingresar nombre del alumno</label>
									<input type="search" name="nrotarjetatxt" placeholder="Ingresar Numero de tarjeta del alumno" style="width: 250px">
									<br>
									<br>
									<input type="submit" value="Buscar alumno">
									<a href="grillaalumno.php">
										<input type="button" value="Regresar">
									</a>
								</form>
							<?php
							}
							?>
				<?php
				}else{
					header('location:grillaalumno.php');
				}
				?>
		</div>
		
	</body>
</html>