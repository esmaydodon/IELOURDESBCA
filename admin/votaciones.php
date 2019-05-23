<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include '../func/funciones.php';
include 'login.php';
?>
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
     <?php  include('ya.php'); ?>
   </div>
  
  </div>
  <!-- end of header -->
</div>
<!-- end of menu_wrapper -->
<div id="menu_wrapper">
    <div id="menu">
 <ul>
          <li><a href='personal_panel_administrador.php'>ALUMNOS</a></li>
	  <li><a href='documentos_enlace.php'>DOCUMENTOS</a></li>
	  <li><a href='citacion.php'>CITACIÓN</a></li>
          <li><a href='destruir.php' class='current'>SALIR</a></li>
          <li><a href='votaciones.php' class='current'>VOTOS ELECCIONES 2018</a></li>
    </ul>
  </div>
  <!-- end of menu -->
</div>
<div id="content_wrapper"><!-- end of sidebar --> 
  <div id="content">
    <div class="content_box_panel">
  
<!--<span id="listar_personal" class="button mediano azul" onclick="listarAlumnos()">LISTAR ]ALUMNOS</span>-->
 <!--<span id="buscar_potencial_div" class="button mediano azul" onclick="">REGISTRAR PERSONA</span>-->
<!--formulario para editar--> 
<div id="formulario_envioDJ">
    <table border="0">
<tr>
                <th>Candidato</th>
                <th>Votacion</th>
                <th>Grafico</th>
</tr>
         <?php
$consultarVotos= dime("select * from candidato")or die( ovni("Oo"));
while ($row = mysql_fetch_array($consultarVotos)) {
 
    echo "<tr>";
 echo "<td>".$row['idcandidato']."</td>";   
 echo "<td>".$row['voto']."</td>";   
 echo "<td><img src='../images/turco.png' width='".$row['voto']."'height='50' /></td>";   
 echo "</tr>";   
}
?>          
    </table>


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