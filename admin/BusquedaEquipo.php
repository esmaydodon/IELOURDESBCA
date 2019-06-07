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
#modificado por Ing. Martos - grupo www.kuraka.org - 2018 
#modificado por Ing. Martos - grupo www.kuraka.org - 2019
//mmq 2017 aca tenemosque sacar el ubigeodel usuario del sistema para en la cadena hacer where con ese id ubigeo
//$sacaUbigeo= dime("select du.distritos_ubigeo_iddistritos_ubigeo FROM usuarios as  u inner join usuarios_has_distritos_ubigeo as du on
//u.idusuarios=du.idusuarios where u.idusuarios='$idusuarioPotencial' ");
//while ($row = mysql_fetch_array($sacaUbigeo)) {
//     $ubi=$row[distritos_ubigeo_iddistritos_ubigeo];
//}
if ($busqueda<>''){
	//CUENTA EL NUMERO DE PALABRAS
	$trozos=explode(" ",$busqueda);
	$numero=count($trozos);
//	echo $numero;
	if ($numero==1) {
            
		//SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
		$cadbusca="select e.*  FROM equipos_bd as e where   e.equipos_codigo_bd LIKE '%$busqueda%' 
OR e.nombre_equipo_bd LIKE '%$busqueda%' OR e.marca_equipo_bd LIKE '%$busqueda%' OR e.modelo_equipo_bd LIKE '%$busqueda%'  OR e.serie_equipo_bd LIKE '%$busqueda%' LIMIT 10";	
	} elseif ($numero>1) {
		//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
		//busqueda de frases con mas de una palabra y un algoritmo especializado
		$cadbusca="select e.*  FROM equipos_bd as e where   e.equipos_codigo_bd LIKE '%$busqueda%' 
OR e.nombre_equipo_bd LIKE '%$busqueda%' OR e.marca_equipo_bd LIKE '%$busqueda%' OR e.modelo_equipo_bd LIKE '%$busqueda%'  OR e.serie_equipo_bd LIKE '%$busqueda%' LIMIT 10";
                
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
        $cadenatabla="<div id='myPrintArea'>
    <table width='100%' border='1' class='tabla' style=''> 
      <tr style='background-color: #30bdff;' >
         <td>ID</td>
         <td>CODIGO</td>        
         <td>NOMBRE</td>        
         <td>MARCA</td>        
         <td>MODELO</td> 
         <td>SERIE</td>  
         <td>STOCK ACTUAL</td>     
         <td>SELECCIONAR</td>     
        </tr>";
echo $cadenatabla;
	#echo $cadbusca; onclick='pedirDatosPotencial_func(".$filas['idusuario_p65'].  ")'
	$resultado =dime($cadbusca)or die(ovni("busqueda:"));
	while($filas=mysql_fetch_array($resultado)){
				#qui meto el if y variables cadena
            echo"
       
        <tr>
<td>". $filas['idequipos_bd']."</td>
<td>". $filas['equipos_codigo_bd']."</td>	
     <td>". $filas['nombre_equipo_bd']."</td>   
     <td>". $filas['marca_equipo_bd']."</td>   
     <td>". $filas['modelo_equipo_bd']."</td>   
     <td>". $filas['serie_equipo_bd']."</td>   
     <td>". $filas['stock_actual_equipo_bd']."</td> "
                    . "
      <td>
         <div id='seleciconarEquipo'>
         <a  style='cursor:pointer; text-decoration:underline; float:left; margin: 7px;' onclick='pedirDatosEquipo_func(".$filas['idequipos_bd'].")'>
         <img src='../images/32x32/image_edit.png' width='32' height='32'></a>
         </div>
      </td> 

         </tr>
      ";
     
		}
                echo"</table>";
}


