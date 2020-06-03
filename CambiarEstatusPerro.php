<!DOCTYPE HTML>
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
        $id_Refugio= htmlspecialchars($_GET["variable3"]);
        if($Estatus == "En adopción")
        {
            $Estatus = "Adoptado";
        }
        else
        {
            $Estatus = "En adopción";
        }
        $comando = "UPDATE perro SET Estatus='$Estatus' WHERE idPerro='$ID'";
        
        if(mysqli_query($Conexion,$comando))
    	{ 
            echo "Cambio registrado.";
            $url="Refugio.php?variable1=$id_Refugio";
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