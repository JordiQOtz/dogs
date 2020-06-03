<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesión Admin</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
    	$Usuario = "root";
    	$ContraseñaBD = "";
    	$Servidor = "localhost";
    	$BaseDeDatos = "adopcion";

    	$Conexion = mysqli_connect($Servidor,$Usuario,$ContraseñaBD) or die("No se conecto con el Servidor");

    	$db = mysqli_select_db($Conexion,$BaseDeDatos) or die("No se conecto con la BD");
    	
        if(isset($_POST['Cuenta']))
        {
        	$Cuenta = $_POST['Cuenta'];
        	$Contrasena = $_POST['Contraseña'];
        }

    	$comando = "SELECT * FROM admin WHERE Cuenta = '$Cuenta'";
		
		$respuesta = mysqli_query($Conexion,$comando);
    	if(!$respuesta)
    	{ 
			echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
		} 
		else 
		{
			$Columnas = mysqli_fetch_array($respuesta);
			if($Contrasena == $Columnas['Contrasena'])
			{
				$url="Admin.php";
				echo "<SCRIPT>window.location='$url';</SCRIPT>";
				echo "Buenos días señor $Cuenta";
			}
			else
			{
				echo "Contraseña no valida";
			}
		}

    	mysqli_close($Conexion);
    ?>
</body>
</html>