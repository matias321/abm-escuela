<?php 
	require_once("../funcionesgenerales/ValidarLogeo.php");
	if(!isset($_GET['oper']))
	{
		header('location: grillaalumnoxmateria.php');
	}else
		{
			include('clsnotas.php');
			include('../alumnosxcurso/clsalumnosxcurso.php');
			$operacion = $_GET['oper'];
			$notas = new clsnotas();
			$alumnoxcurso = new clsAlumnosxcurso();
			switch($operacion)
			{
				case 1:
					$notas->nota1ertrimestre = $_POST['cmbnotaprimertrimestre'];
					$notas->nota2ertrimestre = $_POST['cmbnotasegundotrimestre'];
					$notas->nota3ertrimestre = $_POST['cmbtercertrimestre'];
					$notas->idalumno = $_POST['cmbalumno'];
					$notas->idmateria = $_POST['cmbmateria'];
					$notas->idusuario = $_SESSION['usuario'];
					$todaslasnotasexistentes = $notas->gettodaslasnotasdetodoslosalumnos();
					$boolean = false;
					while($cadaRegistro=mysqli_fetch_array($todaslasnotasexistentes, MYSQLI_ASSOC))
					{
						if($cadaRegistro['idalumno'] == $notas->idalumno && $cadaRegistro['id_materia'] == $notas->idmateria && $cadaRegistro['idusuario'] == $notas->idusuario)
						{
							$mensaje = "Este alumno ya tiene notas ingresadas. Reintentelo";
							$boolean = true;
						}
					}
						if($boolean != true)
						{
							if($notas->insertarnotas() > 0)
							{
								$mensaje = "La/s se han cargado correctamente";
							}
						}
					break;
				case 2:
					$notas->nota1ertrimestre = $_POST['cmbnotaprimertrimestre'];
					$notas->nota2ertrimestre = $_POST['cmbnotasegundotrimestre'];
					$notas->nota3ertrimestre = $_POST['cmbtercertrimestre'];
					$notas->idalumno = $_POST['cmbalumno'];
					$notas->idmateria = $_POST['cmbmateria'];
					$notas->idusuario = $_SESSION['usuario'];
					$todaslasnotasexistentes = $notas->gettodaslasnotasdetodoslosalumnos();
					$boolean = false;
					while($cadaRegistro=mysqli_fetch_array($todaslasnotasexistentes, MYSQLI_ASSOC))
					{
						if($cadaRegistro['idalumno'] == $notas->idalumno && $cadaRegistro['id_materia'] == $notas->idmateria && $cadaRegistro['idusuario'] == $notas->idusuario && $cadaRegistro['nota1ertrimestre'] == $notas->nota1ertrimestre && $cadaRegistro['nota2ertrimestre'] == $notas->nota2ertrimestre && $cadaRegistro['nota3ertrimestre'] == $notas->nota3ertrimestre)
						{
							$mensaje = "Este alumno ya tiene esas notas cargadas. Reintentelo";
							$boolean = true;
						}
					}
						if($boolean != true)
						{
							if($notas->actualizarnotas() > 0)
							{
								$mensaje = "La/s se han actualizado correctamente";
							}
						}
					break;
				case 3:
					$notas->idalumno = $_GET['idalumno'];
					$notas->idmateria = $_GET['idmateria'];
					$notas->idusuario = $_SESSION['usuario'];
						if($notas->borrarnotas() > 0)
						{
							$mensaje = "Se han borrado la/s nota correctamente";
						}
					break;
			}

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
				<a href="planillanotas.php">
					<input type="button" value="Regresar" >
				</a>
			</div>
		</body>
</html>