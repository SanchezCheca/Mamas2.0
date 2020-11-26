/**
 * Gestiona la tabla de alumnos añadidos en la vista "editarAula.php"
 */

function cargar() {
    var primerElemento = true;

    var tablaAlumnosAula = document.getElementById('tablaAlumnosAula'); //Tabla que contiene los alumnos del aula
    var cuerpoAlumnosAula = document.querySelector('#tablaAlumnosAula tbody')
    var tablaRetirados = document.getElementById('tablaRetirados');     //Tabla que contiene a los alumnos anadidos
    var cuerpoRetirados = document.querySelector('#tablaRetirados tbody');
    var formulario = document.getElementById('formularioAula'); //Formulario con el boton aceptar y los IDs de los alumnos anadidos y retirados

    var caption = document.querySelector('#tablaRetirados caption');        //Caption de la tabla retirados
    var cabezaTablaRetirados = document.querySelector('#tablaRetirados thead'); //Cabecera de la tabla retirados

    //Oculta la tabla "Alumnos retirados" en un primer momento
    caption.remove();
    cabezaTablaRetirados.remove();

    window.onclick = e => {
        if (e.target.tagName == 'DIV' && e.target.textContent == 'Retirar') {
            var fila = e.target.parentNode.parentNode;
            fila.lastChild.innerHTML = '<div class="bg-warning text-light d-flex justify-content-center rounded annadir">No retirar</div>';

            if (primerElemento) {
                //Inserta la cabecera de la tabla "tablaRetirados"
                tablaRetirados.appendChild(cabezaTablaRetirados);
                tablaRetirados.appendChild(caption);
                primerElemento = false;
            }

            var id = fila.lastChild.previousElementSibling.textContent;

            cuerpoRetirados.appendChild(fila);

            //Crea el atributo oculto que llevara la informacion del alumno
            var atributoOculto = document.createElement('input');
            atributoOculto.setAttribute('type', 'hidden');
            atributoOculto.setAttribute('name', 'alumnosRetirados[]');
            atributoOculto.setAttribute('value', id);

            formulario.appendChild(atributoOculto);
        }

        if (e.target.tagName == 'DIV' && e.target.textContent == 'No retirar') {
            var fila = e.target.parentNode.parentNode;
            fila.lastChild.innerHTML = '<div class="bg-danger text-light d-flex justify-content-center rounded retirar">Retirar</div>';

            var id = fila.lastChild.previousElementSibling.textContent;

            cuerpoAlumnosAula.appendChild(fila);

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