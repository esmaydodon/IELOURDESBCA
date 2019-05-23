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
		$cadbusca="select du.iddistritos_ubigeo,du.nombre_distrito_provincia_bd,
du.pertenece_ubigeo,u.nombre_ubigeo_bd  from distritos_ubigeo as du 
inner join ubigeos as u on
du.idubigeos=u.idubigeos where    du.nombre_distrito_provincia_bd LIKE '%$busqueda%' LIMIT 10";	
	} elseif ($numero>1) {
		//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
		//busqueda de frases con mas de una palabra y un algoritmo especializado
		$cadbusca="select du.iddistritos_ubigeo,du.nombre_distrito_provincia_bd,
du.pertenece_ubigeo,u.nombre_ubigeo_bd  from distritos_ubigeo as du 
inner join ubigeos as u on
du.idubigeos=u.idubigeos where  du.nombre_distrito_provincia_bd LIKE '%$busqueda%' LIMIT 10";	
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
if(!$distrito || !isset($distrito[md5($filas['iddistritos_ubigeo'])]['identificador']) || 
	$distrito[md5($filas['iddistritos_ubigeo'])]['identificador']!= md5($filas['iddistritos_ubigeo']))
    { 
$cadenaAgregarQuitar="<a href='agregadistrito.php?SID&id=".$filas['iddistritos_ubigeo']."&dedo=".$dedonde."'>
<img src='../images/productonoagregado.gif' border='0' title='Seleccionar'></a>";
		}else{
$cadenaAgregarQuitar="<a href='borracardistrito.php?SID&id=".$filas['iddistritos_ubigeo']."&dedo=".$dedonde."'>
<img src='../images/trash.gif' border='0' title='Agregar al Carrito'></a>";		
	}
         
            
            echo"Nombre:".$filas['nombre_distrito_provincia_bd']."<br>
                Tipo:".$filas['nombre_ubigeo_bd'].$cadenaAgregarQuitar."<br>";
     
		}
}
?>