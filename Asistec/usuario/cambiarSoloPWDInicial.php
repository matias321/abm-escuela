<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<link rel="stylesheet" href="../css/eest1pinamar.css?1.3" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="../css/tablas.css?1.3" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="../css/botones.css?1.3" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="../css/elementosForm.css?1.3" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="../css/checkBox.css?1.3" type="text/css" charset="utf-8" />
<title>Sistema Asistec</title>
<body class="claseFuente">
	<div width="100%">
		<img src="../Imagenes/postaslider1.jpg" alt="" width="100%">
	</div>
	<div class="navbar" style="width: 100%">
    	<a href="#"></a>
  	</div>
	<div class="Separador">
		  <div align="center" style="position: relative; top:25px;">
			<form name="fomr1" action="cambiarcontra.php?vengode=1&idusuario=<?php echo $_GET['idusuario']; ?>" method="post">
				<h1>Cambiar Contraseña de Inicio</h1>
				<div class="Contenedor">
					<div class="input-contenedor">
						<label>Contraseña nueva</label>
						<input required name="txtpwdnueva"type="password" id="txtPassword"placeholder="Contraseña nueva" 
							   class="textBox"/>
						<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPasswordnueva()">
							<img src="../Imagenes/NuevasImagenes/ver_peque.png">
						</button>
					</div>
					<br>
					<div class="input-contenedor">
						<label>Repetir Contraseña</label>
						<input required name="txtpwdrepetir" type="password" id="txtPassword1"placeholder="Repetir Contraseña"
							   class="textBox"/>
						<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPasswordnuevaRepetir()">
							<img src="../Imagenes/NuevasImagenes/ver_peque.png">
						</button>
					</div>
					<br>
						<input name="boton_ingresar" type="submit" value="Modificar"class="botonAzulOscuro botonGrilla"/>
				</div>
			</form>
		  </div>
		</body>
	</div>
	<script type="text/javascript">
		function mostrarPasswordnueva(){
			var cambio = document.getElementById("txtPassword");
			if(cambio.type == "password"){
				cambio.type = "text";
			}else{
				cambio.type = "password";
			}
		} 
		function mostrarPasswordnuevaRepetir(){
			var cambio = document.getElementById("txtPassword1");
			if(cambio.type == "password"){
				cambio.type = "text";
			}else{
				cambio.type = "password";
			}
		} 
	</script>
</html>