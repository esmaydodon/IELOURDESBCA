<?php
session_start(); extract($_REQUEST); 
if(!isset($cantidad)){$cantidad=1;} 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include("../func/funciones.php");
$dedonde=1;
$idp = $_GET['idp'];
$cadena="  select  *  from indicadores_bd  where idindicadores_bd =".$idp."";
$consultafechaguia=dime($cadena);
 $fecha = mysql_fetch_array($consultafechaguia) ; 
 if(isset($_SESSION['indicador'])) 
$indicador=$_SESSION['indicador']; 
  $indicador[md5($idp)]=array('idindicadores_bd'=>md5($idp), 
			'idindicadores_bd'=>$idp,
	     		'nombre_indicadores_bd'=>$fecha['nombre_indicadores_bd']
			); 
 $_SESSION['indicador']=$indicador;
?>