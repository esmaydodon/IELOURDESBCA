<?php 
session_start(); 
include '../func/funciones.php';
$iddistritos_ubigeo= quitar($_POST['iddistritos_ubigeo']);
$idusuarios= quitar($_POST['idusuarioActivo']);
$email_direectorio_bd=$_POST['email_direectorio_bd']; // usuario
$nombre_Institucion_bd=$_POST['nombre_Institucion_bd']; // distritos
$titular_directorio_bd=$_POST['titular_directorio_bd']; // distritos
$cargo_directorio_bd=$_POST['cargo_directorio_bd']; // distritos
$direccion_directorio_bd=$_POST['direccion_directorio_bd']; // distritos
$telefono_directorio_bd=$_POST['telefono_directorio_bd']; // distritos
$distritos=$_POST['iddistritos_ubigeo']; // distritos
include("../func/funciones.php");
//unset($email_direectorio_bd);
$observacion_directorio_bd= quitar($_POST['observacion_directorio_bd']);
$tDate = strtotime($_POST['fecha_registro_direcetorio']);
$dateToMySQL = date("Y-m-d",$tDate); // Formato de Date en mysql es: aaaa-mm-dd
$hora=date("Y-m-d H:i:s",$tDate);
 $insertardetallepago=dime("INSERT INTO  directorio_bd(idusuarios,nombre_Institucion_bd, titular_directorio_bd, cargo_directorio_bd, direccion_directorio_bd, email_direectorio_bd, telefono_directorio_bd,observacion_directorio_bd, iddistritos_ubigeo, fecha_creacion_directorio_bd) values 
                                                      ('$idusuarios','$nombre_Institucion_bd','$titular_directorio_bd','$cargo_directorio_bd','$direccion_directorio_bd','$email_direectorio_bd','$telefono_directorio_bd','$observacion_directorio_bd','$iddistritos_ubigeo','$dateToMySQL')")or die(mysql_error());	
$_SESSION[] = array();
 //session_destroy();//estoy entendiendo quela seion se puedo terminar (php5) con esto basta 
   echo "<script>document.location.href='directorio.php'</script>";
?> 