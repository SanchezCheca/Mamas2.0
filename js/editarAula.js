/**
 * Gestiona la tabla de alumnos añadidos en la vista "editarAula.php"
 */

function cargar() {
    var primerElemento = true;

    var tituloAlumnos = document.getElementById('tituloAlumnos');   //h4 en el que pone 'Anadir alumnos'
    var tablaAlumnosAula = document.getElementById('tablaAlumnosAula'); //Tabla que contiene los alumnos del aula
    var cuerpoAlumnosAula = document.querySelector('#tablaAlumnosAula tbody')
    var cajaTablaAlumnos = document.getElementById('cajaTablaAlumnos'); //div que contiene la tabla alumnos
    var tablaAlumnos = document.getElementById('tablaAlumnos');     //Tabla que contiene a los alumnos a anadir
    var cuerpoAlumnos = document.querySelector('#tablaAlumnos tbody');

    var formulario = document.getElementById('formularioAula'); //Formulario con el boton aceptar y los IDs de los alumnos anadidos y retirados

    //Elimina en un primer momento el contenido de la tabla de Alumnos a anadir y su titulo
    tituloAlumnos.remove();
    tablaAlumnos.remove();

    //BOTONES RETIRAR ALUMNOS Y DESHACER
    window.onclick = e => {
        //BOTON 'Retirar'
        if (e.target.tagName == 'DIV' && e.target.textContent == 'Retirar') {
            var fila = e.target.parentNode.parentNode;
            fila.lastChild.innerHTML = '<div class="bg-warning text-dark d-flex justify-content-center rounded annadir">No retirar</div>';

            var id = fila.lastChild.previousElementSibling.textContent;

            //Crea el atributo oculto que llevara la informacion del alumno
            var atributoOculto = document.createElement('input');
            atributoOculto.setAttribute('type', 'hidden');
            atributoOculto.setAttribute('name', 'alumnosRetirados[]');
            atributoOculto.setAttribute('value', id);

            formulario.appendChild(atributoOculto);
        }

        //BOTON 'No retirar'
        if (e.target.tagName == 'DIV' && e.target.textContent == 'No retirar') {
            var fila = e.target.parentNode.parentNode;
            fila.lastChild.innerHTML = '<div class="bg-danger lighten-3 text-light d-flex justify-content-center rounded retirar">Retirar</div>';

            var id = fila.lastChild.previousElementSibling.textContent;

            //Busca el atributo oculto que lleva la informacion del alumno
            var alumnosRetirados = document.querySelectorAll('#formularioAula input');
            for (var i = 0; i < alumnosRetirados.length; i++) {
                if (alumnosRetirados[i].getAttribute('type') == 'hidden' && alumnosRetirados[i].getAttribute('name') == 'alumnosRetirados[]' && alumnosRetirados[i].getAttribute('value') == id) {
                    alumnosRetirados[i].remove();
                }
            }
        }

        //BOTON 'Anadir'
        if (e.target.tagName == 'DIV' && e.target.textContent == 'Añadir') {
            var fila = e.target.parentNode.parentNode;
            fila.lastChild.innerHTML = '<div class="bg-warning lighten-3 text-black d-flex justify-content-center rounded retirar">No añadir</div>'

            var id = fila.lastChild.previousElementSibling.textContent;

            //Crea el atributo oculto que llevara la informacion del alumno
            var atributoOculto = document.createElement('input');
            atributoOculto.setAttribute('type', 'hidden');
            atributoOculto.setAttribute('name', 'alumnosAdded[]');
            atributoOculto.setAttribute('value', id);

            formulario.appendChild(atributoOculto);

            //Cambia la fila de tabla
            cuerpoAlumnosAula.appendChild(fila);
        }

        //BOTON 'No anadir'
        if (e.target.tagName == 'DIV' && e.target.textContent == 'No añadir') {
            var fila = e.target.parentNode.parentNode;
            fila.lastChild.innerHTML = '<div class="bg-success lighten-3 text-light d-flex justify-content-center rounded retirar">Añadir</div>'

            var id = fila.lastChild.previousElementSibling.textContent;

            //Busca el atributo oculto que lleva la informacion del alumno
            var alumnosAdded = document.querySelectorAll('#formularioAula input');
            for (var i = 0; i < alumnosAdded.length; i++) {
                if (alumnosAdded[i].getAttribute('type') == 'hidden' && alumnosAdded[i].getAttribute('name') == 'alumnosAdded[]' && alumnosAdded[i].getAttribute('value') == id) {
                    alumnosAdded[i].remove();
                }
            }

            //Cambia la fila de tabla
            cuerpoAlumnos.appendChild(fila);
        }
    }

    //BOTON ANADIR NUEVOS ALUMNOS
    var botonAdd = document.getElementById('botonAdd');

    botonAdd.addEventListener('click', function () {
        cajaTablaAlumnos.appendChild(tablaAlumnos);
        cajaTablaAlumnos.insertBefore(tituloAlumnos, tablaAlumnos);
        botonAdd.remove();
    });

    //CONTENIDO PARA ELIMINAR
    var contenedorFormulario = document.getElementById('contenedorFormulario');
    var botonEliminarAula = document.getElementById('eliminarAula');
    var estamosSeguros = document.getElementById('estamosSeguros');
    var noEstoySeguro = document.getElementById('noEstoySeguro');

    estamosSeguros.remove();

    botonEliminarAula.addEventListener('click', function () {
        botonEliminarAula.remove();
        contenedorFormulario.appendChild(estamosSeguros);
    });

    noEstoySeguro.addEventListener('click', function () {
        estamosSeguros.remove();
        contenedorFormulario.appendChild(botonEliminarAula);
    });


}