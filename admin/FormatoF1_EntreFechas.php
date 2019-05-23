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
changeYear: true,
//numberOfMonths: 2
   });
 $(".campofechaf").datepicker({
  showOn: 'both',
   buttonImage: '../images/calendar.png',
  buttonImageOnly: true,
  changeYear: true,
// numberOfMonths: 2
   });
 }); 		 
</script>

</head><body> <div id="header_wrapper">
   
<?php // content="text/plain; charset=utf-8"
include("../func/funciones.php");
include 'login.php';
//include ("jpgraph/jpgraph.php"); 
//include ("jpgraph/jpgraph_pie.php"); 
//include ("jpgraph/jpgraph_pie3d.php"); 
$fechainis=$_GET['f1'];
$fechafins=$_GET['f2'];
$formato=$_GET['formato'];
$dedondeFormato=$_GET['dedondeFormato'];

if ($formato=='1') {
   #para paginar
$RegistrosAMostrar=20;
//estos valores los recibo por GET enviados por aki  a un js 
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
}
 $consultaProductos = dime("select  du.nombre_distrito_provincia_bd,ufi.Comunidad,u.nombre_usuario,
 ufi.valor_indicador_bd,ufi.fecha_indicador_ejecutado,i.nombre_indicadores_bd,i.idindicadores_bd,u.idusuarios,ufi.observacion_indicador,f.idformatos_bd from  usuarios_formatos_indicadores_bd as ufi inner join formatos_indicadores_bd as fi on
ufi.idindicadores_bd=fi.idindicadores_bd inner join formatos_bd as f on
fi.idformatos_bd= f.idformatos_bd inner join indicadores_bd as i on
fi.idindicadores_bd=i.idindicadores_bd inner join actividades_bd as a on
fi.idactividades_bd=a.idactividades_bd inner join componentes_bd as co on
fi.idcomponentes_bd=co.idcomponentes_bd inner join usuarios as u on
ufi.idusuarios=u.idusuarios inner JOIN  distritos_ubigeo as du on
ufi.iddistritos_ubigeo=du.iddistritos_ubigeo where u.idusuarios=".$idUsuarioL."  AND f.idformatos_bd='$formato' AND 
fecha_indicador_ejecutado BETWEEN '$fechainis' AND '$fechafins' ORDER BY ufi.fecha_indicador_ejecutado DESC; ") or die(ovni("consultar Por Fechas F1"));
/* $consultaProductos = dime("select p.descripcion_producto,dp.cantidad_pago  from detalle_de_pago dp  
inner join productos p on 
dp.idproductos=p.idproductos where dp.idpago=15 order by  dp.iddetalle_de_pago asc;")or die(ovni("consultar detalle de PAGOS"));
 */
echo "<div id='myPrintArea'>
    <table width='840px' border='1' class='tabla' style=''> 
         <tr style='background-color: #30bdff;' >
         <td>DISTRITO</td>
         <td>COMUNIDAD</td>        
       <td>AM</td>        
        <td>CSET</td> 
        <td>P.U</td>  
        <td>USUARIOS</td>        
        <td>FECHA</td>
          <td>COMENTARIOS</td> 
                
          </tr>";
while($guia = mysql_fetch_array($consultaProductos)){
	echo "
<tr><td>". $guia['nombre_distrito_provincia_bd']."</td>
     <td>". $guia['Comunidad']."</td>"; 
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
<td>". $guia['observacion_indicador']."</td>   
     
          </tr>
	";
	}
	#paginar	
$NroRegistros=mysql_num_rows(mysql_query("select  du.nombre_distrito_provincia_bd,ufi.Comunidad,u.nombre_usuario,
 ufi.valor_indicador_bd,ufi.fecha_indicador_ejecutado from  usuarios_formatos_indicadores_bd as ufi 
 inner join formatos_indicadores_bd as fi on
ufi.idindicadores_bd=fi.idindicadores_bd inner join formatos_bd as f on
fi.idformatos_bd= f.idformatos_bd inner join indicadores_bd as i on
fi.idindicadores_bd=i.idindicadores_bd inner join actividades_bd as a on
fi.idactividades_bd=a.idactividades_bd inner join componentes_bd as co on
fi.idcomponentes_bd=co.idcomponentes_bd inner join usuarios as u on
ufi.idusuarios=u.idusuarios inner JOIN  distritos_ubigeo as du on
ufi.iddistritos_ubigeo=du.iddistritos_ubigeo where u.idusuarios=".$idUsuarioL." AND 
fecha_indicador_ejecutado BETWEEN '$fechainis' AND '$fechafins';"));
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
}elseif ($formato=='2') {
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
 ufi.valor_indicador_bd,ufi.fecha_indicador_ejecutado,i.nombre_indicadores_bd,i.idindicadores_bd,u.idusuarios,ufi.observacion_indicador,a.nombre_actividad_bd,i.nombre_indicadores_bd from  usuarios_formatos_indicadores_bd as ufi inner join formatos_indicadores_bd as fi on
ufi.idindicadores_bd=fi.idindicadores_bd inner join formatos_bd as f on
fi.idformatos_bd= f.idformatos_bd inner join indicadores_bd as i on
fi.idindicadores_bd=i.idindicadores_bd inner join actividades_bd as a on
fi.idactividades_bd=a.idactividades_bd inner join componentes_bd as co on
fi.idcomponentes_bd=co.idcomponentes_bd inner join usuarios as u on
ufi.idusuarios=u.idusuarios inner JOIN  distritos_ubigeo as du on
ufi.iddistritos_ubigeo=du.iddistritos_ubigeo where u.idusuarios=$idUsuarioL and f.idformatos_bd=2 ORDER BY ufi.fecha_indicador_ejecutado DESC limit $RegistrosAMostrar  ")or die(ovni("consultar ser"));
echo "<div id='myPrintArea'>
    <table width='840px' border='1' class='tabla' style=''> 
         <tr style='background-color: #30bdff;' >
         <td>DISTRITO</td>
         <td>COMUNIDAD</td>        
       <td>Actividad</td>        
        <td>Codigo</td> 
        <td>Indicador</td>  
        <td>Cantidad</td>        
         <td>COMENTARIOS</td> 
         <td>FECHA</td>
         
                
          </tr>";
while($guia = mysql_fetch_array($consulta)){
	echo "
<tr><td>". $guia['nombre_distrito_provincia_bd']."</td>
     <td>". $guia['Comunidad']."</td>"; 
//     if ( $guia['idindicadores_bd'] =='5') {//(CSET)-5 - Nº de AM Nº de AM ingresados al SISOPE
//            echo "<td>". $guia['valor_indicador_bd']."</td>";       
//         }  else {
//             echo "<td>0</td>";   
//         }
//                 if ( $guia['idindicadores_bd'] =='3') {//(CSET)-3- Nº de AM sin DNI y NSE y/o en situaciòn de vulnerabilidad, identificados. ()
//            echo "<td>". $guia['valor_indicador_bd']."</td>";       
//         }  else {
//             echo "<td>0</td>";   
//         }
//        if ( $guia['idindicadores_bd'] =='4') {//4-Nº de P.U. Asistidos
//            echo "<td>". $guia['valor_indicador_bd']."</td>";       
//         }  else {
//             echo "<td>0</td>";   
//         } 
//        if ( $guia['idindicadores_bd'] =='8') {//8-Nº de U
//            echo "<td>". $guia['valor_indicador_bd']."</td>";       
//         }  else {
//             echo "<td>0</td>";   
//         } 

   echo"   
 <td>". $guia['nombre_actividad_bd']."</td>       
 <td> </td>       
 <td>". $guia['nombre_indicadores_bd']."</td>       
 <td>". $guia['valor_indicador_bd']."</td>       
 <td>". $guia['observacion_indicador']."</td>  "
           . "<td>". $guia['fecha_indicador_ejecutado']."</td>       
 
     
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
}


//
//
//$graph = new PieGraph(450,450,"auto"); 
//$graph->img->SetAntiAliasing(); 
//$graph->SetMarginColor('gray'); 
////$graph->SetShadow(); 
//
//// Setup margin and titles 
//$graph->title->Set("Productos Mas Comprados"); 
//
//$p1 = new PiePlot3D($array); 
//$p1->SetSize(0.35); 
//$p1->SetCenter(0.5); 
//
//// Setup slice labels and move them into the plot 
//$p1->value->SetFont(FF_FONT1,FS_BOLD); 
//$p1->value->SetColor("black"); 
//$p1->SetLabelPos(0.2); 
//
////$nombres=array("pepe","luis","miguel","alberto"); 
//$p1->SetLegends($nombres); 
//
//// Explode all slices 
//$p1->ExplodeAll(); 
//
//$graph->Add($p1); 
//$graph->Stroke(); 
//echo '<br>'.$fechainis.$fechafins ;
?>
</div></body>
