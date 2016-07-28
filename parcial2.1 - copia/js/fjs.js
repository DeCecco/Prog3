
function darlabaja(idparam)
{
	
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"bajauser",
		id:idparam
	 	}
	});
	funcionAjax.done(function(retorno){
		$("#Usbaja").html(retorno);
		//$("#informe").html("Correcto!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#Usbaja").html(":(");
		//$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}


function ModifiUser(idparam)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"modiUser",
		id:idparam
	 	}
	});
	funcionAjax.done(function(retorno){
		$("#modify").html(retorno);
		//$("#informe").html("Correcto!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#modify").html(":(");
		//$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}