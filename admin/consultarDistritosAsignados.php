<?
include '../func/funciones.php';
$idc = $_POST['id'];//para naa practicamente :p
#para paginar
$RegistrosAMostrar=9;
//estos valores los recibo por GET enviados por aki  a un js 
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
} # para paginar
$consulta = dime("select  udu.*,u.nombre_usuario,du.nombre_distrito_provincia_bd,ubi.nombre_ubigeo_bd  from usuarios_has_distritos_ubigeo as udu inner join usuarios as u on
u.idusuarios=udu.idusuarios inner join distritos_ubigeo as du on
du.iddistritos_ubigeo=udu.distritos_ubigeo_iddistritos_ubigeo inner join ubigeos as ubi on
du.idubigeos=ubi.idubigeos ORDER BY udu.idusuarios desc LIMIT $RegistrosAEmpezar, $RegistrosAMostrar  ")or die(ovni("consultar ser"));
echo "<br><div id='myPrintArea' style='clear:both;'>
    <table width='100%' border='1' class='tabla' style=''> 
         <tr style='background-color: #30bdff;' >
         <td>Nombre Personal</td>
         <td>Nombre de Distrito</td>        
         <td>Tipo</td>            
          </tr>";
while($guia = mysql_fetch_array($consulta)){
	echo "
<tr><td>". $guia['nombre_usuario']."</td>
     <td>". $guia['nombre_distrito_provincia_bd']."</td>   
     <td>". $guia['nombre_ubigeo_bd']."</td>
         </tr>";
	}
	#paginar	
$NroRegistros=mysql_num_rows(mysql_query("select  udu.*,u.nombre_usuario,du.nombre_distrito_provincia_bd,ubi.nombre_ubigeo_bd  from usuarios_has_distritos_ubigeo as udu inner join usuarios as u on
u.idusuarios=udu.idusuarios inner join distritos_ubigeo as du on
du.iddistritos_ubigeo=udu.distritos_ubigeo_iddistritos_ubigeo inner join ubigeos as ubi on
du.idubigeos=ubi.idubigeos "));
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