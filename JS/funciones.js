

function confirmarDeleteCategorias(){
    var respuesta = confirm("Esta seguro que desea eliminar esta categoria");

    if(respuesta){
        return true;
    }else{
        return false;
    }
}

function confirmarDeleteProducto(){
    var respuesta = confirm("Esta seguro que desea eliminar este alimento");

    if(respuesta){
        return true;
    }else{
        return false;
    }
}

function confirmarDeleteUsuario(){
    var respuesta = confirm("Esta seguro que desea eliminar este usuario");

    if(respuesta){
        return true;
    }else{
        return false;
    }
}
function insertarCategoria(){
    return alert("Categoria agregada correctamente");
}

function insertarAlimento(){
    return alert("Alimento agregado correctamente");
}

function mostrarPaypal(){
    document.getElementById('paypal').style.display = 'block';
}

function ocultarPaypal(){
    document.getElementById('paypal').style.display = 'none';
}

function mostrarTarjeta(){
    document.getElementById('tarjeta').style.display = 'block';
}

function ocultarTarjeta(){
    document.getElementById('tarjeta').style.display = 'none';
}




