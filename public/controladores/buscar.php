<?php
 //incluir conexión a la base de datos
 include "../../config/conexionBD.php";
 $cedula = $_GET['cedula'];
 //echo "Hola " . $cedula;

 $sql = "SELECT * FROM usuario u,telefono t WHERE u.usu_eliminado = 'N' and u.usu_cedula='$cedula'";

//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th>Cedula</th>
 <th>Correo</th>
 <th>Numero de telefono</th>
 <th>Operadora</th>
 <th></th>
 <th></th>
 <th></th>
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row['usu_cedula'] . "</td>";
 echo " <td><a href='mailto:". $row['usu_correo']. "'>". $row['usu_correo']. "</a></td>";
 echo " <td><a href='mailto:" . $row['tel_numero'] . "'>" . $row['tel_numero'] . "</a></td>";
 echo " <td>" . $row['tel_operadora'] . "</td>";
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?>