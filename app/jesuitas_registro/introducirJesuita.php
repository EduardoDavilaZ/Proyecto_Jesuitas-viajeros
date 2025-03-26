<?php
    // Obtener datos del formulario
    $codigo = password_hash($_POST["codigo"], PASSWORD_BCRYPT);
    $nombre = $_POST["nombre"];
    $nombreAlumno = $_POST["nombreAlumno"];
    $firmaES = $_POST["firmaES"];
    $firmaENG = $_POST["firmaENG"];

    // Incluir la conexión a la base de datos
    include '../bd/conectarbd.php';
	
    $sql = "INSERT INTO jesuita (codigo, nombre, nombreAlumno, firma, firmaIngles) VALUES (" .
        "'" . $codigo . "', '" . $nombre . "','" . $nombreAlumno . "', " .
        "'" . $firmaES . "','" . $firmaENG . "');";

    $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Introducir jesuita</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilo/visita.css">
</head>
<body>
    <main>
        <?php
            if ($conexion->affected_rows > 0) {
                echo "<h1>Registro exitoso</h1>
                    <a href='../jesuitas_ES/jesuitas.html'>
                        <label>Inicia sesión</label>
                    </a>";
            } else {
                echo "<h1>Error en el registro</h1>
                    <a href='registro.html'>
                        <label>Retorna al formulario</label>
                    </a>";
            }
            $conexion->close();
        ?>
    </main>
</body>
</html>