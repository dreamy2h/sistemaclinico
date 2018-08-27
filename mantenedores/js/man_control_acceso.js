var rut_user;
var dv_user;

function habilitar(a, b) {
    $("#txt_rut_user").prop("disabled", a);
    $("#txt_nombre_user").prop("disabled", a);
    // $("#cmb_establecimiento_user").prop("disabled", a);

    $("#btn_nuevo").prop("disabled", b);
    $("#btn_modificar").prop("disabled", a);
    $("#btn_eliminar").prop("disabled", a);
    $("#btn_aceptar").prop("disabled", a);
    $("#btn_cancelar").prop("disabled", a);
}

function formateaRut(rut) {
    var actual = rut.replace(/^0+/, "");
    if (actual != '' && actual.length > 1) {
        var sinPuntos = actual.replace(/\./g, "");
        var actualLimpio = sinPuntos.replace(/-/g, "");
        var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
        var rutPuntos = "";
        var i = 0;
        var j = 1;
        for (i = inicio.length - 1; i >= 0; i--) {
            var letra = inicio.charAt(i);
            rutPuntos = letra + rutPuntos;
            if (j % 3 == 0 && j <= inicio.length - 1) {
                rutPuntos = "." + rutPuntos;
            }
            j++;
        }
        var dv = actualLimpio.substring(actualLimpio.length - 1);
        rutPuntos = rutPuntos + "-" + dv;
    }
    return rutPuntos;
}

function formateaRutGuion(rut) {
    var actual = rut.replace(/^0+/, "");
    if (actual != '' && actual.length > 1) {
        var sinPuntos = actual.replace(/\./g, "");
        var actualLimpio = sinPuntos.replace(/-/g, "");
        var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
        var dv = actualLimpio.substring(actualLimpio.length - 1);
        var rutGuion = inicio + "-" + dv;
        rut_user=rutGuion;
        dv_user=dv;
    }
    return rutGuion;
}

function isValidRUT(rut) {
    if (!rut | typeof rut !== 'string') {
        return false;
    }

    var regexp = /^\d{7,8}-[k|K|\d]{1}$/;
    return regexp.test(rut);
}

function ingresar_usuario() {
    $("#form_datos_user").validate({
        debug: true,
        errorClass: "my-error-class",
        rules:  {
            txt_rut_user: {
                required: true,
                number: false,
                maxlength: 12
            },
            txt_nombre_user: {
                required: true,
                maxlength: 59,
                lettersonly: true
            }
            // cmb_establecimiento_user: {
            //     required: true
            // }
        },
        messages: {
            txt_rut_user: {
                required: "RUN es obligatorio.",
                number: "Ingrese solo números.",
                maxlength: "Ha superado el número de caracteres."
            },
            txt_nombre_user: {
                required: "Nombre es obligatorio.",  
                maxlength: "Ha superado el número de caracteres.",
                lettersonly: "Solo letras."
            }
            // ,
            // cmb_establecimiento_user: {
            //     required: "Seleccionar un establecimiento."
            // }
        }
    });

    if ($("#form_datos_user").valid()) {
        // var estab=$("#cmb_establecimiento_user").val();
        var nombre=$("#txt_nombre_user").val();

        $.ajax({
            data: {
                rut_user:rut_user,
                dv_user:dv_user,
                nombre:nombre
                // ,
                // estab:estab
            },
            type: "POST",
            url: "mantenedores/sql/man_ingresar_usuarios.php",
            success: function(data) {
                if (data==0) {
                    alert("Usuario ingresado con éxito.");
                    $('#form_datos_user')[0].reset();
                    habilitar(true, false);
                    $("#grid_usuarios").dataTable().fnReloadAjax();
                } else {
                    alert(data);
                }
            }
        });    
    }
}

// function llenar_cmb_establecimiento() {
//     console.warn("llenar_cmb_establecimiento");
//     $.ajax({
//         type: "POST",
//         url: "mantenedores/sql/views/man_llenar_cmb_estab.php",
//         success: function(data) {
//             $('#cmb_establecimiento_user').html(data).fadeIn();
//         }
//     });
// }

$(document).ready(function() {
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z ]+$/i.test(value);
    }, "Letters and spaces only please");
    habilitar(true, false);
    // llenar_cmb_establecimiento();

    $("#btn_nuevo").click(function(){
        habilitar(false, true);
        $("#btn_modificar").prop("disabled", true);
        $("#btn_eliminar").prop("disabled", true);
        $("#txt_rut_user").focus();
    });

    $("#btn_modificar").click(function(){
        habilitar(false, true);
        $("#btn_modificar").prop("disabled", true);
        $("#btn_eliminar").prop("disabled", true);
        $("#txt_rut_user").prop("disabled", true);
        $("#txt_nombre_user").focus();
    });

    $("#btn_aceptar").click(function(){
        ingresar_usuario();
    });

    $("#btn_cancelar").click(function(){
        $('#form_datos_user')[0].reset();
        habilitar(true, false);
    });

    $("#txt_rut_user").blur(function(){
        var rut=$(this).val();
        if (isValidRUT(formateaRutGuion(rut))) {
            $(this).val(formateaRut(rut));    
        } else {
            $(this).val("");
            alert("Rut inválido");
            $(this).focus();
        }
        
    });

    $("#txt_nombre_user").blur(function(){
        var mayuscula=$(this).val();
        $(this).val(mayuscula.toUpperCase());
    });

    var grid_usuarios = $('#grid_usuarios').DataTable( {
        "ajax": "mantenedores/sql/views/man_datagrid_control_acceso.php",
        "columns": [
            { "defaultContent": "<button type='button' class='btn btn-primary'>Permisos de Usuario</button>"},
            { "data": "usuario" },
            { "data": "nombre_completo" },
            { "defaultContent": "<button type='button' class='btn btn-primary'>Resetear Clave</button>"},
            // { "data": "establecimiento" }
        ]
        
    });

    $("#grid_usuarios tbody").on("click", "tr", function () {
        var data = grid_usuarios.row( this ).data();
        var rut=formateaRut(data['usuario']);
        $("#txt_rut_user").val(rut);

        $("#txt_nombre_user").val(data['nombre_completo']);
        // $("#cmb_establecimiento_user").val(data['id_estab']);
        
        habilitar(true, false);
        $("#btn_modificar").prop("disabled", false);
        $("#btn_eliminar").prop("disabled", false);
    });

} );