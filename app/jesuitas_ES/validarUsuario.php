<?php
    session_start(); // Iniciar la sesión desde el inicio

    // Obtener datos del formulario
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];

    // Incluir la conexión a la base de datos
    include '../bd/conectarbd.php';

    // Obtener idJesuita y el código hasheado del usuario
    $sql = "SELECT idJesuita, codigo FROM jesuita WHERE nombre = '" . $nombre . "'";
    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){ // Si la consulta es correcta, se obtiene el código hasheado
        $fila = $resultado->fetch_array();
        $codigoHash = $fila["codigo"];
        if(password_verify($codigo, $codigoHash)){ // Si la contraseña es correcta, se guardan los datos en $_SESSION
            $_SESSION["idJesuita"] = $fila["idJesuita"];
            $_SESSION["nombre"] = $nombre;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Validar usuario</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilo/visita.css">
</head>
<body>
    <nav>
        <a href="../jesuitas_ENG/validarUsuario.php">
            <img src="https://cdn-icons-png.flaticon.com/128/323/323329.png" alt="ENG">
        </a>
    </nav>
    <main>
        <?php
            if ($resultado->num_rows > 0) { // Si la consulta fue exitosa, se permite el acceso a visita.php
                echo "<h1>Bienvenid@</h1>
                    <a href='visita.php'>
                        <label>Empieza a registrar visitas</label>
                    </a>";
            } else { // Sino, se retorna al formulario jesuitas.html
                echo "<h1>Usuario inválido</h1>
                    <a href='jesuitas.html'>
                        <label>Regresar al formulario</label>
                    </a>";
            }
            $conexion->close();
        ?>
    </main>
</body>
</html>