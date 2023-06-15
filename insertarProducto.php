<?php

require 'config/configuracion.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT * FROM categorias");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['agregar'])) {
    $nombre = trim($_POST['nombreAlimento']);
    $calorias = trim($_POST['cantidadCalorias']);
    $activo = trim($_POST['activo']);
    $categoria = trim($_POST['categoria']);
    
    $insertar = $con->prepare("INSERT INTO productos (NOM_PRO, VAL_NUT_PRO, EST_PRO, COD_CAT_PER) 
  VALUES ( '$nombre', '$calorias', '$activo', '$categoria');");
    $insertar->execute();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema IMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="admin.php" class="navbar-brand">
                    <strong>ADMINISTRACION</strong>
                </a>
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-3"></ul>
                    <a href="administrarUsuarios.php" class="navbar-brand">
                        <strong>Usuarios</strong>
                    </a>
                </div>
                <a href="insertarCategoria.php" class="navbar-brand">
                    <strong>Categorias</strong>
                </a>
                <a href="administrarCategorias.php" class="navbar-brand">
                    <strong>Ver Categorias</strong>
                </a>
                <a href="insertarProducto.php" class="navbar-brand">
                    <strong>Alimentos</strong>
                </a>
                <a href="administrarProductos.php" class="navbar-brand">
                    <strong>Ver Alimentos</strong>
                </a>
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <a href="inicioSesion.php" class="btn btn-success">
                        Cerrar sesion
                    </a>
                </div>

            </div>
        </div>
    </header>

    <main>

    <div class="container">
            <h2 class="text-center">ADMINISTRACION DE CATEGORIAS</h2>
            <br />
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Activo</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($resultado as $row) { ?>
                            <tr>
                                <td><?php echo $row['COD_CAT']; ?></td>
                                <td><?php echo $row['NOM_CAT']; ?></td>
                                <td><?php echo $row['DES_CAT']; ?></td>
                                <td><?php echo $row['EST_CAT']; ?></td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>
            <div class="form-floating mb-3 ">
                <br>
            </div>



        </div>




        <div class="container text-center">
            <h2>Agregar Alimentos</h2>
            <br />
            <center>
                <form method="post" autocomplete="off">

                    <div class="col-md-6">
                        <label for="nombreAlimento"><span class="text-danger">*</span>Nombre del Alimento</label>
                        <input type="text" name="nombreAlimento" id="nombreAlimento" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cantidadCalorias"><span class="text-danger">*</span>Cantidad de Calorias</label>
                        <input type="number" name="cantidadCalorias" id="cantidadCalorias" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="activo"><span class="text-danger">*</span>Alimento Activo</label>
                        <input type="number" name="activo" id="activo" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="categoria"><span class="text-danger">*</span>Categoria a la que pertenece</label>
                        <input type="number" name="categoria" id="categoria" class="form-control" required>
                    </div>
                    
                    <br />
                    <div class="col-12">
                        <a href="admin.php" class="btn btn-success">Atras</a>
                        <input type="submit" name="agregar" class="btn btn-primary btn-sm btn-block" onclick="insertarAlimento()" value="Agregar">
                    </div>

                </form>
            </center>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/funciones.js"></script>

</body>