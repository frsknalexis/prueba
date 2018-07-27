$(function() {
   
    load(1);
    
});	

function load(page){
    var query = $('#q').val();
    var per_page = 10;
    var parametros = {'action':'ajax','page':page, 'query':query, 'per_page':per_page};
    $("#loader").fadeIn('slow');
    $.ajax({
        
        url:'ajax/paises_ajax.php',
        method: 'POST',
        data: parametros,
        beforeSend: function(objeto){
            $("#loader").html('Cargando...');
        },
        success:function(data){
            $(".outer-div").html(data).fadeIn('slow');
            $("#loader").html("");
        
        }
    });

}

$('#dataUpdate').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Botón que activó el modal
var codigo = button.data('codigo') // Extraer la información de atributos de datos
$('#codigo').val(codigo);
var id = button.data('id') // Extraer la información de atributos de datos
$('#id').val(id);
var nombre = button.data('nombre') // Extraer la información de atributos de datos
$('#nombre').val(nombre);
var moneda = button.data('moneda') // Extraer la información de atributos de datos
$('#moneda').val(moneda);
var capital = button.data('capital') // Extraer la información de atributos de datos
$('#capital').val(capital);
var continente = button.data('continente') // Extraer la información de atributos de datos
$('#continente').val(continente);

});
		
$('#dataDelete').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Botón que activó el modal
var id = button.data('id') // Extraer la información de atributos de datos
$('#id_pais').val(id);

});

$("#edit_product").submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
        
        url: "ajax/modificar.php",
        method: 'POST',
        data: parametros,
        beforeSend: function(objeto){
            $("#resultados").html("Mensaje: Cargando...");
        },
        success: function(datos){
            $("#resultados").html(datos);
            load(1);
            $('#dataUpdate').modal('hide');
        }
    
    });
    
    event.preventDefault();

});
		
$("#add_product").submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
        
        url: "ajax/agregar.php",
        method: 'POST',
        data: parametros,
        beforeSend: function(objeto){
            $("#resultados").html("Mensaje: Cargando...");
        },
        success: function(datos){
            $("#resultados").html(datos);
            load(1);
            $('#dataRegister').modal('hide');
        }
    
    });
    
    event.preventDefault();

});
		
$("#delete_product").submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
        
        url: "ajax/eliminar.php",
        method: 'POST',
        data: parametros,
        beforeSend: function(objeto){
            $("#resultados").html("Mensaje: Cargando...");
        },
        success: function(datos){
            $("#resultados").html(datos);
            load(1);
            $('#dataDelete').modal('hide');
					
        }
    
    });
    
    event.preventDefault();

});
