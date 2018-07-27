<?php 

require_once '../conexion.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)? $_REQUEST['action']: '';

if($action == 'ajax') {
    
    include 'pagination.php';//Incluir el archivo de paginacion
    
    //Las variables de paginacion
    
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))? $_REQUEST['page']:1;
    
    $per_page = 10; //La Cantidad de Registros que desea mostrar
    $adjacents = 4;//brecha entre paginas despues de varios adyacentes
    $offset = ($page - 1) * $per_page;
    //Cuenta el numero total de filas de la tabla
    
    $cont_query = mysqli_query($conn, "SELECT COUNT(*) AS numrows FROM countries");
    if($row = mysqli_fetch_array($cont_query)) {
        
        $numrows = $row['numrows'];
    }
    
    $total_pages = ceil($numrows/$per_page);
    
    $reload = '../index.php';
    
    //Consulta principal para recuperar los datos
    $query = mysqli_query($conn, "SELECT * FROM countries ORDER BY countryName LIMIT $offset, $per_page");
    
    if($numrows > 0) {
        
        ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Moneda</th>
            <th>Capital</th>
            <th>Continente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        while($row = mysqli_fetch_array($query)) {
            
           ?>
            <tr>
                <td><?php echo $row['countryCode']; ?></td>
                <td><?php echo $row['countryName']; ?></td>
                <td><?php echo $row['currencyCode']; ?></td>
                <td><?php echo $row['capital']; ?></td>
                <td><?php echo $row['continentName']; ?></td>
                <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data_id="<?php echo $row['id_countries'];?>" data-codigo="<?php echo $row['countryCode'];?>" data-nombre ="<?php echo $row['countryName'];?>" data-moneda="<?php echo $row['currencyCode'];?>" data-capital="<?php echo $row['capital'];?>" data-continente="<?php echo $row['continentName'];?>"><i class="fa fa-pencil"></i> Modificar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['id_countries'];?>"><i class="fa fa-trash"></i> Eliminar</button>
                </td>
            </tr>
            
            <?php 
            
             } 
        ?>
        
    </tbody>
</table>

<div class="table-pagination pull-right">
    <?php echo paginate($reload, $page, $total_pages, $adjacents);  ?>
</div>
      
<?php 
    
    }
    
    else {
        
        ?>

<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>Aviso !!!</h4> No hay datos para mostrar
 </div>

<?php
        
    }
    
}

?>


