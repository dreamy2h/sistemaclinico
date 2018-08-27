<?php
	session_start();
	require("../../conexion.php");
	define("PENDIENTE", 0);
	$estado=PENDIENTE;
	$clave=hash('sha256', 'dreamclinic');
	$rut_user=$_POST['rut_user'];
	$dv_user=$_POST['dv_user'];
	// $estab=$_POST['estab'];
	$nombre=$_POST['nombre'];
	$user=$rut_user."-".dv_user;

	$insert="INSERT INTO usuarios (rut, dv, nombre_completo, usuario, clave, estado)
			VALUES (?,?,?,?,?,?,?)";
	$st=$mysqli->prepare($insert);
	$st->bind_param("issssii", $rut_user, $dv_user, $nombre, $user, $clave, $estado);

	if ($st->execute()) {
		echo 0;
	} else {
		echo "No se pudo ingresar al usuario.";
	}
	
	$st->close();
	$mysqli->close();
?>