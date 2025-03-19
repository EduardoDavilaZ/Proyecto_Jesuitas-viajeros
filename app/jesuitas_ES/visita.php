<?php
    session_start();
    $idJesuita = $_SESSION["idJesuita"];

    include '../bd/conectarbd.php';
	
    //Obtener nombre del jesuita para visualizarlo
    $sql = "SELECT nombreAlumno FROM jesuita WHERE idJesuita = " . $idJesuita . ";";
    $resultado = $conexion->query($sql);
    $fila = $resultado->fetch_array();
    $nombre = $fila["nombreAlumno"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Visita</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilo/visita.css">
    </head>
    <body>
		<nav>
			<a href="../jesuitas_ENG/visita.php">
				<img src="https://cdn-icons-png.flaticon.com/128/323/323329.png" alt="ENG">
			</a>
		</nav>
        <main>
            <form method="POST" action="guardarVisita.php">
                <h1>Hola <?php echo $nombre; ?></h1>
                <label>Lugar: </label>
                <select name="ip">
                    <?php
                        $sql="SELECT ip, lugar FROM lugar;";
                        $resultado=$conexion->query($sql);
                        while($fila=$resultado->fetch_array()){
                            echo "<option value='" . $fila["ip"] . "'>" . $fila["lugar"] . "</option>";
                        }
                    ?>
                </select>
                <input type="submit" name="Enviar">
            </form>
        </main>
    </body>
</html>