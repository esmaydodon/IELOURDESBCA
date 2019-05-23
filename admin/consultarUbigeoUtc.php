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
$consulta = dime("select du.iddistritos_ubigeo,du.nombre_distrito_provincia_bd,du.pertenece_ubigeo,u.nombre_ubigeo_bd  from distritos_ubigeo as du inner join ubigeos as u on
du.idubigeos=u.idubigeos  ORDER BY du.iddistritos_ubigeo desc LIMIT $RegistrosAEmpezar, $RegistrosAMostrar  ")or die(ovni("consultar ser"));
echo "<div id='myPrintArea'>
    <table width='100%' border='1' class='tabla' style=''> 
         <tr style='background-color: #30bdff;' >
         <td>Id Distrito_Ubigeo</td>
         <td>Nombre</td>        
         <td>Pertenece A</td>        
         <td>Clasificacion</td>     
          </tr>";
while($guia = mysql_fetch_array($consulta)){
	echo "
<tr><td>". $guia['iddistritos_ubigeo']."</td>
     <td>". $guia['nombre_distrito_provincia_bd']."</td>   
     <td>". $guia['pertenece_ubigeo']."</td>   
     <td>". $guia['nombre_ubigeo_bd']."</td>    
         </tr>
	";
	}
	#paginar	
$NroRegistros=mysql_num_rows(mysql_query("select du.iddistritos_ubigeo,du.nombre_distrito_provincia_bd,du.pertenece_ubigeo,u.nombre_ubigeo_bd  from distritos_ubigeo as du inner join ubigeos as u on
du.idubigeos=u.idubigeos"));
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
<a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"PaginaUbigeo('1')\">Primero</a> ";
if($PagAct>1) echo "<a style='text-decoration:underline;cursor:pointer;' onclick=\"PaginaUbigeo('$PagAnt')\">Anterior</a> ";
echo "<spam style='float:left;'><strong>Pagina ".$PagAct."/".$PagUlt."</strong></spam>";
if($PagAct<$PagUlt)  echo " <a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"PaginaUbigeo('$PagSig')\">Siguiente</a> ";
echo "<a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"PaginaUbigeo('$PagUlt')\">Ultimo</a></div>";
echo "
<div></td></tr>            
</table>  </div>
";
?>