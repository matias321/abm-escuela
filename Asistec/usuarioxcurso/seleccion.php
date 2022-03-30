<?php
if($_GET['sele']==1)
{
	header('Location: grillacursosxusuario.php?sSs='.$_GET['sSs'].'&idusuario='.$_POST['cmbusuario']);
} else {
	header('Location: grillausuariosxcurso.php?sSs='.$_GET['sSs'].'&idcurso='.$_POST['cmbcurso']);
}
?>