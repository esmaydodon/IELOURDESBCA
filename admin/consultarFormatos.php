<?
include '../func/funciones.php';
$idc = $_POST['id'];//para naa practicamente :p
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
} # para paginar
$consulta = dime(" select  du.nombre_distrito_provincia_bd,ufi.Comunidad,u.nombre_usuario,
 ufi.valor_indicador_bd,ufi.fecha_indicador_ejecutado from  usuarios_formatos_indicadores_bd as ufi inner join formatos_indicadores_bd as fi on
ufi.idindicadores_bd=fi.idindicadores_bd inner join formatos_bd as f on
fi.idformatos_bd= f.idformatos_bd inner join indicadores_bd as i on
fi.idindicadores_bd=i.idindicadores_bd inner join actividades_bd as a on
fi.idactividades_bd=a.idactividades_bd inner join componentes_bd as co on
fi.idcomponentes_bd=co.idcomponentes_bd inner join usuarios as u on
ufi.idusuarios=u.idusuarios inner JOIN  distritos_ubigeo as du on
ufi.iddistritos_ubigeo=du.iddistritos_ubigeo  ")or die(ovni("consultar ser"));
echo "<div id='myPrintArea'>
    <table width='840px' border='1' class='tabla' style=''> 
         <tr style='background-color: #30bdff;' >
         <td>DISTRITO</td>
         <td>COMUNIDAD</td>        
         <td>NOMBRE</td>        
         <td># VISITAS</td>        
         <td>FECHA VISITA</td>        
                
          </tr>";
while($guia = mysql_fetch_array($consulta)){
	echo "
<tr><td>". $guia['nombre_distrito_provincia_bd']."</td>
     <td>". $guia['Comunidad']."</td>   
     <td>". $guia['nombre_usuario']."</td>   
     <td>". $guia['valor_indicador_bd']."</td>   
     <td>". $guia['fecha_indicador_ejecutado']."</td>   
          </tr>
	";
	}
	#paginar	
$NroRegistros=mysql_num_rows(mysql_query(" select  du.nombre_distrito_provincia_bd,ufi.Comunidad,u.nombre_usuario,
 ufi.valor_indicador_bd,ufi.fecha_indicador_ejecutado from  usuarios_formatos_indicadores_bd as ufi inner join formatos_indicadores_bd as fi on
ufi.idindicadores_bd=fi.idindicadores_bd inner join formatos_bd as f on
fi.idformatos_bd= f.idformatos_bd inner join indicadores_bd as i on
fi.idindicadores_bd=i.idindicadores_bd inner join actividades_bd as a on
fi.idactividades_bd=a.idactividades_bd inner join componentes_bd as co on
fi.idcomponentes_bd=co.idcomponentes_bd inner join usuarios as u on
ufi.idusuarios=u.idusuarios inner JOIN  distritos_ubigeo as du on
ufi.iddistritos_ubigeo=du.iddistritos_ubigeo  "));
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