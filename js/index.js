// function login() {
// 	console.warn("entra a login");
// 	location='inicio.php';
// }

// $(document).ready(function() {
// 	$("#btn_login").click(login);
	
// 	$("#txt_clave").keypress(function(event) {
// 		if(event.keyCode==13){
//             login();
//         }
// 	});
// });


function ocultar_alert(){
	$(".alert").css({"display":"none"});
}

function login() {
	if ($("#btn_login").val()=="Iniciar Sesión") {
		var usuario=$("#txt_pac_rut").val();
		var clave=$("#txt_clave").val();

	 	$("#form_login").validate({
	 		debug: true,
	 		errorClass: "my-error-class",
			rules:  {
				txt_pac_rut: {
					required: true,
					number: false
				},
				txt_clave: {
					required: true
				}
			},
			messages: {
				txt_pac_rut: {
					required: "RUN es obligatorio.",
					number: "Ingrese solo números."
				},
				txt_clave: {
					required: "Clave es obligatorio.",	
				}
			}
	 	});

	 	if ($("#form_login").valid()) {
	    	$.ajax({
		 		url: "sql/login.php",
		 		data: {
		 			usuario:usuario,
		 			clave:clave 
		 		},
		 		type: "POST",
		 		success: function(data) {
		 			if (data==0) {
		            	location='inicio.php';
		            } else if (data==1) {
		            	$("#txt_clave").addClass("hidden");
		            	$("#cambiar_clave").removeClass("hidden");
						$(".alert").css({"display":"none"});
		            	$("#txt_pac_rut" ).prop( "disabled", true);
		            	$("#login-submit").val("Cambiar Clave");
		            } else {
		            	$(".alert").removeClass("alert-success");
		            	$(".alert").addClass("alert-danger");
		            	$(".alert").css({"display":"block"});
		            	$("#alerta").text(data);
		            	setTimeout(ocultar_alert, 3000);
		            }
		 		}
		 	});  
	 	}
	} else {
		var new_clave=$("#txt_clave_nueva").val();
	    var new_clave_rep=$("#txt_clave_nueva_rep").val();

	    $("#login-form2").validate({
	 		debug: true,
	 		errorClass: "my-error-class",
			rules:  {
				txt_clave_nueva: {
					required: true
				},
				txt_clave_nueva_rep: {
					required: true
				}
			},
			messages: {
				txt_clave_nueva: {
					required: "Ingresar clave nueva."
				},
				txt_clave_nueva_rep: {
					required: "Repetir clave nueva.",	
				}
			}
	 	});

	    if ($("#login-form2").valid()) {
	    	if (validar_pass_nueva_rep($("#txt_clave_nueva_rep").val())) {
	    		var usuario=$("#txt_pac_rut").val();
	    		$.ajax({
			 		url: "aut_cambia_passPac.php",
			 		data: {
			 			new_clave:new_clave,
			 			usuario:usuario
			 		},
			 		type: "POST",
			 		success: function(data) {
			 			if (data==0) {
			            	$("#txt_clave").removeClass("hidden");
				    		$("#txt_pac_rut" ).prop( "disabled", false);
				    		$("#cambiar_clave").addClass("hidden");
				    		$("#txt_clave").val("");
				    		$("#txt_clave").focus();
				    		$("#login-submit").val("Iniciar Sesión");
				    		$(".alert").removeClass("alert-danger");
				    		$(".alert").addClass("alert-success");
				    		$(".alert").css({"display":"block"});
					        $("#alerta").text("Cuenta activada, inicie sesión");
					        setTimeout(ocultar_alert, 3000);
			            } else {
			            	$("#txt_clave").removeClass("hidden");
				    		$("#txt_pac_rut" ).prop( "disabled", false);
				    		$("#cambiar_clave").addClass("hidden");
				    		$("#txt_clave").val("");
				    		$("#txt_clave").focus();
				    		$(".alert").removeClass("alert-success");
				    		$(".alert").addClass("alert-danger");
				    		$(".alert").css({"display":"block"});
					        $("#alerta").text(data);
					        setTimeout(ocultar_alert, 3000);
			            }
			 		}
			 	});
	    		
	    	} else {
	    		$(".alert").removeClass("alert-success");
	    		$(".alert").addClass("alert-danger");
	    		$(".alert").css({"display":"block"});
		        $("#alerta").text("Contraseñas deben ser iguales");
		        setTimeout(ocultar_alert, 3000);
	    	}
	    }
	}
}

function validar_pass_nueva_rep(pass_nueva_rep) {
	var pass_nueva=$("#txt_clave_nueva").val();
	if (pass_nueva!==pass_nueva_rep) {
    	return false;
	} else {
    	return true;
	}
}

$(document).ready(function() {
	$("#txt_pac_rut").prop( "disabled", false);
	$("#btn_login").click(login);
	
	$("#txt_clave").keypress(function(event) {
		if(event.keyCode==13){
            login();
        }
	});

	$("#txt_clave_nueva_rep").keypress(function(event) {
		if(event.keyCode==13){
            login();
        }
	});
});