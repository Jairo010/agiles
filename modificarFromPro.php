<?php
session_start();
require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];
$sql = $con->prepare("SELECT * FROM productos WHERE  ID_PRO='$id'");
$sql->execute();

$resultado = $sql->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['modificar'])) {
  $id = $_POST['id'];
  $nombre = trim($_POST['nombre']);
  $calorias = trim($_POST['calorias']);
  $activo = trim($_POST['activo']);
  $categoria = trim($_POST['categoria']);

  $actualiza =$con->prepare( "UPDATE productos SET NOM_PRO='$nombre', VAL_NUT_PRO='$calorias',
  EST_PRO=$activo, COD_CAT_PER=$categoria WHERE ID_PRO='$id'");
  $actualiza->execute();
  header("location:administrarProductos.php");
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarHeader">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          </ul>
          <a href="inicioSesion.php" class="btn btn-success">
            Cerrar sesion
          </a>
        </div>

      </div>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="text-center">
        <h2>MODIFICAR ALIMENTOS</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="row">
            <input type="hidden" name="id" value="<?php echo $resultado['ID_PRO']; ?>">
            <label for="">Nombre del alimento</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $resultado['NOM_PRO']; ?>" placeholder="Nombre del producto" required>
          </div>
          <div class="row">
          <label for="">Cantidad de calorias</label>
            <input type="text" name="calorias" class="form-control" value="<?php echo $resultado['VAL_NUT_PRO']; ?>" placeholder="Cantidad de calorias" required>
          </div>

          <div class="row">
          <label for="">Activo del alimento</label>
            <input type="text" name="activo" class="form-control" value="<?php echo $resultado['EST_PRO']; ?>" placeholder="Activo del producto" required>
          </div>
          <div class="row">
          <label for="">Codigo de la categoria a la que pertenece</label>
            <input type="text" name="categoria" class="form-control" value="<?php echo $resultado['COD_CAT_PER']; ?>" placeholder="Categoria a la que pertenece" required>
          </div>

          <br/>
          <div class="row col-2 col-4">
            <input type="submit" name="modificar" class="btn btn-success btn-sm btn-block" value="Modificar">
          </div>
          <br/>
          <div class="row col-2 col-4">
            <a href="administrarProductos.php" class="btn btn-primary">Atras</a>
          </div>
          <br/>
        </form>
      </div>


    </div>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>