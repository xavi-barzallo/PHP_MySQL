<?php
 session_start();
 include '../../Config/conexionBD.php';
 $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 $sql = "SELECT usu_rol FROM usuario WHERE usu_correo = '$usuario' and usu_eliminado = 'N' and usu_password =MD5('$contrasena')";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0  ) {
    $_SESSION['isLogged'] = TRUE;   
    while($row1 = $result->fetch_assoc()) {    
    $rol=$row1['usu_rol'];
    }
    if($rol == "user"){ 
        header("Location: ../../admin/vista/usuario/index.php?correo=$usuario");
        
    }else{
        header("Location: ../..//admin/vista/admin/index.php?correo=$usuario");
        
    }}else {
        header("Location: ../vista/login.html");
      
}
     $conn->close();

?>