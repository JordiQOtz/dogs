<!DOCTYPE html>
<html>
<head>
	<title>Registrar cliente</title>
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
    	
        if(isset($_POST['Nombre']))
        {
        	$Nombre = $_POST['Nombre'];
        	$Apellidos = $_POST['Apellidos'];
        	$FechaDeNacimiento = $_POST['FechaDeNacimiento'];
        	$Pais = $_POST['Pais'];
        	$Estado = $_POST['Estado'];
        	$Direccion = $_POST['Dirección'];
        	$Correo = $_POST['Correo'];
        	$Contrasena = $_POST['Contraseña'];
        	$Telefono = $_POST['Telefono'];
        	$Estatus = "Cliente";
        }

    	$comando = "INSERT INTO cliente 
		(Nombre,Apellidos,FechaDeNacimiento,
		Pais,Estado,Direccion,Correo,Contrasena,Telefono,Estatus) VALUES ('$Nombre','$Apellidos','$FechaDeNacimiento','$Pais','$Estado','$Direccion','$Correo','$Contrasena','$Telefono','$Estatus')";

    	if(mysqli_query($Conexion,$comando))
    	{ 
			echo "Cliente registrado.";
			$url="IniciarSesion.html";
            echo "<SCRIPT>window.location='$url';</SCRIPT>";
		} else 
		{
			echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
			$url="FormularioCliente.html";
            echo "<SCRIPT>window.location='$url';</SCRIPT>";  
		}

    	mysqli_close($Conexion);
    ?>
</body>
</html>