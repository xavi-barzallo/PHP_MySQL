<html> 
  <head> 
    <?php
      session_start();
      if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
      header("Location: /Practica/public/vista/login.html");
      }
    ?>
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