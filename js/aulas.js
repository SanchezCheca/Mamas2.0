/**
 * MUESTRA EL FORMULARIO ADECUADO PARA CREAR UN AULA: NOMBRE Y ADICION DE ALUMNOS
 * Recupera de la sesion la informacion de los alumnos disponibles mediante json
 */

function cargar() {
    var boton = document.getElementById('botonNueva');

    boton.addEventListener('click', function () {
        //Prepara la tabla        
        var $caja = $('#cajaCrear');
        var $tabla = $('#tablaAlumnos');
        
        $tabla.remove();
        boton.remove();
        
        $caja.append($tabla);
    })
}