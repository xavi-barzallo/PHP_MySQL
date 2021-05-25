<!DOCTYPE html>
<html>
<head>
<link href="../../controladores/estilosEliminar.css" rel="stylesheet" />
 <meta charset="UTF-8">
 <title>Eliminar datos de persona</title>
</head>
<body>

 <div class="login">
        <div class="login-header">
            <h1>Eliminar</h1>
        </div>
        <div class="login-form">
        <?php
      session_start();
      if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
      header("Location: /Practica/public/vista/login.html");
      }
    ?>
 <?php

 $codigo = $_GET["codigo"];
 $sql = "SELECT * FROM usuario where usu_codigo=$codigo";

 include '../../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar.php">
 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <h3 for="cedula">Cedula (*)</h3>
 <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"
disabled/>
 <br>
 <h3 for="nombres">Nombres (*)</h3>
 <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];
?>" disabled/>
 <br>
 <h3 for="apellidos">Apelidos (*)</h3>
 <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];
?>" disabled/>
 <br>
 <h3 for="direccion">Dirección (*)</h3>
 <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];
?>" disabled/>
 <br>
 <h3 for="fecha">Fecha Nacimiento (*)</h3>
 <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo
$row["usu_fecha_nacimiento"]; ?>" disabled/>
 <br>
 <h3 for="correo">Correo electrónico (*)</h3>
 <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>"
disabled/>
 <br>
 <br>
 <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 </form>
 <?php
 }
 } else {
 echo "<p>Ha ocurrido un error inesperado !</p>";
 echo "<p>" . mysqli_error($conn) . "</p>";
 }
 $conn->close();
 ?>
        </div>
    </div>

</body>
</html>