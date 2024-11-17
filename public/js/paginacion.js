$(document).ready(function() {

  // Eliminar cualquier evento anterior para prevenir duplicados
  $('#renovaciones-container .pagination a').off('click').on('click', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    
    $.ajax({
      url: url,
      type: 'GET',
      success: function(response) {
        $('#renovaciones-container').html($(response).find('#renovaciones-container').html());
      },
      error: function() {
        alert('Error al cargar los datos de renovaciones.');
      }
    });
  });

  // Eliminar cualquier evento anterior para prevenir duplicados
  $('#wallets-container .pagination a').off('click').on('click', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    
    $.ajax({
      url: url,
      type: 'GET',
      success: function(response) {
        $('#wallets-container').html($(response).find('#wallets-container').html());
      },
      error: function() {
        alert('Error al cargar los datos de billetera.');
      }
    });
  });

});
