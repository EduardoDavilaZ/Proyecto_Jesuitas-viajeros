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
    <title>Visit result</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilo/visita.css">
</head>
<body>
    <nav>
        <a href="../jesuitas_ES/guardarVisita.php">
            <img src="https://cdn-icons-png.flaticon.com/128/16022/16022729.png" alt="ES">
        </a>
    </nav>
    <main>
        <?php
            if ($conexion->affected_rows>0) {
                echo "<h1>Visit completed successfully</h1>
                    <a href='visita.php'>
                        <label>Register more visits!</label>
                    </a>";
            } else {
                echo "<h1>Error saving visit</h1>
                    <a href='visita.php'>
                        <label>Please register your visit again</label>
                    </a>";
            }
			$conexion->close();
        ?>
    </main>
</body>
</html>