<?php
    // Obtener datos del formulario
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];

    // Incluir la conexión a la base de datos
    include '../bd/conectarbd.php';
	
    $sql = "SELECT idJesuita FROM jesuita WHERE nombre = '" . $nombre. "' AND codigo = '" . $codigo . "'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) { // Si la consulta fue exitosa, se envía los datos a $_SESSION
        session_start();
		
        $fila = $resultado->fetch_array();
        $idJesuita = $fila["idJesuita"];

        $_SESSION["idJesuita"] = $idJesuita;
        $_SESSION["nombre"] = $nombre;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Validate user</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilo/visita.css">
</head>
<body>
    <nav>
        <a href="../jesuitas_ES/validarUsuario.php">
            <img src="https://cdn-icons-png.flaticon.com/128/16022/16022729.png" alt="ES">
        </a>
    </nav>
    <main>
        <?php
            if ($resultado->num_rows > 0) { // Si la consulta fue exitosa, se permite el acceso a visita.php
                echo "<h1>Welcome</h1>
                    <a href='visita.php'>
                        <label>Start recording visits</label>
                    </a>";
            } else { // Sino, se retorna al formulario jesuitas.html
                echo "<h1>Invalid user</h1>
                    <a href='jesuitas.html'>
                        <label>Return to the form</label>
                    </a>";
            }
            $conexion->close();
        ?>
    </main>
</body>
</html>