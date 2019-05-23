<?php
session_start(); 
$usuarios=$_SESSION['usuarios']; // remplazamos documeonto por usuario
$distritos=$_SESSION['distritos']; // remplazamos documeonto por usuario
include '../func/funciones.php';
include 'login.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Panel De Administracion</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script type="text/javascript" src="../js/jquery.ui.datepicker-es.js"></script>
  <link rel="stylesheet" href="../resources/demos/style.css"></link>    
<!--<script type="text/javascript" src="../js/jquery-1.6.4.js"></script>-->
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript"> 
 $(document).ready(function(){
$("#listar_personal").click(function(evento){
     $("#formulario_personal").css("display", "none");
     $("#lista_personal").css("display", "block");
   });
 $(".fecha_inicio").datepicker({
      showOn: 'both',
      buttonImage: 'images/panel/calendar.png',
      buttonImageOnly: true,
      changeYear: true,
      numberOfMonths: 2
   });  
});
</script>
</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <div id="site_title">
      <h1>
        <?php  include ('ya.php'); ?>
      </h1>
    </div>
   <strong class="MANTRA"> </strong>
   <div id="site_title2">
     <strong class="MANTRA">SISTEMA DE GESTION DE FORMATOS UTC PENSION 65</strong>
   </div>
   <p>&nbsp;</p>
   <strong class="MANTRA">
   <p>&nbsp;</p>
   </strong>
  </div>
  <!-- end of header -->
</div>
<!-- end of menu_wrapper -->
<div id="menu_wrapper">
<?php
include 'includes/menu_1.php';
?>
  <!-- end of menu -->
</div>
<div id="content_wrapper"><!-- end of sidebar -->
  <div id="content">
    <div class="content_box_panel">
      <div class="content_box_bottom">
        <table width="100%" class="tabla">
          <tr>
    <td width="17%"><span  class="button mediano azul" id="listar_personal" onclick="listarFormatos()">LISTAR FORMATOS</span></td>
    <td width="83%"><!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!formulario de busqueda usuarios!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
        <div id="formularioBuscadorUsuario" ></div>  
    <div id="datosusuarios"></div>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!formulario de busqueda usuarios end !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!--></td>
  </tr>
  <tr>
    <td colspan="2"><div class="cleaner_h20" id="contenedor_personal">
      <div id="buscadorYdatosusuarios">
        <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!sesion de usuarios!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
        <div  style="float: left;margin-left: 50px;margin-left: 0px;margin-top: 20px; clear: both;">
          <?php 
if($usuarios){
	 foreach($usuarios as $k => $d){
             if(!$usuario || !isset($usuario[md5($d['idusuarios'])]['identificador']) || 
	$usuario[md5($d['idusuarios'])]['identificador']!= md5($d['idusuarios']))
    {
                 $cadenaAgregarQuitar="<a href='borracarusuario.php?SID&id=".$d['idusuarios']."&dedo=".$dedonde."'>
<img src='../images/trash.gif' border='0' title='Deseleccionar'></a>";
}else{
$cadenaAgregarQuitar="<a href='agregausuario.php?SID&id=".$d['idusuarios']."&dedo=".$dedonde."'>
<img src='../images/productonoagregado.gif' border='0' title='Seleccionar'></a><br>";	
	}
        echo"Dni:".$d['dni_suario']."<br>
                usuario:".$d['nombre_usuario']."<br>
		Direccion:".$d['direccion_usuario'];
        		  echo $cadenaAgregarQuitar."</h2>"; }
	 }
?>
        </div>
        <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!sesion de usuarios end!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
      </div>
      <div id="buscadorYdatosDistritos">
        <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!sesion de distritos!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
        <div  style="float: left;margin-left: 50px;margin-left: 0px;margin-top: 20px; clear: both;">
          <?php 
if($distritos){
	 foreach($distritos as $k => $d){
             if(!$distrito || !isset($distrito[md5($d['iddistritos_ubigeo'])]['identificador']) || 
	$distrito[md5($d['iddistritos_ubigeo'])]['identificador']!= md5($d['iddistritos']))
    {
                 $cadenaAgregarQuitar="<a href='borracarDistrito.php?SID&id=".$d['iddistritos_ubigeo']."&dedo=".$dedonde."'>
<img src='../images/trash.gif' border='0' title='Deseleccionar'></a>";
}else{
$cadenaAgregarQuitar="<a href='agregaDistrito.php?SID&id=".$d['iddistritos_ubigeo']."&dedo=".$dedonde."'>
<img src='../images/productonoagregado.gif' border='0' title='Seleccionar'></a><br>";	
	}
        echo"Nombre:".$d['nombre_distrito_provincia_bd']."<br>
                Tipo:".$d['nombre_ubigeo_bd']."";
        		  echo $cadenaAgregarQuitar."<br>"; }
	 }
?>
        </div>
        <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!sesion de distritos end!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
      </div>
      <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!grabar datos de usuario y distrito al que pertenece!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
      <div id="formulario_personal" class="formulario_personal">
        <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!grabarbBD!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
        <form action="registrandoUsuarioHbigeo.php" method="post" name="formularioGuardar" id="formularioGuardar">
          <?php  
if ($usuarios) {// el if es para uqe no muestre error cuando  las sesiones esteen vasias
   foreach($usuarios as $k => $d)
     {
     echo " <input type='hidden' name='idusuarios' value='".$d['idusuarios']."'></input>";
     }  
} 
if ($distritos) {
   foreach($distritos as $k => $v)
         { 
   echo "<input type='hidden' name='iddistritos_ubigeo' value='".$v['iddistritos_ubigeo']."'> ";  
	 }    
}

 ?>
          <input type="hidden" name="fecha" value="<?php echo date("Y-m-d H:i:s");?>" />
          <!--<input type="submit" name="Submit" value="Registrar Distritos Asignados "/>-->
        </form>
        <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!grabarbBD!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
      </div>
      <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!grabar datos de usuario y distrito al que pertenece end !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
      <div class="cleaner"></div>
    </div>
      <div id="lista_formatos"> </div>
      
      </td>
    
  </tr>
</table>

   </div>
    </div>
    
    <div class="content_box">
      <h2>-.-</h2>
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <!-- end of content -->
  <div class="cleaner"></div>
</div>
<div id="footer_wrapper">
  <div id="footer">
   </div>
</div>
</body>
</html>
