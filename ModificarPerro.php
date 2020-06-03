<!DOCTYPE HTML>
<html>
<head>
    <title>Lomitos Felices</title>
    <meta charset="utf-8">
    <script src="ValidarFormulario.js"></script>
    <link rel="stylesheet" href="css/style_registro.css">
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

   
    <div class="background_form">
    <?php
        $Id_Perro = htmlspecialchars($_GET["variable1"]);
        $Id_Refugio = htmlspecialchars($_GET["variable2"]);
    
        $Usuario = "root";
    	$ContraseñaBD = "";
    	$Servidor = "localhost";
    	$BaseDeDatos = "adopcion";

    	$Conexion = mysqli_connect($Servidor,$Usuario,$ContraseñaBD) or die("No se conecto con el Servidor");

    	$db = mysqli_select_db($Conexion,$BaseDeDatos) or die("No se conecto con la BD");
    	 
        $comando = "SELECT * FROM perro WHERE idPerro = '$Id_Perro'";
		
		$respuesta = mysqli_query($Conexion,$comando);

    	if(!$respuesta)
    	{ 
			echo "Error: " . $comando . "<br>" . mysqli_error($Conexion);
		}
        else
        {
            $Columnas=mysqli_fetch_array($respuesta);
            $Nombre = $Columnas['Nombre'];
        	$Edad = $Columnas['Edad'];
        	$Genero = $Columnas['Genero'];
        	$Color = $Columnas['Color'];
        	$Raza = $Columnas['Raza'];
        	$Talla = $Columnas['Talla'];
			$Peso = $Columnas['Peso'];
        	$Descripción = $Columnas['Descripcion'];
			$Estatus = $Columnas['Estatus'];
        }
        
        echo "<form action=\"EditarPerro.php?variable1=$Id_Perro&variable2=$Id_Refugio\" method=\"POST\" enctype=\"multipart/form-data\" class=\"formRegistrarPerro\" id=\"registro_nuevo\" onsubmit=\"return ValidarPerro()\">";
            echo "<div class=\"container\">";
            echo "<h1>Modificar perro</h1>";
            echo "<fieldset>";
                    echo "<p>Nombre del perro</p>";
                    echo "<input type=\"text\" id=\"Nombre\" name=\"Nombre\" class=\"field\" placeholder=\"Lola|Gala|Nacho|...\" value = \"$Nombre\"required>";
                    echo "<p>Edad</p>";
                    echo "<input type=\"number\" id=\"Edad\" name=\"Edad\" class=\"field\" placeholder=\"0\" min=\"0\" value = \"$Edad\"required>";
                    echo "<span class=\"etiqueta_num\">años</span>";
                    echo "<p>Sexo</p>";
                    echo "<select id=\"Genero\" name=\"Genero\" required class=\"field\" value = \"$Genero\">
                            <option value=\"Hembra\"";
                    if($Genero=="Hembra") echo "selected";
                    echo ">Hembra</option>
                            <option value=\"Macho\"";
                    if($Genero=="Macho") echo "selected";
                    echo ">Macho</option>
                        </select>";
                    echo "<p>Color</p>";
                    echo "<input type=\"text\" id=\"Color\" name=\"Color\" class=\"field\" placeholder=\"Negro|Blanco|Dorado|...\" value = \"$Color\" required>";
                    echo "<p>Raza</p>";
                    echo "<input type=\"text\" id=\"Raza\" name=\"Raza\" class=\"field\" placeholder=\"Labrador|Mestizo|Sin raza|...\" value = \"$Raza\" required>";
                    echo "<p>Tamaño</p>";
                    echo "<input type=\"text\" id=\"Talla\" name=\"Talla\" class=\"field\" placeholder=\"Chico|Mediano|Grande|XGrande\" value = \"$Talla\" required>";
                    echo "<p>Peso</p>";
                    echo "<input type=\"number\" id=\"Peso\" name=\"Peso\" class=\"field\" placeholder=\"0\" min=\"0\"value = \"$Peso\"  required>";
                    echo "<span class=\"etiqueta_num\">Kg</span>";
                    echo "<p>Agrega una foto</p>";
                    echo "<input type=\"file\" id=\"Imagen\" name=\"Imagen\" class=\"field\" accept=\"image/*\">";
                    echo "<p>Da una breve descripción</p>";
                    echo "<input type=\"message\" id=\"Descripción\" name=\"Descripción\" class=\"field\" placeholder=\"Descripción\" value = \"$Descripción\" required>";
                    echo "<input type=\"submit\" value=\"Registrar\" id=\"submit_registro\">";
            echo "</fieldset>";
            echo "</div>";
        echo "</form>";
    ?>
    </div>
    <footer>
    <div class="container">
      <p>Lomitos Felices, Copyright &copy; 2019.</p>
    </div>
  </footer>
</body>
</html>