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
$idp = $_GET['idp'];//  idactividades
$cadena="  select * from formatos_indicadores_bd as fi inner join 
  formatos_bd as f on fi.idformatos_bd=f.idformatos_bd inner join 
  componentes_bd as co on fi.idcomponentes_bd=co.idcomponentes_bd inner join
  indicadores_bd as i on fi.idindicadores_bd=i.idindicadores_bd inner join
  actividades_bd as ac on fi.idactividades_bd=ac.idactividades_bd
  where f.idformatos_bd=1 AND ac.idactividades_bd=$idp ;";
$consultafechaguia=dime($cadena);
 
  echo"INDICADORES:<br><select id ='idindicadores_bd' name='idindicadores_bd' class='select' onchange='AgregarSesionIndicador()'  >
	     <option value='0'>Seleccione Indicador</option>";
		while($local=mysql_fetch_array($consultafechaguia)){
    	echo"<option value='".$local['idindicadores_bd']."'>".$local['nombre_indicadores_bd']."</option>";
}
	echo"</select></br>
<div id='selectIndicadores' name='selectIndicadores'></div>";
// ------      
        $cadena1="  select  *  from actividades_bd  where idactividades_bd =".$idp."";
$consultafechaguia1=dime($cadena1);
 $fecha = mysql_fetch_array($consultafechaguia1) ;
        if(isset($_SESSION['actividades'])) 
$actividades=$_SESSION['actividades']; 
  $actividades[md5($idp)]=array('identificador'=>md5($idp), 
			'idactividades_bd'=>$idp,
			'nombre_actividad_bd'=>$fecha['nombre_actividad_bd'] 
			); 
 $_SESSION['actividades']=$actividades;
 
    
 
 // ------       
//echo"  <input type='text' name='fechaguia' size='10' maxlength='5' value='".$cadena."'  />";
 ?>
