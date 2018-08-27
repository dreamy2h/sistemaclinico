<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Agenda</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <style type="text/css">
            .quitar-subrayado {
                text-decoration:none; 
            }
            .boton-centrado {
                width: 400px;
                margin-left: auto;
                margin-right: auto;
            }
            
        </style>
        <!-- <link rel="stylesheet" href="static/css/bootstrap.css"/> -->
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
                    <form class="" id="form_datos_pac">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">RUN</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="txt_rut" name="txt_rut" placeholder="">
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">N° Ficha</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="txt_pac_nombre" name="txt_pac_nombre" placeholder="">
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">Nacionalidad</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="txt_pac_nombre" name="txt_pac_nombre" placeholder="">
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">Nombre</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="txt_pac_nombre" name="txt_pac_nombre" placeholder="">
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">A Paterno</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="txt_pac_ape_pat" name="txt_pac_ape_pat" placeholder="">
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">A Materno</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="txt_pac_ape_mat" name="txt_pac_ape_mat" placeholder="">
                                                </div>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">Pasaporte/DNI/NIE</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="txt_pac_nombre" name="txt_pac_nombre" placeholder="">
                                                </div>
                                            </div>  
                                        </div>
                                    	
                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">Edad</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="txt_pac_ape_mat" name="txt_pac_ape_mat" placeholder="">
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">Nombre Social</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="txt_nombre_social" name="txt_nombre_social">
                                                </div>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">Sexo</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="txt_pac_nombre" name="txt_pac_nombre" placeholder="">
                                                </div>
                                            </div>  
                                        </div>
                                        
                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">Previsión</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="txt_pac_ape_mat" name="txt_pac_ape_mat" placeholder="">
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="col-md-4 bottom">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">Estado Afiliación</label>
                                                <div class="col-xs-8">
                                                    <select class="form-control" id="slc_tipocalle" name="slc_tipocalle"></select>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                    	<div class="container">
                                            <div class="boton-centrado">
            	                            	<div class="col-md-4 bottom">
            	                                    <div class="form-group">
            	                                       <input type="button" class="btn btn-success" id="btn_buscar" value="Buscar">
            	                                    </div>  
            	                                </div>
            	                                <div class="col-md-4 bottom">
            	                                    <div class="form-group">
            	                                        <input type="button" class="btn btn-success" id="btn_limpiar_datos" value="Limpiar Datos">
            	                                    </div>  
            	                                </div>
            	                                <div class="col-md-4 bottom">
            	                                    <div class="form-group">
            	                                       <input type="button" class="btn btn-success" id="btn_crear_pacientes" value="Crear Paciente">
            	                                    </div>  
            	                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Crear Paciente</h4>
                    </div>
                    <div class="modal-body">
                        <div id="divCrearPaciente"></div>
                    </div>
                </div>
            </div>
        </div>

		<!--<script type="text/javascript" src="static/js/jquery.min.js"></script>
        <script type="text/javascript" src="static/js/bootstrap.min.js"></script>-->
        <script type="text/javascript" src="js/agenda.js"></script>
	</body>
</html>