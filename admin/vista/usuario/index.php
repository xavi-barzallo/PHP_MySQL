
<html> 
<head> 

<meta charset="UTF-8"> 
<title>Gestión de usuarios</title> 
<link href="../../controladores/estilosIndex.css" rel="stylesheet" />
</head> 
<body>
<div class="login">
<div class="login-header">
    <h1>Iniciar Sesión</h1>
  </div> 
  
 
  <div class="login-form">
<table style="width:100%"> 

<tr> 
<th>Codigo</th> 
<th>Cedula</th> 
<th>Nombres</th> 
<th>Apellidos</th> 
<th>Dirección</th>
<th>Correo</th> 
<th>Fecha Nacimiento</th> 
</tr>

<?php 
include '../../../config/conexionBD.php'; 
$sql = "SELECT * FROM usuario"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) { 
while($row = $result->fetch_assoc()) { 
echo "<tr>";
echo " <td>" . $row["usu_codigo"] . "</td>";  
echo " <td>" . $row["usu_cedula"] . "</td>"; 
echo " <td>" . $row['usu_nombres'] ."</td>"; 
echo " <td>" . $row['usu_apellidos'] . "</td>"; 
echo " <td>" . $row['usu_direccion'] . "</td>";
echo " <td>" . $row['usu_correo'] . "</td>"; 
echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>"; 
echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>"; 
echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>"; 
echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";


echo "</tr>"; 
} 
} else { 
echo "<tr>"; 
echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>"; 
echo "</tr>"; 
} 
$conn->close(); 
?> 


</table> 
</div>
</div>
</body> 
</html>