<?php
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
include('../encapie/encabezado.php');
?>
<div class="Separador">
	<div align="center" style="position: relative; top:25px;">
		<form name="form1" action="cambiarcontra.php?sSs=<?php echo $_GET['sSs'];?>&vengode=2&idusuario=<?php echo $_SESSION['usuario'];?>" method="post">
			<h1>Cambiar Contraseña</h1>
			<div class="Contenedor">
				<div class="input-contenedor">
					<label>Ingresar Contraseña Actual</label>
					<i class="fas fa-user icon"></i>
					<input required id="txtpwdvieja" name="txtpwdvieja"  type="password" placeholder="Contraseña Actual" 
					       class="textBox"/>
					<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPasswordvieja();">
						<img src="../Imagenes/NuevasImagenes/ver_peque.png">
					</button>
				</div>
				<br>
				<div class="input-contenedor">
					<label>Ingresar Contraseña nueva</label>
					<i class="fas fa-key icon"></i>
					<input required id="txtPasswordnueva" name="txtpwdnueva" type="password" class="textBox"
						   placeholder="Contraseña Nueva"/>
					<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword();">
						<img src="../Imagenes/NuevasImagenes/ver_peque.png">
					</button>
				</div>
				<br>
				<div class="input-contenedor">
					<label>Repetir la contraseña</label>
					<i class="fas fa-key icon"></i>
					<input required id="txtPasswordrepetir" name="txtpwdrepetir" type="password" class="textBox"
						   placeholder="Repetir la contraseña"/>
					<button id="show_passwordrepetir" class="btn btn-primary" type="button" onclick="mostrarPasswordRepetir();">
						<img src="../Imagenes/NuevasImagenes/ver_peque.png">
					</button>
				</div>
				<br>
				<a href="../index/Index.php?sSs=<?php echo $_GET['sSs'];?>" style="text-decoration: none;">
					<input type="button" value="Regresar" class="botonVerde botonGrilla">
				</a>
				<input name="boton_ingresar" type="submit" value="Modificar" class="botonAzulOscuro botonGrilla"/>
			</div>
		</form>
	  </div>
</div>
	<script type="text/javascript">
		function mostrarPassword(){
			var contranueva = document.getElementById("txtPasswordnueva");
			if(contranueva.type == "password"){
				contranueva.type = "text";
			}else{
				contranueva.type = "password";
			}	
		} 
		function mostrarPasswordRepetir(){
			var contrarepetir = document.getElementById("txtPasswordrepetir");
			if(contrarepetir.type == "password"){
				contrarepetir.type = "text";
			}else{
				contrarepetir.type = "password";
			}
		} 
		function mostrarPasswordvieja(){
			var contravieja = document.getElementById("txtpwdvieja");
			if(contravieja.type == "password"){
				contravieja.type = "text";
			}else{
				contravieja.type = "password";
			}
		} 
	</script>
	</body>
</html>
