$(function(){
			  var patentes = [ 

			   {value: "ertk543" , data: " 2015-09-16 00:24:12 " }, 
 {value: "dfsa23123" , data: " 2015-09-16 00:27:36 " }, 
 {value: "qw" , data: " 2015-09-16 00:27:42 " }, 
 {value: "dsad" , data: " 2015-09-16 00:28:03 " }, 
 {value: "qw" , data: " 2015-09-16 00:28:07 " }, 
 {value: "ww55555" , data: " 2015-09-16 00:28:15 " }, 
 {value: "qwq" , data: " 2015-09-16 00:31:12 " }, 
 {value: "aaa 444" , data: " 2015-09-16 00:32:13 " }, 

			   
			  ];
			  
			  // setup autocomplete function pulling from patentes[] array
			  $('#autocomplete').autocomplete({
			    lookup: patentes,
			    onSelect: function (suggestion) {
			      var thehtml = '<strong>patente: </strong> ' + suggestion.value + ' <br> <strong>ingreso: </strong> ' + suggestion.data;
			      $('#outputcontent').html(thehtml);
			         $('#botonIngreso').css('display','none');
      						console.log('aca llego');
			    }
			  });
			  

			});