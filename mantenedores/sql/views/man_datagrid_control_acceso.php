<?php
	session_start();
	require("../../../conexion.php");

	$consulta="SELECT 
					u.usuario
					,u.nombre_completo
					-- ,u.establecimiento as id_estab
					-- ,e.glosa as establecimiento
				from 
					usuarios u
				-- inner join establecimientos e on u.establecimiento=e.id";

	$execute=$mysqli->query($consulta);

	$cont=0;
	// $filas='{ "data": [';
	while($data=$execute->fetch_assoc()){
		// $filas.='{ "usuario": "'.$data['usuario'].'",';
		// $filas.=' "nombre_completo": "'.$data['nombre_completo'].'",';
		// $filas.=' "establecimiento": "'.$data['establecimiento'].'"}';

		// $cont++;
		// if (count($data)-1!=$cont) {
		// 	$filas.=',';
		// }
		$filas[]=$data;
	}

	// $filas.=']}';

	if(empty($filas)){
	    echo "{[]}";
	}else{
		echo '{"data":'.json_encode($filas).'}';
	}

	$execute->free();
	$mysqli->close();
?>