<!DOCTYPE html>
<html>
<head>
	<title>Registrar Perro</title>
    <meta charset="utf-8">
</head>
<body>
	<h1>Registrar perro</h1>
	<?php
		$Id_Refugio = htmlspecialchars($_GET["variable1"]);

    	$Usuario = "root";
    	$ContraseñaBD = "";
    	$Servidor = "localhost";
    	$BaseDeDatos = "adopcion";

    	$Conexion = mysqli_connect($Servidor,$Usuario,$ContraseñaBD) or die("No se conecto con el Servidor");

    	$db = mysqli_select_db($Conexion,$BaseDeDatos) or die("No se conecto con la BD");
    	
        if(isset($_POST['Nombre']))
        {
        	$Nombre = $_POST['Nombre'];
        	$Edad = $_POST['Edad'];
        	$Genero = $_POST['Genero'];
        	$Color = $_POST['Color'];
        	$Raza = $_POST['Raza'];
        	$Talla = $_POST['Talla'];
			$Peso = $_POST['Peso'];
			$archivo = $_FILES["Imagen"]["tmp_name"];
			$nombre  = $_FILES["Imagen"]["name"];
			$destino = "imagenes/".$nombre;
        	$Descripción = $_POST['Descripción'];
			$Estatus = "En adopción";
		}
		if (copy($archivo,$destino))
 		{
			$comando = "INSERT INTO perro (Nombre,Edad,Genero,Color,Raza,Talla,Peso,Descripcion,NombreImg,Ruta,Estatus,Refugio_idRefugio) VALUES ('$Nombre','$Edad','$Genero','$Color','$Raza','$Talla','$Peso','$Descripción','$nombre','$destino','$Estatus','$Id_Refugio')";

    		if(mysqli_query($Conexion,$comando))
    		{ 
				echo "Perro registrado.";
				$url="Refugio.php?variable1=$Id_Refugio";
				echo "<SCRIPT>window.location='$url';</SCRIPT>";
			} 
			else 
			{
      			echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
			}
		}

		mysqli_close($Conexion);
    ?>
</body>
</html>