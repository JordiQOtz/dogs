<!DOCTYPE html>
<html>
<head>
    <title>Guardar cita</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Guardar cita</h1>
    <?php
		$Id_Cliente = htmlspecialchars($_GET["variable1"]);
		$Id_Perro = htmlspecialchars($_GET["variable2"]);
        $Id_Refugio = htmlspecialchars($_GET["variable3"]);
        
        $Usuario = "root";
        $ContraseñaBD = "";
        $Servidor = "localhost";
        $BaseDeDatos = "adopcion";

        $Conexion = mysqli_connect($Servidor,$Usuario,$ContraseñaBD) or die("No se conecto con el Servidor");

        $db = mysqli_select_db($Conexion,$BaseDeDatos) or die("No se conecto con la BD");
        
        if(isset($_POST['FechaDeCita']))
        {
        	$FechaDeCita = $_POST['FechaDeCita'];		
        	$HoraDeCita = $_POST['HoraDeCita'];		
		}

    	$comando = "INSERT INTO refugio_has_cliente (Refugio_idRefugio,Cliente_idCliente,Perro_idPerro,Cita,Hora) 
        VALUES ('$Id_Refugio','$Id_Cliente','$Id_Perro','$FechaDeCita','$HoraDeCita')";

    	if(mysqli_query($Conexion,$comando))
    	{ 
			echo "Cita registrado.";
			$url="Cliente.php?variable1=$Id_Cliente";
			echo "<SCRIPT>window.location='$url';</SCRIPT>";
		} else 
		{
      		echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
		}

		mysqli_close($Conexion);
    ?>
</body>
</html>