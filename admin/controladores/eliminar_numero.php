<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos  </title>
</head>
<body>
<?php
 //incluir conexión a la base de datos
    include '../../config/conexionBD.php';
    $codigo = $_POST["codigo"];
    $sql = "DELETE FROM telefono " .
    "WHERE tel_codigo = $codigo";
    $sql1 = "SELECT * FROM usuario where usu_cedula=(SELECT usu_cedula FROM telefono where tel_codigo = '$codigo')";
    $result = $conn->query($sql1); 
    if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) { 
        $correo = $row['usu_correo'];
    }}
    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos correctamemte!!!<br>";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }
        echo "<a href='../vista/usuario/index.php?correo=$correo'>Regresar</a>";
    $conn->close();
?>
</body>
</html>