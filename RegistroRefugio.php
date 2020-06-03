<!DOCTYPE html>
<html>
<head>
	<title>Registrar refugio</title>
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
    	
        if(isset($_POST['NombreRefugio']))
        {
        	$NombreRefugio = $_POST['NombreRefugio'];
        	$Pais = $_POST['Pais'];
        	$Estado = $_POST['Estado'];
        	$Direccion = $_POST['Dirección'];
        	$NombreEncargado = $_POST['NombreEncargado'];
        	$ApellidosEncargado = $_POST['ApellidosEncargado'];
        	$Correo = $_POST['Correo'];
        	$Contrasena = $_POST['Contraseña'];
        	$Telefono = $_POST['Telefono'];
        	$RFC = $_POST['RFC'];
        	$Estatus = "No validado";
        }

    	$comando = "INSERT INTO refugio 
		(NombreRefugio,Pais,Estado,Direccion,NombreEncargado,ApellidosEncargado,Correo,Contrasena,Telefono,RFC,Estatus) 
		VALUES ('$NombreRefugio','$Pais','$Estado','$Direccion','$NombreEncargado','$ApellidosEncargado','$Correo','$Contrasena','$Telefono','$RFC','$Estatus')";

    	if(mysqli_query($Conexion,$comando))
    	{ 
			echo "Refugio registrado.";
			$url="IniciarSesion.html";
            echo "<SCRIPT>window.location='$url';</SCRIPT>";
		} else 
		{
			echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
			$url="FormularioRefugio.html";
            echo "<SCRIPT>window.location='$url';</SCRIPT>";
		}

    	mysqli_close($Conexion);
    ?>
</body>
</html>