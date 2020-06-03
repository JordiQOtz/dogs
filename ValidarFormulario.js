function ValidarCliente()
{
    var Nombre, Apellidos,FechaDeNacimiento,Pais,Estado,Dirección,Correo,Contraseña,Telefono;
    Nombre = document.getElementById("Nombre").value;
    Apellidos = document.getElementById("Apellidos").value;
    FechaDeNacimiento = document.getElementById("FechaDeNacimiento").value;
    Pais = document.getElementById("Pais").value;
    Estado = document.getElementById("Estado").value;
    Dirección = document.getElementById("Dirección").value;
    Correo = document.getElementById("Correo").value;
    Contraseña = document.getElementById("Contraseña").value;
    Telefono = document.getElementById("Telefono").value;

    if(Nombre == "")
    {
        alert("El campo Nombre esta vacio");
        return false;
    }
    else if(Nombre.length>45)
    {
        alert("El campo Nombre es muy largo");
        return false;
    }

    if(Apellidos == "")
    {
        alert("El campo Apellidos esta vacio");
        return false;
    }
    else if(Apellidos.length>45)
    {
        alert("El campo Apellidos es muy largo");
        return false;
    }

    if(FechaDeNacimiento == "")
    {
        alert("El campo FechaDeNacimiento esta vacio");
        return false;
    }

    if(Pais == "Vacio")
    {
        alert("Seleccione un país");
        return false;
    }

    if(Estado == "Vacio")
    {
        alert("Seleccione un estado");
        return false;
    }

    if(Dirección == "")
    {
        alert("El campo Dirección esta vacio");
        return false;
    }
    else if(Dirección.length>200)
    {
        alert("El campo Dirección es muy largo");
        return false;
    }

    var ExpresionCorreo = /\w+@\w+\.[a-z]+/;
    if(Correo == "")
    {
        alert("El campo Correo esta vacio");
        return false;
    }
    else if(Correo.length>45)
    {
        alert("El campo Correo es muy largo");
        return false;
    }
    else if(!ExpresionCorreo.test(Correo))
    {
        alert("El campo Correo no cumple con el formato correcto");
        return false;
    }
    if(Contraseña == "")
    {
        alert("El campo Contraseña esta vacio");
        return false;
    }
    else if(Contraseña.length>45)
    {
        alert("El campo Contraseña es muy largo");
        return false;
    }

    var ExpresionTelefono = /\d\d\-\d\d\d\d\-\d\d\d\d/;
    if(Telefono == "")
    {
        alert("El campo Telefono esta vacio");
        return false;
    }
    else if(Telefono.length>12)
    {
        alert("El campo Telefono es muy largo");
        return false;
    }
    else if(!ExpresionTelefono.test(Telefono))
    {
        alert("El campo Telefono no es un numero");
        return false;
    }
}

function ValidarRefugio()
{
    var NombreRefugio,Pais,Estado,Dirección,NombreEncargado,ApellidosEncargado,Correo,Contraseña,Telefono,RFC;
    NombreRefugio = document.getElementById("NombreRefugio").value;
    Pais = document.getElementById("Pais").value;
    Estado = document.getElementById("Estado").value;
    Dirección = document.getElementById("Dirección").value;
    NombreEncargado = document.getElementById("NombreEncargado").value;
    ApellidosEncargado = document.getElementById("ApellidosEncargado").value;
    Correo = document.getElementById("Correo").value;
    Contraseña = document.getElementById("Contraseña").value;
    Telefono = document.getElementById("Telefono").value;
    RFC = document.getElementById("RFC").value;

    if(NombreRefugio == "")
    {
        alert("El campo Nombre del refugio esta vacio");
        return false;
    }
    else if(NombreRefugio.length>45)
    {
        alert("El campo Nombre del refugio es muy largo");
        return false;
    }

    if(Pais == "Vacio")
    {
        alert("Seleccione un país");
        return false;
    }

    if(Estado == "Vacio")
    {
        alert("Seleccione un estado");
        return false;
    }

    if(Dirección == "")
    {
        alert("El campo Dirección esta vacio");
        return false;
    }
    else if(Dirección.length>200)
    {
        alert("El campo Dirección es muy largo");
        return false;
    }
    if(NombreEncargado == "")
    {
        alert("El campo Nombre del encargado esta vacio");
        return false;
    }
    else if(NombreEncargado.length>45)
    {
        alert("El campo Nombre es muy largo");
        return false;
    }
    if(ApellidosEncargado == "")
    {
        alert("El campo Apellidos del encargado esta vacio");
        return false;
    }
    else if(ApellidosEncargado.length>45)
    {
        alert("El campo Apellidos del encargado es muy largo");
        return false;
    }

    var ExpresionCorreo = /\w+@\w+\.[a-z]+/;
    if(Correo == "")
    {
        alert("El campo Correo esta vacio");
        return false;
    }
    else if(Correo.length>45)
    {
        alert("El campo Correo es muy largo");
        return false;
    }
    else if(!ExpresionCorreo.test(Correo))
    {
        alert("El campo Correo no cumple con el formato correcto");
        return false;
    }
    if(Contraseña == "")
    {
        alert("El campo Contraseña esta vacio");
        return false;
    }
    else if(Correo.length>45)
    {
        alert("El campo Contraseña es muy largo");
        return false;
    }

    var ExpresionTelefono = /\d{2}-\d{4}-\d{4}/;
    if(Telefono == "")
    {
        alert("El campo Telefono esta vacio");
        return false;
    }
    else if(Telefono.length>12)
    {
        alert("El campo Telefono es muy largo");
        return false;
    }
    else if(!ExpresionTelefono.test(Telefono))
    {
        alert("El campo Telefono no esta en el formato correcto");
        return false;
    }

    var ExpresionRFC = /\w{3,4}\d{6}/;
    if(RFC == "")
    {
        alert("El campo RFC esta vacio");
        return false;
    }
    else if(RFC.length>12)
    {
        alert("El campo RFC es muy largo");
        return false;
    }
    else if(!ExpresionRFC.test(RFC))
    {
        alert("El campo RFC no esta en el formato correcto");
        return false;
    }
}

function ValidarPerro()
{
    var Nombre,Edad,Genero,Color,Raza,Talla,Peso,Descripción;
    Nombre = document.getElementById("Nombre").value;
    Edad = document.getElementById("Edad").value;
    Genero = document.getElementById("Genero").value;
    Color = document.getElementById("Color").value;
    Raza = document.getElementById("Raza").value;
    Talla = document.getElementById("Talla").value;
    Peso = document.getElementById("Peso").value;
    Descripción = document.getElementById("Descripción").value;

    if(Nombre == "")
    {
        alert("El campo Nombre esta vacio");
        return false;
    }
    else if(Nombre.length>45)
    {
        alert("El campo Nombre es muy largo");
        return false;
    }
    if(Edad == "")
    {
        alert("El campo Edad esta vacio");
        return false;
    }
    else if(Edad.length>3)
    {
        alert("El campo Edad es muy largo");
        return false;
    }
    if(Genero == "")
    {
        alert("El campo Genero esta vacio");
        return false;
    }
    else if(Genero.length>45)
    {
        alert("El campo Genero es muy largo");
        return false;
    }
    if(Color == "")
    {
        alert("El campo Color esta vacio");
        return false;
    }
    else if(Color.length>45)
    {
        alert("El campo Color es muy largo");
        return false;
    }
    if(Raza == "")
    {
        alert("El campo Raza esta vacio");
        return false;
    }
    else if(Raza.length>45)
    {
        alert("El campo Raza es muy largo");
        return false;
    }
    if(Talla == "")
    {
        alert("El campo Talla esta vacio");
        return false;
    }
    else if(Talla.length>45)
    {
        alert("El campo Talla es muy largo");
        return false;
    }
    if(Peso == "")
    {
        alert("El campo Peso esta vacio");
        return false;
    }
    else if(Peso.length>45)
    {
        alert("El campo Peso es muy largo");
        return false;
    }

    if(Descripción == "")
    {
        alert("El campo Dirección esta vacio");
        return false;
    }
    else if(Descripción.length>200)
    {
        alert("El campo Dirección es muy largo");
        return false;
    }
}