 <?php
include("../func/funciones.php");
include '../admin/login.php';
$idc = $_POST['id'];
$consulta = dime("SELECT * FROM usuario_p65  where idusuario_p65=$idc ")or die( ovni("Oo"));
$consulata_tipo2=dime("SELECT u.*,du.nombre_distrito_provincia_bd FROM usuario_p65 as u inner join distritos_ubigeo as du on
u.iddistritos_ubigeo=du.iddistritos_ubigeo where u.idusuario_p65=$idc");
//echo $consulata_tipo2;ss
//agregar consulta para select de documentos
$consulata_documento=dime("select d.fecha_de_envio_documento_bd,d.`nombreDocumento_bd`,d.fecha_de_digitacion,d.id,u.idusuarios from documentos_bd as d inner join usuarios as u on
d.`idusuario_p65`=u.idusuarios where u.idusuarios=$idUsuarioL order by id desc ");
$consulta_documento_del_usuario_programa= dime("select u.`idusuario_p65`,u.documento_para_envio,d.id,d.`nombreDocumento_bd`,d.fecha_de_envio_documento_bd from usuario_p65 as u inner join documentos_bd as d on
u.documento_para_envio=d.id where u.`idusuario_p65`=$idc");
while($Potencial_arreglo = mysql_fetch_array($consulta)){
echo " 
<div style=' '>
<form action='UpdatePotencial.php'  class='contacto' name='form_personal_utc' method='post' enctype='multipart/form-data'>
            <table border='0'>        
              <tr>
            <tr style='background-color: chartreuse'>
                <td>DOCUMENTO PARA ENVIO:</td>
                <td>
                  <select id ='id' name='id' class='select' ='MostrarCoordinador();'>";
     while($local=mysql_fetch_array($consulta_documento_del_usuario_programa)){ 
		 		echo"<option value='".$local['id']."'>".$local['nombreDocumento_bd']."-".$local['fecha_de_envio_documento_bd']."</option>";
                                                                }
                                                                echo " <option value=0>Seleccionar Documento</option>";
     while($local=mysql_fetch_array($consulata_documento)){   
		 		echo"<option value='".$local['id']."'>".$local['nombreDocumento_bd']."</option>";
                                                                }
                                                                
	echo" </select>	
                </td>
              </tr>
              <tr>
                <td>DNI</td>
                <td><input name='dni_usuario_p65_col' type='text' id='dni_usuario_p65_col' size='50' value='". $Potencial_arreglo['dni_usuario_p65_col']."' /></td>
              </tr>
              <tr>
                <td>APELLIDO PATERNO:</td>
                <td><input name='Ape_paterno_usuario_p65_col' type='text' id='Ape_paterno_usuario_p65_col' size='50' value='". $Potencial_arreglo['Ape_paterno_usuario_p65_col']."'/></td>
              </tr>
              <tr>
                <td>APELLIDO MATERNO:</td>
                <td><input name='ape_materno_usuario_p65_col' type='text' id='ape_materno_usuario_p65_col' size='50' value='". $Potencial_arreglo['ape_materno_usuario_p65_col']."' /></td>
              </tr>
              <tr>
                <td>NOMBRES:</td>
                <td><input name='nombre_usuariop65' type='text' id='nombre_usuariop65' size='50' value='". $Potencial_arreglo['nombre_usuariop65']."' /></td>
              </tr>
				  <tr>
					<td>DIRECCION:</td>
					<td><input name='direccion_usuario_p65_col' type='text' id='direccion_usuario_p65_col' size='50' value='". $Potencial_arreglo['direccion_usuario_p65_col']."'/></td>
				  </tr>
				  <tr>
                <td>SEXO:</td>
                <td><select id ='SEXO' name='sexo_usuario_p65_col' class='select'>";
        if ($Potencial_arreglo['sexo_usuario_p65_col']==1) {
          echo"<option value='1'>Masculino</option>"
            . "<option value='2'>Femenino</option>";
                                                                }
                                                                elseif ($Potencial_arreglo['sexo_usuario_p65_col']==2) {
                                                                    echo "<option value='2'>Femenino </option>"
                                                                    . "<option value='1'>Masculino</option>";
                                                            }
         echo"    </select></td>
              </tr>
              <tr>
                <td>DISTRITO:</td>
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
	echo" </select>	
                </td>
                <td>DIRECCION / CP:</td>
                <td><input name='direccion_usuario_p65_col' type='text' id='direccion_usuario_p65_col' size='50' value='".$Potencial_arreglo['direccion_usuario_p65_col']."'/></td>
              </tr>
              <tr>
                <td>REFERENCIA:</td>
                <td><input name='referencia_usuario_p65_col' type='text' id='referencia_usuario_p65_col' size='50' value='".$Potencial_arreglo['referencia_usuario_p65_col']."' /></td>
              </tr>
              <tr>
                <td>FECHA DE NACIMIENTO:</td>
                <td><input  name='fecha_nacimiento_usuario_p65_col' type='text' id='fecha_nacimiento_usuario_p65_col' size='50' value='".$Potencial_arreglo['fecha_nacimiento_usuario_p65_col']."'/></td>
              </tr>
                 <tr>
                <td>LISTA:</td>
                <td><input  name='lista_usuario_p65' type='text' id='lista_usuario_p65' size='50' value='".$Potencial_arreglo['lista_usuario_p65']."'/></td>
              </tr>
               
              <tr>
                <td><input type='submit' value='Enviar' class='button mediano azul'></td>
         
              </tr>
            </table>
            <input type='hidden' name='phpmailer' />
            <input type='hidden' name='estado_usuario' value='1' />
             <input type='hidden' name='idusuario_p65' value='".$Potencial_arreglo['idUsuario_p65']."' />
            <input type='hidden' name='fecha_de_digitacion' value='<?php echo date('Y-m-d H:i:s');?>' />
          </form>
</div>	";	
	} 
?>