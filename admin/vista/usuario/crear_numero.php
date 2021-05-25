<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link href="../../controladores/estilosEliminar.css" rel="stylesheet" />
    <style type="text/css">
        .error {
            color: rgb(255, 230, 0);
            font-size: 16px;
        }
    </style>
</head>
<div class="login">
    <div class="login-header">
        <h1>Crear Telefono</h1>
    </div>
    <div class="login-form">
        <body>
            <?php
                $cedula = $_GET['cedula'];
                echo ' 
                <td>
                    <form id="formulario01" method="POST" action="../../controladores/crear_numero.php?cedula='. $cedula .'">
                        <h3 for="numero">Numero telefonico (*)</h3>
                        <input type="text" id="numero" name="numero" value="" placeholder="Ingrese el número telefono..." maxlength="10" />
                        <br>
                        <h3 for="operadora">Operadora (*)</h3>
                        <input type="text" id="operadora" name="operadora" value="" placeholder="Ingrese la operadora telefonica..."  />
                        <br>
                        <input type="submit" id="crear" name="crear" value="Aceptar" />
                        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href="login.html"" />
                    </form>
                </td>
                '; 
            ?>
            
    </div>
</div>
</body>

</html>