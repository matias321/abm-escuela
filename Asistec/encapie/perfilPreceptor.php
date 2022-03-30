<html>
	<body class="claseFuente">
		<div width="100%">
			<img src="../Imagenes/postaslider1.jpg" width="100%">
		</div>
		   <div class="navbar" style="width: 100%"> 
					<a href="../index/index.php?sSs=<?php echo $SS_IDSESSION;?>">Inicio</a>
					<div class="dropdown">
						<button class="dropbtn">Administraci&oacute;n
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
							<a href="../curso/grillacurso.php?sSs=<?php echo $SS_IDSESSION;?>">Administracion de cursos</a>
							<a href="../alumnos/grillaalumno.php?sSs=<?php echo $SS_IDSESSION;?>">Administracion de alumnos</a>
						</div>
					</div>
					<div class="dropdown">
						<button class="dropbtn">Asistencia
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
							<a href="../asistencia/elegircurso.php?sSs=<?php echo $SS_IDSESSION;?>">Tomar asistencia</a>
							<a href="../asistencia/consulta_elegiralumno.php?sSs=<?php echo $SS_IDSESSION;?>">Asistencia de un alumno</a>
							<a href="../asistencia/consulta_elegircurso.php?sSs=<?php echo $SS_IDSESSION;?>">Asistencia de un curso</a>
						</div>
					</div>
					<div class="dropdown">
						<button class="dropbtn">Comedor
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
							<a href="../alumnoscomedor/elegiralumno.php?sSs=<?php echo $SS_IDSESSION;?>&todoelanio=1">Asignaci&oacute;n de Alumnos Todo el A&ntilde;o</a>
							<a href="../alumnoscomedor/elegiralumno.php?sSs=<?php echo $SS_IDSESSION;?>&todoelanio=2">Asignaci&oacute;n de Alumno Un D&iacute;a</a>
							<a href="../alumnoscomedor/elegirfechalistadocomedor.php?sSs=<?php echo $SS_IDSESSION;?>">Buscar Todos los alumnos de un d&iacute;a</a>
							<a href="../controlComedor/formuleertarjeta.php?sSs=<?php echo $SS_IDSESSION;?>">Despacho Comedor</a>
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
