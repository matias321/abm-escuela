<?php
	require_once("../funcionesgenerales/ValidarLogeo.php");
	include('../encriptar/encriptar.php');
	if(isset($_GET['oper'])){
		//antes de cambiar los datos se autentifica el usuario, pidiendole la contraseña 
		$contraingresada = encriptar($_POST['pwdtxt']);
		$contrabd = strtolower($_SESSION['PWD']);
		if($contraingresada != $contrabd){
			$mensaje = "Contraseña incorrecta";
			?>
			<html>
					<head>
						<title>Error de identificacion</title>
					</head>
					<body>
						<link rel="stylesheet" href="../css/eest1pinamar.css" type="text/css" charset="utf-8" />
							<div width="100%">
								<img src="../Imagenes/postaslider1.jpg" alt="" width="100%">
							</div>
							<div class="navbar" style="width: 100%">
								<a href="#"></a>
							</div>
						<div align="center" class="Separador">
							<br>
							<br>
							<h1>Error a la hora de identificarse</h1>
							<label>La contraseña ingresada es incorrecta</label>
							<br>
							<br>
							<a href="CPerfil.php">
								<input type="button" value="Confirmar">
							</a>
							
						</div>
					</body>
				</html>
			<?php
		}else{
			$operacion = $_GET['oper'];
			switch($_GET['oper']){
			case 1://idusuario
				?>
				<html>
					<head>
						<title>Cambiar ID usuario</title>
					</head>
					<body>
						<link rel="stylesheet" href="../css/eest1pinamar.css" type="text/css" charset="utf-8" />
							<div width="100%">
								<img src="../Imagenes/postaslider1.jpg" alt="" width="100%">
							</div>
							<div class="navbar" style="width: 100%">
								<a href="#"></a>
							</div>
						<div align="center" class="Separador">
							<br>
							<br>
							<form action="mensaperfil.php?oper=<?php echo $operacion?>" method="post">
								<label>Ingresar ID usuario actual</label>
									<input type="text" name="idviejotxt" placeholder="Ingresar ID viejo" required>
								<br>
								<br>
								<label>Ingresar ID usuario nuevo</label>
									<input type="text" name="idnuevotxt" placeholder="Ingresar ID nuevo" required>
								<br>
								<br>
									<input type="submit" value="Confirmar">
									<a href="CPerfil.php">
										<input type="button" value="Regresar">
									</a>
							</form>
						</div>
					</body>
				</html>
				<?php
				break;
				case 2://nombre
					?>
					<html>
						<head>
							<title>Cambiar nombre usuario</title>
						</head>
						<body>
							<link rel="stylesheet" href="../css/eest1pinamar.css" type="text/css" charset="utf-8" />
								<div width="100%">
									<img src="../Imagenes/postaslider1.jpg" alt="" width="100%">
								</div>
								<div class="navbar" style="width: 100%">
									<a href="#"></a>
								</div>
							<div align="center" class="Separador">
								<h1>Actualizar nombre de usuario</h1>
								<form action="mensaperfil.php?oper=<?php echo $operacion?>" method="post">
									<label>Ingresar nuevo nombre</label>
										<input type="text" name="nuevonombretxt" placeholder="Ingresar nuevo nombre" required>
									<br>
									<br>
									<label>Repetir nuevo nombre</label>
										<input type="text" name="repetirnuevonombretxt" placeholder="Repetir nuevo nombre" required>
									<br>
									<br>
										<input type="submit" value="Confirmar">
								</form>
							</div>
						</body>
					</html>
					<?php
					break;
				case 3://apellido
					?>
					<html>
						<head>
							<title>Cambiar apellido usuario</title>
						</head>
						<body>
							<link rel="stylesheet" href="../css/eest1pinamar.css" type="text/css" charset="utf-8" />
								<div width="100%">
									<img src="../Imagenes/postaslider1.jpg" alt="" width="100%">
								</div>
								<div class="navbar" style="width: 100%">
									<a href="#"></a>
								</div>
							<div align="center" class="Separador">
								<h1>Actualizar apellido de usuario</h1>
								<form action="mensaperfil.php?oper=<?php echo $operacion?>" method="post">
									<label>Ingresar nuevo apellido</label>
										<input type="text" name="nuevoapellidotxt" placeholder="Ingresar nuevo nombre" required>
									<br>
									<br>
									<label>Repetir nuevo apellido</label>
										<input type="text" name="repetirnuevoapellidotxt" placeholder="Repetir nuevo nombre" required>
									<br>
									<br>
										<input type="submit" value="Confirmar">
								</form>
							</div>
						</body>
					</html>
					<?php
					break;
				case 4://contraseña
					header('location:../usuario/cambiarPWD.php');
					break;
			}
			
		}	
	}else{
		header("location:CPerfil.php");
	}
?>