<?php
	session_start();
	require("../../conexion.php");
	define("ACTIVO", 1);
	define("NO_MENU", 100);

	$estado=ACTIVO;
	$permiso=NO_MENU;
	$rut_user=$_SESSION['rut_user'];

	$consulta="SELECT 
					p.id as id_permiso_enc
					,p.glosa as permiso_enc
					,pd.id as id_permiso_det
					,pd.glosa as permiso_det
					,pd.ruta
				from 
					permisos p
					inner join permisos_detalle pd on p.id=pd.id_permisos
					inner join permisos_usuario pu on pd.id=pu.id_permisoDet
				where 
					p.estado = ? and
					p.id <> ? and
					pu.rut_usuario = ?
				order by p.id, pd.id";

	$st=$mysqli->prepare($consulta);
	$st->bind_param("iii", $estado, $permiso, $rut_user);
	$st->execute();
	$st->store_result();

	if ($st->num_rows > 0) {
		$st->bind_result($id_permiso_enc, $permiso_enc, $id_permiso_det, $permiso_det, $ruta);
		
		while ($st->fetch()) {
			$data = array(
				"id_permiso_enc" => "$id_permiso_enc",
				"permiso_enc" => utf8_encode("$permiso_enc"),
				"id_permiso_det" => "$id_permiso_det",
				"permiso_det" => utf8_encode("$permiso_det"),
				"ruta" => $ruta
			);
			$filas[]=$data;
		}

        echo json_encode($filas);
	} else {
		echo "{items: []}";
	}

	$st->close();
	$mysqli->close();
?>