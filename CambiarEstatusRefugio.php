<!DOCTYPE html>
<html>
<head>
    <title>Cambiar estatus</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Cambiar estatus</h1>
    <?php
        $Usuario = "root";
        $ContraseñaBD = "";
        $Servidor = "localhost";
        $BaseDeDatos = "adopcion";

        $Conexion = mysqli_connect($Servidor,$Usuario,$ContraseñaBD) or die("No se conecto con el Servidor");

        $db = mysqli_select_db($Conexion,$BaseDeDatos) or die("No se conecto con la BD");
        
        $Estatus = htmlspecialchars($_GET["variable1"]);
        $ID = htmlspecialchars($_GET["variable2"]);
        if($Estatus == "Activo")
        {
            $Estatus = "No activo";
        }
        else
        {
            $Estatus = "Activo";
        }
        $comando = "UPDATE refugio SET Estatus='$Estatus' WHERE idRefugio='$ID'";
        
        if(mysqli_query($Conexion,$comando))
    	{ 
            echo "Cambio registrado.";
            $url="Admin.php";
            echo "<SCRIPT>window.location='$url';</SCRIPT>";
        } 
        else 
		{
      		echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
		}

        mysqli_close($Conexion);
    ?>
</body>
</html>