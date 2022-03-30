<html>
	<body class="claseFuente">
		<div width="100%">
			<img src="../Imagenes/postaslider1.jpg" alt="" width="100%" style="">
		</div>
		   <div class="navbar" style="width: 100%"> 
					<a href="../index/index.php?sSs=<?php echo $SS_IDSESSION;?>">Inicio</a>
					<div class="dropdown">
						<button class="dropbtn">Asistencia
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
							<a href="../asistencia/consulta_elegiralumno.php?sSs=<?php echo $SS_IDSESSION;?>">Asistencia de un alumno</a>
							<a href="../asistencia/consulta_elegircurso.php?sSs=<?php echo $SS_IDSESSION;?>">Asistencia de un curso</a>
						</div>
					</div>
					<div class="dropdown">
						<button class="dropbtn">Usuario
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
							<a href="../usuario/cambiarPWD.php?sSs=<?php echo $SS_IDSESSION;?>">Cambiar Contraseña</a>
							<a href="../login/cerrarsesion.php?sSs=<?php echo $SS_IDSESSION;?>">Cerrar Sesi&oacute;n</a>
						</div>
					</div>
			</div>
	</body>
</html>	
