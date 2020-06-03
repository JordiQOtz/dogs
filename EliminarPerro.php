<!DOCTYPE html>
<html>
<head>
	<title>Eliminar Perro</title>
    <meta charset="utf-8">
</head>
<body>
	<h1>Eliminar perro</h1>
	<?php
        $Id_Perro = htmlspecialchars($_GET["variable1"]);
        $Id_Refugio = htmlspecialchars($_GET["variable2"]);

    	$Usuario = "root";
    	$ContraseñaBD = "";
    	$Servidor = "localhost";
    	$BaseDeDatos = "adopcion";

    	$Conexion = mysqli_connect($Servidor,$Usuario,$ContraseñaBD) or die("No se conecto con el Servidor");

    	$db = mysqli_select_db($Conexion,$BaseDeDatos) or die("No se conecto con la BD");
    	
        $comando = "DELETE FROM perro WHERE idPerro = $Id_Perro";

    	if(mysqli_query($Conexion,$comando))
    	{ 
			echo "Perro eliminado.";
			$url="Refugio.php?variable1=$Id_Refugio";
			echo "<SCRIPT>window.location='$url';</SCRIPT>";
		} else 
		{
      		echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
		}

		mysqli_close($Conexion);
    ?>
</body>
</html>