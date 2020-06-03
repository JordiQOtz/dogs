<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
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
    <?php
		$Id_Refugio = htmlspecialchars($_GET["variable1"]);
		echo "<h2>ID refugio: $Id_Refugio </h2>";
        
        $Usuario = "root";
        $ContraseñaBD = "";
        $Servidor = "localhost";
        $BaseDeDatos = "adopcion";

        $Conexion = mysqli_connect($Servidor,$Usuario,$ContraseñaBD) or die("No se conecto con el Servidor");

        $db = mysqli_select_db($Conexion,$BaseDeDatos) or die("No se conecto con la BD");
        
        $comando = "SELECT * FROM refugio_has_cliente WHERE Refugio_idRefugio='$Id_Refugio'";
		
		$respuesta = mysqli_query($Conexion,$comando);
        echo "<div class=\"container\" id=\"tableDataCita\">";
                echo "<table>";
                echo "<tr class=\"PrincipalRefugio\">
                    <th>ID de Refugio</th>
                    <th>ID del Perro</th>
                    <th>Hora</th>
                    <th>Cita</th>
                </tr>";
    	if(!$respuesta)
    	{ 
			echo "<tr><td class=\"PrincipalRefugio mensajeError\" colspan=\"4\">No tienes citas pendientes.</td></tr>";
            echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
		} 
		else 
		{
			while ($Columnas=mysqli_fetch_array($respuesta)){
                echo "<tr class=\"PrincipalRefugio datosTabla\">";
				$temp = $Columnas ['Cliente_idCliente'];
				echo "<td>$temp</td>";
                $idPerro = $Columnas ['Perro_idPerro'];
				echo "<td>$idPerro</td>";
				$temp = $Columnas ['Cita'];
				echo "<td>$temp</td>";
                $temp = $Columnas ['Hora'];
                echo "<td>$temp<a href =\"E1iminarCitaRef.php?variable1=$Id_Refugio&variable2=$idPerro\"> Eliminar cita</a></td>";
                echo "</tr>";
			}
        }
        echo "</table>";
        echo "</div>";
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