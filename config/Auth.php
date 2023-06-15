<?php 
    //include "../Tienda_online/config/database.php";

    function esNulo(array $parametros){
        foreach($parametros as $parametro){
            if(strlen(trim($parametro)) <1){
                return true;
            }
        }
        return false;
    }
    function esEmail($correo){
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    function validaClave($clave, $confirmaClave){
        if(Strcmp($clave, $confirmaClave) == 0){
            return true;
        }
        return false;
    }

    function usuarioExiste($usuario, $con) {
        $sql =$con->prepare("SELECT id_adm FROM administradores WHERE nom_usu_adm LIKE ?");
        $sql->execute([$usuario]);
        if($sql->fetchColumn() > 0){
            return true;;
        }
        return false;
        
    }
        function registrar(array $datos, $con) {
            $sql =$con->prepare( "INSERT INTO administradores (nom_usu_adm, cor_adm, con_adm) 
                    VALUES (?,?,?)");
            if($sql->execute($datos)){
                return true;;
            }
            return false;
            
        }

    function mostrarMensajes(array $errors){
        if(count($errors) > 0){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><ul>';
            foreach($errors as $error){
                echo '<li>'. $error . '</li>';
            }
            echo '</ul>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            
        }
            
        
    }    


        function inicioSesion($usuario, $clave, $con) {
            $sql = $con->prepare("SELECT id_adm, nom_usu_adm FROM administradores WHERE nom_usu_adm=? AND con_adm=?");   
            $sql->execute([$usuario, $clave]); 
            if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {  
                $_SESSION['used_id'] = $row['id_amd'];
                $_SESSION['used_name'] = $row['nom_usu_adm'];
                header("Location: admin.php");
                exit;
            } else {
                return 'El usuario y/o clave son incorrectas';
            }
        } 

        function inicioSesionAdmin($usuario, $clave, $con) {
            $sql = $con->prepare("SELECT id_adm, nom_usu_adm FROM administradores WHERE nom_usu_adm=? AND con_adm=?");   
            $sql->execute([$usuario, $clave]); 
            if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {  
                $_SESSION['used_id'] = $row['id_adm'];
                $_SESSION['used_name'] = $row['nom_usu_adm'];
                header("Location: admin.php");
                exit;
            } else {
                return 'El usuario y/o clave son incorrectas';
            }
        }

        function disminuirCantidad($id, $cantidada, $conexion){
            $sql = $conexion->prepere("UPDATE juegos SET  cantidad = $cantidada WHERE id='$id'");
            $sql->execute();
        }  

?>