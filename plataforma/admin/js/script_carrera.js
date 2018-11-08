$(function() {
  load(1);
});
function load(page){
  var query=$("#q").val();
  var per_page=10;
  var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
  $("#loader").fadeIn('slow');
  $.ajax({
    url:'ajax/listar_productos_carrera.php',
    data: parametros,
     beforeSend: function(objeto){
    $("#loader").html("Cargando...");
    },
    success:function(data){
      $(".outer_div").html(data).fadeIn('slow');
      $("#loader").html("");
    }
  })
}
$('#editProductModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name') 
  $('#edit_name').val(name)
  var id = button.data('id') 
  $('#edit_id').val(id)
})

$('#deleteProductModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  $('#delete_id').val(id)
})


$( "#edit_product" ).submit(function( event ) {
  var parametros = $(this).serialize();
  $.ajax({
      type: "POST",
      url: "ajax/editar_producto_carrera.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      load(1);
      $('#editProductModal').modal('hide');
      }
  });
  event.preventDefault();
});


$( "#add_product" ).submit(function( event ) {
  var parametros = $(this).serialize();
  $.ajax({
      type: "POST",
      url: "ajax/guardar_producto_carrera.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      load(1);
      $('#addProductModal').modal('hide');
      }
  });
  event.preventDefault();
});

$( "#delete_product" ).submit(function( event ) {
  var parametros = $(this).serialize();
  $.ajax({
      type: "POST",
      url: "ajax/eliminar_producto_carrera.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      load(1);
      $('#deleteProductModal').modal('hide');
      }
  });
  event.preventDefault();
});