<html>
	<body class="claseFuente">
		<div width="100%">
			<img src="../Imagenes/postaslider1.jpg" alt="" width="100%" style="">
		</div>
		   <div class="navbar" style="width: 100%"> 
					<a href="../index/index.php?sss=<?php echo $ss_idsession;?>">Inicio</a>
					<div class="dropdown">
						<button class="dropbtn">Administraci&oacute;n
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
							<a href="../curso/grillacurso.php?sss=<?php echo $ss_idsession;?>">Administracion de cursos</a>
							<a href="../usuario/grillausuario.php?sss=<?php echo $ss_idsession;?>">Administracion de Usuarios</a>
							<a href="../usuarioxcurso/elegirusuario_curso.php?sss=<?php echo $ss_idsession;?>">Usuarios por Curso</a>
							<a href="../alumnos/grillaalumno.php?sss=<?php echo $ss_idsession;?>">Administracion de alumnos</a>
							<a href="../turnosxcurso/grillaturnosxcurso.php?sss=<?php echo $ss_idsession;?>">Administracion de turnos</a>
						</div>
					</div>
					<div class="dropdown">
						<button class="dropbtn">Asistencia
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
							<a href="../asistencia/consulta_elegiralumno.php?sss=<?php echo $ss_idsession;?>">Asistencia de un alumno</a>
							<a href="../asistencia/consulta_elegircurso.php?sss=<?php echo $ss_idsession;?>">Asistencia de un curso</a>
						</div>
					</div>
					<div class="dropdown">
						<button class="dropbtn">Comedor
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
							<a href="../alumnoscomedor/elegiralumno.php?sss=<?php echo $ss_idsession;?>&todoelanio=1">Asignaci&oacute;n de Alumnos Todo el A&ntilde;o</a>
							<a href="../alumnoscomedor/elegiralumno.php?sss=<?php echo $ss_idsession;?>&todoelanio=2">Asignaci&oacute;n de Alumno Un D&iacute;a</a>
							<a href="../alumnoscomedor/elegirfechalistadocomedor.php?sss=<?php echo $ss_idsession;?>">Buscar Todos los alumnos de un d&iacute;a</a>
							<a href="../controlcomedor/formuleertarjeta.php?sss=<?php echo $ss_idsession;?>">Despacho Comedor</a>
						</div>
					</div>
					<div class="dropdown">
						<button class="dropbtn">Usuario
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
							<a href="../usuario/cambiarpwd.php?sss=<?php echo $ss_idsession;?>">Cambiar Contraseña</a>
							<a href="../login/cerrarsesion.php?sss=<?php echo $ss_idsession;?>">Cerrar Sesi&oacute;n</a>
						</div>
					</div>
			</div>
	</body>
</html>	
