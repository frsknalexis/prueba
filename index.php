<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cargar información dinámica en ventana modal Bootstrap con PHP, MySQL y jQuery</title>
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">  
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>
    
        <div class="container">
            
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Listado de <b>Paises</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#dataRegister" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i><span> Agregar</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 pull-right">
                    <div class="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control" placeholder="Buscar" id="q" onkeyup="load(1);">
                            <span class="input-group-btn">
                            <button class="btn btn-info" type="button" onclick="load(1);">
                            <span class="fa fa-search"></span>
                            </button>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                <hr>
                <div id="loader"></div><!--Carga de datos AJAX aqui-->
                <div id="resultados"></div>
                <div class="outer-div"></div>
                
            </div>
        </div>
        <?php 
        
        include('html/modal_agregar.php');
        include('html/modal_modificar.php');
        include('html/modal_eliminar.php');
        
        ?>
        
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>
        
    </body>
</html>