<?php
    session_start();
    $idJesuita = $_SESSION["idJesuita"];
    $ipLugar=$_POST["ip"];

    //Conecta con la base de datos ($conexión)
    include '../bd/conectarbd.php';
	
    //Cadena de caracteres de la consulta sql	
	$sql = "INSERT INTO visita (idJesuita, ip) VALUES (" . $idJesuita . ", '" . $ipLugar . "')";
	
    //Ejecuta la consulta
	$conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado de visita</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilo/visita.css">
</head>
<body>
    <nav>
        <a href="../jesuitas_ENG/guardarVisita.php">
            <img src="https://cdn-icons-png.flaticon.com/128/323/323329.png" alt="ENG">
        </a>
    </nav>
    <main>
        <?php
            if ($conexion->affected_rows>0) {
                echo "<h1>Visita realizada</h1>
                    <a href='visita.php'>
                        <label>Registra más visitas!</label>
                    </a>";
            } else {
                echo "<h1>La visita no se ha realizado</h1>
                    <a href='visita.php'>
                        <label>Vuelve a registrar tu visita</label>
                    </a>";
            }
			$conexion->close();
        ?>
    </main>
</body>
</html>