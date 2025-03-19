<?php
    session_start();
    $idJesuita = $_SESSION["idJesuita"];
    $ipLugar=$_POST["ip"];

    //Conecta con la base de datos ($conexión)
    include '../bd/conectarbd.php';
	
    //Cadena de caracteres de la consulta sql	
	$sql = "INSERT INTO visita (idJesuita, ip) VALUES (" . $idJesuita . ", '" . $ipLugar . "')";
	//echo $sql;
	
    //Ejecuta la consulta
	$conexion->query($sql);

	function visita_exitosa() {
        echo "<h1>Visit completed successfully</h1>
				<a href='visita.php'>
					<label>Register more visits!</label>
				</a>";
    }

    function visita_fallida() {
        echo "<h1>Error saving visit</h1>
				<a href='visita.php'>
					<label>Please register your visit again</label>
				</a>";
    }
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
                visita_exitosa();
            } else {
                visita_fallida();
            }
			$conexion->close();
        ?>
    </main>
</body>
</html>