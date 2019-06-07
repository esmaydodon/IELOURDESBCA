<?php
include '../func/funciones.php';
include 'login.php';
$idc = $_POST['id'];
$consulta= dime("SELECT * FROM equipos_bd  where `idequipos_bd`=".$idc);
while ($row = mysql_fetch_array($consulta)) {
    echo "<input type='hidden' name='idequipos_bd' value='$idc'>";
   echo "SERIE:".$row['serie_equipo_bd'].",STOCK:".$row['stock_actual_equipo_bd'].",".$row['marca_equipo_bd']; 
}
?>