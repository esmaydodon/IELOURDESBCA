<?php

include("../func/funciones.php");
require("class.phpmailer.php");
#$nombreDocumento_bd="Ilcat.org.pe.";
//////////////////
$fecha_devolucion= date('Y-m-d  H:i:s',strtotime($_POST['fecha_devolucion']));
$idprestamo_bd=quitar($_POST[idprestamo_bd]);
$prestado_equipo_bd=quitar($_POST[prestado_equipo_bd]);
###################para  guardar en bd la consulta 
//consulta
$consulta = "UPDATE prestamo_bd SET   
`fecha_devolucion`='$fecha_devolucion',
`prestado_equipo_bd`='$prestado_equipo_bd'  
 WHERE idprestamo_bd=$idprestamo_bd";
 $result = dime($consulta)or die(mysql_error());				 
//   echo $consulta;
   echo "<script>document.location.href='equipos.php'</script>";