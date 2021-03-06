$(function() {
  principal(1);
});
function principal(page){
  var query=$("#q").val();
  var per_page=10;
  var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
  $("#loader").fadeIn('slow');
  $.ajax({
    url:'ajax/listar_asig-cat.php',
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
  var code = button.data('code') 
  $('#edit_code').val(code)
  var name = button.data('name') 
  $('#edit_name').val(name)
  var lastname = button.data('lastname')
  $('#edit_lastname').val(lastname)
  var category = button.data('category') 
  $('#edit_category').val(category)
  var stock = button.data('stock') 
  $('#edit_stock').val(stock)
  var price = button.data('price') 
  $('#edit_price').val(price)
  var vecindad = button.data('vecindad')
  $('#edit_vecindad').val(vecindad)
  var lugar = button.data('lugar')
  $('#edit_lugar').val(lugar)
  var estado = button.data('estado')
  $('#edit_estado').val(estado)
  var fecha = button.data('fecha')
  $('#edit_fecha').val(fecha)
  var id = button.data('id') 
  $('#edit_id').val(id)
})

$('#deleteProductModal').on('show.bs.modal', function eliminar (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  $('#delete_id').val(id)
})


$( "#edit_product" ).submit(function editar( event ) {
  var parametros = $(this).serialize();
  $.ajax({
      type: "POST",
      url: "ajax/editar_asig-cat.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      principal(1);
      $('#editProductModal').modal('hide');
      }
  });
  event.preventDefault();
});


$( "#add_product" ).submit(function agregar( event ) {
  var parametros = $(this).serialize();
  $.ajax({
      type: "POST",
      url: "ajax/guardar_asig-cat.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      principal(1);
      $('#addProductModal').modal('hide');
      }
  });
  event.preventDefault();
});

$( "#delete_product" ).submit(function eliminar2( event ) {
  var parametros = $(this).serialize();
  $.ajax({
      type: "POST",
      url: "ajax/eliminar_asig-cat.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados").html("Enviando...");
        },
      success: function(datos){
      $("#resultados").html(datos);
      principal(1);
      $('#deleteProductModal').modal('hide');
      }
  });
  event.preventDefault();
});