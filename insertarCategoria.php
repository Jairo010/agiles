<?php

require 'config/configuracion.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT cod_cat, nom_cat, des_cat, est_cat FROM categorias WHERE est_cat=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['agregar'])) {
    $nombreCategoria = trim($_POST['nombreCategoria']);
    $descripcionCategoria = trim($_POST['decripcionCate']);
    $activo = trim($_POST['activo']);

    //Crear la sentencia sql
    $insertar = $con->prepare("INSERT INTO categorias (nom_cat, des_cat, est_cat) 
  VALUES ( '$nombreCategoria', '$descripcionCategoria', '$activo');");
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
        <div class="container text-center">
            <h2>Agregar Categorias</h2>
            <br />
            <center>
                <form method="post" autocomplete="off">
                    <div class="col-md-6">
                        <label for="nombreCategoria"><span class="text-danger">*</span>Nombre de la Categoria</label>
                        <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="decripcionCate"><span class="text-danger">*</span>Descripcion de la Categoria</label>
                        <input type="text" name="decripcionCate" id="decripcionCate" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="activo"><span class="text-danger">*</span>Categoria Activa</label>
                        <input type="number" name="activo" id="activo" class="form-control" required>
                    </div>
                    <br />
                    <div class="col-12">
                        <a href="admin.php" class="btn btn-success">Atras</a>
                        <input type="submit" name="agregar" class="btn btn-primary btn-sm btn-block" onclick="insertarCategoria()" value="Agregar">
                    </div>

                </form>
            </center>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/funciones.js"></script>

</body>