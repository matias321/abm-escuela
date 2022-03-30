<?php
echo "<br>";

include('../sessiones/clssession.php');
$session = new clsSession();


$reg=$session->LimpiarAux();
while($row=mysqli_fetch_array($reg, MYSQLI_ASSOC)){
	echo "<br>".$row['idsession'];
}
?>