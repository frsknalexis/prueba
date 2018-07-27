<?php 

require_once '../conexion.php';

if(empty($_POST['id'])) {
    
    $errors[] = 'ID Vacio';
}
elseif(empty($_POST['codigo'])) {
    
    $errors[] = 'Codigo Vacio';
    
}
elseif(empty($_POST['nombre'])) {
    
    $errors[] = 'Nombre Vacio';
}
elseif(empty($_POST['moneda'])) {
    
    $errors[] = 'Moneda Vacio';
}
elseif(empty($_POST['capital'])) {
    
    $errors[] = 'Capital Vacio';
}
elseif(empty($_POST['continente'])) {
    
    $errors[] = 'Continente Vacio';
}
elseif(!empty($_POST['id']) && !empty($_POST['codigo']) && !empty($_POST['nombre']) && !empty($_POST['moneda']) && !empty($_POST['capital']) && !empty($_POST['continente'])) {
    
    //escaping, additionally removing everything that could be(html/javascript- ) code
    $codigo = mysqli_real_escape_string($conn, (strip_tags($_POST['codigo'], ENT_QUOTES)));
    $nombre = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre'], ENT_QUOTES)));
    $moneda = mysqli_real_escape_string($conn, (strip_tags($_POST['moneda'], ENT_QUOTES)));
    $capital = mysqli_real_escape_string($conn, (strip_tags($_POST['capital'], ENT_QUOTES)));
    $continente = mysqli_real_escape_string($conn, (strip_tags($_POST['continente'], ENT_QUOTES)));
    $id = intval($_POST['id']);
    
    $sql = "UPDATE countries SET countryCode = '$codigo', countryName = '$nombre', currencyCode = '$moneda', capital = '$capital', continentName = '$continente' WHERE id_countries = '$id'";
    
    $query_update = mysqli_query($conn, $sql);
    
    if($query_update) {
        
        $messages[] = 'Los datos han sido actualizados Satisfactoriamente';
        
    }
    else {
        
        $errors[] = 'Lo siento algo ha salido mal intenta nuevamente ' . mysqli_error($conn);
    }
}
else {
    
    $errors[] = 'Error Desconocido';
}

if(isset($errors)) {
    
    ?>

<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error !</strong>
    <?php 
    
    foreach($errors as $error) {
        
        echo $error;
    }
    
    ?>
</div>

<?php 

}

if(isset($messages)) {
    
    ?>

<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡Bien Hecho!</strong>
    <?php 
    
    foreach($messages as $message) {
        
        echo $message;
    }
    
    ?>
</div>

<?php

}

?>





