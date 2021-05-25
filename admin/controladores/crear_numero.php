
<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Crear Nuevo Telefono</title> 
        <style type="text/css" rel="stylesheet"> 
        .error{ 
        color: red; 
        } 
        </style> 
    </head> 
    <body> 
        <?php 
            //incluir conexión a la base de datos 
            include '../../config/conexionBD.php';
            $cedula = $_GET['cedula'];
            $numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : null; 
            $operadora = isset($_POST["operadora"]) ? trim($_POST["operadora"]) : null; 
            $sql = "INSERT INTO telefono(tel_numero,tel_operadora,usu_cedula) VALUES ('$numero', '$operadora', '$cedula')"; 
            if ($conn->query($sql) === TRUE) { 
                echo "<p>Se ha creado el telefono correctamemte!!!</p>"; 
            } else { 
                if($conn->errno == 1062){ 
                    echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>"; 
                }else{ 
                    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>"; 
                } 
            } 
                //cerrar la base de datos 
            $conn->close(); 
            echo "<a href='../vista/usuario/crear_usuario.php'>Regresar</a>"; 
        ?> 
    </body> 
</html>

    
