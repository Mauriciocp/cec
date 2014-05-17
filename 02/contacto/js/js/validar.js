//busca caracteres que no sean espacio en blanco en una cadena 

function vacio(q) {
    for (i = 0; i < q.length; i++) {
        if (q.charAt(i) != " ") {
            return true
        }
    }
    return false
}

//valida que el campo no este vacío

function valida(Form) {
    if (vacio(Form.nombre.value) == false) {
        alert("El campo nombre es Obligatorio.")
        return false
    } else if (vacio(Form.direccion.value) == false) {
        alert("El campo Direccion es Obligatorio.")
        return false
    } else if (vacio(Form.telefono.value) == false) {
        alert("El campo Telefono es Obligatorio.")
        return false
    } else if (vacio(Form.email.value) == false) {
        alert("El campo Email es Obligatorio.")
        return false
    } else if (vacio(Form.fechanacimiento.value) == false) {
        alert("El campo fechanacimiento es Obligatorio.")
        return false
    } else if (vacio(Form.pais.value) == false) {
        alert("El campo pais es Obligatorio.")
        return false
    } else {
        return true
    }
}

function hkp(evt)
{
    _KeyCode = (window.event) ? evt.keyCode : evt.which;
    return(_KeyCode);
}
