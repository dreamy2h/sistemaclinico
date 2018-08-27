<?php
	session_start();
	require("../../../conexion.php");

	$consulta="SELECT id, glosa from establecimientos";
	$execute=$mysqli->query($consulta);

	$datos='<option value=""></option>';
	while($data=$execute->fetch_assoc()){
		$datos.='<option value="'.$data["id"].'">'.$data["glosa"].'</option>';
	}

	echo $datos;

	$execute->free();
	$mysqli->close();
?>