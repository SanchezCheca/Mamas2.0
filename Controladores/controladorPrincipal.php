<?php

require_once '../Auxiliar/AccesoADatos.php';
require_once '../Modelo/Usuario.php';
require_once '../Modelo/Aula.php';

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
     }else{
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
    }else{
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
   $tipo=$_REQUEST['preguntas'];
   if($tipo==1){
       $_SESSION['tipopregunta']=$tipo;
        header('Location: ../Vistas/creaPreguntas.php');
   }
   
    if($tipo==2){
       $_SESSION['tipopregunta']=$tipo;
        header('Location: ../Vistas/creaPreguntas.php');
   }
    if($tipo==3){
       $_SESSION['tipopregunta']=$tipo;
        header('Location: ../Vistas/creaPreguntas.php');
   }
}

//---------------------AÑADIR PREGUNTAS
if (isset($_REQUEST['anadirPregunta'])) {
    if (isset($_SESSION['tipopregunta'])) {
        $tipo = $_SESSION['tipopregunta'];
        switch ($tipo) {
             case 1:
                $descripcion = $_REQUEST['descripcion'];
                $opcionCorrecta = $_REQUEST['opcion'];
                $respuestaValida_A = $_REQUEST['resp_a'];
                $respuestaValida_B = $_REQUEST['resp_b'];
                $respuestaValida_C = $_REQUEST['resp_c'];
                $respuestaValida_D = $_REQUEST['resp_d'];
                $_SESSION['opcionCorrecta'] = $opcionCorrecta;
                switch ($opcionCorrecta) {
                    case 'opc_a':
                        $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaValida_A, $respuestaValida_B, $respuestaValida_C, $respuestaValida_D, $respuestaValida_A);
                        $_SESSION['preguntaNueva'] = $preguntaNueva;
                        break;
                    case 'opc_b':
                        $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaValida_A, $respuestaValida_B, $respuestaValida_C, $respuestaValida_D, $respuestaValida_B);
                        $_SESSION['preguntaNueva'] = $preguntaNueva;
                        break;
                    case 'opc_c':
                        $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaValida_A, $respuestaValida_B, $respuestaValida_C, $respuestaValida_D, $respuestaValida_C);
                        $_SESSION['preguntaNueva'] = $preguntaNueva;
                        break;
                    case 'opc_d':
                        $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaValida_A, $respuestaValida_B, $respuestaValida_C, $respuestaValida_D, $respuestaValida_D);
                        $_SESSION['preguntaNueva'] = $preguntaNueva;
                        break;
                }

                if (Gestion::addPregunta($preguntaNueva)) {
                    header('Location: Vista/profesorAddPreguntas.php');
                }
                break;
            
            
            case 2:
                $descripcion = $_REQUEST['descripcion'];
                $respuestaCorrecta = $_REQUEST['ta_resp_correcta_texto'];
                $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaCorrecta, '', '', '', $respuestaCorrecta);
                if (Gestion::addPregunta($preguntaNueva)) {
                    header('Location: Vista/profesorAddPreguntas.php');
                }
                break;
            
           
            case 3:
                //Mirar opciones
                $descripcion = $_REQUEST['descripcion'];
                $respValida_A = $_REQUEST['cboxa'];
                $respValida_B = $_REQUEST['cboxb'];
                $respValida_C = $_REQUEST['cboxc'];
                $respValida_D = $_REQUEST['cboxd'];

                $respuestaValida_A = $_REQUEST['resp_cbox_a'];
                $respuestaValida_B = $_REQUEST['resp_cbox_b'];
                $respuestaValida_C = $_REQUEST['resp_cbox_c'];
                $respuestaValida_D = $_REQUEST['resp_cbox_d'];

                $separador = '###';
                $respuestaCorrecta = '';
                if ($respValida_A == 'on') {
                    $respCorrecta = $respCorrecta . $respuestaValida_A . $separador;
                }

                if ($respValida_B == 'on') {
                    $respCorrecta = $respCorrecta . $respuestaValida_B . $separador;
                }

                if ($respValida_C == 'on') {
                    $respCorrecta = $respCorrecta . $respuestaValida_C . $separador;
                }

                if ($respValida_D == 'on') {
                    $respCorrecta = $respCorrecta . $respuestaValida_D . $separador;
                }

                $preguntaNueva = new Pregunta($tipo, $descripcion, $respuestaValida_A, $respuestaValida_B, $respuestaValida_C, $respuestaValida_D, $respCorrecta);
                $_SESSION['preguntaNueva'] = $preguntaNueva;
                if (Gestion::addPregunta($preguntaNueva)) {
                    header('Location: Vista/profesorAddPreguntas.php');
                }
                break;
        }
    }
}