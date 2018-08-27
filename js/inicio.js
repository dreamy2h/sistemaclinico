function cargar_menu() {
	var nombre_usuario=document.getElementById('user').value;
	var id_permiso_enc;
	var inicio="SI";
	var menu='<nav class="navbar navbar-default">';
	menu+='<div class="container-fluid">';
	menu+='<div class="navbar-header">';
	menu+='<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">';
	menu+='<span class="sr-only">Toggle navigation</span>';
	menu+='<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>';
	menu+='</button><a class="navbar-brand" href="#">Dream Clinic</a></div>';
	menu+='<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
	menu+='<ul class="nav navbar-nav">';
	

	$.ajax({
 		type: "GET",
 		dataType: "json",
 		url: "sql/views/cargar_menu.php",
 		async: false,
 		success: function(data) {
 			for (var i = 0; i < data.length; i++) {
	 			if (data[i].id_permiso_enc!=id_permiso_enc) {
	 				if (inicio=="NO") {
	 					menu+='</ul></li>';
	 				}

	 				menu+='<li class="dropdown">';
	 				menu+='<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';	
	 				menu+=data[i].permiso_enc+'<span class="caret"></span></a>';
	 				menu+='<ul class="dropdown-menu">';
	 			}
				
				menu+='<li><a href="#" id="'+data[i].id_permiso_det+'" onClick="setLink('+data[i].ruta+')">'+data[i].permiso_det+'</a></li>';

				id_permiso_enc=data[i].id_permiso_enc;
				inicio="NO";
			}
 		}
	});

	menu+='</ul></li></ul>';
	menu+='<form class="navbar-form navbar-left">';
	menu+='<div class="form-group">';
	menu+='<input type="text" class="form-control" placeholder="Buscar"/>';
	menu+='</div><button type="submit" class="btn btn-default">Buscar</button></form>';
	menu+='<ul class="nav navbar-nav navbar-right">';
	menu+='<li class="dropdown">';
	menu+='<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
	menu+=nombre_usuario+'<span class="caret"></span></a>';
	menu+='<ul class="dropdown-menu">';
	menu+='<li><a href="#">Configuración</a></li>';
	menu+='<li><a href="#" id="lnk_cerrar_sesion">Cerrar Sesión</a></li>';
	menu+='</ul></li></ul></div></div></nav>';
	
	$("#menu_dinamico").append(menu);
}

function logout() {
	location.href="sql/logout.php";
}

function setLink(ruta) {
	$("#contenido").load(ruta);
}

$(document).ready(function() {
	// $("#btn_prueba").click(function(event) {
	// 	$("#contenido").load('agenda.php');
	// });
	cargar_menu();
	$("#lnk_cerrar_sesion").click(function() {
		logout();
	});
});