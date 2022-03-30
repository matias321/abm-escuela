<?php
	include('../encapie/encabezado.php');
	include('../curso/clscurso.php');
	include('../usuarioxcurso/clsusuariosxcurso.php');
	include("../usuario/clsusuario.php");
	include("../materias/clsmaterias.php");
	if(isset($_GET['oper']))
	{
		if($_GET['oper'] == 1)
		{
			$operacion = $_GET['oper'];

			$usuario = new clsUsuario();
			$usuario->idusuario = $_POST['cmbusuario'];
			$regusuarios=$usuario->getUnUsuario();
			$cadaUsuario=mysqli_fetch_array($regusuarios, MYSQLI_ASSOC);
			$nombrecompleto = $cadaUsuario['nombre']." ".$cadaUsuario['apellido'];
			?>
				<div align="center">
					<br>
					<br>
					<h1>Fomulario para Agregar una materia a un usuario</h1>
					<form action="mensausuariosxmateria.php?oper=<?php echo $operacion?>&idusuario=<?php echo $usuario->idusuario?>" method="post">
						<label style="color: #0000ff; font-size: 20px"><?php echo $nombrecompleto?></label>
						<br>
						<br>
						<label>Seleccione una materia</label>
							<select name="cmbmateria" required>
								<option disabled>Seleccione una materia</option>
								<?php
									$materias = new clsmaterias();
									$datosdelasmaterias = $materias->gettodaslasmaterias();
									while($cadamateria=mysqli_fetch_array($datosdelasmaterias, MYSQLI_ASSOC))
									{
										echo "<option value=".$cadamateria['id_materia'].">" .$cadamateria['anio']." º ".$cadamateria['division']." / ".$cadamateria['nrogrupo']." / ". $cadamateria['nombremateria']."</option>";
									}
								?>
							</select>
						<br>
						<br>
						<a href="grillausuariosxmateria.php">
							<input type="button" value="Regresar">
						</a>
						<input type="submit" value="Agregar">
					</form>
					
				</div>
			<?php
		}else
		{
			$operacion = $_GET['oper'];
			$idcurso = $_GET['idcurso'];
			$idmateria = $_GET['idmateria'];
			$nombremateria = $_GET['nombremateria'];
			$idusuario = $_GET['idusuario'];
			$usuario = new clsUsuario();
			$usuario->idusuario = $idusuario;
			$regusuarios=$usuario->getUnUsuario();
			$cadaUsuario=mysqli_fetch_array($regusuarios, MYSQLI_ASSOC);
			$nombrecompleto = $cadaUsuario['nombre']." ".$cadaUsuario['apellido'];
			?>
			<div align="center">
					<br>
					<br>
					<h1>Fomulario para actualizar un usuario por materia</h1>
					<form action="mensausuariosxmateria.php?oper=<?php echo $operacion?>&idusuario=<?php echo $usuario->idusuario?>" method="post">
						<label style="color: #0000ff; font-size: 20px"><?php echo $nombrecompleto?></label>
						<br>
						<br>
						<label>Seleccione una materia</label>
							<select name="cmbmateria" required>

								<?php
									$materias = new clsmaterias();
									$datosdelasmaterias = $materias->gettodaslasmaterias();
									while($cadamateria=mysqli_fetch_array($datosdelasmaterias, MYSQLI_ASSOC))
									{
										if($cadamateria['id_materia'] == $idmateria){
											echo "<option value=".$cadamateria['id_materia']." selected>" .$cadamateria['anio']." º ".$cadamateria['division']." / ". $cadamateria['nombremateria']."</option>";
										}else{
											echo "<option value=".$cadamateria['id_materia'].">" .$cadamateria['anio']." º ".$cadamateria['division']." / ". $cadamateria['nombremateria']."</option>";
										}
										
									}
								?>
							</select>
						<br>
						<br>
						<a href="grillausuariosxmateria.php">
							<input type="button" value="Regresar">
						</a>
						<input type="submit" value="Guardar">
					</form>
					
				</div>
			<?php
		}
	}
?>