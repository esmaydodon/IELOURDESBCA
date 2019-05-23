<?php
session_start();
include '../func/funciones.php';
if (isset($_SESSION['idUsuario_p65'])) {
    echo "Bienvenido, ";
    echo $_SESSION['nombre_usuariop65']." ".$_SESSION['Ape_paterno_usuario_p65_col']." ".$_SESSION['ape_materno_usuario_p65_col'] ;
  echo " voto: ".$_SESSION['voto'];
    $idUsuario_p65= $_SESSION['idUsuario_p65'];
    $iddistritos_ubigeo= $_SESSION['iddistritos_ubigeo'];
// consultamos el estado actual del voto
    $consultamosSiaVotado=dime("SELECT voto FROM `usuario_p65` where `idUsuario_p65`='$idUsuario_p65';");
    if ($registro=mysql_fetch_array($consultamosSiaVotado)) {
//        echo " Estado de voto: ".$registro['voto'];
        if ($registro['voto'] == 1) {
            
            echo "Ud ya voto !! <a href='destruir2.php' class='current'>SALIR</a> ";
        }else{
            ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Panel De Administracion - </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/ajax.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!--data piker-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"></link>
<script type="text/javascript" src="../js/jquery.ui.datepicker-es.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript"  src="../js/jquery-ui.js"></script>

<!--data piker end-->
<script type="text/javascript" src="../js/jquery.PrintArea.js"></script>
<link href="../style.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script type="text/javascript"> 
 $(document).ready(function(){
$('#listar_personal').click(function(){
           $('#AlumnoPaginacion').css("display", "block");
	  $('#formulario_envioDJ').css('display', 'none');
//	  $('#formulario_potencialEditar').css('display', 'none');
("#botonatras").css("display", "block");
   });	
$("#pedir").click(function(){
	$("#formulario_envioDJ").css("display", "none");
       // $("#AlumnoPaginacion").css("display", "none");
        $("#formulario_potencialEditar").css("display", "block");
  });  

}); 
 
</script>
<script>
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'yy/mm/dd',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fechisima").datepicker({
	showOn: 'both',
      changeMonth: true,
      changeYear: true
    });

});
</script>
</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <div style="float: left;">
      <h1> 
       <h1><strong class="MANTRA"> IE Nuestra Señora de Lourdes - Bambamarca</strong></h1> 
      </h1>
    </div>
  
   <div style="float: right;">
     <?php //  include('ya.php'); ?>
   </div>
  
  </div>
  <!-- end of header -->
</div>
<!-- end of menu_wrapper -->
<!--    <div id="menu">
 <ul>
          <li><a href='#'>VOTAR</a></li>
	  <li><a href='#'>COMUNICADOS</a></li>
	  <li><a href='#'>PAPELETAS</a></li>
          <li><a href='destruir2.php' class='current'>SALIR</a></li>
    </ul>
  </div>-->

<div id="content_wrapper"><!-- end of sidebar --> 
  <div id="content">
    <div class="content_box_panel">
<div id="formulario_envioDJ">
    <form action="registrando_voto_alumno.php" name="form_personal_utc" method="post" class="contacto" enctype="multipart/form-data" >
        <table border="0"
               <tr> <td> <input type="radio" name="candidatos" value="1" checked="checked" />1<img src="../images/teamlourdesino.jpg" width="83" height="85" alt="voto_usuario"/></td><td> </td></tr>
            <tr> <td> <input type="radio" name="candidatos" value="2" checked="checked" />2<img src="../images/FORJADORES.PNG" width="83" height="85" alt="voto_usuario"/></td><td> </td></tr>
            <tr> <td> <input type="radio" name="candidatos" value="3" checked="checked" />3<img src="../images/blanco.jpg" width="83" height="85" alt="voto_usuario"/></td><td> </td></tr>
            <tr> <td> <input type="radio" name="candidatos" value="4" checked="checked" />4<img src="../images/nulo.jpg" width="83" height="85" alt="voto_usuario"/></td></tr>
         <tr>
        <td><input type="submit" value="Enviar" class="button mediano azul">
        </td>
         <!--    <span  id="listar_personal" onclick="listarFormatos()">LISTAR FORMATOS</span>-->
        </tr>
        </table>
        <input type="hidden" name="phpmailer" />
            <input type="hidden" name="voto" value="1" />
            <input type="hidden" name="idUsuario_p65" value="<?php echo $idUsuario_p65 ;?>" />
            <input type="hidden" name="fecha_de_digitacion" value="<?php echo date("Y-m-d H:i:s");?>" />
            <input type="hidden" name="iddistritos_ubigeo" value="<?php echo $iddistritos_ubigeo;?>" />
           
          </form>
</div>
    </div>
  </div>
</div>
<div id="footer_wrapper">
  <div id="footer">
&copy;<a href="http://www.kuraka.net/">K</a></div>
</div>
</body>
</html>
<?Php 
echo 'Usted aun no vota';
        }
    }
}else{
    echo "Ntiene Acceso a esta página!!";
} ?>
