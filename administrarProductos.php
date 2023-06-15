<?php
require 'config/configuracion.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT * FROM productos");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema IMC</title>
    </style>
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
            <h2 class="text-center">ADMINISTRACION DE ALIMENTOS</h2>
            <br />
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Calorias</th>
                            <th>Activo</th>
                            <th>Categoria</th>
                            <th>Opciones</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($resultado as $row) { ?>
                            <tr>
                                <td><?php echo $row['ID_PRO']; ?></td>
                                <td><?php echo $row['NOM_PRO']; ?></td>
                                <td><?php echo $row['VAL_NUT_PRO']; ?></td>
                                <td><?php echo $row['EST_PRO']; ?></td>
                                <td><?php echo $row['COD_CAT_PER']; ?></td>
                                <td><a href="modificarFromPro.php?id=<?php echo $row['ID_PRO'] ?>" class="btn btn-primary">Editar</a>
                                    <a href="eliminarProducto.php?id=<?php echo $row['ID_PRO'] ?>" onclick="return confirmarDeleteProducto()" class="btn btn-success">Borrar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>
            <div class="form-floating mb-3 ">
                <a href="Admin.php" class="btn btn-primary">Atras</a>
            </div>



        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/funciones.js"></script>

</body>