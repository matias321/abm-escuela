<?php 
	if($_GET['oper'] != null)
	{
		include('clsusuariosxmateria.php');
		$usuarioxmateria = new clsusuariosxmateria();
		switch($_GET['oper'])
		{
			case '1':
				$usuarioxmateria->idmateria = $_POST['cmbmateria'];
				$usuarioxmateria->idusuario = $_GET['idusuario'];
				$datosusuarioxmateria = $usuarioxmateria->gettodoslosusuariosxmateria();
				$boolean = false;
				while($cadaRegistro=mysqli_fetch_array($datosusuarioxmateria, MYSQLI_ASSOC))
				{
					if($cadaRegistro['id_materia'] == $usuarioxmateria->idmateria && $cadaRegistro['idusuario'] == $usuarioxmateria->idusuario)
					{
						$mensaje = "El usuario ya esta insertado en esta materia";
						$boolean = true;
					}else
						if($cadaRegistro['id_materia'] == $usuarioxmateria->idmateria && $cadaRegistro['idusuario'] != $usuarioxmateria->idusuario)
						{
							$mensaje = "Un usuario ya tiene esta materia";
							$boolean = true;
						}
				}
					if($boolean != true)
					{
						if($usuarioxmateria->insertarususariosxmateria() > 0)
						{
							$mensaje = "Se ha insertado correctamente";
						}
					}
				break;
			/*case '2':
				$usuarioxmateria->idmateria = $_POST['cmbmateria'];
				$usuarioxmateria->idusuario = $_GET['idusuario'];
				$datosusuarioxmateria = $usuarioxmateria->gettodoslosusuariosxmateria();
				$boolean = false;
				while($cadaRegistro=mysqli_fetch_array($datosusuarioxmateria, MYSQLI_ASSOC))
				{
					if($cadaRegistro['id_materia'] == $usuarioxmateria->idmateria && $cadaRegistro['idusuario'] == $usuarioxmateria->idusuario)
					{
						$mensaje = "El usuario ya esta insertado en esta materia";
						$boolean = true;
					}else
						if($cadaRegistro['id_materia'] == $usuarioxmateria->idmateria && $cadaRegistro['idusuario'] != $usuarioxmateria->idusuario)
						{
							$mensaje = "Un usuario ya tiene esta materia";
							$boolean = true;
						}
				}
					if($boolean != true)
					{
						if($usuarioxmateria->actualizarususariosxmateria() > 0)
						{
							$mensaje = "Se ha actualizado correctamente";
						}
					}
				break;*/
			case '3':
					$usuarioxmateria->idmateria = $_GET['idmateria'];
					$usuarioxmateria->idusuario = $_GET['idusuario'];
					if($usuarioxmateria->borrarususariosxmateria() > 0)
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
				<a href="grillausuariosxmateria.php">
					<input type="button" value="Regresar" >
				</a>
			</div>
		</body>
</html>