<?php
	// $mysqli=mysqli_connect("10.8.91.42", "root", "wordpress", "db_finanzas");
	// $server="PRODUCCION";

	$mysqli=mysqli_connect('10.4.199.217', 'root', 'UTI.,$loki18', 'db_clinico');
	$server="TESTING";

	$version_sys="4.0";

	if (mysqli_connect_error()) {
		echo 'Conexion Fallida:', mysqli_connect_error();
	}
?>