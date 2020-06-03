<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Lomitos Felices</title>
  <link rel="stylesheet" href="css/style_cliente.css">
</head>

<body>
  <header>
    <img src="img/logo_lf_transparent3.png" alt="logo" class="logo_header" id="logo_header">
    <nav class="btns">
      <button onclick="location.href='./inicio.html'" class="btn">¿Quiénes Somos?</button>
      <!--<button onclick="location.href='./conocelos.html'" class="btn">¡Conócelos!</button>-->
      <button onclick="location.href='./informate.html'" class="btn">Infórmate</button>
      <button onclick="location.href='./contacto.html'" class="btn">Contacto</button>
      <button onclick="location.href='./IniciarSesion.html'" class="btn_perfil">Cuenta</button>
    </nav>
  </header>
  <section id="boxes">
    <div id="container_boxes">
      <h2>Perros disponibles para adopción</h2>
        <a href="IniciarSesion.html">Cerrar Sesion</a>
        <?php
		$Id_Cliente = htmlspecialchars($_GET["variable1"]);
		echo "<h2>ID Cliente: $Id_Cliente </h2>";
		echo "<p><a href=\"CitaCliente.php?variable1=$Id_Cliente\">Ver citas</a></p>";
    
        $Usuario = "root";
        $ContraseñaBD = "";
        $Servidor = "localhost";
        $BaseDeDatos = "adopcion";

        $Conexion = mysqli_connect($Servidor,$Usuario,$ContraseñaBD) or die("No se conecto con el Servidor");

        $db = mysqli_select_db($Conexion,$BaseDeDatos) or die("No se conecto con la BD");
        
        $comando = "SELECT * FROM perro";
		
		$respuesta = mysqli_query($Conexion,$comando);

    	if(!$respuesta)
    	{ 
			echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
		} 
		else 
		{
			while ($Columnas=mysqli_fetch_array($respuesta)){
				$Id_Perro=$Columnas ['idPerro'];
				$Ruta=$Columnas['Ruta'];
                $Estatus = $Columnas ['Estatus'];
				$Id_Refugio = $Columnas ['Refugio_idRefugio'];
				echo "<button";
                if($Estatus != "Adoptado"){
                    echo " onclick='location.href=\"SolicitarCita.php?variable1=$Id_Cliente&variable2=$Id_Perro&variable3=$Id_Refugio\"'";
                }
                echo " class='box'>";
                echo "<div class='contenedor'>";
                    echo "<div class='divimage'><img class='imgperro' src=\"$Ruta\" width=\"200px\" height=\"200px\"></div>";
                    echo "<div class='divinfo'>";
                        $temp=$Columnas['Nombre'];
                        echo "<h2>Nombre: $temp</h2>";
                        echo "<h2>ID: $Id_Perro</h2>";
                        $temp=$Columnas ['Edad'];
                        echo "<h2>Edad: $temp año(s)</h2>";
                        $temp=$Columnas ['Genero'];
                        echo "<h2>Género: $temp</h2>";
                        $temp=$Columnas ['Color'];
                        echo "<h2>Color: $temp</h2>";
                        $temp=$Columnas ['Raza'];
                        echo "<h2>Raza: $temp</h2>";
                        $temp=$Columnas ['Talla'];
                        echo "<h2>Talla: $temp</h2>";
                        $temp=$Columnas ['Peso'];
                        echo "<h2>Peso: $temp kg</h2>";
                        $temp=$Columnas ['Descripcion'];
                        echo "<h2>Descripción: $temp</h2>";
                        echo "<h2>Estatus: $Estatus</h2>";
                        echo "<h2>ID Refugio: $Id_Refugio</h2>";
                    echo "</div>";
                echo "</div>";
                if($Estatus != "Adoptado")
				    echo "<div class='divenlace'><a href=\"SolicitarCita.php?variable1=$Id_Cliente&variable2=$Id_Perro&variable3=$Id_Refugio\">Solicitar cita para visitarlo</a></div>";
				echo "</button>";
			}
        }
        
        mysqli_close($Conexion);
    ?>
    </div>
  </section>
  <footer>
    <div class="container">
      <p>Lomitos Felices, Copyright &copy; 2019.</p>
    </div>
  </footer>
</body>

</html>