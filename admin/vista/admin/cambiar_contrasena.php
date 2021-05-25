
<html>
<head>
 <meta charset="UTF-8">
 <link href="../../controladores/estilosContrasena.css" rel="stylesheet" />
 <title>Modificar datos de persona</title>
 <script type="text/javascript">
    function buscarPorCedula() {
        var cedula = document.getElementById("cedula").value;
        if (cedula == "") {
            document.getElementById("informacion").innerHTML = "";
        } else {
            if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
            // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            //alert("llegue");
                document.getElementById("informacion").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","php/buscar.php?cedula="+cedula,true);
        xmlhttp.send();
        }
        return false;
    }
 </script>
</head>
<body>
<div class="login">
        <div class="login-header">
            <h1>Cambio de Contraseña</h1>
        </div>
        <div class="login-form">
            <form id="" method="POST" action="">
            <?php
 //incluir conexión a la base de datos
 include "../../../config/conexionBD.php";
 $cedula = $_GET['cedula'];
 //echo "Hola " . $cedula;

 $sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' and usu_cedula='$cedula'";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Dirección</th>
 <th>Correo</th>
 <th>Fecha Nacimiento</th>
 <th></th>
 <th></th>
 <th></th>
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row['usu_cedula'] . "</td>";
 $codigo = $row['usu_codigo'];
 echo " <td>" . $row['usu_nombres'] ."</td>";
 echo " <td>" . $row['usu_apellidos'] . "</td>";
 echo " <td>" . $row['usu_direccion'] . "</td>";
 echo " <td>" . $row['usu_correo'] . "</td>";
 echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
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
<?php
      session_start();
      if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
      header("Location: /Practica/public/vista/login.html");
      }
    ?>
 <form id="formulario01" method="POST" action="../../controladores/usuario/cambiar_contrasena.php">

 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <label for="cedula">Contraseña Actual (*)</label>
 <input type="password" id="contrasena1" name="contrasena1" value="" required
placeholder="Ingrese su contraseña actual ..."/>
 <br>
 <label for="cedula">Contraseña Nueva (*)</label>
 <input type="password" id="contrasena2" name="contrasena2" value="" required
placeholder="Ingrese su contraseña nueva ..."/>
 <br>

 <input type="submit" id="modificar" name="modificar" value="Modificar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 </form>
        </div>
    </div>


</body>
</html>