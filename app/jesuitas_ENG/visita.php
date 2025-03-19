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
			<a href="../jesuitas_ES/visita.php">
				<img src="https://cdn-icons-png.flaticon.com/128/16022/16022729.png" alt="ES">
			</a>
		</nav>
        <main>
            <form method="POST" action="guardarVisita.php">
                <h1>Welcome back <?php echo $nombre; ?></h1>
                <label>Place: </label>
                <select name="ip">
                    <?php
                        $sql="SELECT ip, lugar FROM lugar;";
                        $resultado=$conexion->query($sql);
                        while($fila=$resultado->fetch_array()){
                            echo "<option value='" . $fila["ip"] . "'>" . $fila["lugar"] . "</option>";
                        }
						$conexion->close();
                    ?>
                </select>
                <input type="submit" name="Enviar" value="Send">
            </form>
        </main>
    </body>
</html>