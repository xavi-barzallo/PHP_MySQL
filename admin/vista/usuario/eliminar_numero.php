<html>
<head>
 <meta charset="UTF-8">
 <link href="../../controladores/estilosEliminar.css" rel="stylesheet" />
 <title>Modificar datos de persona</title>
</head>
<body>

 <div class="login">
        <div class="login-header">
            <h1>Cambio de numero</h1>
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
 $sql = "SELECT * FROM telefono where tel_codigo=$codigo";
 include '../../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../controladores/eliminar_numero.php">

 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <h3 for="numero">Numero (*)</h3>
 <input type="text" id="numero" name="numero" value="<?php echo $row["tel_numero"];
?>" required placeholder="Ingrese el nuevo numero" disabled/>
<br>
 <h3 for="operadora">Operadora (*)</h3>
 <input type="text" id="operadora" name="operadora" value="<?php echo $row["tel_operadora"];
?>"disabled required placeholder="Ingrese el nuevo numero"/>
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