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
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
 <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 <script type="text/javascript" src="../js/jquery.ui.datepicker-es.js"></script>
 <script src="../js/ajax.js"></script>
 <link rel="stylesheet" href="../resources/demos/style.css">
     <script>
         $(document).ready(function(){
     $("#fecha_indicador_ejecutado").datepicker({
      showOn: 'both',
      buttonImage: 'images/calendar.png',
      buttonImageOnly: true,
      changeYear: true,
      numberOfMonths: 2
   });
   $("#fecha_indicador_ejecutado").datepicker( "option", "changeMonth", true );
   })
  </script>
</head>
<body>
<div id="header_wrapper">
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
        <form id="ctConsulta" name="ctConsulta" action="" method="POST" enctype="multipart/form-data" class="contacto">
                <div>
<label>
<?php 
      $consulata_ct=dime('select * from usuarios as u inner join tipos_usuarios as tu on
u.tipos_usuarios_idtipos_usuarios=tu.idtipos_usuarios where tu.idtipos_usuarios=2;');
    echo"<br>COORDINADOR TERRITORIAL:<select id ='cordinador' name='cordinador' class='select'  onchange='AgregarSesionCt()'>
	     <option value='0'>Seleccione</option>";
		while($local=mysql_fetch_array($consulata_ct)){
    	echo"<option value='".$local['idusuarios']."'>".$local['nombre_usuario']."</option>";}
	echo"</select></br>";
//      ct es 2 por tipo de usuario ct id 2  
?>

</label>
</div>
</form>
        <form id="componentesConsulta" name="componentesConsulta" action="" method="POST" enctype="multipart/form-data" class="contacto">
                <div>
<label>
COMPONENTES:<br>
<?php 
$consulata_compomnente=dime("SELECT * FROM componentes_bd ;");
    echo"<select id ='idcomponentes_bd' name='idcomponentes_bd' class='select' onchange='mostrarSelectActividades()' >
	     <option value='0'>Seleccione Componente</option>";
		while($local=mysql_fetch_array($consulata_compomnente)){
    	echo"<option value='".$local['idcomponentes_bd']."'>".$local['nombre_componente_bb']."</option>";
}
	echo"</select></br>
<div id='selectActividades' name='selectActividades'></div> ";
?>

</label>
</div>
 
</form>
        <form id="form1" name="form1" method="post" action="RegistrandoFormato1.php" enctype="multipart/form-data">
      <?php $consultaCargo=  dime("select * from usuarios as u inner join tipos_usuarios as tu on
u.tipos_usuarios_idtipos_usuarios=tu.idtipos_usuarios where u.idusuarios =".$idUsuarioL.""); 
//      $idUsuarioL lo jala de login
     while($guia = mysql_fetch_array($consultaCargo)){
	echo "
<tr><td>NOMBRE:".$NombreUsuarioL."</td><BR>
     <td>CARGO:". $guia['nombre_tipo_usuario']."</td> 
 </tr>
	";
	}
        $idusuarios=$idUsuarioL;
       ?>
      
<div class="cleaner_h20">

 <?php echo date('Y h:i:s A');
    ?>

<table width="843" border="1" class="tabla">
  <tr>
    <td colspan="6">Verificaciones Realizadas</td>
    </tr>
  <tr>
    <td width="130">Distrito</td>
    <td width="386"><?php 
    $consulata_tipo3=dime("select * from usuarios_has_distritos_ubigeo as ud inner join distritos_ubigeo as du on
ud.distritos_ubigeo_iddistritos_ubigeo=du.iddistritos_ubigeo inner join ubigeos as u on
du.idubigeos=u.idubigeos
where ud.idusuarios=".$idUsuarioL."");
 echo"<select id='iddistritos_ubigeo' name='iddistritos_ubigeo' class='select'>
	     <option value='0'>Seleccione</option>";
		while($local=mysql_fetch_array($consulata_tipo3)){
    	echo"<option value='".$local['iddistritos_ubigeo']."'>".$local['nombre_distrito_provincia_bd']."-".$local['nombre_ubigeo_bd']."</option>";}
	echo"</select></br>";?></td>
  <tr>
    <td>C.P./Caserío/Anexo</td>
    <td><input name="Comunidad" type="text" /></td>
  
  </tr>
  <tr>
    <td>Indicador:</td>
    <td><?php 
	 //sesion de componentes
if($componente){
	 foreach($componente as $k => $d){
             if(!$componente || !isset($componente[md5($d['idcomponentes_bd'])]['identificador']) || 
	$componente[md5($d['idcomponentes_bd'])]['identificador']!= md5($d['idcomponentes_bd']))
    {
                 $cadenaAgregarQuitar="<a href='borracarcomponente.php?SID&id=".$d['idcomponentes_bd']."&dedo=".$dedonde."'>
<img src='../images/trash.gif' border='0' title='Deseleccionar'></a>";
}else{
$cadenaAgregarQuitar="<a href='agregacomponente.php?SID&id=".$d['idcomponentes_bd']."&dedo=".$dedonde."'>
<img src='../images/productonoagregado.gif' border='0' title='Seleccionar'></a><br>";	
	}
        echo"Idcomponente:".$d['idcomponentes_bd']."<br>
                componente:".$d['nombre_componente_bb']."</h2><br>"; 
        echo  "<input type='hidden' id='idcomponentes_bd' name='idcomponentes_bd' value='".$d['idcomponentes_bd']."'></input>;";
                }
	 }
//sesion de actividades
if($actividades){
	 foreach($actividades as $k => $d){
             if(!$actividades || !isset($actividades[md5($d['idactividades_bd'])]['identificador']) || 
	$actividades[md5($d['idactividades_bd'])]['identificador']!= md5($d['idactividades_bd']))
    {
                 $cadenaAgregarQuitar="<a href='borracaractividades.php?SID&id=".$d['idactividades_bd']."&dedo=".$dedonde."'>
<img src='../images/trash.gif' border='0' title='Deseleccionar'></a>";
}else{
$cadenaAgregarQuitar="<a href='agregaactividades.php?SID&id=".$d['idactividades_bd']."&dedo=".$dedonde."'>
<img src='../images/productonoagregado.gif' border='0' title='Seleccionar'></a><br>";	
	}
        echo"Idactividades:".$d['idactividades_bd']."<br>
                actividades:".$d['nombre_actividades_bb']."</h2><br>"; 
          echo  "<input type='hidden' id='idactividades_bd' name='idactividades_bd' value='".$d['idactividades_bd']."'></input>;";
                }
	 }
 //sesion de indicador
if($indicador){
	 foreach($indicador as $k => $d){
             if(!$indicador || !isset($indicador[md5($d['idindicadores_bd'])]['identificador']) || 
	$indicador[md5($d['idindicadores_bd'])]['identificador']!= md5($d['idindicadores_bd']))
    {
                 $cadenaAgregarQuitar="<a href='borracarindicador.php?SID&id=".$d['idindicadores_bd']."&dedo=".$dedonde."'>
<img src='../images/trash.gif' border='0' title='Deseleccionar'></a>";
}else{
$cadenaAgregarQuitar="<a href='agregaindicador.php?SID&id=".$d['idindicadores_bd']."&dedo=".$dedonde."'>
<img src='../images/productonoagregado.gif' border='0' title='Seleccionar'></a><br>";	
	}
        echo"Idindicador:".$d['idindicadores_bd']."<br>
                indicador:".$d['nombre_indicadores_bd']."</h2>";
        echo  "<input type='hidden' id='idindicadores_bd' name='idindicadores_bd' value='".$d['idindicadores_bd']."'></input>;";
        
        }
	 } 
////sesion de ct
//if($ct){
//	 foreach($ct as $k => $d){
//             if(!$ct || !isset($ct[md5($d['idusuarios'])]['identificador']) || 
//	$ct[md5($d['idusuarios'])]['identificador']!= md5($d['idusuarios']))
//    {
//                 $cadenaAgregarQuitar="<a href='borracarct.php?SID&id=".$d['idusuarios']."&dedo=".$dedonde."'>
//<img src='../images/trash.gif' border='0' title='Deseleccionar'></a>";
//}else{
//$cadenaAgregarQuitar="<a href='agregact.php?SID&id=".$d['idusuarios']."&dedo=".$dedonde."'>
//<img src='../images/productonoagregado.gif' border='0' title='Seleccionar'></a><br>";	
//	}
//        echo"Idct:".$d['idusuarios']."<br>
//                ct:".$d['nombre_usuario']."</h2>"; 
//         echo  "<input type='hidden' id='idusuariosct' name='idusuariosct' value='".$d['idusuarios']."'></input>;";
//                }
//	 }            
?>
      <input type="hidden" id="fecha_creacion_bd" name="fecha_creacion_bd" value=" <?php echo date('y/m/d');?>" />
      <input type="hidden" id="idusuarioActivo" name="idusuarioActivo" value=" <?php echo $idUsuarioL;?>" />
      <input type="hidden" id="idformatos_bd" name="idformatos_bd" value="1" />
      <div id="contenedorID" >DD</div>
      </td>
    
  </tr>
   <tr>
    <td>VALOR</td>
    <td><input name="valor_indicador_bd" type="text" /></td>
   
  </tr>
  <tr>
    <td>OBSERVACION</td>
    <td><textarea name="observacion_indicador" cols="50" rows="5" id="observacion_indicador"></textarea></td>

  </tr>
   <tr>
    <td>FECHA</td>
    <td><input name="fecha_indicador_ejecutado" id="fecha_indicador_ejecutado" class="hasDatepicker" type="text" value="" />
      </td>
  </tr>
   <tr>
     <td>*</td>
     <td>AM,CSET,PU,U;
       <input name="Submit" value="Registrar" type="submit" /></td>
   </tr>
</table>

<p>&nbsp;</p>
</div>
      </form> </div>
            
    <div class="content_box_bottom"></div>
    <div class="content_box">
      <h2>Mapa - Web</h2>
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <!-- end of content -->
  <div class="cleaner"></div>
</div>
<div id="footer_wrapper">
  <div id="footer">
    <ul class="footer_menu">
      <li><a href="#">INICIO</a></li>
      <li><a href="#">DIPLOMADOS</a></li>
      <li><a href="#">ESPECIALIZACIÓN PROFESIONAL</a></li>
      <li><a href="#">CURSOS DE CAPACITACIÓN</a></li>
      <li><a href="#">CURSOS GRATUITOS</a></li>
      <li class="last_menu"><a href="#">CONTACTO</a></li>
    </ul>
    Copyright &copy; 2014 <a href="http://www.kuraka.net/">kuraka.net</a></div>
</div>
</body>
</html>
