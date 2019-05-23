<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include("../func/funciones.php");
//$textfechaguia= strtotime($_POST['fecha_de_digitacion']);
$fecha_de_digitacion =date('Y-m-d  H:i:s',strtotime($_POST['fecha_de_digitacion']));
 
/* @var $fecha_nacimiento_usuario_p65_col type */
//$fecha_nacimiento_usuario_p65_col =strtotime($_POST['fecha_nacimiento_usuario_p65_col']);
//$fecha_nacimiento_usuario_p65_col2 = date("Y-m-d",$fecha_nacimiento_usuario_p65_col); 
///////////// 
$fecha_nacimiento_usuario_p65_col =date('Y-m-d', strtotime($_POST['fecha_nacimiento_usuario_p65_col']));
/* @var $_POST type */
$idusuario_p65=quitar($_POST[idusuario_p65]);
$Ape_paterno_usuario_p65_col=quitar($_POST[Ape_paterno_usuario_p65_col]);
$dni_usuario_p65_col= quitar($_POST[dni_usuario_p65_col]);
$ape_materno_usuario_p65_col= quitar($_POST[ape_materno_usuario_p65_col]);
$direccion_usuario_p65_col=quitar($_POST[direccion_usuario_p65_col]);
$referencia_usuario_p65_col=quitar($_POST[referencia_usuario_p65_col]);
$nombre_usuariop65=quitar($_POST[nombre_usuariop65]);
$sexo_usuario_p65_col=quitar($_POST[sexo_usuario_p65_col]);
$iddistritos_ubigeo=quitar($_POST[iddistritos_ubigeo]);
$estado_usuario_p65= 1 ;
$lista_usuario_p65=quitar($_POST[lista_usuario_p65]);
$id=quitar($_POST[id]);
//consulta
$consulta = "UPDATE usuario_p65 SET  `dni_usuario_p65_col`=$dni_usuario_p65_col,
`Ape_paterno_usuario_p65_col`='$Ape_paterno_usuario_p65_col',
`ape_materno_usuario_p65_col`='$ape_materno_usuario_p65_col',
`sexo_usuario_p65_col`=$sexo_usuario_p65_col,
`fecha_nacimiento_usuario_p65_col`='$fecha_nacimiento_usuario_p65_col',
`referencia_usuario_p65_col`='$referencia_usuario_p65_col',
`nombre_usuariop65`='$nombre_usuariop65',
`iddistritos_ubigeo`='$iddistritos_ubigeo',
`estado_usuario_p65`='$estado_usuario_p65',
`fecha_de_digitacion`='$fecha_de_digitacion',
`lista_usuario_p65`='$lista_usuario_p65',
`direccion_usuario_p65_col`='$direccion_usuario_p65_col',
`documento_para_envio`='$id'
 WHERE idusuario_p65='$idusuario_p65'";
//echo "UPDATE usuario_p65 SET  `dni_usuario_p65_col`=$dni_usuario_p65_col,
//`Ape_paterno_usuario_p65_col`='$Ape_paterno_usuario_p65_col',
//`ape_materno_usuario_p65_col`='$ape_materno_usuario_p65_col',
//`sexo_usuario_p65_col`=$sexo_usuario_p65_col,
//`fecha_nacimiento_usuario_p65_col`='$fecha_nacimiento_usuario_p65_col',
//`referencia_usuario_p65_col`='$referencia_usuario_p65_col',
//`nombre_usuariop65`='$nombre_usuariop65',
//`iddistritos_ubigeo`='$iddistritos_ubigeo',
//`estado_usuario_p65`='$estado_usuario_p65',
//`fecha_de_digitacion`='$fecha_de_digitacion',
//`lista_usuario_p65`='$lista_usuario_p65'
// WHERE idUsuario_p65=$idUsuario_p65";
//   echo $consulta;
     $result = dime($consulta)or die(mysql_error());				 

  echo "<script>document.location.href='personal_panel_enlace.php'</script>";