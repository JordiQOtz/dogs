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
        $Id_Refugio = htmlspecialchars($_GET["variable1"]);
    
        echo "<form action=\"RegistroPerro.php?variable1=$Id_Refugio\" method=\"POST\" class=\"formRegistrarCliente\" id=\"registro_nuevo\"  enctype=\"multipart/form-data\" class=\"formRegistrarPerro\" onsubmit=\"return ValidarPerro()\">";
            echo "<div class=\"container\">";
                echo "<h1>Registrar perro</h1>";
                echo "<fieldset>";
                    echo "<p>Nombre del perro</p>";
                    echo "<input type=\"text\" id=\"Nombre\" name=\"Nombre\" class=\"field\" placeholder=\"Lola|Gala|Nacho|...\" required>";
                    echo "<p>Edad</p>";
                    echo "<input type=\"number\" id=\"Edad\" name=\"Edad\" class=\"field\" placeholder=\"0\" min=\"0\" required>";
                    echo "<span class=\"etiqueta_num\">años</span>";
                    echo "<p>Sexo</p>";
                    echo "<select id=\"Genero\" name=\"Genero\" required class=\"field\">
                            <option disabled selected>Seleccione una opción</option>
                            <option value=\"Hembra\">Hembra</option>
                            <option value=\"Macho\">Macho</option>
                        </select>";
                    echo "<p>Color</p>";
                    echo "<input type=\"text\" id=\"Color\" name=\"Color\" class=\"field\" placeholder=\"Negro|Blanco|Dorado|...\" required>";
                    echo "<p>Raza</p>";
                    echo "<input type=\"text\" id=\"Raza\" name=\"Raza\" class=\"field\" placeholder=\"Labrador|Mestizo|Sin raza|...\" required>";
                    echo "<p>Tamaño</p>";
                    echo "<input type=\"text\" id=\"Talla\" name=\"Talla\" class=\"field\" placeholder=\"Chico|Mediano|Grande|XGrande\" required>";
                    echo "<p>Peso</p>";
                    echo "<input type=\"number\" id=\"Peso\" name=\"Peso\" class=\"field\" placeholder=\"0\" min=\"0\" required>";
                    echo "<span class=\"etiqueta_num\">Kg</span>";
                    echo "<p>Agrega una foto</p>";
                    echo "<input type=\"file\" id=\"Imagen\" name=\"Imagen\" class=\"field\" accept=\"image/*\" required>";
                    echo "<p>Da una breve descripción</p>";
                    echo "<input type=\"message\" id=\"Descripción\" name=\"Descripción\" class=\"field\" placeholder=\"Descripción\" required>";
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