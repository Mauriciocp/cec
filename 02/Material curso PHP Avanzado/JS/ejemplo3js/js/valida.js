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

/* Esta función valida mediante expresin regular si el valñor enviado por 
 * el usairo tiene una estructura de correo o sea: usuario@dominio.ext1 como 
 * dbadillo@php.org o usuario@dominio.ext1.ext2 como dbadillo@php.org.ec
 * Esta función no valida si la dirección es válida o no, solo la estructura
 * */
 
function validarEmail(email) {
	
  if (/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/.test(email)){
   return true
  } else {
   return false
  }
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
		}else if( vacio(Form.email.value) == false ) {  
                alert ("El campo E-mail es Obligatorio.")  
                return false  
        }else if( validarEmail(Form.email.value) == false) {
				alert ("La dirección de email: " + Form.email.value + " es incorrecta")
				return false
		}else {
			return true
		}
}
