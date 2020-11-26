<?php

require_once '../Auxiliar/AccesoADatos.php';
require_once '../Modelo/Usuario.php';
require_once '../Modelo/Aula.php';
require_once '../Modelo/Pregunta.php';
require_once '../Modelo/Opcion.php';
session_start();

//---------------------VIENE DE FORMULARIO DE REGISTRO
if (isset($_REQUEST['registro'])) {
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LdGnuoZAAAAAE00TDbdo-XCFJXmNRMRsGtgksZl';
    $recaptcha_response = $_POST['recaptcha_response'];
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    if ($recaptcha->score >= 0.7) {
        $nombre = $_REQUEST['nombre'];
        $correo = $_REQUEST['correo'];
        $pass = $_REQUEST['pass'];

        if (AccesoADatos::insertarUsuario($correo, $nombre, $pass)) {
            $mensaje = 'Correcto se ha registrado';
        }
    } else {
        $mensaje = 'No ha funcionado el captcha(eres un robot)';
    }
    $_SESSION['mensaje'] = $mensaje;
    header('Location: ../index.php');
}

//---------------------VIENE DE INICIO DE SESIÓN
if (isset($_REQUEST['iniciosesion'])) {
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LdGnuoZAAAAAE00TDbdo-XCFJXmNRMRsGtgksZl';
    $recaptcha_response = $_POST['recaptcha_response'];
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    if ($recaptcha->score >= 0.7) {
        $correo = $_REQUEST['correo'];
        $pass = $_REQUEST['pass'];

        $usuarioIniciado = AccesoADatos::getUsuario($correo, $pass);
        if ($usuarioIniciado != null) {
            $_SESSION['usuarioIniciado'] = $usuarioIniciado;
            $mensaje = 'Has iniciado sesión como ' . $usuarioIniciado->getNombre();
        } else {
            $mensaje = 'ERROR: Correo y/o contraseña incorrectos.';
        }
    } else {
        $mensaje = 'No ha funcionado el captcha (eres un robot).';
    }

    $_SESSION['mensaje'] = $mensaje;
    header('Location: ../index.php');
}


//---------------------CERRAR SESIÓN
if (isset($_REQUEST['cerrarSesion'])) {
    unset($_SESSION['usuarioIniciado']);
    $mensaje = 'Has cerrado la sesión.';
    $_SESSION['mensaje'] = $mensaje;
    header('Location: ../index.php');
}

//---------------------BOTON "Ir a crear aula"
if (isset($_REQUEST['irACrearAula'])) {
    //Hace una consulta a BD y guarda en la sesión un vec. asoc. con todos los alumnos disponibles
    require_once '../Auxiliar/AccesoADatos.php';
    $alumnos = AccesoADatos::getListaAlumnos();
    $listaAlumnos = json_decode($alumnos);
    $_SESSION['listaAlumnos'] = $listaAlumnos;

    header('Location: ../Vistas/crearAula.php');
}

//---------------------BOTON "Crear Aula"
if (isset($_REQUEST['crearAula'])) {
    $nombre = $_REQUEST['nombre'];
    $alumnos = $_REQUEST['alumnosAula'];
    $mensaje = '';
    $hayError = false;

    if (isset($_SESSION['usuarioIniciado'])) {
        $usuarioIniciado = $_SESSION['usuarioIniciado'];
    } else {
        $mensaje = 'Ha ocurrido algún error.';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/aulas.php');
    }

    $idAula = AccesoADatos::addAula($usuarioIniciado->getId(), $nombre);

    if ($idAula != null) {
        foreach ($alumnos as $valor) {
            if (!$hayError) {
                AccesoADatos::asignarAlumnoAula($idAula, $valor);
            }
        }

        $mensaje = 'Se ha creado el aula "' . $nombre . '" con ' . count($alumnos) . ' alumno(s).';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/aulas.php');
    } else {
        $mensaje = 'Ha ocurrido algún error.';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/aulas.php');
    }
}


//---------------------SELECCION PREGUNTAS
if (isset($_REQUEST['preguntas'])) {
    $tipo = $_REQUEST['preguntas'];
    if ($tipo == 1) {
        $_SESSION['tipopregunta'] = $tipo;
        header('Location: ../Vistas/creaPreguntas.php');
    }

    if ($tipo == 2) {
        $_SESSION['tipopregunta'] = $tipo;
        header('Location: ../Vistas/creaPreguntas.php');
    }
    if ($tipo == 3) {
        $_SESSION['tipopregunta'] = $tipo;
        header('Location: ../Vistas/creaPreguntas.php');
    }
}

//---------------------AÑADIR PREGUNTAS
if (isset($_REQUEST['anadirPregunta'])) {
    if (isset($_SESSION['tipopregunta'])) {
        $tipo = $_SESSION['tipopregunta'];

        switch ($tipo) {
            case 1:
                $valor = $_REQUEST['valor'];
                $titulo = $_REQUEST['titulo'];
                $respuesta = $_REQUEST['numerico'];
                $preguntados = new Pregunta('null', $titulo, $tipo, $valor);

                if (AccesoADatos::addPregunta($preguntados)) {
                    $idPregunta = AccesoADatos::getIdPregunta($titulo);
                    $opciones = new Opcion('null', $idPregunta, 1, $respuesta);
                    if (AccesoADatos::addOpciones($opciones)) {


                        header('Location: ../Vistas/creaPreguntas.php');
                    }
                }
                break;


            case 2:
                $valor = $_REQUEST['valor'];
                $titulo = $_REQUEST['titulo'];
                $respuesta = $_REQUEST['desarrollo'];
                $preguntados = new Pregunta('null', $titulo, $tipo, $valor);
                if (AccesoADatos::addPregunta($preguntados)) {
                    header('Location: ../Vistas/creaPreguntas.php');
                }
                break;


            case 3:
                $valor = $_REQUEST['valor'];
                //Mirar opciones
                $titulo = $_REQUEST['titulo'];
                $respA = $_REQUEST['comboa'];
                $respB = $_REQUEST['combob'];
                $respC = $_REQUEST['comboc'];
                $respD = $_REQUEST['combod'];

                $respValidaA = $_REQUEST['inputa'];
                $respValidaB = $_REQUEST['inputb'];
                $respValidaC = $_REQUEST['inputc'];
                $respValidaD = $_REQUEST['inputd'];
                $preguntados = new Pregunta('null', $titulo, $tipo, $valor);

                if (AccesoADatos::addPregunta($preguntados)) {
                    if ($respA == 'on') {
                        $idPregunta = AccesoADatos::getIdPregunta($titulo);
                        $opciones = new Opcion('null', $idPregunta, 1, $respValidaA);
                        if (AccesoADatos::addOpciones($opciones)) {
                            
                        }
                    }

                    if ($respB == 'on') {
                        $idPregunta = AccesoADatos::getIdPregunta($titulo);
                        $opciones = new Opcion('null', $idPregunta, 1, $respValidaB);
                        if (AccesoADatos::addOpciones($opciones)) {
                            
                        }
                    }

                    if ($respC == 'on') {
                        $idPregunta = AccesoADatos::getIdPregunta($titulo);
                        $opciones = new Opcion('null', $idPregunta, 1, $respValidaC);
                        if (AccesoADatos::addOpciones($opciones)) {
                            
                        }
                    }

                    if ($respD == 'on') {
                        $idPregunta = AccesoADatos::getIdPregunta($titulo);
                        $opciones = new Opcion('null', $idPregunta, 1, $respValidaD);
                        if (AccesoADatos::addOpciones($opciones)) {
                            
                        }
                    }
                    
                    
                    if ($respA == '') {
                        $idPregunta = AccesoADatos::getIdPregunta($titulo);
                        $opciones = new Opcion('null', $idPregunta, 0, $respValidaA);
                        if (AccesoADatos::addOpciones($opciones)) {
                            
                        }
                    }

                    if ($respB == '') {
                        $idPregunta = AccesoADatos::getIdPregunta($titulo);
                        $opciones = new Opcion('null', $idPregunta, 0, $respValidaB);
                        if (AccesoADatos::addOpciones($opciones)) {
                            
                        }
                    }

                    if ($respC == '') {
                        $idPregunta = AccesoADatos::getIdPregunta($titulo);
                        $opciones = new Opcion('null', $idPregunta, 0, $respValidaC);
                        if (AccesoADatos::addOpciones($opciones)) {
                            
                        }
                    }

                    if ($respD == '') {
                        $idPregunta = AccesoADatos::getIdPregunta($titulo);
                        $opciones = new Opcion('null', $idPregunta, 0, $respValidaD);
                        if (AccesoADatos::addOpciones($opciones)) {
                            
                        }
                    }
                    header('Location: ../Vistas/creaPreguntas.php');
                }


               
                break;
        }
    }
}