<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            DreamClinic
        </title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="static/css/bootstrap.css"/>
        <link rel="stylesheet" href="static/css/jquery.dataTables.min.css"/>
        <style type="text/css">
            body{
                background: #F2F2F2;
                background-image: url(static/css/imagenes/fondo.jpg);
                background-repeat: no-repeat;
                background-position: center center;
                background-attachment: fixed;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['nombre_usuario']?>">
        <!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
        <!-- :::::::::::::::: menú :::::::::::::::::::::::::::::::::::::::: -->
        <div id="menu_dinamico"></div>
        <!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
        <!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
        <div class="container-fluid">
            <div id="contenido"></div>
        </div>

        <script type="text/javascript" src="static/js/jquery.min.js"></script>
        <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="static/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="static/js/fnReloadAjax.js"></script>
        <script type="text/javascript" src="static/js/jquery-validation/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="js/inicio.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location: index.php');
    }
?>