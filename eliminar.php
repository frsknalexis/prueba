<?php 

require_once '../conexion.php';

//Inicia la validacion del lado del servidor

if(empty($_POST['id_pais'])) {
    
    $errors[] = 'ID Vacio';
    
}
elseif(!empty($_POST['id_pais'])) {
    
    //escaping, additionally removing everything that could be (html/javascript -) code
    
    $id_pais = intval($_POST['id_pais']);
    
    $sql = "DELETE FROM countries WHERE id_countries = '$id_pais'";
    
    $query_delete = mysqli_query($conn, $sql);
    
    if($query_delete) {
        
        $messages[] = 'Los datos han sido eliminados Satisfactoriamente';
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
<button type="button" class="close" data-dismiss="alert">&times;</button><strong>¡Bien Hecho!</strong>

    <?php 
    
    foreach($messages as $message) {
        
        echo $message;
    }
    
    ?>
</div>

<?php

}


?>


