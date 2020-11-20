/**
 * MUESTRA EL FORMULARIO ADECUADO PARA CREAR UN AULA: NOMBRE Y ADICION DE ALUMNOS
 * Recupera de la sesion la informacion de los alumnos disponibles mediante json
 */

function cargar() {
    var boton = document.getElementById('botonNueva');

    boton.addEventListener('click', function () {
        
        var listaAlumnos = '<%= Session["alumnos"] %>';
        alert(listaAlumnos);

        //Prepara la tabla        
        var $caja = $('#cajaCrear');
        
        var $tabla = $('<table class="table"></table>');
        var $tHead = $('<thead class="thead-dark"></thead>');
        var contenidoTHead = '<tr><th scope="col">ID</th><th scope="col">Correo</th><th scope="col">Nombre</th><th scope="col">Acciones</th></tr>';
        
        $tHead.append(contenidoTHead);
        $tabla.append($tHead);
        
        $caja.append($tabla);

        boton.remove();
    })
}