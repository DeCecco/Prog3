$(document).ready(function(){
	
	MostrarGrilla();
	
});

function MostrarGrilla(){
	
    var pagina = "./nexo.php";
    $.ajax({
    	type: 'POST',
    	url: pagina,
    	data: {queHago:"mostrarGrilla"},
    	dataType: "html"
    })
    .done(function (datosRespuesta) {
    	$("#divGrilla").html(datosRespuesta);
    })
    .fail(function (jqXHR, textStatus, errorThrown) {//con esto se puede ver los errores
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
 
}

function SubirFoto(){
	
    var pagina = "./nexo.php";
	var foto = $("#archivo").val();
	
	if(foto === "")
	{
		return;
	}

	var archivo = $("#archivo")[0];
	var formData = new FormData();
	formData.append("archivo",archivo.files[0]);
	formData.append("queHago", "subirFoto");

	$.ajax({
        type: 'POST', //puede ser get o post
        url: pagina,
        dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
        data: formData, //sin esto no sube la foto
        async: true
    })
	.done(function (objJson) {

		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		$("#divFoto").html(objJson.Html);
	})
	.fail(function (jqXHR, textStatus, errorThrown) {//con esto se puede ver los errores
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });   
}

function BorrarFoto(){

	var pagina = "./nexo.php";
	var foto = $("#hdnArchivoTemp").val();
	
	if(foto === "")
	{
		alert("No hay foto que borrar!!!");
		return;
	}
	
	$.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data: {
			queHago : "borrarFoto",
			foto : foto
		},
        async: true
    })
	.done(function (objJson) {

		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		
		$("#divFoto").html("");
		$("#hdnArchivoTemp").val("");
		$("#archivo").val("");
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });   	
	
	return;
}

function ModificarUser(){
	
	alert($("#rBtn").val());
    var pagina = "./nexo.php";
	var id = $("#id").val();
	var nombre = $("#name").val();
	var clave = $("#pass").val();
	//var queHago = $("#hdnQueHago").val();
	//var radio = $("#rBtn").val();
	
	var usuario = {};
	usuario.id = id;
	usuario.nombre = nombre;
	usuario.clave = clave;
	
	//producto.archivo = archivo;
	//producto.radio= radio;

	if(!Validar(usuario)){
		alert("Debe completar TODOS los campos!!!");
		return;
	}
	
    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data: {
			queHago : queHago,
			usuario : usuario
		},
        async: true
    })
	.done(function (objJson) {
		
		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		
		alert(objJson.Mensaje);
		
		//BorrarFoto();
		
		$("#id").val("");
		$("#nombre").val("");
		$("#clave").val("");
		
		//MostrarGrilla();

		if(queHago !== "agregar"){
			$("#hdnQueHago").val("agregar");
			$("#id").removeAttr("readonly");
		}
		
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    
		
}

function EliminarProducto(producto){
	
	if(!confirm("Desea ELIMINAR el PRODUCTO "+producto.nombre+"??")){
		return;
	}
	
    var pagina = "./nexo.php";
	
    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data: {
			queHago : "eliminar",
			producto : producto
		},
        async: true
    })
	.done(function (objJson) {
		
		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		
		alert(objJson.Mensaje);
		
		MostrarGrilla();

	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    
	
}
function ModificarUsuario(objJson){

	$("#id").val(objJson.id);
	$("#name").val(objJson.nombre);
	$("#pass").val(objJson.clave);

	$("#hdnQueHago").val("modificar");
	
	$("#id").attr("readonly", "readonly");
}

function Validar(objJson){

	alert("implementar validaciones...");
	//aplicar validaciones
	return true;
}


function borrar(usuario){
	//alert(usuario.val);
	//$("#nombre").val("");
	if(!confirm("Desea ELIMINAR el USUARIO "+usuario.nombre+"??")){
		return;
	}
	
    var pagina = "./nexo.php";
	
    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data: {
			queHago : "eliminar",
			usuario : usuario
		},
        async: true
    })
	.done(function (objJson) {
		
		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		
		alert(objJson.Mensaje);
		
		MostrarGrilla();

	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    
	
}