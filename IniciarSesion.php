<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesión</title>
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
            $Tipo = $_POST['Tipo'];
        }

        echo $Tipo;

        if($Tipo == "Cliente")
        {
            $comando = "SELECT * FROM cliente WHERE Correo = '$Cuenta'";
		
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
                    $ID =$Columnas['idCliente'];
                    $url="Cliente.php?variable1=$ID";
                    echo "<SCRIPT>window.location='$url';</SCRIPT>";
                    echo "Buenos días señor $Cuenta";
                }
                else
                {
                    $url="IniciarSesion.html";
                    echo "<SCRIPT>window.location='$url';</SCRIPT>";
                    echo "Contraseña no valida cliente";
                }
            }
        }
        else if ($Tipo == "Refugio")
        {
            $comando = "SELECT * FROM refugio WHERE Correo = '$Cuenta'";
		
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
                    $ID =$Columnas['idRefugio'];
                    $url="Refugio.php?variable1=$ID";
                    echo "<SCRIPT>window.location='$url';</SCRIPT>";
                    echo "Buenos días señor $Cuenta";
                }
                else
                {
                    $url="IniciarSesion.html";
                    echo "<SCRIPT>window.location='$url';</SCRIPT>";
                    echo "Contraseña no valida refugio";
                }
            }
        }

    	mysqli_close($Conexion);
    ?>
</body>
</html>