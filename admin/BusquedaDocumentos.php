<?php
ob_start("ob_gzhandler"); 
session_start();
include 'login.php';
include("../func/funciones.php");
$busqueda=$_POST['busqueda'];
$dedonde=$_POST['dedo'];
$idusuarioPotencial=$_POST['idusuarioSistema'];
//#modificado x  www.kuraka.net  -  mmq 
#modificado x  www.kuraka.net  -  mmq - 2015
//mmq 2017 aca tenemosque sacar el ubigeodel usuario del sistema para en la cadena hacer where con ese id ubigeo
$sacaUbigeo= dime("select du.distritos_ubigeo_iddistritos_ubigeo FROM usuarios as  u inner join usuarios_has_distritos_ubigeo as du on
u.idusuarios=du.idusuarios where u.idusuarios='$idusuarioPotencial' ");
while ($row = mysql_fetch_array($sacaUbigeo)) {
     $ubi=$row[distritos_ubigeo_iddistritos_ubigeo];
}
if ($busqueda<>''){
	//CUENTA EL NUMERO DE PALABRAS
	$trozos=explode(" ",$busqueda);
	$numero=count($trozos);
//	echo $numero;
	if ($numero==1) {
            
		//SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
		$cadbusca="SELECT id,`nombreDocumento_bd`,iddistritos_ubigeo,`detalleDocumento_bd`,`idUsuario_p65`,fecha_de_digitacion,estado_documento_bd FROM documentos_bd as u 
where   u.iddistritos_ubigeo ='$ubi' and (u.nombreDocumento_bd LIKE '%$busqueda%' 
OR u.detalleDocumento_bd LIKE '%$busqueda%')LIMIT 10";	
	} elseif ($numero>1) {
		//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
		//busqueda de frases con mas de una palabra y un algoritmo especializado
		$cadbusca="SELECT id,`nombreDocumento_bd`,iddistritos_ubigeo,`detalleDocumento_bd`,`idUsuario_p65`,fecha_de_digitacion,estado_documento_bd FROM documentos_bd as u 
where   u.iddistritos_ubigeo ='$ubi' and (u.nombreDocumento_bd LIKE '%$busqueda%' 
OR u.detalleDocumento_bd LIKE '%$busqueda%')LIMIT 10";	
		/*$cadbusca="SELECT * , MATCH ( nombre_producto, descripcion_producto ) 
                 * AGAINST ( '$busqueda' ) AS Score FROM productos 
                 * WHERE MATCH ( nombre_producto, descripcion_producto ) AGAINST ( '$busqueda' ) ORDER BY Score DESC LIMIT 50;";*/
	}
	function limitarPalabras($cadena, $longitud, $elipsis = "..."){
		$palabras = explode(' ', $cadena);
		if (count($palabras) > $longitud)
			return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
		else
			return $cadena;#
	}

	#echo $cadbusca; onclick='pedirDatosPotencial_func(".$guia['idusuario_p65'].  ")'
	$resultado =dime($cadbusca)or die(ovni("busqueda:"));
	while($filas=mysql_fetch_array($resultado)){
				#qui meto el if y variables cadena
            echo"<a  style='cursor:pointer; text-decoration:underline; float:left; margin: 7px;' onclick='pedirDatosDocumentos_func(".$filas['id'].")'>
         <img src='../images/32x32/image_edit.png' width='32' height='32'></a> Nombres:".$filas['nombreDocumento_bd']." "
                    . " ".$filas['fecha_de_digitacion']." ".$filas['detalleDocumento_bd']."<br><br><br>";
     
		}
}


