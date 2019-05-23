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
$cadenad=dime(" select * from usuarios where tipos_usuarios_idtipos_usuarios=".$idp.";");
		while($local=mysql_fetch_array($cadenad)){
    	$IdTipoUsuario=$local['tipos_usuarios_idtipos_usuarios'];
}
if ($IdTipoUsuario=='3') {
 
    $cadena=dime(" select * from usuarios where tipos_usuarios_idtipos_usuarios=2");
echo"COORDINADOR:
    <select id ='idCoordinador' name='idCoordinador' class='select' >
	     <option value='0'>Seleccione Coordinador</option>";
		while($local=mysql_fetch_array($cadena)){
    	echo"<option value='".$local['idusuarios']."'>".$local['nombre_usuario']."</option>";
}
	echo"</select></br>";
      }
?>        