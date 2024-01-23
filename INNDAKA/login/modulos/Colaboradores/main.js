$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'buscar.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});


function exportarExcel() {
	// Simulamos un formulario y enviamos una solicitud POST
	var form = document.createElement("form");
	form.method = "post";
	form.action = "generar_Excel.php";  // Ajusta la URL según la ubicación de tu script PHP

	// Creamos un campo oculto con el valor 'exportarExcel' para identificar la solicitud
	var input = document.createElement("input");
	input.type = "hidden";
	input.name = "exportarExcel";
	input.value = "1";
	form.appendChild(input);

	// Adjuntamos el formulario al documento y lo enviamos
	document.body.appendChild(form);
	form.submit();
}