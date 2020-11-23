/**
 * MUESTRA EL FORMULARIO ADECUADO PARA CREAR UN AULA: NOMBRE Y ADICION DE ALUMNOS
 * Permie anadir alumnos a otra tabla y los pinta como valores ocultos del formulario
 * "alumnosAAnadir para ser recuperados despues en php
 */

function cargar() {
    var primerElemento = true;

    var tablaAlumnos = document.getElementById('tablaAlumnos'); //Tabla que contiene a todos los alumnos
    var cuerpoAlumnos = document.querySelector('#tablaAlumnos tbody')
    var tablaAdded = document.getElementById('tablaAdded');     //Tabla que contiene a los alumnos anadidos
    var cuerpoAdded = document.querySelector('#tablaAdded tbody');
    var formulario = document.getElementById('formularioAula'); //Formulario con el boton aceptar y los IDs de los alumnos anadidos

    var caption = document.querySelector('#tablaAdded caption');        //Caption de la tabla anadidos
    var cabezaTablaAdded = document.querySelector('#tablaAdded thead'); //Cabecera de la tabla anadidos

    //Oculta la tabla "Alumnos anadidos" en un primer momento
    caption.remove();
    cabezaTablaAdded.remove();

    window.onclick = e => {
        if (e.target.tagName == 'DIV' && e.target.textContent == 'Añadir') {
            var fila = e.target.parentNode.parentNode;
            fila.lastChild.innerHTML = '<div class="bg-danger text-light d-flex justify-content-center rounded retirar">Retirar</div>';

            if (primerElemento) {
                //Inserta la cabecera de la tabla "TablaAdded"
                tablaAdded.appendChild(cabezaTablaAdded);
                tablaAdded.appendChild(caption);
                primerElemento = false;
            }

            var id = fila.firstChild.textContent;

            cuerpoAdded.appendChild(fila);

            //Crea el atributo oculto que llevara la informacion del alumno
            var atributoOculto = document.createElement('input');
            atributoOculto.setAttribute('type', 'hidden');
            atributoOculto.setAttribute('name', 'alumnosAula[]');
            atributoOculto.setAttribute('value', id);

            formulario.appendChild(atributoOculto);
        }

        if (e.target.tagName == 'DIV' && e.target.textContent == 'Retirar') {
            var fila = e.target.parentNode.parentNode;
            fila.lastChild.innerHTML = '<div class="bg-info text-light d-flex justify-content-center rounded annadir">Añadir</div>';

            var id = fila.firstChild.textContent;

            cuerpoAlumnos.appendChild(fila);

            //Busca el atributo oculto que lleva la informacion del alumno
            var alumnosAdded = document.querySelectorAll('#formularioAula input');
            for (var i = 0; i < alumnosAdded.length; i++) {
                if (alumnosAdded[i].getAttribute('type') == 'hidden' && alumnosAdded[i].getAttribute('value') == id) {
                    alumnosAdded[i].remove();
                }
            }
            
        }
    }
}