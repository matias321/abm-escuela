<?php
	$mensaje = $_GET['mensaje'];
?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="../fonts/fonts.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="../css/eest1pinamar.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="../css/tablas.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="../css/botones.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="../css/elementosForm.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="../css/checkBox.css" type="text/css" charset="utf-8" />
	<title>Sistema Asistec</title>
		<body class="claseFuente">
			<div>
				<div width="100%">
					<img src="../Imagenes/postaslider1.jpg" alt="" width="100%">
				</div>
			  <div class="navbar" style="width: 100%">
				<a href="#"></a>
			  </div>
			</div>

			<div align="center" style="position: relative; top:35px;">
				<br>
				<label class="claseFuente"><?php echo $mensaje?></label>
				<br>
				<br>
				<a href="login.php">
					<input type="button" value="Regresar" >
				</a>
			</div>
		</body>
</html>