<?php
session_start();
require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];
$sql = $con->prepare("SELECT * FROM usuarios WHERE COD_USU='$id'");
$sql->execute();

$resultado = $sql->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $usuario = trim($_POST['usuario']);
    $apellido = trim($_POST['apellido']);
    $nacimiento = trim($_POST['nacimiento']);
    $altura = trim($_POST['altura']);
    $peso = trim($_POST['peso']);
    $correo = trim($_POST['correo']);
    $clave = trim($_POST['clave']);
    $telefono = trim($_POST['telefono']);
    $sexo = trim($_POST['sexo']);

    $actualiza = $con->prepare("UPDATE usuarios SET NOM_USU='$usuario',APE_USU='$apellido', FEC_NAC='$nacimiento', ALT_USU=$altura, 
    PES_USU=$peso, COR_USU='$correo', CON_USU='$clave', TEL_USU='$telefono', SEX_USU='$sexo'  WHERE COD_USU='$id'");
    $actualiza->execute();
    header("location:administrarUsuarios.php");
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
                <h2>Modificar Usuarios</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $resultado['COD_USU']; ?>">
                        <label for=""> Usuario</label>
                        <input type="text" name="usuario" class="form-control" value="<?php echo $resultado['NOM_USU']; ?>" placeholder="Usuario" required>
                        
                        
                    </div>

                    <div class="row">
                    <label for=""> Apellido</label>
                        <input type="text" name="apellido" class="form-control" value="<?php echo $resultado['APE_USU']; ?>" placeholder="Apellido" required>
                        
                    </div>

                    <div class="row">
                    <label for=""> Fecha de nacimiento</label>
                        <input type="text" name="nacimiento" class="form-control" value="<?php echo $resultado['FEC_NAC']; ?>" placeholder="Fecha de nacimiento" required>
                        
                    </div>

                    <div class="row">
                    <label for=""> Estatura</label>
                        <input type="number" name="altura" class="form-control" value="<?php echo $resultado['ALT_USU']; ?>" placeholder="Altura" required>
                        
                    </div>

                    <div class="row">
                    <label for=""> Peso</label>
                        <input type="number" name="peso" class="form-control" value="<?php echo $resultado['PES_USU']; ?>" placeholder="Peso" required>
                        
                    </div>

                    <div class="row">
                    <label for=""> Correo</label>
                        <input type="text" name="correo" class="form-control" value="<?php echo $resultado['COR_USU']; ?>" placeholder="Correo" required>
                        
                    </div>

                    <div class="row">
                    <label for=""> Clave</label>
                        <input type="text" name="clave" class="form-control" value="<?php echo $resultado['CON_USU']; ?>" placeholder="Clave" required>
                        
                    </div>

                    <div class="row">
                    <label for=""> Telefono</label>
                        <input type="text" name="telefono" class="form-control" value="<?php echo $resultado['TEL_USU']; ?>" placeholder="Telefono" required>
                        
                    </div>

                    <div class="row">
                    <label for=""> Sexo</label>
                        <input type="text" name="sexo" class="form-control" value="<?php echo $resultado['SEX_USU']; ?>" placeholder="Sexo" required>
                        
                    </div>
                    
                    <br/>
                    <div class="row col-2 col-4">
                        <input type="submit" name="modificar" class="btn btn-success btn-sm btn-block" value="Modificar">
                    </div>
                    <br/>
                    <div class="row col-2 col-4">
                        <a href="administrarUsuarios.php" class="btn btn-primary">Atras</a>
                    </div>
                </form>
            </div>


        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>