<!DOCTYPE html>

<html lang="en" >

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/phoenix1.png">
  <link rel="icon" type="image/png" href="../assets/img/phoenix1.png">
  <title>
    Clud Mansion Phoenix
  </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.css" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ secure_asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ secure_asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  
  <!-- Agregar Font Awesome CDN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="{{ secure_asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons 
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>-->
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ secure_asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script>
      $(document).ready(function() {

      // Eliminar cualquier evento anterior para prevenir duplicados en el contenedor de renovaciones
        $('#renovaciones-container .pagination a').off('click').on('click', function(e) {
          e.preventDefault();
        var url = $(this).attr('href'); // Obtener la URL del enlace de paginación
        
        $.ajax({
          url: url, // Realizar la solicitud AJAX con la URL
          type: 'GET', // Método de solicitud (GET)
          success: function(response) {
            // Al recibir la respuesta, actualizar el contenido del contenedor de renovaciones
            $('#renovaciones-container').html($(response).find('#renovaciones-container').html());
          },
          error: function() {
            alert('Error al cargar los datos de renovaciones.');
          }
        });
      });

      // Eliminar cualquier evento anterior para prevenir duplicados en el contenedor de billetera
        $('#wallets-container .pagination a').off('click').on('click', function(e) {
          e.preventDefault();
        var url = $(this).attr('href'); // Obtener la URL del enlace de paginación
        
        $.ajax({
          url: url, // Realizar la solicitud AJAX con la URL
          type: 'GET', // Método de solicitud (GET)
          success: function(response) {
            // Al recibir la respuesta, actualizar el contenido del contenedor de billetera
            $('#wallets-container').html($(response).find('#wallets-container').html());
          },
          error: function() {
            alert('Error al cargar los datos de billetera.');
          }
        });
      });

      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function() {
          $("#message_id").fadeOut(20000);
        });
      });
    </script>
    <script type="text/javascript">
      function showContent() {
        element = document.getElementById("btregister");
        check = document.getElementById("flexCheckDefault");
        if (check.checked) {
          element.style.display='block';
        }
        else {
          element.style.display='none';
        }
      }
    </script> 
    <?php 

    $url = ("https://blockchain.info/ticker");
    $data = json_decode(file_get_contents($url), true);

    $data ['USD']['last'];
    

    ?>  
  </head>

  <body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
    
    <!-- @include('partials.alert')  -->
    @auth
    @yield('auth')    
    @endauth
    @guest
    @yield('guest')
    @endguest


    <!--   Core JS Files   -->  
    <script src="{{ secure_asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/plugins/chartjs.min.js') }}"></script>
    @stack('rtl')
    @stack('dashboard')
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ secure_asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
    
  </body>

  </html>
