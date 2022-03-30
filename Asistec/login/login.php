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
  <div align="center" style="position: relative; top:25px;">
  	<form name="fomr1" action="validarusuario.php" method="post">
  		<h1 style="color: #000000">Inicio de Sesión</h1>
		<div class="Contenedor" align="center" style="width: 30%; ">
			<div class="input-contenedor" >
				<br>
				<img src="../Imagenes/hombre.png">
				<label>Usuario</label>
				<input class="textBox" name="txtusuario" type="text" maxlength="16" placeholder="Ingresar Usuario"; autofocus/>
			</div>
			<br>
			<div class="input-contenedor">
				<img src="../Imagenes/NuevasImagenes/security (2).png">
				<label>Contraseña</label>
				<label ></label>
					<input class="textBox" id="txtPassword" name="txtpwd" type="password" maxlength="16" 
					       placeholder="Ingresar Contraseña" />
					<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()">
						<img src="../Imagenes/NuevasImagenes/ver_peque.png">
					</button>
			</div>
			<br>
			<input type="submit" value="Ingresar" class="botonAzulOscuro botonGrilla" style="width: 150px; height: 35px">
		</div>
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
