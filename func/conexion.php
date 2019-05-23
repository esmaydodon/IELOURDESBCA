<?php
error_reporting(E_ALL & ~E-NOTICE);
error_reporting(E_ALL & ~E-NOTICE & ~E_DEPRECATED);
define ("SERVIDOR", "localhost");//localhost
define ("USUARIO", "root");//root
define ("CLAVE", "12345678");//1234
define ("BASE", "kurakane_ielourdes");//bbasicokuraka
$link = mysql_connect(SERVIDOR, USUARIO, CLAVE);
if (!$link) {
    die('No se pudo conectar con el servidor : ' . mysql_error());
}

$db_selected = mysql_select_db(BASE, $link);
if (!$db_selected) {
    die ('no se pudo conectar con la Base de Datos... ' . mysql_error());
}
define("conex", $link);// para bd.php funcion de query
/*si no defino el conex no funciona ya que nesesita los datos de conex
 * es seguro por que aun no selecciona la BD*/ 
?>