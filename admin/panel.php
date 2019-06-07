<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include '../func/funciones.php';
include 'login.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Panel De Administracion</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <div id="site_title">
      <h1>
        <?php // include ('ya.php'); ?>
      </h1>
    </div>
   <strong class="MANTRA"> </strong>
   <div id="site_title2">
     <h1><strong class="MANTRA">SISTEMA DE GESTION DE FORMATOS UTC PENSION 65</strong></h1>
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
<div class="cleaner_h20">
<form action="registrando_usuarios.php" method="post" enctype="multipart/form-data">
    <?php
include '../func/funciones.php';
$idc = $_POST['id'];//para naa practicamente :p
#para paginar
$RegistrosAMostrar=10;
//estos valores los recibo por GET enviados por aki  a un js 
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
} # para paginar
$consulta = dime(" select  du.nombre_distrito_provincia_bd,ufi.Comunidad,u.nombre_usuario,
 ufi.valor_indicador_bd,ufi.fecha_indicador_ejecutado,i.nombre_indicadores_bd,i.idindicadores_bd from  usuarios_formatos_indicadores_bd as ufi inner join formatos_indicadores_bd as fi on
ufi.idindicadores_bd=fi.idindicadores_bd inner join formatos_bd as f on
fi.idformatos_bd= f.idformatos_bd inner join indicadores_bd as i on
fi.idindicadores_bd=i.idindicadores_bd inner join actividades_bd as a on
fi.idactividades_bd=a.idactividades_bd inner join componentes_bd as co on
fi.idcomponentes_bd=co.idcomponentes_bd inner join usuarios as u on
ufi.idusuarios=u.idusuarios inner JOIN  distritos_ubigeo as du on
ufi.iddistritos_ubigeo=du.iddistritos_ubigeo ORDER BY ufi.fecha_indicador_ejecutado DESC limit $RegistrosAMostrar  ")or die(ovni("consultar ser"));
echo "<div id='myPrintArea'>
    <table width='840px' border='1' class='tabla' style=''> 
         <tr style='background-color: #30bdff;' >
         <td>DISTRITO</td>
         <td>COMUNIDAD</td>        
         <td>NOMBRE</td>        
         <td>AM</td>        
        <td>CSET</td> 
        <td>P.U</td>  
        <td>USUARIOS</td>        
        <td>FECHA VISITA</td>
          <td>INDICADOR</td> 
                
          </tr>";
while($guia = mysql_fetch_array($consulta)){
	echo "
<tr><td>". $guia['nombre_distrito_provincia_bd']."</td>
     <td>". $guia['Comunidad']."</td>   
     <td>". $guia['nombre_usuario']."</td>"; 
     if ( $guia['idindicadores_bd'] =='5') {//(CSET)-5 - Nº de AM Nº de AM ingresados al SISOPE
            echo "<td>". $guia['valor_indicador_bd']."</td>";       
         }  else {
             echo "<td>0</td>";   
         }
                 if ( $guia['idindicadores_bd'] =='3') {//(CSET)-3- Nº de AM sin DNI y NSE y/o en situaciòn de vulnerabilidad, identificados. ()
            echo "<td>". $guia['valor_indicador_bd']."</td>";       
         }  else {
             echo "<td>0</td>";   
         }
        if ( $guia['idindicadores_bd'] =='4') {//4-Nº de P.U. Asistidos
            echo "<td>". $guia['valor_indicador_bd']."</td>";       
         }  else {
             echo "<td>0</td>";   
         } 
        if ( $guia['idindicadores_bd'] =='8') {//8-Nº de U
            echo "<td>". $guia['valor_indicador_bd']."</td>";       
         }  else {
             echo "<td>0</td>";   
         } 

   echo"   
 <td>". $guia['fecha_indicador_ejecutado']."</td>       
<td>". $guia['nombre_indicadores_bd']."</td>   
     
          </tr>
	";
	}
	#paginar	
$NroRegistros=mysql_num_rows(mysql_query("select  du.nombre_distrito_provincia_bd,ufi.Comunidad,u.nombre_usuario,
 ufi.valor_indicador_bd,ufi.fecha_indicador_ejecutado,i.nombre_indicadores_bd,i.idindicadores_bd from  usuarios_formatos_indicadores_bd as ufi inner join formatos_indicadores_bd as fi on
ufi.idindicadores_bd=fi.idindicadores_bd inner join formatos_bd as f on
fi.idformatos_bd= f.idformatos_bd inner join indicadores_bd as i on
fi.idindicadores_bd=i.idindicadores_bd inner join actividades_bd as a on
fi.idactividades_bd=a.idactividades_bd inner join componentes_bd as co on
fi.idcomponentes_bd=co.idcomponentes_bd inner join usuarios as u on
ufi.idusuarios=u.idusuarios inner JOIN  distritos_ubigeo as du on
ufi.iddistritos_ubigeo=du.iddistritos_ubigeo"));
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;
//verificamos residuo para ver si llevará decimales
$Res=$NroRegistros%$RegistrosAMostrar;
if($Res>0) $PagUlt=floor($PagUlt)+1;
//desplazamiento
 echo "<tr><td colspan='9'>
<div style='margin-left: 121px;'>
<div  style=' clear:both; width:100%;'>
<a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"Paginaservicio('1')\">Primero</a> ";
if($PagAct>1) echo "<a style='text-decoration:underline;cursor:pointer;' onclick=\"Paginaservicio('$PagAnt')\">Anterior</a> ";
echo "<spam style='float:left;'><strong>Pagina ".$PagAct."/".$PagUlt."</strong></spam>";
if($PagAct<$PagUlt)  echo " <a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"Paginaservicio('$PagSig')\">Siguiente</a> ";
echo "<a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"Paginaservicio('$PagUlt')\">Ultimo</a></div>";
echo "
<div></td></tr>            
</table>  </div>
";
?>
  <input type="hidden" name="fecha" value="<?php echo date("Y-m-d H:i:s");?>">
 
      </form>
</div>
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
    <div class="content_box">
      <h2>D</h2>
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
      <li><a href="#">D</a></li>
      <li><a href="#">D</a></li>
      <li><a href="#">D</a></li>
      <li><a href="#">D</a></li>
      <li><a href="#">D</a></li>
      <li class="last_menu"><a href="#">D</a></li>
    </ul>
    Copyright &copy; 2014 <a href="http://www.kuraka.net/">kuraka.net</a></div>
</div>
</body>
</html>
