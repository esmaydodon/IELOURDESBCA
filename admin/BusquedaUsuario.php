<?php
ob_start("ob_gzhandler"); 
session_start();
include("../func/funciones.php");
$busqueda=$_POST['busqueda'];
$dedonde=$_POST['dedo'];
//#modificado x  www.kuraka.net  -  mmq 
#modificado x  www.kuraka.net  -  mmq - 2015

// DEBO PREPARAR LOS TEXTOS QUE VOY A BUSCAR si la cadena existe
if ($busqueda<>''){
	//CUENTA EL NUMERO DE PALABRAS
	$trozos=explode(" ",$busqueda);
	$numero=count($trozos);
//	echo $numero;
	if ($numero==1) {
		//SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
		$cadbusca="SELECT * FROM usuarios WHERE nick_usuario LIKE '%$busqueda%' OR nombre_usuario LIKE '%$busqueda%' 
OR dni_suario LIKE '%$busqueda%' LIMIT 10";	
	} elseif ($numero>1) {
		//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
		//busqueda de frases con mas de una palabra y un algoritmo especializado
		$cadbusca="SELECT * FROM usuarios WHERE nick_usuario LIKE '%$busqueda%' OR nombre_usuario LIKE '%$busqueda%' 
OR dni_suario LIKE '%$busqueda%' LIMIT 10";	
		/*$cadbusca="SELECT * , MATCH ( nombre_producto, descripcion_producto ) AGAINST ( '$busqueda' ) AS Score FROM productos WHERE MATCH ( nombre_producto, descripcion_producto ) AGAINST ( '$busqueda' ) ORDER BY Score DESC LIMIT 50;";*/
	}
	function limitarPalabras($cadena, $longitud, $elipsis = "..."){
		$palabras = explode(' ', $cadena);
		if (count($palabras) > $longitud)
			return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
		else
			return $cadena;#
	}

	#echo $cadbusca;
	$resultado =dime($cadbusca)or die(ovni("busqueda:"));
	while($filas=mysql_fetch_array($resultado)){
				#qui meto el if y variables cadena
if(!$usuario || !isset($usuario[md5($filas['idusuarios'])]['identificador']) || 
	$usuario[md5($filas['idusuarios'])]['identificador']!= md5($filas['idusuarios']))
    { 
$cadenaAgregarQuitar="<a href='agregausuario.php?SID&id=".$filas['idusuarios']."&dedo=".$dedonde."'>
<img src='../images/productonoagregado.gif' border='0' title='Seleccionar'></a>";
		}else{
$cadenaAgregarQuitar="<a href='borracarusuario.php?SID&id=".$filas['idusuarios']."&dedo=".$dedonde."'>
<img src='../images/trash.gif' border='0' title='Agregar al Carrito'></a>";		
	}
         
            
            echo"Dni:".$filas['dni_suario']."<br>
                usuario:".$filas['nombre_usuario']."<br>
		Direccion:".$filas['direccion_usuario'].$cadenaAgregarQuitar."<br>";
     
		}
}
