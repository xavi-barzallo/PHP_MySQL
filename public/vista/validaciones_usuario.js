var ide = false;
var name = false;
var lastname = false;
var phone = false;
var address = false;
var fecha = false;
var email = false;
var clave = false;

function validarCamposObligatorios() {
    var bandera = true
    for (var i = 0; i < document.forms[0].elements.length; i++) {
        var elemento = document.forms[0].elements[i]
        if (elemento.value == '' && elemento.type == 'text') {
            if (elemento.id == 'cedula') {
                document.getElementById('mensajeCedula').innerHTML = '<br>La cedula esta vacia'
            }
            elemento.style.border = '1px yellow solid'
            elemento.className = 'error'
            bandera = false
        }
    }



    if (!bandera) {
        alert('Error: revisar los comentarios')
    }
    return bandera
}

function validarLetras(elemento) {
    if (elemento.value.length > 0) {
        var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
        console.log(miAscii)
        if ((miAscii >= 97 && miAscii <= 122) || miAscii == 32) {
            return true
        } else {
            elemento.value = elemento.value.substring(0, elemento.value.length - 1)
            return false
        }
    } else {
        return true
    }
}

function numeroCedula(elemento) {
    if (elemento.value.length > 0) {
        var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
        console.log(miAscii)
        if (miAscii >= 48 && miAscii <= 57) {
            return true
        } else {
            elemento.value = elemento.value.substring(0, elemento.value.length - 1)
            return false
        }
    } else {
        return true
    }
}

function letraNombre(elemento) {
    if (elemento.value.length > 0) {
        var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
        console.log(miAscii)
        if ((miAscii >= 97 && miAscii <= 122) || (miAscii >= 65 && miAscii <= 90)) {
            return true
        } else {
            elemento.value = elemento.value.substring(0, elemento.value.length - 1)
            return false
        }
    } else {
        return true
    }
}



function validarCedula() {
    ide = false;
    let elemento = document.getElementById("cedula");
    let array = [];
    if (elemento.value.length == 10) {
        for (let i = 0; i < elemento.value.length; i++) {
            array[i] = parseInt(elemento.value.charAt(i));
        }
        if (array[2] <= 6 && array[2] >= 0) {
            let comprobar = [2, 1, 2, 1, 2, 1, 2, 1, 2];
            var suma = 0;
            for (i = 0; i < comprobar.length; i++) {
                array[i] *= comprobar[i];
                if (array[i] >= 10) {
                    array[i] -= 9;
                }
                suma += array[i];
            }
            suma += array[i];
            suma %= 10;
            if (suma == 0) {
                ide = true;
                document.getElementById("mensajeCedula").innerHTML = "";

                return true;
            } else {
                ide = false;
                document.getElementById("mensajeCedula").innerHTML = "<br>Numero de cedula invalida";
            }
        }
    } else {
        ide = false;

        document.getElementById("mensajeCedula").innerHTML =
            "<br>Numero de cedula invalida";
    }
    return false;
}

function numeroTelf(elemento) {
    if (elemento.value.length > 0) {
        var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
        console.log(miAscii)
        if (miAscii >= 48 && miAscii <= 57) {
            return true
        } else {
            elemento.value = elemento.value.substring(0, elemento.value.length - 1)
            return false
        }
    } else {
        return true
    }
}

function validarNombres(elemento) {
    if (elemento.value.length > 0) {
        var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
        console.log(miAscii)
        if ((miAscii >= 65 && miAscii <= 122) || miAscii === 32) {
            var x = elemento.value
            if (x.includes(" ")) {
                if ((x.length - 1) > (x.indexOf(" "))) {
                    elemento.style.border = '1px black solid'
                    elemento.className = 'correcto'
                    document.getElementById("mensajeNombres").innerHTML = "";
                    return true
                } else {
                    elemento.style.border = '1px yellow solid'
                    elemento.className = 'error'
                }
            } else {
                document.getElementById("mensajeNombres").innerHTML = "<br>Nombre Invalido";
                elemento.style.border = '1px yellow solid'
                elemento.className = 'error'
                return false
            }

        } else {
            document.getElementById("mensajeNombres").innerHTML = "<br>Nombre Invalido";
            elemento.value = elemento.value.substring(0, elemento.value.length - 1)
            return false
        }
    } else {
        return true
    }

}


function validarApellidos(elemento) {
    if (elemento.value.length > 0) {
        var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
        console.log(miAscii)
        if ((miAscii >= 65 && miAscii <= 122) || miAscii === 32) {
            var x = elemento.value
            if (x.includes(" ")) {
                if ((x.length - 1) > (x.indexOf(" "))) {
                    elemento.style.border = '1px black solid'
                    elemento.className = 'correcto'
                    document.getElementById("mensajeApellidos").innerHTML = "";
                    return true
                } else {
                    elemento.style.border = '1px yellow solid'
                    elemento.className = 'error'
                }
            } else {
                document.getElementById("mensajeApellidos").innerHTML = "<br>Apellido invalido";
                elemento.style.border = '1px yellow solid'
                elemento.className = 'error'
                return false
            }

        } else {
            document.getElementById("mensajeApellidos").innerHTML = "<br>Apellido invalido";
            elemento.value = elemento.value.substring(0, elemento.value.length - 1)
            return false
        }
    } else {
        return true
    }

}

function validarContrasena(elemento) {
    var contrasenna = elemento.value
    if (contrasenna.length >= 8) {
        var mayuscula = false;
        var minuscula = false;
        var numero = false;
        var caracter_raro = false;
        for (var i = 0; i < contrasenna.length; i++) {
            if (contrasenna.charCodeAt(i) >= 65 && contrasenna.charCodeAt(i) <= 90) {
                mayuscula = true;
            } else if (contrasenna.charCodeAt(i) >= 97 && contrasenna.charCodeAt(i) <= 122) {
                minuscula = true;
            } else if (contrasenna.charCodeAt(i) >= 48 && contrasenna.charCodeAt(i) <= 57) {
                numero = true;
            } else {
                caracter_raro = true;
            }
        }
        if (mayuscula == true && minuscula == true && caracter_raro == true && numero == true) {
            elemento.className = 'correcto'
            document.getElementById("mensajeContrasena").innerHTML = "";
            return true;
        } else {
            elemento.style.border = '1px yellow solid'
            elemento.className = 'error'
        }
    }
    elemento.style.border = '1px yellow solid'
    elemento.className = 'error'
    document.getElementById("mensajeContrasena").innerHTML = "<br>Contraseña invalida";
    return false;
}


function validarCorreo(elemento) {
    if (elemento.value.length > 0) {
        var expression = /\w+@+ups.edu.ec/;
        var expression1 = /\w+@+est.ups.edu.ec/;
        var correo = elemento.value
        if (!expression.test(correo)) {
            if (!expression1.test(correo)) {
                elemento.style.border = '1px yellow solid'
                elemento.className = 'error'
                document.getElementById("mensajeCorreo").innerHTML = "<br>Correo invalido";
                return false
            } else {
                elemento.style.border = '1px black solid'
                elemento.className = 'correcto'
                document.getElementById("mensajeCorreo").innerHTML = "";
                return true
            }
        } else {
            elemento.style.border = '1px black solid'
            elemento.className = 'correcto'
            return true
        }
    } else {
        return true
    }
}


function validarFecha() {
    fecha = false;
    var elemento = document.getElementById("fechaNacimiento");
    var fecha = elemento.value.split("/");
    if (elemento.value.length != 10) {
        document.getElementById("mensajeFecha").innerHTML =
            "<br>Ingrese fecha valida: 04/11/1990";
        return false;
    } else {
        document.getElementById("mensajeFecha").innerHTML = "";
    }
    try {
        if (fecha.length == 3 && fecha[2].length == 4) {
            var dia = fecha[0];
            var mes = fecha[1];
            var year = fecha[2];
            var dmax;
            if (year < 1000 || year > new Date().getFullYear()) {
                alert("error año");
                if (year > new Date().getFullYear())
                    document.getElementById("mensajeFecha").innerHTML =
                    "<br>El año no debe ser mayor al actual";
                return false;
            }
            if (dia.length == 2 && mes.length == 2 && year.length == 4) {
                switch (parseInt(mes)) {
                    case 1:
                        dmax = 31;
                        break;
                    case 2:
                        if (year % 4 == 0) dmax = 29;
                        else dmax = 28;
                        break;
                    case 3:
                        dmax = 31;
                        break;
                    case 4:
                        dmax = 30;
                        break;
                    case 5:
                        dmax = 31;
                        break;
                    case 6:
                        dmax = 30;
                        break;
                    case 7:
                        dmax = 31;
                        break;
                    case 8:
                        dmax = 31;
                        break;
                    case 9:
                        dmax = 30;
                        break;
                    case 10:
                        dmax = 31;
                        break;
                    case 11:
                        dmax = 30;
                        break;
                    case 12:
                        dmax = 31;
                        break;
                    default:
                        alert("error mes");
                        document.getElementById("mensajeFecha").innerHTML =
                            "<br>El mes ingresado no existe";
                        return false;
                }
                if (dia < 1 || dia > dmax) {
                    alert("error dia");
                    document.getElementById("mensajeFecha").innerHTML =
                        "<br>El dia ingresado no existe";
                    return false;
                }
            } else {
                alert("Error fechas");
                estado = false;
            }
        }
        if (
            (fecha.length != 3 || fecha[2].length < 4) && elemento.value.length == 10) {
            alert("Error fecha");
            document.getElementById("mensajeFecha").innerHTML =
                "<br>Ingrese fecha valida: 04/11/1990";
            return false;
        }
    } catch (err) {
        alert("Error fechas");
        return false;
    }
    fecha = true;

    return true;
}