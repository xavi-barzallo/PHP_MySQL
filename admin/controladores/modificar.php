<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona </title>
</head>
<body>
<?php
 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';
 $codigo = $_POST["codigo"];
 $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
 $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
 $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
 $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
 $rol = isset($_POST["rol"]) ? trim($_POST["rol"]): null;
 $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE usuario " .
 "SET usu_cedula = '$cedula', " .
 "usu_nombres = '$nombres', " .
 "usu_apellidos = '$apellidos', " .
 "usu_direccion = '$direccion', " .
 "usu_correo = '$correo', " .
 "usu_fecha_nacimiento = '$fechaNacimiento', " .
 "usu_rol = '$rol', " .
 "usu_fecha_modificacion = '$fecha' " .
 "WHERE usu_codigo = $codigo";
 if ($conn->query($sql) === TRUE) {
 echo "Se ha actualizado los datos personales correctamemte!!!<br>";
 } else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
 }
 echo "<a href='../vista/admin/index.php'>Regresar</a>";
 $conn->close();
?>
</body>
</html>