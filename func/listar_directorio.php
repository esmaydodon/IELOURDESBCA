<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include '../func/funciones.php';
include 'login.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Education</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/ajax.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!--data piker--> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"></link>
<script type="text/javascript" src="../js/jquery.ui.datepicker-es.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<!--data piker end-->
<script type="text/javascript" src="../js/jquery.PrintArea.js"></script>
<script type="text/javascript"> 
 $(document).ready(function(){
 $("#listarFechas").click(function(evento)
      {  
          $("#contenedor_datos").css("display", "none");
          $("#Diventrefechas").css("display", "block");
	  
         });
         
  $(".fecha_inicio").datepicker({
  showOn: 'both',
 buttonImage: '../images/calendar.png',
buttonImageOnly: true,
changeYear: true
//numberOfMonths: 2
   });
 $(".campofechaf").datepicker({
  showOn: 'both',
   buttonImage: '../images/calendar.png',
  buttonImageOnly: true,
  changeYear: true
// numberOfMonths: 2
   });
 }); 		 
</script>

</head>


  <div id="header">
    <div id="site_title">
      <h1>
        <?php include ('ya.php'); ?>
      </h1>
    </div>
   <strong class="MANTRA"> </strong>
   <div id="site_title2">
     <h1><strong class="MANTRA">SISTEMA DE GESTION DE FORMATOS UTC PENSION 65</strong></h1>
   </div>
   <p>&nbsp;</p>
  </div>
  <!-- end of header -->
</div> 
<!-- end of menu_wrapper -->
<div id="menu_wrapper">
<?php
include 'includes/menu_2.php';
?>
  <!-- end of menu -->
</div>
<div id="content_wrapper"><!-- end of sidebar -->
  <div id="content">
    <div class="content_box_panel">
<div class="cleaner_h20">
  <table width="852"><tr>
    <td width="105" height="34">
    <a href="listar_directorio.php" class="button mediano azul">
<span id="listarf3">DIRECTORIO</span></a>
  
   
  </td>
    <td width="86">
 <a href="listarF1.php" class="button mediano azul">
     <span id="listarF1">LISTAR FORMATO 1</span>
</a>
</td>
<td width="86">
<a href="ListarF2.php" class="button mediano azul">
<span id="listarF2">LISTAR FORMATO 2</span></a></td>
<td width="86">
<a href="#" class="button mediano azul">
<span id="listarf3">LISTAR FORMATO 3</span></a>
</td>
<td width="465"> <a href="#" class="button mediano azul">
        <span id="listarFechas" >Filtrar Por Fechas</span>
</a></td>
  </tr>
      <tr>
        <td colspan="5">
        <div id="Diventrefechas">
 <div id="formularioreportesFechasVentas" class="notiDetalle2" style="border: 0px none; display: block;">
      <form id="fechaventasreporte" name="entrefechas" action="FormatoF1_EntreFechas.php" method="GET" class="contacto" target="_blank">
        Fecha Inicio:<br><input id="fecha_inicio"  name="f1" class="fecha_inicio" type="text"><br>
        Fecha Fin:<br><input id="fecha_fin" name="f2" class="campofechaf" type="text">
		
         <?php 
                  $formato=dime('select * from formatos_bd ;');
    echo"Formato:<br><select id ='formato' name='formato' class='select'>
	     <option value='0'>Seleccione</option>";
		while($local=mysql_fetch_array($formato)){
    	echo"<option value='".$local['idformatos_bd']."'>".$local['nombre_formato_bd']."</option>";}
	echo"</select></br>";
            ?>
                
                <input name="parametros" value="2" type="hidden">
        <input value="Consultar" onclick=" " type="submit">
    </form>   
 </div>
        </div>
		<div id="contenedor_datos">
		  <?php
//            require '../func/listar_formatos.php';
//            echo '<br>DIRECTORIO<br>';
//            require '../func/listar_directorio.php';
?>
		</div></td> </tr></table>
</div>
      <div class="cleaner"></div>
    </div>
  </div>
<!-- end of content --></div>
<div id="footer_wrapper">
  <div id="footer">
    Copyright &copy; 2014 <a href="http://www.kuraka.net/">kuraka.net</a></div>
</div>
</body>
</html>
