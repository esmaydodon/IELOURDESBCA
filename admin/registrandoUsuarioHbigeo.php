<?php 
session_start(); 
$distritos=$_SESSION['distritos']; 
$usuarios=$_SESSION['usuarios']; 
include("../func/funciones.php");

$idusuarios= quitar($_POST['idusuarios']);
$tDate = strtotime($_POST['fecha']);
$dateToMySQL = date("Y-m-d",$tDate); // Formato de Date en mysql es: aaaa-mm-dd
$hora=date("Y-m-d H:i:s",$tDate);
//$fecha=date("d/m/Y H:i:s",$timestamp);
/*formato fecha mysql end*/
foreach($distritos as $k => $v){
$insertardetallepago=dime("INSERT INTO  usuarios_has_distritos_ubigeo 
        (distritos_ubigeo_iddistritos_ubigeo,idusuarios) values 
        (".$v['iddistritos_ubigeo'].",'$idusuarios')");
//echo "INSERT INTO  usuarios_has_distritos_ubigeo 
//        (distritos_ubigeo_iddistritos_ubigeo,idusuarios) values 
//        (".$v['iddistritos_ubigeo'].",'$idusuarios')";
	  } 
$_SESSION[] = array();
session_destroy();//estoy entendiendo quela seion se puedo terminar (php5) con esto basta 
echo "<script>document.location.href='AsignarUsuarioUbigeo.php'</script>";

?> 