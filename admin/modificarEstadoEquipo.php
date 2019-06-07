<?php 
include("../func/funciones.php");
$idc = $_POST['id'];
$consulta = dime("SELECT p.*,e.serie_equipo_bd,e.equipos_codigo_bd,u.nombre_usuario  FROM prestamo_bd AS p inner join equipos_bd as e on 
p.idequipos_bd=e.idequipos_bd  inner join usuarios as u on 
p.idusuarios =u.idusuarios WHERE idprestamo_bd =$idc")or die( ovni("Oo"));
//pra sacar ubigro
while($Potencial_arreglo = mysql_fetch_array($consulta)){
echo " <div style=' '>
    <form action='UpdatePrestamoEquipo.php' name='form_personal_utc' method='post' class='contacto' enctype='multipart/form-data' >
<input value='<?Php echo $idUsuarioL;?>' name='idusuarioPotencial' type='hidden'/>            
<input value='".$Potencial_arreglo['idprestamo_bd']."' name='idprestamo_bd' type='hidden'/>            
<table border='0'>
	       <tr>
                <td>SERIE EQUIPO:</td>
                <td>".$Potencial_arreglo['serie_equipo_bd']."</td>
                <td>FECHA PRESTAMO:</td>
                <td>".$Potencial_arreglo['fecha_prestamo_bd']."</td>
              </tr>
              <tr>
                <td>CODIGO EQUIPO:</td>
                <td>".$Potencial_arreglo['equipos_codigo_bd']."</td>
                    <td>HORA PRESTAMO:</td>
                <td>".$Potencial_arreglo['hora_prestamo']."</td>
              </tr>
             
                <tr>
                    <td>DETALLE PRESTAMO:</td>
                    <td> 
                ".$Potencial_arreglo['detalle_prestamo_bd']."
                    </td>
                     <td>RESPONSABLE:</td>
                    <td> 
                ".$Potencial_arreglo['nombre_usuario']."
                    </td>
                </tr>
                    <tr>
              <td>ESTADO PRESTAMO:</td>
               <td><input name='prestado_equipo_bd' type='text' id='prestado_equipo_bd' size='50' value='0'/>
               </td>
               
              </tr>
              <tr>
<td>FECHA DEVOLUCION:</td>
               <td><input name='fecha_devolucion' type='text' id='fecha_devolucion' size='50' value='".$Potencial_arreglo['fecha_prestamo_bd']."'/>
               </td>              
</tr>
              <tr> 
              
                <td><input type='submit' value='REGISTRAR' class='button mediano azul'></td>
              </tr>
            </table>
            <input type='hidden' name='phpmailer' />
            <input type='hidden' name='fecha_de_devolucion' value='".date('Y-m-d H:i:s')."' />
          </form>"
        . "</div>";
}