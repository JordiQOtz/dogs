<!DOCTYPE HTML>
<html>
<head>
    <title>Lomitos Felices</title>
    <meta charset="utf-8">
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
		$Id_Cliente = htmlspecialchars($_GET["variable1"]);
		$Id_Perro = htmlspecialchars($_GET["variable2"]);
        $Id_Refugio = htmlspecialchars($_GET["variable3"]);
        echo "<form action=\"GuardarCita.php?variable1=$Id_Cliente&variable2=$Id_Perro&variable3=$Id_Refugio\" method=\"POST\" id=\"registro_nuevo\">";
        echo "<div class=\"container\">";
        echo "<h1>Cita para adoptar al perro ".$Id_Perro." del refugio ".$Id_Refugio."</h1>";
        echo "<fieldset>";
        echo "<p>Fecha</p>";
        echo "<input type=\"date\" id=\"FechaDeCita\" name=\"FechaDeCita\" placeholder=\"dd/mm/aaaa\"class=\"field\">";
        echo "<p>Hora</p>";
        echo "<input type=\"time\" id=\"HoraDeCita\" name=\"HoraDeCita\" class=\"field\">";
        echo "<input type=\"submit\" value=\"Registrar\"id=\"submit_registro\">";
        echo "</fieldset>";
        echo "</div>";
        echo "</form>";
    ?>
    </div>
</body>
</html>