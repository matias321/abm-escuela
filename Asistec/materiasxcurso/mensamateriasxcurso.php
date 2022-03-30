<?php 
	if($_GET['oper'] != null)
	{
		include('clsmateriasxcurso.php');
		$materiasxcurso = new clsmateriasxcurso();
		switch($_GET['oper'])
		{
			case '1':
				$materiasxcurso->idcurso = $_POST['cmbcurso'];
				$materiasxcurso->idmateria = $_POST['cmbmateriaxcurso'];
				$todaslasmateriasexistentes = $materiasxcurso->gettodaslasmateriasxcurso();
				$boolean = false;
				while($cadaRegistro=mysqli_fetch_array($todaslasmateriasexistentes, MYSQLI_ASSOC))
				{
					if($cadaRegistro['idcurso'] == $materiasxcurso->idcurso && $cadaRegistro['idmateria'] == $materiasxcurso->idmateria)
					{
						$mensaje = "La materia ingresada ya existe en este curso";
						$boolean = true;
					}
				}
					if($boolean != true)
					{
						if($materiasxcurso->insertarmateria() > 0)
						{
							$mensaje = "La materia se ha insertado correctamente al curso";
						}
					}
					
				break;
			case '2':
				$materia->nombremateria = $_POST['nombremateriatxt'];
				$materia->cursomateria = $_POST['cmbcurso'];
				$todaslasmateriasexistentes = $materia->gettodaslasmaterias();
				$boolean = false;
				while($cadaRegistro=mysqli_fetch_array($todaslasmateriasexistentes, MYSQLI_ASSOC))
				{
					if($cadaRegistro['idcurso'] == $materia->cursomateria && $cadaRegistro['nombremateria'] == $materia->nombremateria && $cadaRegistro['nrogrupo'] == $materia->idgrupo)
					{
						$mensaje = "La materia ingresada ya existe";
						$boolean = true;
					}
				}
					if($boolean != true)
					{
						if($materia->actualizarmateria() > 0)
						{
							$mensaje = "La materia se ha actualizado correctamente";
						}
					}
				break;
			case '3':
					$materia->idmateria = $_GET['idmateria'];
					if($materia->borrarmateria() > 0)
					{
						$mensaje = "La materia se ha borrado correctamente";
					}
				break;
		}
	}else
	{
		header('location: grillaturnosxcurso.php');
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
				<a href="grillamateriasxcurso.php">
					<input type="button" value="Regresar" >
				</a>
			</div>
		</body>
</html>