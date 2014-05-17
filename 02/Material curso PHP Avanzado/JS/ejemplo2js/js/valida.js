/* La función vacío recibe el valor del campo de texto 
 * y evalúa si está vacío recorriendo todos los caracteres */

function vacio(q) { 
        for ( i = 0; i < q.length; i++ ) {  
                if ( q.charAt(i) != " " ) {  
                        return true  
                }  
        }  
        return false 
       }
       
/* La función valida, recibe los elementos del formulario y 
 * por cada elemento llama a la función vacío para evaluar si 
 * tiene o no un dato, según eso despliega una alerta con el 
 * mensaje de error.
 * Si los cmapos están vacíos, la función retorna FALSE, si 
 * todos los campos evaluados no son vacíos entonces retorna TRUE.*/        

function valida(Form) {
		if( vacio(Form.nombre.value) == false ) {  
                alert ("El campo Nombre es Obligatorio.")  
                return false  
		}else if( vacio(Form.edad.value) == false ) {  
                alert ("El campo Edad es Obligatorio.")  
                return false  
        }else {
			return true
		}
}
