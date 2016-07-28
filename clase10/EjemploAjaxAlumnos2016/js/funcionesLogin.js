function validarLogin()
{
	var parametroNombre;
	var parametroClave;
	var parametroRecordarme;

	parametroNombre=$("#correo").val();
	parametroClave=$("#clave").val();
	parametroRecordarme=true;

		var funcionAjax=$.ajax({
			type:"post",
			url:"php/validarUsuario.php",
			data:{usuario:parametroNombre, 
				clave:parametroClave,
				recordarme:parametroRecordarme}
		});
		funcionAjax.done(function(respuesta){
			alert(respuesta);
		});

//alert(parametroNombre);
}

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			MostarBotones();
			MostarLogin();
			$("#usuario").val("Sin usuario.");
			$("#BotonLogin").html("Login<br>-Sesión-");
			$("#BotonLogin").removeClass("btn-danger");
			$("#BotonLogin").addClass("btn-primary");
			
	});	
}
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		$("#botonesABM").html(retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}
