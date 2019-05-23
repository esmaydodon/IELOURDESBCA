$(document).ready(function(){
   $("#mostrarmas").click(function(evento)
      {$("#otroscampos").css("display", "block");  
	   $("#mostrarmenos").css("display", "block"); });
	   
	   $("#mostrarmenos").click(function(evento)
      {$("#otroscampos").css("display", "none");  
	   $("#mostrarmenos").css("display", "none"); });   
 /*  $("#botonOcultar").click(function(evento)
      {$("#NuevoArticulo2").css("display", "none"); 
	   $("#botonOcultar").css("display", "none"); });
   
   $("#editar").click(function(evento)
      {$("#FrameEditarArticulo").css("display", "block"); 
	   $("#ocultar2").css("display", "block");
	    });
   
 $("#ocultar2").click(function(evento)
      {$("#FrameEditarArticulo").css("display", "none"); 
	   $("#ocultar2").css("display", "none"); });*/
   
     })
   /*
   $(document).ready(function(){
  $("#eliminar").click(function(evento)
      EliminaArticulo(idadticulo) ;  
   
     })
   */
   function printPage() { print(document); }