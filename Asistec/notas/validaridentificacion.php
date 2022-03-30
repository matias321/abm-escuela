<html>
	<head>
		<title>Validar identificacion</title>
		<link rel="stylesheet" href="../css/eest1pinamar.css?1.1" type="text/css" charset="utf-8" />
	</head>
		<body>
			<link rel="stylesheet" href="../css/eest1pinamar.css" type="text/css" charset="utf-8" />
			<div width="100%">
				<img src="../Imagenes/postaslider1.jpg" alt="" width="100%">
			</div>
			<div class="navbar" style="width: 100%">
				<a href="#"></a>
			</div>
			<div align="center">
				<form action="validaridentificacion.php" method="post">
					<h1>Validar identificacion</h1>
					<br>
					<label>Ingresar contraseña</label>
						<input type="password" placeholder="Insertar contraseña" name="pwdtxt" id="txtPassword">
						<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()">
							<img src="../Imagenes/NuevasImagenes/ver (1).png">
						</button>
						<br>
						<br>
						
						<a href="../index/Index.php">
							<input type="button" value="Regresar">
						</a>
						<input type="submit" value="Validar"name="btnvalidaridentificacion">
				</form>
			</div>
		</body>
	<script type="text/javascript">
		function mostrarPassword(){
			var cambio = document.getElementById("txtPassword");
			if(cambio.type == "password"){
				cambio.type = "text";
			}else{
				cambio.type = "password";
			}
		} 
	</script>
</html>
<?php
	if(isset($_POST['btnvalidaridentificacion']))
	{
		include('../encriptar/encriptar.php');
		$contra = encriptar($_POST['pwdtxt']);
		if($contra == $_SESSION['PWD'])
		{
			header('location: planillanotas.php');
		}else
			{
				header('location: ../index/index.php');
			}
	}
?>