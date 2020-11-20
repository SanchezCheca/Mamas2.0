/**
 * MUESTRA EL FORMULARIO ADECUADO PARA CREAR UN AULA: NOMBRE Y ADICION DE ALUMNOS
 * Oculta una tabla con todos los alumnos previamente pintada mediante php.
 * Permie anadir alumnos a otra tabla y los pinta como valores ocultos del formulario
 * "alumnosAAnadir" para ser recuperados despues en php
 */

function cargar() {
    var botonNueva = document.getElementById('botonNueva');
    var botonAdd = document.getElementById('anadirAlumnos');

    var $cajaGeneral = $('#cajaGeneral');   //Contenedor general para los elementos de Crear Aula
    var $cajaTabla = $('#cajaCrear');       //Contenedor dentro del que esta la tabla
    var $tabla = $('#tablaAlumnos');        //Tabla que contiene a todos los alumnos
    var $cajaBotonAdd = $('#botonAdd');     //Boton "Anadir alumno"
    var $formulario = $('#formularioAula'); //Formulario que contiene el boton para aceptar y los atributos ocultos que seran los alumnos

    $tabla.remove();
    $cajaBotonAdd.remove();
    $formulario.remove();

    //BOTON "Nueva Aula"
    botonNueva.addEventListener('click', function () {
        $cajaGeneral.append($cajaBotonAdd);
        $cajaGeneral.append($formulario);
        botonNueva.remove();
    })

    //BOTON "Anadir alumnos"
    botonAdd.addEventListener('click', function () {
        $cajaTabla.append($tabla);
        $cajaBotonAdd.remove();
    })


}