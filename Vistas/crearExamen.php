<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Mi CSS -->
        <link rel="stylesheet" href="../css/estilos.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/miestilo.css">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

        <!-- Recursos MDBootstrap -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/mdb.min.css">
        <link rel="stylesheet" href="../css/style.css">

        <title>Crear examen - Mamas 2.0</title>

    </head>

    <body>

        <div class="container-fluid principal p-0 m-0">
            <?php include '../Recursos/header.php'; ?>
            <main class="row col-12 align-items-center justify-content-center p-4">
                <div class="col-md-7 mt-5 mx-auto">
                    <form class="border border-light p-5" action="../Controladores/controladorPrincipal.php" method="POST">

                        <p class="h4 mb-4 text-center">Crear Examen</p>
                        <div class="my-3">
                            <label for="exampleForm2">Nombre del examen: </label>
                            <input type="text" id="exampleForm2" name="nombreExamen" class="form-control ">
                        </div>

                        <div class="my-3">
                            <label for="exampleForm2">Fecha de inicio: </label>
                            <input type="datetime-local" id="exampleForm2" name="fechaInicio" class="form-control ">
                        </div>


                        <div class="my-3">
                            <label for="exampleForm2">Fin del examen: </label>
                            <input type="datetime-local" id="exampleForm2" name="fechaFin" class="form-control ">
                        </div>




                        <select name="opciones" class="browser-default custom-select mb-4 " id="select">
                            <option value="" disabled selected>Elige una Opción</option>
                            <option value="1">Activado</option>
                            <option value="2">Desactivado</option>

                        </select>
                        <button class="btn btn-info btn-block my-4" type="submit" name="crearExamen">Crear</button>


                    </form>
                </div>

            </main>

            <?php include '../Recursos/footer.php'; ?>
        </div>
    </body>


    <!-- jQuery -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>

</html>
