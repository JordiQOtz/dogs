function ValidarInicioSesion()
{
    var Cuenta,Contraseña;
    Cuenta = document.getElementById("Cuenta").value;
    Contraseña = document.getElementById("Contraseña").value;

    if(Cuenta == "")
    {
        alert("El campo Cuenta esta vacio");
        return false;
    }
    else if(Cuenta.length>45)
    {
        alert("El campo Cuenta es muy largo");
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
}