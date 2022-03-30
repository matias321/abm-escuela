<?php 
	$idsession = $_GET['sSs'];
	include ('../funcionesgenerales/verLogueo.php');
	if($_GET['oper'] != null)
	{
		include('clsturnosxcurso.php');
		$turnos = new clsturnosxcurso();
		switch($_GET['oper'])
		{
			case '1':
				$turnos->idturno = $_POST['cmbturno'];
				$turnos->idcurso = $_POST['cmbcurso'];
				$todoslosturnosxcurso = $turnos->gettodoslosturnosxcurso();
				$boolean = false;
				while($cadaRegistro=mysqli_fetch_array($todoslosturnosxcurso, MYSQLI_ASSOC))
				{
					if($cadaRegistro['idcurso'] == $turnos->idcurso && $cadaRegistro['idturno'] == $turnos->idturno)
					{
						$mensaje = "El curso seleccionado y el turno ya esta cargado";
						$boolean = true;
					}
				}
					if($boolean != true)
					{
						if($turnos->insertarturnoxcurso() > 0)
						{
							$mensaje = "El turno se ha insetado correctamente al curso";
						}
					}
					
				break;
			case '2':
				$turnos->idturno = $_POST['cmbturno'];
				$turnos->idcurso = $_POST['cmbcurso'];
				$todoslosturnosxcurso = $turnos->gettodoslosturnosxcurso();
				$boolean = false;
				while($cadaRegistro=mysqli_fetch_array($todoslosturnosxcurso, MYSQLI_ASSOC))
				{
					if($cadaRegistro['idcurso'] == $turnos->idcurso && $cadaRegistro['idturno'] == $turnos->idturno)
					{
						$mensaje = "El curso seleccionado y el turno ya esta cargado";
						$boolean = true;
					}
				}
					if($boolean != true)
					{
						if($turnos->actualizarturnoxcurso() > 0)
						{
							$mensaje = "El turno se ha Actualizado correctamente al curso";
						}
					}
				break;
			case '3':
				$turnos->idcurso = $_GET['idcurso'];
				$turnos->idturno = $_GET['idturno'];
					if($turnos->borrarturnoxcurso() > 0)
					{
						$mensaje = "El turno se ha borrado correctamente al curso";
					}
				break;
		}
	}else
	{
		header('location: grillaturnosxcurso.php?sSs='.$_GET['sSs']);
	}
?>
<html>
	<head>
	<link rel="stylesheet" href="../css/eest1pinamar.css" type="text/css" charset="utf-8" />
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
				<a href="grillaturnosxcurso.php?sSs=<?php echo $_GET['sSs'];?>">
					<input type="button" value="Regresar" >
				</a>
			</div>
		</body>
</html>