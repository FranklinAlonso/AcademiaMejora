function validar(){
    var name, clave, clave2,apellido,dni;
    name = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    correo = document.getElementById("correo").value;
    tele = document.getElementById("telefono").value;
    clave = document.getElementById("clave").value;
    clave2 = document.getElementById("clave2").value;
    dni_for = document.getElementById("dni").value;//login

    expresion = /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/; ///^[A-Z]+$/i; //nombre
    expresion2 =/^[1-9][0-9]*$/;
    expresion3 =/\w+@\w+\.+[a-z]/;

    //expresion2 = /^(?=(?:.*\d){2})(?=.*[A-Z])(?=.*[a-z])(?=(?:.*[#$%&]){2,})\S{8,64}$/; //contraseña

    if(name === "" || correo === "" || tele === "" || clave === "" || clave2 === "" || dni_for==""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(!expresion.test(name) || !expresion.test(apellido)){
        alert("El nombre y/o apellido no es valido");
        return false;
    }
    else if(!expresion2.test(tele)){
        alert("El Telefono es incorrecto");
        return false;
    }
    else if(!expresion3.test(correo)){
        alert("El Correo es incorrecto");
        return false;
    }
    else if(!expresion2.test(dni_for)){
        alert("El DNI es incorrecto");
        return false;
    }
}