<!DOCTYPE html>
<html>
<head>
	<title>Eliminar cita</title>
    <meta charset="utf-8">
</head>
<body>
	<h1>Eliminar cita</h1>
	<?php
        $idCliente = htmlspecialchars($_GET["variable1"]);
        $Id_Perro = htmlspecialchars($_GET["variable2"]);

    	$Usuario = "root";
    	$ContraseñaBD = "";
    	$Servidor = "localhost";
    	$BaseDeDatos = "adopcion";

    	$Conexion = mysqli_connect($Servidor,$Usuario,$ContraseñaBD) or die("No se conecto con el Servidor");

    	$db = mysqli_select_db($Conexion,$BaseDeDatos) or die("No se conecto con la BD");
    	
        $comando = "DELETE FROM refugio_has_cliente WHERE Perro_idPerro = $Id_Perro AND Cliente_idCliente = $idCliente";

    	if(mysqli_query($Conexion,$comando))
    	{ 
			echo "cita eliminada.";
			$url="CitaCliente.php?variable1=$idCliente";
			echo "<SCRIPT>window.location='$url';</SCRIPT>";
		} else 
		{
      		echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
		}

		mysqli_close($Conexion);
    ?>
</body>
</html>