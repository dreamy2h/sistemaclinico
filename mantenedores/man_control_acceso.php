<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Control de Acceso</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <style type="text/css">
            .my-error-class {
                color:#A40A0A;  /* red */
            }
        </style>
	</head>
	<body>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="glyphicon glyphicon-collapse-down quitar-subrayado" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Datos Generales
                    </a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <br>
                <form class="" id="form_datos_user">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="txt_rut_user" name="txt_rut_user" placeholder="RUN Sin Guión ni puntos">
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="txt_nombre_user" name="txt_nombre_user" placeholder="Nombre Completo">
                            </div>
                            <!-- <div class="col-md-3">
                                <select class="form-control" id="cmb_establecimiento_user" name="cmb_establecimiento_user"></select>
                            </div> -->
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-lg" id="btn_nuevo">
                                    <span class="glyphicon glyphicon-plus"></span> Nuevo
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-lg" id="btn_modificar">
                                    <span class="glyphicon glyphicon-pencil"></span> Modificar
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-lg" id="btn_eliminar">
                                    <span class="glyphicon glyphicon-trash"></span> Eliminar
                                </button>
                            </div>
                            <label class="col-md-2 control-label"></label>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-lg" id="btn_aceptar">
                                    <span class="glyphicon glyphicon-ok"></span> Aceptar
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger btn-lg" id="btn_cancelar">
                                    <span class="glyphicon glyphicon-ban-circle"></span> Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="glyphicon glyphicon-collapse-down quitar-subrayado" data-toggle="collapse" data-parent="#accordion" href="#collapse_grid">
                        Datos Generales
                    </a>
                </h4>
            </div>
            <div id="collapse_grid" class="panel-collapse collapse in">
                <div class="container-fluid">
                    <br>
                    <table id="grid_usuarios" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Permisos de Usuario</th>
                                <th>Usuario</th>
                                <th>Nombre Completo</th>
                                <th>Resetear Clave</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Permisos de Usuario</th>
                                <th>Usuario</th>
                                <th>Nombre Completo</th>
                                <th>Resetear Clave</th>
                            </tr>
                        </tfoot>
                    </table> 
                </div>
            </div>
        </div>
        <script type="text/javascript" src="mantenedores/js/man_control_acceso.js"></script>
	</body>
</html>