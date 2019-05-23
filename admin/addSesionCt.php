<?php
session_start(); extract($_REQUEST); 
if(!isset($cantidad)){$cantidad=1;} 
$dedonde=$_GET["dedoc"];
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include("../func/funciones.php");
include('login.php');
$idp = $_GET['idp'];
$cadena="  select  *  from usuarios  where idusuarios =".$idp."";
$consultafechaguia=dime($cadena);
 $fecha = mysql_fetch_array($consultafechaguia) ; 
 if(isset($_SESSION['ct'])) 
$ct=$_SESSION['ct']; 
  $ct[md5($idp)]=array('idusuarios'=>md5($idp), 
			'idusuarios'=>$idp,
	     		'nombre_usuario'=>$fecha['nombre_usuario']
			); 
 $_SESSION['ct']=$ct;
//echo"  <input type='text' name='fechaguia' size='10' maxlength='5' value='".$cadena."'  />";
 echo"<input type='text' name='idusuariosct' id='idusuariosct' value='".$fecha['nombre_usuario']."' />";
?>