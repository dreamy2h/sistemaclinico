<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
        <link rel="stylesheet" href="static/css/bootstrap.min.css"/>
        <title>
            DreamClinic
        </title>
        <style type="text/css">
            body{
                background: #F2F2F2;
                background-image: url(static/css/imagenes/fondo.jpg);
                background-repeat: no-repeat;
                background-position: center center;
                background-attachment: fixed;
                background-size: cover;
            }   
            .vertical-offset-100{
                padding-top:100px;
            }

            .alert{
                display:none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row vertical-offset-100">
                
                <div class="col-xs12 col-md-8">
                   
                </div>
                <div class="col-xs-12 col-md-4">
                    <h3>
                        Iniciar sesión
                    </h3>
                    <form id="form_login" action="#" method="post" role="form" style="display: block;">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="RUT Ej: 12123123-k" name="txt_pac_rut" id="txt_pac_rut" type="text" tabindex="1"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Clave" name="txt_clave" id="txt_clave" type="password" value="" tabindex="2"/>
                            </div>
                            
                            <!-- <input type="button" id="btn_login" class="btn btn-success btn-block" value="Iniciar Sesión"> -->
                        </fieldset>
                    </form>

                    <form id="form_login2" action="#" method="post" role="form" style="display: block;">
                        <div class="cambiar-clave hidden" id="cambiar_clave">
                            <div class="form-group">
                                <input type="password" name="txt_clave_nueva" id="txt_clave_nueva" tabindex="3" class="form-control" placeholder="Clave Nueva">
                            </div>
                            <div class="form-group">
                                <input type="password" name="txt_clave_nueva_rep" id="txt_clave_nueva_rep" tabindex="4" class="form-control" placeholder=" Repetir Clave Nueva">
                            </div>
                        </div>
                        <div class="alert">
                            <strong id="alerta"></strong>
                        </div>
                        <div class="col-xs-6 form-group pull-left">     
                            <input type="button" name="btn_login" id="btn_login" tabindex="5" class="form-control btn btn-success btn-block" value="Iniciar Sesión">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="static/js/jquery.min.js"></script>
        <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="static/js/jquery-validation/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>
