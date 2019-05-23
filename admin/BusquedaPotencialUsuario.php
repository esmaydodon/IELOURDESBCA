<?php
ob_start("ob_gzhandler"); 
session_start();
include 'login.php';
include("../func/funciones.php");
$busqueda=$_POST['busqueda'];
$dedonde=$_POST['dedo'];
$idusuarioPotencial=$_POST['idubi'];
//#modificado x  www.kuraka.net  -  mmq 
#modificado x  www.kuraka.net  -  mmq - 2015
//mmq 2017 aca tenemosque sacar el ubigeodel usuario del sistema para en la cadena hacer where con ese id ubigeo
        $RegistrosAMostrar=10;
//estos valores los recibo por GET enviados por aki  a un js 
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
} # para PersonalUtcPaginacionr
$sacaUbigeo= dime("select du.distritos_ubigeo_iddistritos_ubigeo FROM usuarios as  u inner join usuarios_has_distritos_ubigeo as du on
u.idusuarios=du.idusuarios where u.idusuarios='$idusuarioPotencial' ");
while ($row = mysql_fetch_array($sacaUbigeo)) {
     $ubi=$row[distritos_ubigeo_iddistritos_ubigeo];
}
if ($busqueda<>''){
	//CUENTA EL NUMERO DE PALABRAS
	$trozos=explode(" ",$busqueda);
	$numero=count($trozos);
//	echo $numero;
	if ($numero==1) {
            
		//SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
		$cadbusca="SELECT d.`nombreDocumento_bd`,d.fecha_de_envio_documento_bd,u.documento_para_envio,u.`idusuario_p65`,u.dni_usuario_p65_col,u.ape_paterno_usuario_p65_col,
u.ape_materno_usuario_p65_col,u.nombre_usuariop65,u.referencia_usuario_p65_col,u.iddistritos_ubigeo FROM usuario_p65 as u 
 inner join documentos_bd as d on u.documento_para_envio=d.id
where u.iddistritos_ubigeo='$ubi' and (u.Ape_paterno_usuario_p65_col LIKE '%$busqueda%' 
OR u.ape_materno_usuario_p65_col LIKE '%$busqueda%'
OR u.nombre_usuariop65 LIKE '%$busqueda%' 
or u.dni_usuario_p65_col like '%$busqueda%')
LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";	
	} elseif ($numero>1) {
		//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
		//busqueda de frases con mas de una palabra y un algoritmo especializado
		$cadbusca="SELECT d.`nombreDocumento_bd`,d.fecha_de_envio_documento_bd,u.documento_para_envio,u.`idusuario_p65`,u.dni_usuario_p65_col,u.ape_paterno_usuario_p65_col,
u.ape_materno_usuario_p65_col,u.nombre_usuariop65,u.referencia_usuario_p65_col,u.iddistritos_ubigeo FROM usuario_p65 as u 
 inner join documentos_bd as d on u.documento_para_envio=d.id
where u.iddistritos_ubigeo='$ubi' and (u.Ape_paterno_usuario_p65_col LIKE '%$busqueda%' 
OR u.ape_materno_usuario_p65_col LIKE '%$busqueda%'
OR u.nombre_usuariop65 LIKE '%$busqueda%' 
or u.dni_usuario_p65_col like '%$busqueda%')
LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";	
		/*$cadbusca="SELECT * , MATCH ( nombre_producto, descripcion_producto ) 
                 * AGAINST ( '$busqueda' ) AS Score FROM productos 
                 * WHERE MATCH ( nombre_producto, descripcion_producto ) AGAINST ( '$busqueda' ) ORDER BY Score DESC LIMIT 50;";*/
	}
	function limitarPalabras($cadena, $longitud, $elipsis = "..."){
		$palabras = explode(' ', $cadena);
		if (count($palabras) > $longitud)
			return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
		else
			return $cadena;#
	}
//ya ppueeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
	#echo $cadbusca; onclick='pedirDatosPotencial_func(".$filas['idusuario_p65'].  ")'
	$resultado =dime($cadbusca)or die(ovni("busqueda:"));
echo "<div id='myPrintArea'>
    <table width='100%' border='1' class='tabla' style=''> 
         <tr style='background-color: #30bdff;' >
         <td>ID</td>
         <td>DNI</td>        
         <td>Apellido Paterno</td>        
         <td>Apellido materno</td>        
         <td>Nombre</td> 
         <td>CP/Comunidad</td>
         <td>Referencia</td>  
         <td>Documento Envio</td>
         <td>Editar</td>     
        </tr>";
	while($filas=mysql_fetch_array($resultado)){
	
            echo "
<tr>
<td>". $filas['idusuario_p65']."</td>
<td>". $filas['dni_usuario_p65_col']."</td>	
     <td>". $filas['ape_paterno_usuario_p65_col']."</td>   
     <td>". $filas['ape_materno_usuario_p65_col']."</td>   
     <td>". $filas['nombre_usuariop65']."</td>   
     <td>". $filas['direccion_usuario_p65_col']."</td>   
     <td>". $filas['referencia_usuario_p65_col']."</td>   ";
        if ($filas['documento_para_envio']==0) {
            echo "<td style=' background-color: red'>".$filas['documento_para_envio']."</td>";
        }else{echo "<td style='background-color: chartreuse'>".$filas['documento_para_envio']."</td>";}
        echo "
      <td>
         <div id='pedir'>
         <a  style='cursor:pointer; text-decoration:underline;' onclick='pedirDatosPotencial_func(".$filas['idusuario_p65'].  ")'>
         <img src='../images/32x32/image_edit.png' width='32' height='32'></a>
         </div>
      </td> 

         </tr>
	";
     
		}
}

