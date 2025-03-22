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
    <title>Validar usuario</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilo/visita.css">
</head>
<body>
    <nav>
        <a href="../jesuitas_ENG/validarUsuario.html">
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