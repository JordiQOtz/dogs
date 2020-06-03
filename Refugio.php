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
      <h2>Refugio</h2>
      <a href="IniciarSesion.html">Cerrar Sesion</a>
	<?php
		$Id_Refugio = htmlspecialchars($_GET["variable1"]);
		echo "<h2>ID refugio: $Id_Refugio </h2>";
    
        $Usuario = "root";
        $ContraseñaBD = "";
        $Servidor = "localhost";
        $BaseDeDatos = "adopcion";

        $Conexion = mysqli_connect($Servidor,$Usuario,$ContraseñaBD) or die("No se conecto con el Servidor");

        $db = mysqli_select_db($Conexion,$BaseDeDatos) or die("No se conecto con la BD");
        
        $comando = "SELECT Estatus FROM refugio WHERE idRefugio = '$Id_Refugio'";
        
        $respuesta = mysqli_query($Conexion,$comando);
    
        if(!$respuesta)
    	{ 
			echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
		} 
		else 
		{
            $Columnas=mysqli_fetch_array($respuesta);
            $Estatus = $Columnas ['Estatus'];
            echo "<p class=\"p_estatus\">Estatus: $Estatus</p>";
        }
        
        if($Estatus == "Activo")
        {
		  echo "<p class=\"links\">";
          echo "<a href=\"FormularioPerro.php?variable1=$Id_Refugio\">Registrar perro</a>";
		  echo "<a href=\"CitaRefugio.php?variable1=$Id_Refugio\">Ver citas</a>";
          echo "</p>";
        }
        else
        {
            echo "<br>Espere a que el administrador valide su cuenta";
        }
    
        $comando = "SELECT * FROM perro WHERE Refugio_idRefugio = '$Id_Refugio'";
		
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
				echo "<button onclick='location.href=\"ModificarPerro.php?variable1=$Id_Perro&variable2=$Id_Refugio\"' class='box'>";
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
                    echo "</div>";
                    echo "</div>";
				    echo "<div class='divenlace'>
                    <a href=\"CambiarEstatusPerro.php?variable1=$Estatus&variable2=$Id_Perro&variable3=$Id_Refugio\">Cambiar estado</a>
                    <a href=\"EliminarPerro.php?variable1=$Id_Perro&variable2=$Id_Refugio\">Eliminar perro</a>
                    <a href=\"ModificarPerro.php?variable1=$Id_Perro&variable2=$Id_Refugio\">Editar perro</a>
                    </div>";
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