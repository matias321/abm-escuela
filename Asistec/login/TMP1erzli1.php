<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_start();
?>
<html>
<link rel="stylesheet" href="../CSS/Estilos.css?1.0" type="text/css" charset="utf-8" />
<title>Sistema Asistec</title>
<body class="claseFuente">

  <div align="center" style="position: relative; top:25px;">
	  
	  	<?php
		if(!empty($_SESSION['NoLogeado'])){
			if(!empty($_SESSION['mensaje'])){
					if(!empty($_SESSION['color'])){
						if($_SESSION['color'] == "amarillo"){
					?>
						<div class="alert warning">
						  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
						  <strong>Advertencia!</strong>
						  <?php echo $_SESSION['mensaje']?>

						</div>
					  <?php
						}else
							if($_SESSION['color'] == "rojo"){
					  ?>
							<div class="alert">
							  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
							  <strong>Alerta!</strong>
							  <?php echo $_SESSION['mensaje']?>
							</div>
					 <?php
						}
					}else{
						$_SESSION['color'] = "vacio";	
					}
			}else{
				$_SESSION['mensaje'] = "vacio";
			}
		}else
			if($_SESSION['NoLogeado'] == "Sesion Cerrada"){
	 	?>
			<div class="sucesses">
			  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				<strong>Sucesses!</strong>
			 	<a>Session cerrada correctamente<a>
			</div>
	  <?php
		}else{
	  ?>
		<div class="alert warning">
			  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				<strong>Advertencia!</strong>
			 	<a>Usuario no logeado, Por favor logearse<a>
			</div>			
	 <?php
		}
	  ?>
  	<form name="fomr1" action="validarusuario.php" method="post" class="formulario">
  		<h1 style="color: #FFFFFF">Iniciar Sesion</h1>
		<h5 style="color: #FFFFFF">Asistec</h5>
		<div class="Contenedor">
			<div class="input-contenedor">
				<br>
				<img src="../Imagenes/hombre.png">
				<label class="customfields">
					<input
					   class="inputText"
					   name="txtusuario"  
					   type="text" 
					   maxlength="16"
					   required
					>
					<span class="placeholder">Ingregar Usuario</span>
				</label>
				
			</div>
				<div class="input-contenedor">
					<img src="../Imagenes/NuevasImagenes/security (2).png">
					<label class="customfields">
						<input 
						   class="inputText"
						   name="txtpwd" 
						   type="password" 
						   maxlength="16"
						   required
						   
						>
						<span class="placeholder">Ingregar Contraseña</span>
					</label>
					
				</div>
					<input align="left"
					   name="boton_ingresar" 
					   type="submit" 
					   value="Ingresar" 
					   class="botonlogin"
				    >
		</div>
  	</form>
  </div>
</body>
</html>
	<script>
		// Get all elements with class="closebtn"
		var close = document.getElementsByClassName("closebtn");
		var i;

		// Loop through all close buttons
		for (i = 0; i < close.length; i++) {
		  // When someone clicks on a close button
		  close[i].onclick = function(){

			// Get the parent of <span class="closebtn"> (<div class="alert">)
			var div = this.parentElement;

			// Set the opacity of div to 0 (transparent)
			div.style.opacity = "0";

			// Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
			setTimeout(function(){ div.style.display = "none"; }, 600);
		  }
		}
	</script>