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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"></meta>
<title>FORMATO 1</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link href="../style.css" rel="stylesheet" type="text/css" />
 <script src="../js/ajax.js"> </script>
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!--para datapiker--> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"></link>
<script type="text/javascript" src="../js/jquery.ui.datepicker-es.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 <!--para datapiker end-->

 <link rel="stylesheet" href="../resources/demos/style.css">

     <script type="text/javascript">
         $(document).ready(function(){
     $(".fecha_registro_direcetorio").datepicker({
      showOn: 'both',
      buttonImage: '../images/calendar.png',
      buttonImageOnly: true,
      changeYear: true
         });
 $("#divEditarDirectorio").click(function(evento)
      {  
          $("#quevaser").css("display", "block");
        $("#contenedorNuevoDirectorio").css("display", "none");
	  
         });
   });
  </script>
</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <div id="site_title">
      <h1>
          <a href="personal_panel.php"> <?php include ('ya.php'); ?></a>
      </h1>
    </div>
   <strong class="MANTRA"> </strong>
   <div id="site_title2">
     <h1><strong class="MANTRA">SISTEMA DE GESTION DE FORMATOS UTC PENSION 65</strong></h1>
   </div>
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
 <div id="fluir">
<!--     <a href="personal_panel.php"><img src="../images/32x32/skip_backward.png" width="32" height="32" /></a>-->
 </div>
 <div>
   <table width="852"><tr>
    <td width="105" height="34">
    <a href="directorio.php" class="button mediano naranja">
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
  <tr>
    <td width="105" height="34" >
    <a href="directorio.php" class="button mediano naranja">
<span id="listarf3">NUEVO DIRECTORIO</span></a>
  
   
  </td>
    <td width="86">
 <a href="listarF1.php" class="button mediano ama">
     <span id="listarF1">LISTAR  DIRECTORIO</span>
</a>
</td>
<td width="86">
<a href="ListarF2.php" class="button mediano ama">
<span id="listarF2">BUSQUEDA</span></a></td>
<td width="86">
<a href="#" class="button mediano ama">
<span id="listarf3">REPORTES</span></a>
</td>
<td width="465">&nbsp;</td>
  </tr></tr>
  
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
  <form id="form1" name="form1" method="post" action="RegistrandoDirectorio.php" enctype="multipart/form-data" class="contacto">
 <input type="hidden" id="idusuarioActivo" name="idusuarioActivo" value="<?php echo $idUsuarioL;?>" />
 <div id="7777777">
		  <?php
                  echo $idUsuarioL;
         require '../func/listar_directorio.php';
?>
</div>
<div id="quevaser" style="display:none" >
  
Oo
</div>
<div id="contenedorNuevoDirectorio">
<table width="843" border="0"  >
   <tr>
    <td colspan="9">&nbsp;</td>
    </tr>
  <tr>
    <td width="104">Distrito</td>
    <td width="310"><?php 
    $consulata_tipo3=dime("select * from usuarios_has_distritos_ubigeo as ud inner join distritos_ubigeo as du on
ud.distritos_ubigeo_iddistritos_ubigeo=du.iddistritos_ubigeo inner join ubigeos as u on
du.idubigeos=u.idubigeos
where ud.idusuarios=".$idUsuarioL."");
 echo"<select id='iddistritos_ubigeo' name='iddistritos_ubigeo' class='select'>
	     <option value='0'>Seleccione</option>";
		while($local=mysql_fetch_array($consulata_tipo3)){
    	echo"<option value='".$local['iddistritos_ubigeo']."'>".$local['nombre_distrito_provincia_bd']."-".$local['nombre_ubigeo_bd']."</option>";}
	echo"</select></br>";?></td>
    <td width="411" rowspan="9" >ddddd</td>
  <tr>
    <td>Institucion</td>
    <td><input name="nombre_Institucion_bd" type="text" id="nombre_Institucion_bd" /></td>
  </tr>
  <tr>
    <td>Titular:</td>
    <td><input name="titular_directorio_bd" type="text" id="titular_directorio_bd" />
<div id="contenedorID" ></div>
      <td width="0"></td>
    
  </tr>
   <tr>
    <td>Cargo</td>
    <td><input name="cargo_directorio_bd" type="text" id="cargo_directorio_bd" /></td>
   </tr>
     <tr>
    <td>Direccion</td>
    <td><input name="direccion_directorio_bd" type="text" id="direccion_directorio_bd" /></td>
   </tr>
    <tr>
    <td>Email</td>
    <td><input name="email_direectorio_bd" type="text" id="email_direectorio_bd" /></td>
   </tr>
  <tr>
  
    <td>OBSERVACION</td>
    <td><textarea name="observacion_directorio_bd" cols="50" rows="5" id="observacion_directorio_bd"></textarea></td>
</tr>
   <tr>
    <td>Telefono</td>
    <td><input name="telefono_directorio_bd" id="telefono_directorio_bd" class="telefono_directorio_bd" type="text" value="" /></td>
  </tr>
     <tr>
    <td>FECHA</td>
    <td><input name="fecha_registro_direcetorio" id="fecha_registro_direcetorio" class="fecha_registro_direcetorio" type="text" value=" <?php echo date('Y h:i:s A');
    ?>" /></td>
  </tr>
   <tr>
     <td>*</td>
     <td><input name="Submit" value="Registrar" type="submit" /></td>
   </tr>
</table>
</div>
    </form> </div>
            
    <div class="content_box_bottom"></div>
     
    <div class="content_box_bottom"></div>
  </div>
  <!-- end of content -->
  <div class="cleaner"></div>
</div>
<div id="footer_wrapper">
  <div id="footer">
<!--    <ul class="footer_menu">
            <li class="last_menu"><a href="#">CONTACTO</a></li>
    </ul>-->
    Copyright &copy; 2014 <a href="http://www.kuraka.net/">kuraka.net</a></div>
</div>
</body>
</html>
