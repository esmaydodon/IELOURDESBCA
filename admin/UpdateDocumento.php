<?php

include("../func/funciones.php");
require("class.phpmailer.php");
#$nombreDocumento_bd="Ilcat.org.pe.";
//////////////////
$textfechaguia= strtotime($_POST['fecha_de_digitacion']);
$fecha_de_digitacion =date('Y-m-d  H:i:s',$textfechaguia);
$id=quitar($_POST[id]);
$nombreDocumento_bd=quitar($_POST[nombreDocumento_bd]);
$detalleDocumento_bd= quitar($_POST[detalleDocumento_bd]);
$iddistritos_ubigeo=quitar($_POST[iddistritos_ubigeo]);
$estado_documento_bd=quitar($_POST[estado_documento_bd]);
$idUsuario_p65=quitar($_POST[idUsuario_p65]);
 
$fecha_de_envio_documento_bd=quitar($_POST[fecha_de_envio_documento_bd]);
###################para  guardar en bd la consulta 
//consulta
$consulta = "UPDATE documentos_bd SET   
`nombreDocumento_bd`='$nombreDocumento_bd',
`iddistritos_ubigeo`='$iddistritos_ubigeo',
`detalleDocumento_bd`='$detalleDocumento_bd',
`estado_documento_bd`='$estado_documento_bd',
`fecha_de_digitacion`='$fecha_de_digitacion',   
`fecha_de_envio_documento_bd`='$fecha_de_envio_documento_bd'    
 WHERE id=$id";
 $result = dime($consulta)or die(mysql_error());				 
//   echo $consulta;
   echo "<script>document.location.href='documentos_enlace.php'</script>";