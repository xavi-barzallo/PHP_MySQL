<html> 
  <head> 
    <?php
      session_start();
      if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
      header("Location: /Practica/public/vista/login.html");
      }
    ?>
    <meta charset="UTF-8"> 
    <title>Gestión de usuarios</title> 
    <link href="../../controladores/estilosIndex.css" rel="stylesheet" />
  </head> 
  <body>
    <div class="login">
      <div class="login-header">
          <h1>Gestión de Ususarios</h1>
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
          $codigo =  $_GET["correo"];
          $sql = "SELECT * FROM usuario where usu_correo = '$codigo'"; 
          $result = $conn->query($sql); 
          if ($result->num_rows > 0) { 
          while($row = $result->fetch_assoc()) { 
            $verificar = $row['usu_eliminado'];
            if($verificar == 'N'){
                echo "<tr>";
                echo " <td>" . $row["usu_codigo"] . "</td>";  
                echo " <td>" . $row["usu_cedula"] . "</td>"; 
                $cedula = $row["usu_cedula"];
                echo " <td>" . $row['usu_nombres'] ."</td>"; 
                echo " <td>" . $row['usu_apellidos'] . "</td>"; 
                echo " <td>" . $row['usu_direccion'] . "</td>";
                echo " <td>" . $row['usu_correo'] . "</td>"; 
                echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>"; 
                echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>"; 
                echo " <td> <a href='cambiar_contrasena.php?cedula=" . $row['usu_cedula'] . "'>Cambiar contraseña</a> </td>";
                echo " <td> <a href='crear_numero.php?cedula=" . $row['usu_cedula'] . "'>Agregar numero telefonico</a> </td>";
                echo "</tr>"; 
              }
            } 
            } else { 
            echo "<tr>"; 
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>"; 
            echo "</tr>"; 
          } 
          $conn->close(); 
        ?> 
      </table> 
      <h3>Agenda</h3>
      <table style="width:100%"> 
        <tr> 
        <th>Numero</th> 
        <th>Operadora</th> 
        </tr>
        <?php 
          include '../../../config/conexionBD.php'; 
          $sql2 = "SELECT * FROM telefono where usu_cedula = '$cedula'"; 
          $result2 = $conn->query($sql2); 
          if ($result2->num_rows > 0) { 
          while($row = $result2->fetch_assoc()) { 
                echo "<tr>";
                echo " <td>" . $row["tel_numero"] . "</td>";  
                echo " <td>" . $row["tel_operadora"] . "</td>";  
                echo " <td> <a href='modificar_numero.php?codigo=" . $row['tel_codigo'] . "'>Modificar</a> </td>"; 
                echo " <td> <a href='eliminar_numero.php?codigo=" . $row['tel_codigo'] . "'>Eliminar</a> </td>"; 
                echo "</tr>"; 
              } 
            } else { 
            echo "<tr>"; 
            echo " <td colspan='7'> No existen numeros registrados en el sistema</td>"; 
            echo "</tr>"; 
          } 
          $conn->close(); 
        ?> 
      </table> 
      </div>
    </div>
  </body> 
</html>