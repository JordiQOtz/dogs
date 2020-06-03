<!DOCTYPE html>
<html>
<head>
	<title>Editar Perro</title>
    <meta charset="utf-8">
</head>
<body>
	<h1>Editar perro</h1>
	<?php
		$Id_Perro = htmlspecialchars($_GET["variable1"]);
        $Id_Refugio = htmlspecialchars($_GET["variable2"]);

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
		}
        if($archivo){
            if (copy($archivo,$destino))
 		     {
                $fp = fopen($archivo, "rb");
                $Imagen = fread($fp, $tamanio);
                $Imagen = addslashes($Imagen);
                fclose($fp); 


                $comando = "UPDATE perro SET Nombre='$Nombre',Edad='$Edad',Genero='$Genero',Color='$Color',Raza='$Raza',Talla='$Talla',Peso='$Peso',Descripcion='$Descripción',NombreImg='$nombre',Ruta='$destino' WHERE idPerro=$Id_Perro";

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
        }
        else
        {
            $comando = "UPDATE perro SET Nombre='$Nombre',Edad='$Edad',Genero='$Genero',Color='$Color',Raza='$Raza',Talla='$Talla',Peso='$Peso',Descripcion='$Descripción' WHERE idPerro=$Id_Perro";

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