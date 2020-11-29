<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Mi CSS -->
        <link rel="stylesheet" href="../css/estilos.css">

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

        <title>ADMIN - Mamas 2.0</title>

        <!-- MDB icon -->
        <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="../css/miestilo.css">
    </head>
    <body style="height: 100%;">
        <div class="container-fluid principal p-0 m-0">
            <?php include '../Recursos/header.php'; ?>
            <main class="row col-12 align-items-center justify-content-center">
                <div class="col-md-8 mx-auto d-flex flex-column justify-content-center align-items-center">
                    <form class="form-inline mt-4" action="../Controladores/controladorCRUD.php" method="POST" name="anadir">
                        <button type="submit" name="cargar" class="btn btn-rounded btn-primary"><i class="fas fa-redo-alt pr-2" style="font-size: 20px" aria-hidden="true"></i>Cargar Usuarios</button>
                        <button type="submit" class="waves-effect btn btn-primary" name="anadir" >+ Añadir Usuario</button>
                    </form>
                    <div class="table-responsive text-nowrap ">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col"> <i class="fas fa-id-card pr-2" style="font-size: 30px"></i>  Id</th>
                                    <th scope="col"><i class="fas fa-user-graduate pr-2" style="font-size: 30px" ></i>Nombre</th>
                                    <th scope="col"> <i class="fas fa-envelope-open-text pr-2" style="font-size: 30px"></i>Email</th>
                                    <th scope="col"><i class="fas fa-dice pr-2" style="font-size: 30px"></i>Rol</th>
                                    <th scope="col"><i class="fas fa-check pr-2" style="font-size: 30px"></i>Activado</th>
                                    <th scope="col"><i class="fas fa-user pr-2" style="font-size: 30px"></i>Editar/Eliminar</th>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['usuarios'])) {
                                    $usuarios = $_SESSION['usuarios'];
                                    for ($i = 0; $i < sizeof($usuarios); $i++) {

                                        $aux = $usuarios[$i];
                                        ?>
                                    <form action="../Controladores/controladorCRUD.php" method="POST" name="usuarios">
                                        <tr>
                                            <th scope="row"><input type="text" name="id" value="<?php echo $aux->getId() ?>" readonly></th>
                                            <td><input type="text" name="nombre" value="<?php echo $aux->getNombre() ?>"></td>
                                            <td><input type="text" name="email" value="<?php echo $aux->getCorreo() ?>"></td>
                                            <td><input type="text" name="rol" value="<?php echo $aux->getRol() ?>"></td>
                                            <td><input type="text" name="activado" value="<?php echo $aux->getActivo() ?>"></td>
                                            <td>
                                                <button type="submit" name="editar" class="btn-floating btn-lg  boton bg-primary"><i class="fas fa-user-edit"></i></button>
                                                <button type="submit" name="eliminar" class="btn-floating btn-lg  boton bg-primary"><i class="fas fa-user-times"></i></button>
                                            </td>

                                        </tr>
                                    </form>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
            <?php include '../Recursos/footer.php'; ?>
        </div>
    </body>
</html>
