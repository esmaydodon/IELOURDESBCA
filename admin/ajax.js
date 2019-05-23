function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}

	return xmlhttp;
}
/*carrito*/
//ici
function buscarDato(){
	resul = document.getElementById('resultadoBusqueda');
	bus=document.frmbusqueda.dato.value;

	ajax=objetoAjax();
	ajax.open("POST", "busqueda.php",true);	
	resul.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}//alert("hola");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus)
}
function buscarDatoProveedor(){
	resul = document.getElementById('resultadoBusquedaProveedor');
	bus=document.frmbusquedaProveedor.dato.value;

	ajax=objetoAjax();
	ajax.open("POST", "busquedaProveedor.php",true);	
	resul.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}//alert("hola");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus)
}
function buscarDatoCliente(){
	resul = document.getElementById('resultadoBusquedaCliente');
	bus=document.frmbusquedaCliente.dato.value;

	ajax=objetoAjax();
	ajax.open("POST", "busquedaCliente.php",true);	
	resul.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}//alert("hola");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus)
}
function buscarDato27(){
	resul = document.getElementById('resultadoBusqueda');
	bus=document.frmbusqueda.dato.value;
ajax=objetoAjax();
	ajax.open("POST", "busqueda2.php",true);	
	resul.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}//alert("hola");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus)}
function buscarDato2(){
	resul = document.getElementById('resultadoBusqueda');
	bus=document.frmbusqueda.dato.value;
ajax=objetoAjax();
	ajax.open("POST", "busqueda2.php",true);	
	resul.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}//alert("hola");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus)}
function buscarDato22(){
	resul = document.getElementById('resultadoBusqueda');
	bus=document.frmbusqueda.dato.value;
ajax=objetoAjax();
	ajax.open("POST", "busqueda22.php",true);	
	resul.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}//alert("hola");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus)}	
function buscarDatoBoleta(){
	resul = document.getElementById('resultadoBusqueda');
	bus=document.frmbusqueda.dato.value;
ajax=objetoAjax();
	ajax.open("POST", "busqueda22Boleta.php",true);	
	resul.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}//alert("hola");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus)}	
	function buscarDatoContrato(){
	resul = document.getElementById('resultadoBusqueda');
	bus=document.frmbusqueda.dato.value;
ajax=objetoAjax();
	ajax.open("POST", "busqueda22Contrato.php",true);	
	resul.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}//alert("hola");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus)}	
function buscarClienteFactura(){
	resul = document.getElementById('resultadoBusqueda2');
	bus=document.frmbusqueda2.dato.value;
	dedonde=document.frmbusqueda2.dedoc.value;
	
ajax=objetoAjax();
	ajax.open("POST","busquedaClienteFactura2php.php",true);
	resul.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}//alert("hola");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus+"&dedo="+dedonde)
 }	
 function buscarUsuario(){
	resul = document.getElementById('resultadoBusqueda2');
	bus=document.frmbusqueda2.dato.value;
	dedonde=document.frmbusqueda2.dedoc.value;
	
ajax=objetoAjax();
	ajax.open("POST","BusquedaUsuario.php",true);
	resul.innerHTML= '<img src="../imagenes/32x32/image_edit.png">'; 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}//alert("hola");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus+"&dedo="+dedonde)
 }
  function buscarDistrito(){
	resul = document.getElementById('resultadoBusqueda2Distrito');
	bus=document.frmbusqueda2Distritos.dato.value;
	dedonde=document.frmbusqueda2Distritos.dedoc.value;
	
ajax=objetoAjax();
	ajax.open("POST","BusquedaDistrito.php",true);
	resul.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}//alert("hola");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus+"&dedo="+dedonde)
 }
//compras
function compras(){
	idCuenta = 1;
	divContenido = document.getElementById('detalle3');
	ajax=objetoAjax();
	ajax.open("POST","listarCompras.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	
	}
//
//ayta
function imagenProducto(idProducto){
	divContenido = document.getElementById('imagenpro');
	ajax=objetoAjax();
	ajax.open("POST","consultarProductosImagen.php");
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idProducto)	//en realidad para na esto
 //	alert(idProducto); 
}
//ayta end
function gestionarP(){
	idCuenta = 1;
	divContenido = document.getElementById('detalle3');
	ajax=objetoAjax();
	ajax.open("POST","consultarProductos.php");
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function gestionarTipoUsuario(){
	idCuenta = 1;  
	divContenido = document.getElementById('listarTU');
	ajax=objetoAjax();
	ajax.open("POST","consultarTU.php"); 
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function gestionarLocalUsuario(){
	idCuenta = 1;  
	divContenido = document.getElementById('listarUsLo');
	ajax=objetoAjax();
	ajax.open("POST","consultarUsLo.php"); 
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function gestionarPagos(){
	idCuenta = 1;  
	divContenido = document.getElementById('listarPago');
	ajax=objetoAjax();
	ajax.open("POST","consultarPagos.php"); 
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function gestionarLocal(){
	idCuenta = 1;  
	divContenido = document.getElementById('listarLO');
	ajax=objetoAjax();
	ajax.open("POST","consultarLO.php"); 
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function gestionarDS(){
	idCuenta = 1;  
	divContenido = document.getElementById('listarDS');
	ajax=objetoAjax();
	ajax.open("POST","consultarDS.php"); 
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function gestionarPro(){
	idCuenta = 1;
	divContenido = document.getElementById('detalle3');
	ajax=objetoAjax();
	ajax.open("POST","consultarProvedores.php");
		divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function gestionarServ(){
	idCuenta = 1;
	divContenido = document.getElementById('listarServicios');
	ajax=objetoAjax();
	ajax.open("POST","consultarServicios.php");
		divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function gestionarCliente(){
	idCuenta = 1;
	divContenido = document.getElementById('listacliente');
	ajax=objetoAjax();
	ajax.open("POST","consultarClientes.php");
		divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function gestionarPersonal(){
	idCuenta = 1;
	divContenido = document.getElementById('listarPer');
	ajax=objetoAjax();
	ajax.open("POST","consultarPersonal.php");
		divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function gestionarGui(){
	idCuenta = 1;
	divContenido = document.getElementById('detalle72');
	ajax=objetoAjax();
	ajax.open("POST","consultarGuias.php");
		divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function gestionarDocumento(){
	idCuenta = 1;
	divContenido = document.getElementById('listarDocumentos');
	ajax=objetoAjax(); 
	ajax.open("POST","consultarDocumentos.php");
		divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	//en realidad para na esto
	}
	
function gestionartipoP(){
	idCuenta = 1;
	divContenido = document.getElementById('detalle3');
	ajax=objetoAjax();
	ajax.open("POST","consultarTipoProductos.php");
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
	if(ajax.readyState ==4){//alert(idCuenta); 
	divContenido.innerHTML=ajax.responseText}}
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
        ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function listarPersonalUtc(){
	idCuenta = 1;
	divContenido = document.getElementById('lista_personal');
	ajax=objetoAjax();
      
	ajax.open("POST","consultarPersonalUtc.php");
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
	if(ajax.readyState ==4){//alert(idCuenta); 
	divContenido.innerHTML=ajax.responseText}}
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
        ajax.send("id="+idCuenta)	//en realidad para na esto
	}
        function listarUbigeosUtc(){
	idCuenta = 1;
	divContenido = document.getElementById('lista_ubigeo');
	ajax=objetoAjax();
  
	ajax.open("POST","consultarUbigeoUtc.php");
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
	if(ajax.readyState ==4){//alert(idCuenta); 
	divContenido.innerHTML=ajax.responseText}}
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
        ajax.send("id="+idCuenta)	//en realidad para na esto
	}
        function listarDistritosAsignados(){
	idCuenta = 1;
	divContenido = document.getElementById('lista_distritos_asignados');
	ajax=objetoAjax();
  
	ajax.open("POST","consultarDistritosAsignados.php");
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
	if(ajax.readyState ==4){//alert(idCuenta); 
	divContenido.innerHTML=ajax.responseText}}
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
        ajax.send("id="+idCuenta)	//en realidad para na esto
	}
        function listarFormatos(){
	idCuenta = 1;
	divContenido = document.getElementById('lista_formatos');
	ajax=objetoAjax();
  	ajax.open("POST","consultarFormatos.php");
	divContenido.innerHTML= '<img src="../imagenes/cargar.gif">'; 
	ajax.onreadystatechange=function(){
	if(ajax.readyState ==4){//alert(idCuenta); 
	divContenido.innerHTML=ajax.responseText}}
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
        ajax.send("id="+idCuenta)	//en realidad para na esto
	}
function eliminarProducto(idProducto){
    var eliminar = confirm("De verdad desea Eliminar el Producto?")
	if (eliminar){
		divContenido = document.getElementById('detalle3');
	ajax=objetoAjax();
	ajax.open("POST","eliminarProductos.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idProducto)	
	}}
function eliminarDS(idcliente){
		divContenido = document.getElementById('listarDS');
                var eliminar = confirm("De verdad desea Eliminar Documento de Servicio?")
if (eliminar){
	ajax=objetoAjax();
	ajax.open("POST","eliminandoDocumentoservicio.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idcliente)	
	}}
function eliminarDocumento(idcliente){
		divContenido = document.getElementById('listarDocumentos');
                var eliminar = confirm("De verdad desea Eliminar Documento?")
if (eliminar){
	ajax=objetoAjax();
	ajax.open("POST","eliminarDocumento.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idcliente)	
	}}
function eliminarCliente(idcliente){
      var eliminar = confirm("De verdad desea Eliminar Cliente?")
	if (eliminar){
		divContenido = document.getElementById('listacliente');
	ajax=objetoAjax();
	ajax.open("POST","eliminarCliente.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idcliente)	
	}}
 function eliminarProductobuscado(idProducto){
   
		divContenido = document.getElementById('men');
	ajax=objetoAjax();
	ajax.open("POST","eliminarProductos.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//   alert(idProducto);
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idProducto)	
	}       
function eliminarTipoProducto(idProducto){
     var eliminar = confirm("De verdad desea Eliminar Categoria?")
	if (eliminar){
		divContenido = document.getElementById('detalle3');
	ajax=objetoAjax(); 
	ajax.open("POST","eliminarTipoProductos.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idProducto)	
	}}
function eliminarProveedor(idProducto){
		divContenido = document.getElementById('detalle3');
                var eliminar = confirm("De verdad desea Eliminar Proveedor?")
	if (eliminar){
	ajax=objetoAjax(); 
	ajax.open("POST","eliminandoProveedor.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idProducto);
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idProducto)	
	}}
function eliminarGuia(idProducto){
    var eliminar = confirm("De verdad desea Eliminar Guia?")
	if (eliminar){
		divContenido = document.getElementById('detalle72');
	ajax=objetoAjax(); 
	ajax.open("POST","eliminandoGuia.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idProducto);
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idProducto)	
	}}
function atender(idCompra){
		divContenido = document.getElementById('detalle3');
	ajax=objetoAjax();
	ajax.open("POST","atenderCompra.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){//alert(idCuenta); 
		divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCompra)	
	}		
function consultaCuenta(idCuenta){
	divContenido = document.getElementById('detalle');
	ajax=objetoAjax();
	ajax.open("POST","consultarCuentaAdmin.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){/*alert(idCuenta);*/
			divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCuenta)	
	}
function registrarCliente(){ //alert("hola"); 
var nombreCliente =document.getElementById("NombreComprador").value;
var emailCliente =document.getElementById("EmailComprador").value;
var paisCliente =document.getElementById("pais").value;
var idCliente =document.getElementById("idCliente").value;
var tipoc =document.getElementById("tipoc1").value;
var montoo =document.getElementById("monto").value;
var fecha =document.getElementById("fecha1").value;
var IDproducto =document.getElementById("idp").value;
divContenido = document.getElementById('mensaje');
	ajax=objetoAjax();
	ajax.open("POST","registranDocliente.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("id="+idCliente+"&nom="+nombreCliente+"&ema="+emailCliente+"&pai="+paisCliente+"&tipo="+tipoc+"&mon="+montoo+"&fecha2="+fecha+"&idproduc="+IDproducto)	
	}
function registrarAquien(){ //alert("hola"); 
var idusuario =document.getElementById("idusuario").value;//losaco de un hidden generado registrarCliente
var nombre1 =document.getElementById("nombre1").value;
var nombre2 =document.getElementById("nombre2").value;
var emailAquien =document.getElementById("aquienDedicaEmail").value;
var mensaje =document.getElementById("aquienDedicaMensaje").value;
divContenido = document.getElementById('mensaje2');
	ajax=objetoAjax();
	ajax.open("POST","registrandoDedicatoria.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("idu="+idusuario+"&nom="+nombre1+"&ema="+emailAquien+"&nom2="+nombre2+"&men="+mensaje)	
	}
function guardacompra(){ alert("hola");/* 
var idusuario =document.getElementById("idusuario").value;//losaco de un hidden generado registrarCliente
var nombre1 =document.getElementById("nombre1").value;
var nombre2 =document.getElementById("nombre2").value;
var emailAquien =document.getElementById("aquienDedicaEmail").value;
var mensaje =document.getElementById("aquienDedicaMensaje").value;
divContenido = document.getElementById('mensaje2');
	ajax=objetoAjax();
	ajax.open("POST","registrandoDedicatoria.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		
	 ajax.send("idu="+idusuario+"&nom="+nombre1+"&ema="+emailAquien+"&nom2="+nombre2+"&men="+mensaje)	
	*/}

function pedirDatosCuenta(idUsuario){
	divContenido = document.getElementById('detalle');
	ajax=objetoAjax();
	ajax.open("POST","modificarCuentaAdmin.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}	
function pedirDatosdetallepago(idUsuario){
	divContenido = document.getElementById('listarDetallePago');
	ajax=objetoAjax();
	ajax.open("POST","consultarDetallePago.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}
function pedirDatosServicio(idUsuario){
	divContenido = document.getElementById('editServicios');
	ajax=objetoAjax();
	ajax.open("POST","modificarServicio.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}
function pedirDatosTU(idUsuario){
	divContenido = document.getElementById('editTU');
	ajax=objetoAjax();
	ajax.open("POST","modificarTU.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}	
function pedirDatosUsLo(idUsuario){
	divContenido = document.getElementById('editUsLo');
	ajax=objetoAjax();
	ajax.open("POST","modificarUsLO.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);
}
function pedirDatosLO(idUsuario){
	divContenido = document.getElementById('editLO');
	ajax=objetoAjax();
	ajax.open("POST","modificarLO.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);
}
/*	alert(idUsuario);*/
function pedirDatosDS(idUsuario){
	divContenido = document.getElementById('editDS');
	ajax=objetoAjax();
	ajax.open("POST","modificarDS.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}	
function pedirDatosUsuario(idUsuario){
	divContenido = document.getElementById('editPer');
	ajax=objetoAjax();
	ajax.open("POST","modificarUsuarios.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}	
function pedirDatosTipoProducto(idUsuario){
	divContenido = document.getElementById('detalle4');
	ajax=objetoAjax();//chekar donde se mostrar�"""""""""""
	ajax.open("POST","modificarTipoProducto.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}	
function pedirDatosProducto(idUsuario){
	divContenido = document.getElementById('detalle5');
	ajax=objetoAjax();//chekar donde se mostrar�"""""""""""
	ajax.open("POST","modificarProducto.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}	
function pedirDatosPersonalUtc(idUsuario){
	divContenido = document.getElementById('formulario_personal');
	ajax=objetoAjax();//chekar donde se mostrar�"""""""""""
	ajax.open("POST","modificarPersonalUtc.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}	
function pedirDatosDocumentos(idUsuario){
	divContenido = document.getElementById('editDocumentos');
	ajax=objetoAjax();//chekar donde se mostrar�"""""""""""
	ajax.open("POST","modificarDocumento.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}	
function pedirDatosProveedor(idUsuario){
	divContenido = document.getElementById('detalle62');
	ajax=objetoAjax();//chekar donde se mostrar�"""""""""""
	ajax.open("POST","modificarproveedor.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}		
function pedirDatosGuia(idUsuario){
	divContenido = document.getElementById('detalle73');
	ajax=objetoAjax();//chekar donde se mostrar�"""""""""""
	ajax.open("POST","modificarGuia.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idUsuario);		
/*	alert(idUsuario);*/
	}		
function pedirDatosCliente(idcliente){
	divContenido = document.getElementById('listacliente-editar');
	ajax=objetoAjax();//chekar donde se mostrar�"""""""""""
	ajax.open("POST","modificarCliente.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState ==4){
			divContenido.innerHTML=ajax.responseText}}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+idcliente);		
/*	alert(idUsuario);*/
	}		
/*carrito-end*/
function previo(idArticulo1){
	divResultado=  document.getElementById('previo');
	ajax=objetoAjax();
	ajax.open('POST','Articuloprevio.php',true);

	ajax.onreadystatechange=function(){
if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida
divResultado.innerHTML = ajax.responseText
//}
}}

ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("idArticulo="+idArticulo1)
//alert(idArticulo1);
	}
function PaginaDS(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('listarDS');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarDS.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
function PaginaLO(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('listarLO');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarLO.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
function Pagina(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('detalle3');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarProductos.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
function Paginaservicio(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('listarServicios');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarServicios.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
    function PaginaUbigeo(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('lista_ubigeo');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarUbigeoUtc.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
function PaginaUsuario(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('listarPer');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarPersonal.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
//paginar documentos de producto
function PaginaDocumento(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('listarDocumentos');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarDocumentos.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
//    paginar documentos de propducto end
//paginar fecha de producto
function Paginafecha(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('productos_caducos');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'fecha.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
//    paginar fecha de propducto end
function PaginaTipoProducto(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('detalle3');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarTipoProductos.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
function Paginaprove(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('detalle3');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarProvedores.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
function PaginaTU(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('listarTU');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarTU.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
function Paginaguia(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('detalle72');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarGuias.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
    
    
    function PersonalUtcPaginacion(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('lista_personal');
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultarPersonalUtc.php?pag='+nropagina);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)}
    
//dejar de promocionarproducto.php
function promocionar(promocionado){
divResultado=  document.getElementById('promocionar');

var eliminar = confirm("De verdad desea Dejar de Promocionar el Producto?")
if (eliminar){
//id=document.formulario.productos.value;	//XMLHttpRequest.open ( sMetodo, sURL [, bSincronia [, sUsuario [, sPwd ] ] ] );
ajax=objetoAjax();
//alert(idproductox);
//ajax.open(�POST�, �ejemploajax2.php�,true);
ajax.open('POST','dejardepromocionar.php',true);
//ajax.open(�GET�, �ejemploajax2.php?t1=�+t1+�&t2=�+t2,true);
//ajax.Open("GET","dejardepromocionar.php?idProducto="+idproductox,true);

ajax.onreadystatechange=function(){
if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida
divResultado.innerHTML = ajax.responseText
//}
}}

ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("idProducto="+promocionado)
//ajax.send(�t1=�+t1+�&t2=�+t2) //post
//ajax.send(null)
}} 
//promoxionarproducto.php
function promoxionar(promoxionado){// alert(promoxionado);
divResultado=  document.getElementById('promocionar');

var eliminar = confirm("De verdad desea  Promocionar el Producto?")
if (eliminar){
//id=document.formulario.productos.value;	//XMLHttpRequest.open ( sMetodo, sURL [, bSincronia [, sUsuario [, sPwd ] ] ] );
ajax=objetoAjax();
//alert(idproductox);
//ajax.open(�POST�, �ejemploajax2.php�,true);
ajax.open('POST','promocionando.php',true); 
//ajax.open(�GET�, �ejemploajax2.php?t1=�+t1+�&t2=�+t2,true);
//ajax.Open("GET","dejardepromocionar.php?idProducto="+idproductox,true);

ajax.onreadystatechange=function(){
if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida	
divResultado.innerHTML = ajax.responseText
//}
}}

ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("idProducto="+promoxionado)
//ajax.send(�t1=�+t1+�&t2=�+t2) //post
//ajax.send(null)
}} 
function eliminarServicio(idadticulo) {
var eliminar = confirm("De verdad desea Eliminar Servicio?")
	if (eliminar){
//	alert(idadticulo);
	divResultado=  document.getElementById('listarServicios');
	ajax=objetoAjax();
	ajax.open('POST','EliminandoServicio.php',true); 
    ajax.onreadystatechange=function(){
    if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida	
     divResultado.innerHTML = ajax.responseText
//}
}}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("id="+idadticulo)
//ajax.send(�t1=�+t1+�&t2=�+t2) //post
//ajax.send(null)
}
	
	}
function EliminaArticulo(idadticulo) {
var eliminar = confirm("De verdad desea Dejar de Promocionar el Producto?")
	if (eliminar){
//	alert(idadticulo);
	divResultado=  document.getElementById('DivMostarArticulos');
	ajax=objetoAjax();
	ajax.open('POST','EliminandoArticulo.php',true); 
    ajax.onreadystatechange=function(){
    if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida	
     divResultado.innerHTML = ajax.responseText
//}
}}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("idArticulo="+idadticulo)
//ajax.send(�t1=�+t1+�&t2=�+t2) //post
//ajax.send(null)
}
	
	}
function eliminarUsuario(idadticulo) {
var eliminar = confirm("De verdad desea Eliminar el Usuario/ Personal")
	if (eliminar){
//	alert(idadticulo);
	divResultado=  document.getElementById('editPer');
	ajax=objetoAjax();
	ajax.open('POST','EliminandoPersonal.php',true); 
    ajax.onreadystatechange=function(){
    if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida	
     divResultado.innerHTML = ajax.responseText
//}
}}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("id="+idadticulo)
//ajax.send(�t1=�+t1+�&t2=�+t2) //post
//ajax.send(null)
}
	
	}
        function eliminarUsLo(idadticulo) {
var eliminar = confirm("De verdad desea Eliminar el Usuario del LOCAL?")
	if (eliminar){
//	alert(idadticulo);
	divResultado=  document.getElementById('editUsLo');
	ajax=objetoAjax();
	ajax.open('POST','EliminandousLO.php',true); 
    ajax.onreadystatechange=function(){
    if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida	
     divResultado.innerHTML = ajax.responseText
//}
}}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("id="+idadticulo)
//ajax.send(�t1=�+t1+�&t2=�+t2) //post
//ajax.send(null)
}
	
	}
        function eliminarLO(idadticulo) {
var eliminar = confirm("De verdad desea Eliminar el LOCAL?")
	if (eliminar){
//	alert(idadticulo);
	divResultado=  document.getElementById('editLO');
	ajax=objetoAjax();
	ajax.open('POST','EliminandoLO.php',true); 
    ajax.onreadystatechange=function(){
    if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida	
     divResultado.innerHTML = ajax.responseText
//}
}}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("id="+idadticulo)
//ajax.send(�t1=�+t1+�&t2=�+t2) //post
//ajax.send(null)
}
	
	}
        function eliminarTU(idadticulo) {
var eliminar = confirm("De verdad desea Eliminar el Tipo de Usuario ")
	if (eliminar){
//	alert(idadticulo);
	divResultado=  document.getElementById('editTU');
	ajax=objetoAjax();
	ajax.open('POST','EliminandoTU.php',true); 
    ajax.onreadystatechange=function(){
    if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida	
     divResultado.innerHTML = ajax.responseText
//}
}}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("id="+idadticulo)
//ajax.send(�t1=�+t1+�&t2=�+t2) //post
//ajax.send(null)
}
	
	}
function editarArticulo(idadticulo) {
var eliminar = confirm("De verdad desea Dejar de Promocionar el Producto?")
	if (eliminar){
	//alert(idadticulo);
	divResultado=  document.getElementById('previo');
	ajax=objetoAjax();
	ajax.open('POST','editandoarticulo.php',true); 
    ajax.onreadystatechange=function(){
    if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida	
     divResultado.innerHTML = ajax.responseText
//}
}}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("idArticulo="+idadticulo)
//ajax.send(�t1=�+t1+�&t2=�+t2) //post
//ajax.send(null)
}
	
	}
 
     function mostrarfecha() 
{var indice = document.registroproductos.guias1.selectedIndex;
    var valor = document.registroproductos.guias1.options[indice].value;  
     //alert(valor);
	divContenido = document.getElementById('fechaguia');
	ajax=objetoAjax();
	ajax.open('GET', 'consultafechaguia.php?idp='+valor);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				divContenido.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)

 }
 function ventanaNueva(){ 
	window.open('nueva.html','nuevaVentana','width=300, height=400')
}
     function mostrarfecha2() 
{ 
var indice = document.autoSumForm.guias1.selectedIndex;//selectedIndex : Es el índice de la opción que se encuentra seleccionada. 
    var valor = document.autoSumForm.guias1.options[indice].value; //options:Un array con
                                    //       cada una de las opciones del select.
                                    
      //alert(indice+"valor"+valor);
	divContenido = document.getElementById('fechaguia');
        //divContenido = document.registroproductos.fechaguia.value;
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultafechaguia.php?idp='+valor);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)
	//texto += "\nValor de la opcion escogida: " + valor
 }
      function mostrarGrafica() 
{//var indice = document.frmdocumentodatos.documento.selectedIndex;
      var fini = document.entrefechas.fecha_ingreso.value;  
      var ffin = document.entrefechas.fecha_caducidad.value;  
     
	divContenido = document.getElementById('mostrarGrafi');
        //divContenido = document.registroproductos.fechaguia.value;
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'alphabarex1.php?f1='+fini+'&f2='+ffin);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
  alert(fini);
      alert(ffin);
	ajax.send(null)
	 
 }
      function mostrardatosDocumento() 
{var indice = document.frmdocumentodatos.documento.selectedIndex;
    var valor = document.frmdocumentodatos.documento.options[indice].value;  
     //alert(valor);
	divContenido = document.getElementById('datosdocumento');
        //divContenido = document.registroproductos.fechaguia.value;
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open('GET', 'consultadatosdocumento.php?idp='+valor+'&dedoc='+1);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	ajax.send(null)
	//texto += "\nValor de la opcion escogida: " + valor
 }
 
       function MostrarCoordinador() 
{ 
    var indice = document.form_personal_utc.tipoUsuario.selectedIndex;
    var valor = document.form_personal_utc.tipoUsuario.options[indice].value; 
  	divContenido = document.getElementById('MostrarCorrdinadorDiv');
	ajax=objetoAjax();
	ajax.open('GET', 'consultaSelectCoordinadores.php?idp='+valor+'&dedoc='+1);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divContenido.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
 }
 
      function mostrarSelectActividades() 
{ 
    var indice = document.componentesConsulta.idcomponentes_bd.selectedIndex;
    var valor = document.componentesConsulta.idcomponentes_bd.options[indice].value;  
	divContenido = document.getElementById('selectActividades');
	ajax=objetoAjax();
	ajax.open('GET', 'consultaSelectActividades.php?idp='+valor+'&dedoc='+1);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divContenido.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
 }
      function mostrarSelectIndicadores() 
{ 
    var indice = document.componentesConsulta.idactividades_bd.selectedIndex;
    var valor = document.componentesConsulta.idactividades_bd.options[indice].value;  
//     alert(valor);
	divContenido = document.getElementById('selectIndicadores');
	ajax=objetoAjax();
	ajax.open('GET', 'consultaSelectIndicadores.php?idp='+valor+'&dedoc='+1);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
		divContenido.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
 }
      function AgregarSesionIndicador() 
{ 
    var indice = document.componentesConsulta.idindicadores_bd.selectedIndex;
    var valor = document.componentesConsulta.idindicadores_bd.options[indice].value;  
//     alert(valor);
	//divContenido = document.getElementById('selectIndicadores');//////////mostrar sesiones///////////////borrar cambiar
	ajax=objetoAjax();
	ajax.open('GET', 'addSesionIndicador.php?idp='+valor+'&dedoc='+1);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
		divContenido.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
 }
 
       function AgregarSesionCt() 
{ 
    var indice = document.ctConsulta.cordinador.selectedIndex;
    var valor = document.ctConsulta.cordinador.options[indice].value;  
//     alert(valor);
	 divContenido = document.getElementById('contenedorID');//////////mostrar sesiones///////////////borrar cambiar
	ajax=objetoAjax();
	ajax.open('GET', 'addSesionCt.php?idp='+valor+'&dedoc='+1);
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
		divContenido.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
 }
function imprimir(id)
    {alert("hola");
        var imp;
        imp = window.open(" ","Formato de Impresion"); 
        imp.document.open(); 
        imp.document.append('style: ...'); 
        imp.document.append($('#'+id).html());
        imp.document.close();
        imp.print();   
        imp.close(); 
    }
    
    function confirmar()/*para comparar claves nueva clave  modificar para la bd*/
{ 
 
//var confirmar = confirm("De verdad desea Dejar de Promocionar el Producto?")
	//if (confirmar){
	//alert(idadticulo);
        id=document.FormClave.textfield0.value;
	divResultado=  document.getElementById('confirmar');
	ajax=objetoAjax();
	ajax.open('POST','consultandoClaveAnterior.php',true); 
    ajax.onreadystatechange=function(){
    if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida	
     divResultado.innerHTML = ajax.responseText
//}
}}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("id="+id)
//ajax.send(�t1=�+t1+�&t2=�+t2) //post
//ajax.send(null)
//}
	
	 
  /* confirmar=confirm("TIENE QUE VOLVER A INICIAR SESION CON SU NUEVA CLAVE");
    if (confirmar==true){ 
 document.form2.submit();} 
else  {return false;}
*/
} 

    function viendostock()/*para comparar claves nueva clave  modificar para la bd*/
{  mumero=document.frmagregarcarro.cantidad.value;
    alert(1);
 
//var confirmar = confirm("De verdad desea Dejar de Promocionar el Producto?")
	//if (confirmar){
	//alert(idadticulo);
        id=document.FormClave.textfield0.value;
	divResultado=  document.getElementById('confirmar');
	ajax=objetoAjax();
	ajax.open('POST','consultandoClaveAnterior.php',true); 
    ajax.onreadystatechange=function(){
    if(ajax.readyState==4){// se a recibido respuesta del servidor?
//if(ajax.status == 200){ //comprovar si la respuesta es valida	
     divResultado.innerHTML = ajax.responseText
//}
}}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
ajax.send("id="+id)
//ajax.send(�t1=�+t1+�&t2=�+t2) //post
//ajax.send(null)
//}
	
	 
  /* confirmar=confirm("TIENE QUE VOLVER A INICIAR SESION CON SU NUEVA CLAVE");
    if (confirmar==true){ 
 document.form2.submit();} 
else  {return false;}
*/
}
/* validacion de datos*/
	var demo_mode = false; // set to false to allow form submit
function checkFieldTask (aFieldName) {
        var bool = true;
        switch (aFieldName) {
                /*
                        checkFieldTask() customization instructions:

                        1. Hacer un nuevo "case" por cada campo que deseas validar.
                        2. Coloca tu validacion dentro de la sentencia "if"
                        3. Llama la funcion "failField" cuando la validacion falla, muestra un mensaje de error.
                        4. Configurar la variable "bool=false" cuando la validacion falló.
                        5. Llama la funcion "passField" cuando la validacion fue correcta.
                */
                case "codigoProducto":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>El nombre de usuario no puede estar vacío.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "cadenatexto":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir Descripcion o nombre.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "txtPrecio":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir Precio.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "txtPrecioMayorista":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir Precio Compra.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "txtCantidad":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir Cantidad.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "nombredocumento":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "nombreservicio":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "numeroserie":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "rango1":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "rango2":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "numeroactual":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "RucProvedor":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "textNomProvedor":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "textTeleProvdor":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "textDescriProvedor":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "numeroguia":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "nombre":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "dni":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "direccion":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "telefono1":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "nombre_tipo_usuario":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "observacion_tipo_usuario":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "nombreusuario":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "dniusuario":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "nickusuario":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "passusuario":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "emailusuario":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "telefonousuario":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "celularusuario":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "direccionusuario":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "nombre_local":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "ciudad_local":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "departamento_local":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "direccion_local":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "telefono_local":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
                case "txtNombreCategoria":
                        if ($("#"+aFieldName).val()=="") {
                                failField(aFieldName,"<div style='color:red;'>Debes introducir dato.</div>");
                                bool = false;
                        } else {
                                passField(aFieldName);
                        }
                        break;
        }
        return bool;
}
function checkField (aField) {
        return checkFieldTask(aField.name);
}
function checkForm (aForm) {
        var bool = true;
        for (var i=0; i < aForm.elements.length; i++) {
                if (!checkFieldTask(aForm.elements[i].name)) {
                        bool = false;
                }
        }
        if (bool) {
                passField("subbtn");
                if (demo_mode) {
                        $("#myform").hide(250);
                        $("#instructions").html('Buen trabajo. <a href="#" onclick="demoShowForm();return false;">Mostrar formulario nuevamente</a>');
                        return false;
                }
        } else {
                failField("subbtn","Por favor resuelva los errores para procesar el formulario.");
        }
        return bool;
}
function passField (aFieldName) {
        $("#form_alert_"+aFieldName+"_msg").remove();
}
function failField (aFieldName,msg) {
        $("#form_alert_"+aFieldName+"_msg").remove(); // in case there are any from last time
        $("#"+aFieldName).after(alertMsgHTML(aFieldName,msg));
}
function alertMsgHTML (aFieldName, msg) {
        return '<div id="form_alert_'+aFieldName+'_msg" class="form_alert_msg">'+msg+'</div>';
}
function demoShowForm () {
        $("#instructions").text("Deja los campos en blanco y presiona tab o enviar y se reportará un error.");
        $("#myform").show(250);
}
$(document).ready(function(){
   document.myform.field1.focus();
});

/* validacion de datos end*/

	
	