<?php 
include("../func/funciones.php");
$idc = $_POST['id'];
$consulta = dime("SELECT * FROM documentos_bd  where id =$idc ")or die( ovni("Oo"));
//pra sacar ubigro
$consulata_tipo2=dime("SELECT d.id,d.iddistritos_ubigeo,du.nombre_distrito_provincia_bd  
FROM documentos_bd as d  inner join distritos_ubigeo as du on d.iddistritos_ubigeo=du.iddistritos_ubigeo
 where d.id=$idc");
while($Potencial_arreglo = mysql_fetch_array($consulta)){
echo " <div style=' '>
    <form action='UpdateDocumento.php' name='form_personal_utc' method='post' class='contacto' enctype='multipart/form-data' >
            <table border='0'>
	       <tr>
                <td>NOMBRE DOCUMENTO:</td>
                <td><input name='nombreDocumento_bd' type='text' id='nombreDocumento_bd' size='50' value='".$Potencial_arreglo['nombreDocumento_bd']."'/></td>
              </tr>
                 <tr>
              <td>FECHA DE ENVIO:</td>
               <td><input name='fecha_de_envio_documento_bd' type='text' id='fecha_de_envio_documento_bd' size='50' value='".$Potencial_arreglo['fecha_de_envio_documento_bd']."'/>
               </td>
              </tr>
                <tr>
                    <td>DETALLE DOCUMENTO</td>
                    <td> 
                        <textarea name='detalleDocumento_bd' id='detalleDocumento_bd' rows='10' cols='60'>
                        ".$Potencial_arreglo['detalleDocumento_bd']."
                        </textarea>
                    </td>
                </tr>
              <tr>
                <td>UBIGEO:</td>
                <td>
<select id ='iddistritos_ubigeo' name='iddistritos_ubigeo' class='select' onchange='MostrarCoordinador();'>";
		while($local=mysql_fetch_array($consulata_tipo2)){ 
			if ($local['idubigeos']==1)
			{
				$distrito_provincia='Provincia +';
				}
				else if($local['idubigeos']==2)
				{
					$distrito_provincia='Distrito';
				}
				
    	echo"<option value='".$local['iddistritos_ubigeo']."'>".$local['nombre_distrito_provincia_bd']." -". $distrito_provincia."</option>";
                                
                                }
	echo" </select>	</br>
        </td>
          
                <td><input type='submit' value='REGISTRAR' class='button mediano azul'></td>
                <!--    <span  id='listar_personal' onclick='listarFormatos()'>LISTAR FORMATOS</span>-->
              </tr>
            </table>
            <input type='hidden' name='phpmailer' />
            <input type='hidden' name='estado_documento_bd' value='1' />
            <input type='hidden' name='idUsuario_p65' value='<?php echo $idUsuarioL?>' />
                <input type='hidden' name='id' value='".$Potencial_arreglo[id]."' />
            <input type='hidden' name='fecha_de_digitacion' value='".date('Y-m-d H:i:s')."' />
          </form>"
        . "</div>";
}