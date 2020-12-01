function validacion()
{
    // Hay muchas formas de elegir un nodo DOM; aquí obtenemos el formulario y, a continuación, el campo de entrada
    // del correo electrónico, así como el elemento span en el que colocaremos el mensaje de error.
    const form = document.getElementById('formularioInicio');

    const mail = document.getElementById('mail');
    const mailError = document.getElementById('mailError');
    

    
     form.addEventListener('submit', function (event) {
        // si el campo de correo electrónico es válido, dejamos que el formulario se envíe

        if (!mail.validity.valid) {
            // Si no es así, mostramos un mensaje de error apropiado
            errorEmail();
            // Luego evitamos que se envíe el formulario cancelando el evento
            event.preventDefault();
        }
        
     
        
    });

    mail.addEventListener('blur', function (event) {
        // Cada vez que el usuario escribe algo, verificamos si
        // los campos del formulario son válidos.

        if (mail.validity.valid) {
          mailError.className = 'valid-feedback';
            mail.classList.remove('is-invalid');
            mail.classList.add('is-valid');
            mailError.textContent = 'Es correcto';
           
        } else {
            // Si todavía hay un error, muestra el error exacto
            errorEmail();
        }
    });

    
    function errorEmail() {
        if (mail.validity.valueMissing) {
            // Si el campo está vacío
            // muestra el mensaje de error siguiente.
            mailError.textContent = 'Debe introducir una dirección de correo electrónico.';
        } else if (mail.validity.typeMismatch) {
            // Si el campo no contiene una dirección de correo electrónico
            // muestra el mensaje de error siguiente.
            mailError.textContent = 'El valor introducido debe ser una dirección de correo electrónico.';
        }
        else if (mail.validity.tooShort) {
            // Si los datos son demasiado cortos
            // muestra el mensaje de error siguiente.
            mailError.textContent = 'El correo electrónico debe tener al menos'  +  mail.minLength + 'caracteres; ha introducido' + mail.value.length ;
        }
           mailError.className = 'invalid-feedback';
            mail.classList.remove('is-valid');
            mail.classList.add('is-invalid');

        
      
    }
    
    
}


function validacionRegistro()
{
    const form = document.getElementById('registro');

    const mail = document.getElementById('mail');
    const mailError = document.getElementById('mailError');
    
    const nombre = document.getElementById('nombre');
    const nombreError = document.getElementById('nombreError');

    
     form.addEventListener('submit', function (event) {
        // si el campo de correo electrónico es válido, dejamos que el formulario se envíe

        if (!mail.validity.valid) {
            // Si no es así, mostramos un mensaje de error apropiado
            errorEmail();
            // Luego evitamos que se envíe el formulario cancelando el evento
            event.preventDefault();
        }
        
     
        
    });
    
      
     form.addEventListener('submit', function (event) {
        // si el campo de correo electrónico es válido, dejamos que el formulario se envíe

        if (!nombre.validity.valid) {
            // Si no es así, mostramos un mensaje de error apropiado
            errorNombre();
            // Luego evitamos que se envíe el formulario cancelando el evento
            event.preventDefault();
        }
        
     
        
    });
    
    

    mail.addEventListener('blur', function (event) {
        // Cada vez que el usuario escribe algo, verificamos si
        // los campos del formulario son válidos.

        if (mail.validity.valid) {
          mailError.className = 'valid-feedback';
            mail.classList.remove('is-invalid');
            mail.classList.add('is-valid');
            mailError.textContent = 'Es correcto';
           
        } else {
            // Si todavía hay un error, muestra el error exacto
            errorEmail();
        }
    });
    
    
      nombre.addEventListener('blur', function (event) {
        // Cada vez que el usuario escribe algo, verificamos si
        // los campos del formulario son válidos.

        if (nombre.validity.valid) {
          nombreError.className = 'valid-feedback';
            nombre.classList.remove('is-invalid');
            nombre.classList.add('is-valid');
            nombreError.textContent = 'Es correcto';
           
        } else {
            // Si todavía hay un error, muestra el error exacto
            errorNombre();
        }
    });

    
    function errorEmail() {
        if (mail.validity.valueMissing) {
            // Si el campo está vacío
            // muestra el mensaje de error siguiente.
            mailError.textContent = 'Debe introducir una dirección de correo electrónico.';
        } else if (mail.validity.typeMismatch) {
            // Si el campo no contiene una dirección de correo electrónico
            // muestra el mensaje de error siguiente.
            mailError.textContent = 'El valor introducido debe ser una dirección de correo electrónico.';
        }
        
           mailError.className = 'invalid-feedback';
            mail.classList.remove('is-valid');
            mail.classList.add('is-invalid');

        
      
    }
    
    
    
    function errorNombre() {
        if (nombre.validity.valueMissing) {
            // Si el campo está vacío
            // muestra el mensaje de error siguiente.
            nombreError.textContent = 'Debe introducir un nombre.';
        } else if (nombre.validity.patternMismatch) {
            // Si el campo no contiene una dirección de correo electrónico
            // muestra el mensaje de error siguiente.
           nombreError.textContent = 'El valor introducido debe ser un nombre.';
        }
      
           nombreError.className = 'invalid-feedback';
            nombre.classList.remove('is-valid');
            nombre.classList.add('is-invalid');

        
      
    }
}



