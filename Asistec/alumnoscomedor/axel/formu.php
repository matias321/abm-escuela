<!--
<br>
	<br>
	<br>
	<br>
<div align="center" style="position: relative; left: 45.50%; width: 13px; height: 13px; padding: 0; margin: 0; vertical-align: bottom; position: relative; top: 50%;*overflow: hidden;">
<label for="start"> </label>
<input type="date" id="start" name="trip-start"
       value="2020-07-22"
       min="2020-01-01" max="2021-12-31">
</div>

<div align="center" style="position: relative; top:25px;">
		<input type="submit" value="Buscar" class="botonComun botonAzul"/>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="cargaralumnos.php">
		</a>
	</div>
	
	include("clsalumno.php");
$operacion = $_GET['oper'];

<!DOCTYPE html>
<html>
    <head>
<form action="Asignados a un dia.php" id="formulario"  method="GET">
				<p> <input type="date" name="fechalerta" value="2021-01-01"></p>
                <input type="submit" value="Buscar"onclick="this.form.action='Asignados a un dia.php'">
</form>
</div>
<!--<script src="formulario.js"></script> 
</body>
</html>
<aaaaaaaaaaaaaaaaaaa?php
   $dato="";
	if(isset($_POST['Buscar'])){
		$nombre =$_POST["Buscar"];

		$insertarDatos = "INSERT INTO datos VALUES('$nombre'";

		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

		if(!$ejecutarInsertar){
			echo"Error de servidor";
		}
	}
?aaaaaaaaaaaaaaaaaaaaaaaaaaaaa>
-->

<!DOCTYPE html>
<html >
<body>
<?php
     //date_default_timezone_set('America/Argentina/Buenos_Aires');
	
	
	
?>
<form  method="POST" action="Asignados a un dia.php"

   <p>
    <input type="date" name="fechacomedor" value="<?php echo $dia?>"/>
     <!-- <input type="hidden" id="fecha" name="fecha" value="02/13/2164"  -->
	 <!-- placeholder="mm/dd/yyyy"/> 
	       <input type="text" id="m" value="m" placeholder="mm"/> -->
		  <!-- <input type="text" id="d" value="d" placeholder="dd"/>
		   <input type="text" id="a" value="a" placeholder="yyyy"/>
		   <p>
    <input type="submit" value="Buscar"onclick="this.form.action=''">
</p>
-->

</p>
<input type="submit" name="buscardato" value="Buscar"/>
</form>

<?php
 if(isset($_POST['buscardato'])){
	 
	 require ("Asignados a un dia.php");
	 
	 
 }
				?>
</body>
</html>