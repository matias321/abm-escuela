<?php 
	require_once("../funcionesgenerales/ValidarLogeo.php");
	if(!isset($_GET['oper']))
	{
		header('location: grillaalumnoxmateria.php');
	}else
		{
			include('clsalumnoxmateria.php');
			include('../alumnosxcurso/clsalumnosxcurso.php');
			include('../materias/clsmaterias.php');
			$operacion = $_GET['oper'];
			$alumnoxmateria = new clsalumnoxmateria();
			$alumnoxcurso = new clsAlumnosxcurso();
			$materias = new clsmaterias();
			switch($operacion)
			{
				case 1:
					$alumnoxcurso->idalumno = $_POST['cmbalumno'];
					$Grupo_CursodelAlumno = $alumnoxcurso->getGrupo_Curso();
					$datosCurso = mysqli_fetch_array($Grupo_CursodelAlumno, MYSQLI_ASSOC);
					$grupoAlumno = $datosCurso['nrogrupo'];
					$anioAlumno = $datosCurso['idcurso'];
					$todaslasmateriasexistentes = $materias->gettodaslasmaterias();

					$alumnoxmateria->idalumno = $_POST['cmbalumno'];
					$alumnoxmateria->idmateria = $_POST['cmbmateria'];
					$datosdelosalumnoxmateria = $alumnoxmateria->gettodoslosalumnosdeunamateria();

					$boolean = false;
					while($cadaRegistro=mysqli_fetch_array($datosdelosalumnoxmateria, MYSQLI_ASSOC))
					{
						if($cadaRegistro['idalumno'] == $alumnoxmateria->idalumno && $cadaRegistro['idmateria'] == $alumnoxmateria->idmateria)
						{
							$mensaje = "Este alumno ya esta en esta materia";
							$boolean = true;
						}
					}	
						if(!$boolean == true)
						{
							if($alumnoxmateria->insertaralumnoxmateria() > 0)
							{
								$mensaje = "Se ha agregado correctamente la materia al alumno";
							}
						}
						
					break;
				case 3:
					$alumnoxmateria->idalumno = $_GET['idalumno'];
					$alumnoxmateria->idmateria = $_GET['idmateria'];
						if($alumnoxmateria->borraralumnoxmateria() > 0)
						{
							$mensaje = "Se ha borrado la materia del alumno";
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
				<a href="grillaalumnoxmateria.php">
					<input type="button" value="Regresar" >
				</a>
			</div>
		</body>
</html>