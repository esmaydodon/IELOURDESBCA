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
$cadena="select l.idlocal,ds.iddocumento_servicio,d.iddocumentos,
ds.numero_actual,s.numero_serie,d.nombre_documento  from documento_servicio ds 
inner join documentos d on
ds.iddocumentos=d.iddocumentos inner join servicio s on 
ds.idservicio=s.idservicio inner join local l on
ds.idlocal=l.idlocal
where d.iddocumentos =".$idp." and l.idlocal='$idLocal'";
$consultafechaguia=dime($cadena);
 $fecha = mysql_fetch_array($consultafechaguia) ; 
echo"  <spam> <input type='text' name='nombredocumento' size='10' maxlength='5' value='".$fecha['nombre_documento']."'  /></spam><br>";    
echo"  <spam>Numero:<input type='text' name='fechaguia' size='10' maxlength='5' value='".($fecha['numero_actual']+1)."'  /></spam><br>";    
echo"  <spam>Serie:<input type='text' name='numeroserie' size='10' maxlength='5' value='".$fecha['numero_serie']."'  /></spam><br>";    
echo"  <spam>Fecha:<input type='text' name='fecha' size='15' maxlength='15' value='".  date("Y-m-d H:i:s")."'  /></spam>";    
 if(isset($_SESSION['documento'])) 
$documento=$_SESSION['documento']; 
 
 $documento[md5($idp)]=array('identificador'=>md5($idp), 
			'iddocumentos'=>$idp,
			'fecha'=>date("Y-m-d H:i:s"),
			'nombre_documento'=>$fecha['nombre_documento'],
			'iddocumento_servicio'=>$fecha['iddocumento_servicio'],
			'numero_actual'=>($fecha['numero_actual']+1),
			'numero_serie'=>$fecha['numero_serie'],
			'idservicio'=>$fecha['idservicio'] 
			); 
 $_SESSION['documento']=$documento;
//echo"  <input type='text' name='fechaguia' size='10' maxlength='5' value='".$cadena."'  />";
 
?>
