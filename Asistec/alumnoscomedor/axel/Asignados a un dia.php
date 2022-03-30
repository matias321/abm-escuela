<?php
	$conexion="localhost";
	$usuario="root";
	$pass="";
	$baseDeDatos="asistec";

	$enlace = mysqli_connect($conexion, $usuario, $pass, $baseDeDatos);
?>

<?php 
/* $fecha =$_GET['fecha']; print_r($fecha);
$fechaactual = getdate();

echo "Hoy es: $fechaactual[wday]";
*/
?>
<?php
/* 
      $consulta = "SELECT * FROM alumnos";
	   for($i=0;i<=999999;i++ ){
		  }
select DATEPART(dw, '11/04/2002')


*/
//include alumnos y decision de if y comparar ids
?>
<?php
     function saber_dia($nombredia) {
		 $conexion="localhost";
	     $usuario="root";
	     $pass="";
	     $baseDeDatos="asistec";
	$enlace = mysqli_connect($conexion, $usuario, $pass, $baseDeDatos);
     $dias = array('0','1','2','3','4','5','6');
     $fecha = $dias[date('N', strtotime($nombredia))];
     echo $fecha;
	 }
	 $fecha2="";
     $fecha2 = $_POST['fechacomedor'];
     saber_dia($fecha2);
	 /*$comparar=0;
	 while($comparar!=1,2,3,4,5){
		 $comparar++;
		 
	 }else{
		 
	 }*/
?>
<!DOCTYPE html>
<html>	
    <head>
	
		<div class="tabla">
			<table>
				<tr>
				   <?php echo "<table border=1;> ";?>
				    <th>id</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>DNI</th>
				</tr>
				</head>
				<body>
					<?php
					
					$consulta3="SELECT idalumno,apellido,nombre,dni FROM habilitadoscomedor alumno WHERE nrodiasemana =$fecha2 AND idalumno = idalumno";
						//$consulta2 = "SELECT * FROM alumnos";//para probar la tabla
					
						//$consultafinal ="SELECT idalumno,apellido,nombre,dni FROM habilitadoscomedor WHERE idalumno FROM habilitadoscomedor= idalumno FROM alumnos";
					//if($consulta2=$consulta3){
						//	$ejecutarConsulta2=mysqli_query($enlace,$consulta3,$consultafinal);
						//$ejecutarConsulta2 = mysqli_query($enlace, $consultafinal);	
							$ejecutarConsulta = mysqli_query($enlace,$consulta3);//cambias consulta3 por consulta2
						$verFilas = mysqli_num_rows($ejecutarConsulta);
						$fila = mysqli_fetch_array($ejecutarConsulta);
						
							if($verFilas<1){
								echo"<tr><td>ningun alumno registrado</td></tr>";
							}else{
								for($i=0; $i<=$fila; $i++){
									  echo "<tr> ";
                                      echo "<TD><b>$fila[0]</b></TD> ";
                                      echo "<TD>$fila[2]</TD>";
                                      echo "<TD>$fila[1]</TD>";
									  echo "<TD>$fila[3]</TD>";
                                      echo "</tr> ";
									$fila = mysqli_fetch_array($ejecutarConsulta);
									
								}      
							
							}
							
					//}
					?>
</body>
			</table>
			<input type="submit" name="regresar" value="Regresar" onClick="history.go(-1);">
		</div>
</html>