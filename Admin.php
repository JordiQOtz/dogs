<!DOCTYPE HTML>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Lomitos Felices</title>
  <link rel="stylesheet" href="css/style_cliente.css">
</head>
<body>
    
  <header>
      <p class="logo_header_admin"><img src="img/logo_lf_transparent3.png" alt="logo" class="logo_header_admin" id="logo_header"></p>
  </header>
  <div class="sesion_background_admin">
            <div id="container_boxes">
                <h2>Administrador</h2>
                <h2>Refugios activos</h2>
            <?php
                $Usuario = "root";
                $ContraseñaBD = "";
                $Servidor = "localhost";
                $BaseDeDatos = "adopcion";

                $Conexion = mysqli_connect($Servidor,$Usuario,$ContraseñaBD) or die("No se conecto con el Servidor");

                $db = mysqli_select_db($Conexion,$BaseDeDatos) or die("No se conecto con la BD");

                $comando = "SELECT * FROM refugio";

                $respuesta = mysqli_query($Conexion,$comando);
                echo "<div class=\"container\" id=\"tableData\">";
                echo "<table>";
                echo "<tr class=\"PrincipalRefugio\">
                    <th>ID</th>
                    <th>Nombre del refugio</th>
                    <th>País</th>
                    <th>Estado</th>
                    <th>Dirección</th>
                    <th>Encargado</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>RFC</th>
                    <th>Estatus</th>
                </tr>";
                if(!$respuesta)
                { 
                    echo "<tr><td class=\"PrincipalRefugio mensajeError\" colspan=\"10\">No existen refugios registrados en este momento.</td></tr>";
                    //echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
                } 
                else 
                {
                    while ($Columnas=mysqli_fetch_array($respuesta))
                    {
                        $Id_Refugio = $Columnas ['idRefugio'];
                        $Estatus = $Columnas ['Estatus'];
                        $temp=$Columnas ['NombreRefugio'];
                        echo "<tr class=\"PrincipalRefugio datosTabla\">
                        <td>$Id_Refugio</td>
                        <td>$temp</td>";
                        $temp=$Columnas ['Pais'];
                        echo "<td>$temp</td>";
                        $temp=$Columnas ['Estado'];
                        echo "<td>$temp</td>";
                        $temp=$Columnas ['Direccion'];
                        echo "<td>$temp</td>";
                        $temp=$Columnas ['NombreEncargado'];
                        echo "<td>$temp";
                        $temp=$Columnas ['ApellidosEncargado'];
                        echo " $temp</td>";
                        $temp=$Columnas ['Correo'];
                        echo "<td>$temp</td>";
                        $temp=$Columnas ['Telefono'];
                        echo "<td>$temp</td>";
                        $temp=$Columnas ['RFC'];
                        echo "<td>$temp</td>";
                        echo "<td>$Estatus<br><a class=\"linkEstatus\" href=\"CambiarEstatusRefugio.php?variable1=$Estatus&variable2=$Id_Refugio\">(Cambiar)</a></td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
                echo "</div>";

                mysqli_close($Conexion);
            ?>
            </div>
    </div>
  <footer>
    <div class="container">
      <p>Lomitos Felices, Copyright &copy; 2019.</p>
    </div>
  </footer>
</body>
</html>