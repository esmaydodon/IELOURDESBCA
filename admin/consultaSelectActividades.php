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
IF($idp=='1' OR $idp=='2'){
$cadena="select * from formatos_indicadores_bd as fi inner join 
formatos_bd as f on fi.idformatos_bd=f.idformatos_bd inner join 
componentes_bd as co on fi.idcomponentes_bd=co.idcomponentes_bd inner join 
indicadores_bd as i on fi.idindicadores_bd=i.idindicadores_bd inner join 
actividades_bd as ac on fi.idactividades_bd=ac.idactividades_bd 
where ( co.idcomponentes_bd='1'   OR co.idcomponentes_bd='2') AND f.idformatos_bd=1 and co.idcomponentes_bd =$idp group by nombre_actividad_bd ";
$consultafechaguia=dime($cadena);
echo"ACTIVIDADES:<br>
    <select id ='idactividades_bd' name='idactividades_bd' class='select' onchange='mostrarSelectIndicadores()' >
	     <option value='0'>Seleccione Actividad</option>";
		while($local=mysql_fetch_array($consultafechaguia)){
    	echo"<option value='".$local['idactividades_bd']."'>".$local['nombre_actividad_bd']."</option>";
}
	echo"</select></br>
<div id='selectActividades' name='selectIndicadores'></div>  
<div id='selectIndicadores' name='selectIndicadores'></div>  ";
//  ---- para agregar  el componente  a una sesion sacamos su ID y nombre asi asignamos en un hidem en el principalpara enviar datoso por POST
 $cadena1="  select  *  from componentes_bd  where idcomponentes_bd =".$idp."";
$consultafechaguia1=dime($cadena1);
 $fecha = mysql_fetch_array($consultafechaguia1) ; 
if(isset($_SESSION['componente'])) 
$componente=$_SESSION['componente']; 
 $componente[md5($idp)]=array('identificador'=>md5($idp), 
		'idcomponentes_bd'=>$idp,
		 'nombre_componente_bb'=>$fecha['nombre_componente_bb']
			); 
 $_SESSION['componente']=$componente;
 //----   
//echo"  <input type='text' name='fechaguia' size='10' maxlength='5' value='".$cadena."'  />";
}
?>