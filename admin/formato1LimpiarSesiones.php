<?php
session_start(); 
$usuarios=$_SESSION['usuarios']; // usuario
$distritos=$_SESSION['distritos']; // distritos
$actividades=$_SESSION['actividades']; // distritos
$componente=$_SESSION['componente']; // distritos
$indicador=$_SESSION['indicador']; // distritos
$ct=$_SESSION['ct']; // distritos
include '../func/funciones.php';
include 'login.php';
?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 session_destroy();//estoy entendiendo quela seion se puedo terminar (php5) con esto basta 
echo "<script>document.location.href='formato1.php'</script>";
