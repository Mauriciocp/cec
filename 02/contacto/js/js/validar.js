//busca caracteres que no sean espacio en blanco en una cadena 

function vacio(q) { 
        for ( i = 0; i < q.length; i++ ) {  
                if ( q.charAt(i) != " " ) {  
                        return true  
                }  
        }  
        return false  
}  
  
//valida que el campo no este vacío

function valida(Form) {
	if( vacio(Form.nombre.value) == false ) {  
                alert ("El campo nombre es Obligatorio.")  
                return false  
		}else if( vacio(Form.telefono.value) == false ) {  
                alert ("El campo Teléfono es Obligatorio.")  
                return false  
        }else if ( vacio(Form.correo.value) == false ){
				alert ("El campo correo es Obligatorio.")
				return false
		}else {	
			return true
		}
}

function hkp( evt )
        {
                _KeyCode = ( window.event ) ? evt.keyCode : evt.which;
                return( _KeyCode );
        }
