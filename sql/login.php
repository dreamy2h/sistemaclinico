<?php
	session_start();
	require("../conexion.php");
	
	$usuario=$_POST['usuario'];
	$clave=hash('sha256', $_POST['clave']);
	$param_pernomenu=5;

	$consultaUser="SELECT 
						u.usuario
						,u.nombre_completo
						,u.clave
						,u.estado
						,u.rut
					FROM 
						usuarios u
					WHERE 
						u.usuario=?";

	$st = $mysqli->prepare($consultaUser);
	$st->bind_param("s", $usuario);
    $st->execute();
    $st->store_result();

	if($st->num_rows>0) {
		$st->bind_result($user, $nombre_usuario, $claveBD, $estado, $rut_user);
        $st->fetch();
        // echo $clave."-".$pass;
		if ($claveBD==$clave) {
			if ($estado==1) {
				$permisos="-";
	    		$consulta2="SELECT 
								pd.id
							from 
								permisos_detalle pd
								,permisos_usuario pu 
							where 
								pu.id_permisoDet=pd.id
								and pu.rut_usuario=?
								and pd.id_permisos=?";

				$st2=$mysqli->prepare($consulta2);
				$st2->bind_param("si", $rut_user, $param_pernomenu);
				$st2->execute();
				$st2->store_result();

				$st2->bind_result($id_permiso);
				while ($st2->fetch()) {
		            $permisos.=$id_permiso."-";
		        }

		        $_SESSION['usuario']=$user;
		        $_SESSION['nombre_usuario']=$nombre_usuario;
		        $_SESSION['rut_user']=$rut_user;
				$_SESSION['permisos']=$permisos;

				$respuesta=0;
				$st2->close();
			} else {
				session_destroy();
				$respuesta=1;
			}
			
		} else {
			$respuesta="Error, su clave es inválida";
		}
	} else {
		$respuesta="Error, cuenta no activa. Solicite su cuenta.";
	}

	echo $respuesta;
	$mysqli->close();
?>