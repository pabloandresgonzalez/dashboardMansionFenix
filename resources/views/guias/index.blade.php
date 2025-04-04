@extends('layouts.user_type.auth')

@section('content')

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert" id="message_id">
      <span class="alert-icon"><i class="ni ni-like-2"></i></span>
      <span class="alert-text"><strong>¡Éxito!</strong> {{ session('success') }}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif

<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="carddata shadow-lg border-0 rounded-3">
      <div class="carddata-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbersdata">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">BTC | (USD)</p>
              <h5 class="font-weight-bolder mb-0">
                ${{ $price }}<span class="text-success font-weight-bold"> {{ $currency }}</span>
              </h5>
            </div>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <div class="icondata bg-gradient-primary p-3 text-white shadow border-radius-md"> 
              <i class="fa-brands fa-btc text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="carddata shadow-lg border-0 rounded-3">
      <div class="carddata-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbersdata">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Mis asociados</p>
              <h5 class="font-weight-bolder mb-0">
                {{ $total }} <span class="text-success font-weight-bold">10% x referido</span>
              </h5>
            </div>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <div class="icondatadorado bg-gradient-primary p-3 text-white shadow border-radius-md"> 
              <i class="fa fa-user-group text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="carddata shadow-lg border-0 rounded-3">
      <div class="carddata-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbersdata">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">x referidos</p>
              <h5 class="font-weight-bolder mb-0">
                ${{ $totalCommission }}
                <span class="text-danger text-sm font-weight-bolder">USDT</span>
              </h5>
            </div>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <div class="icondata bg-gradient-primary text-white shadow text-center border-radius-md"> 
              <i class="fas fa-donate text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="carddata shadow-lg border-0 rounded-3">
      <div class="carddata-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbersdata">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Utilidad mensual</p>
              <h5 class="font-weight-bolder mb-0">
                ${{ $totalProduction }}
                <span class="text-success text-sm font-weight-bolder">PSIV</span>                
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="fa-solid fa-coins text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-5">
  <div class="col-12">
    <h4 class="text-center mb-4">Centro de Ayuda</h4>
  </div>

  <!-- Tarjeta 1: Tutoriales -->
  <div class="col-md-4 mb-4">
    <div class="card shadow-lg border-0 rounded-3">
      <div class="card-body text-center">
        <div class="icon-shape bg-gradient-info text-white shadow mx-auto mb-4 rounded-circle p-5">
          <i class="fas fa-book fa-3x"></i>
        </div>
        <h5 class="font-weight-bold">Tutoriales</h5>
        <p class="text-sm">Encuentra guías paso a paso para aprovechar al máximo nuestras funcionalidades.</p>
        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#tutorialModal">
          Ver tutoriales
        </button>
      </div>
    </div>
  </div>

  <!-- Tarjeta 2: Videos -->
  <div class="col-md-4 mb-4">
    <div class="card shadow-lg border-0 rounded-3">
      <div class="card-body text-center">
        <div class="icon-shape bg-gradient-primary text-white shadow mx-auto mb-4 rounded-circle p-5">
          <i class="fas fa-video fa-3x"></i>
        </div>
        <h5 class="font-weight-bold">Videos</h5>
        <p class="text-sm">Mira videos que explican cómo usar nuestras herramientas de manera efectiva.</p>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#videosModal">
          Ver videos
        </button>
      </div>
    </div>
  </div>

  <!-- Tarjeta 3: Preguntas Frecuentes -->
  <div class="col-md-4 mb-4">
    <div class="card shadow-lg border-0 rounded-3">
      <div class="card-body text-center">
        <div class="icon-shape bg-gradient-success text-white shadow mx-auto mb-4 rounded-circle p-5">
          <i class="fas fa-question-circle fa-3x"></i>
        </div>
        <h5 class="font-weight-bold">Preguntas Frecuentes</h5>
        <p class="text-sm">Consulta respuestas rápidas a las preguntas más comunes de nuestros usuarios.</p>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#faqsModal">
          Ver FAQ
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modales -->

<!-- Modal de Tutoriales -->
<div class="modal fade" id="tutorialModal" tabindex="-1" aria-labelledby="tutorialModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tutorialModalLabel">Tutoriales</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Aquí puedes encontrar todos los pasos disponibles para ayudarte a usar nuestro portal:</p>
        <ul style="list-style-type: none; padding-left: 0;">
          <li><a href="#stepByStepSection" class="tutorial-link"><i class="fas fa-arrow-right"></i> Aprende a registrarte en el portal</a></li>
          <li><a href="#acquireFundSection" class="tutorial-link"><i class="fas fa-arrow-right"></i> Cómo adquirir un fondo</a></li>
          <li><a href="#renewFundSection" class="tutorial-link"><i class="fas fa-arrow-right"></i> Cómo renovar un fondo</a></li>
          <li><a href="#makeTransferSection" class="tutorial-link"><i class="fas fa-arrow-right"></i> Realizar un traslado</a></li>
          <li><a href="#referralsNetworkSection" class="tutorial-link"><i class="fas fa-arrow-right"></i> Cómo ver mi red de referidos</a></li>
          <li><a href="#contactSection" class="tutorial-link"><i class="fas fa-arrow-right"></i> Cómo me pongo en contacto</a></li>
        </ul>

        <!-- Sección Paso a Paso -->
        <div id="stepByStepSection" class="mt-5">
          <h5>Aprende a registrarte en el portal</h5>
          <p>Sigue estos pasos para completar tu registro y empezar a usar el portal:</p>
          <ol>
            <li>Accede a la siguiente URL: <a href="www" target="_blank">www.clubmansoinphoenix.com</a></li>
            <li>Haz clic en el botón <strong>Registrarse</strong>.</li>
            <li>Si fuiste referido por alguien, introduce el ID que te compartió en el campo correspondiente.</li>
            <li>Completa todos los datos requeridos en el formulario.</li>
            <li>Haz clic en el botón <strong>Registrarse</strong> para enviar la información.</li>
            <li>
              Si el registro fue exitoso, serás redirigido automáticamente al escritorio del portal.
              <ul>
                <li>Desde allí, espera a que activen tu cuenta.</li>
                <li>Una vez activada, podrás acceder a más funcionalidades del portal.</li>
              </ul>
            </li>
          </ol>
        </div>

        <!-- Sección Cómo Adquirir un Fondo -->
        <div id="acquireFundSection" class="mt-5">
          <h5>Cómo adquirir un fondo</h5>
          <p>Sigue estos pasos para adquirir un fondo a través de nuestro portal:</p>
          <ol>
            <li>Inicia sesión en el portal con tus credenciales.</li>
            <li>Ubica la sección de <strong>Vitrina</strong> en el menú principal.</li>
            <li>Elige el fondo que deseas adquirir y haz clic en <strong>Comprar</strong>.</li>
            <li>Completa los datos requeridos en el formulario de compra.</li>
            <li>Haz clic en <strong>Comprar</strong> para enviar la solicitud.</li>
            <li>
              Si el proceso es exitoso, recibirás un mensaje de confirmación indicando que tu fondo será activado en breve.
            </li>
          </ol>
        </div>

        <!-- Sección Cómo Renovar un Fondo -->
        <div id="renewFundSection" class="mt-5">
          <h5>Cómo renovar un fondo</h5>
          <p>Sigue estos pasos para renovar un fondo en nuestro portal:</p>
          <ol>
            <li>Inicia sesión en el portal con tus credenciales.</li>
            <li>Ubica la sección de <strong>Fondos</strong> en el menú principal.</li>
            <li>Elige el fondo que deseas renovar y haz clic en <strong>Renovar</strong>.</li>
            <li>
              En la pantalla que se presenta, confirma la renovación del fondo.
            </li>
            <li>
              Si el proceso es exitoso, recibirás un mensaje de confirmación indicando que tu fondo ha sido renovado con éxito.
            </li>
          </ol>
        </div>

        <!-- Sección Realizar un Traslado -->
        <div id="makeTransferSection" class="mt-5">
          <h5>Realizar un traslado</h5>
          <p>Sigue estos pasos para realizar un traslado en nuestro portal:</p>
          <ol>
            <li>Inicia sesión en el portal con tus credenciales.</li>
            <li>Ubica la sección de <strong>Billetera</strong> y haz clic en <strong>Billetera</strong>.</li>
            <li>Haz clic en el botón <strong>Nuevo traslado</strong>.</li>
            <li>Completa los datos requeridos en el formulario:
              <ul>
                <li>El valor del traslado.</li>
                <li>Una nota o detalle adicional.</li>
                <li>El tipo de moneda.</li>
                <li>Selecciona el Wallet de destino.</li>
              </ul>
            </li>
            <li>Haz clic en <strong>Enviar traslado</strong> para procesar la solicitud.</li>
            <li>
              Si el proceso es exitoso, recibirás un mensaje de confirmación indicando que tu solicitud fue enviada correctamente.
              <ul>
                <li>El traslado será procesado y recibirás una respuesta en breve.</li>
              </ul>
            </li>
          </ol>
        </div>

        <!-- Sección Cómo Ver Mi Red de Referidos -->
        <div id="referralsNetworkSection" class="mt-5">
          <h5>Cómo ver mi red de referidos</h5>
          <p>Sigue estos pasos para consultar tu lista de referidos o tu red:</p>
          <ol>
            <li>Inicia sesión en el portal con tus credenciales.</li>
            <li>Ubica la sección de <strong>Red</strong> en el menú principal.</li>
            <li>
              Desde la sección de <strong>Red</strong>, tienes dos opciones:
              <ul>
                <li>Haz clic en <strong>Mis referidos</strong> para ver la lista de usuarios que son tus referidos directos.</li>
                <li>Haz clic en <strong>Red</strong> para consultar tu red completa de referidos.</li>
              </ul>
            </li>
            <li>
              En ambas opciones, se te presentará una pantalla con la información de los usuarios que forman parte de tus referidos.
            </li>
          </ol>
        </div>

        <!-- Sección Cómo Ponerme en Contacto -->
        <div id="contactSection" class="mt-5">
          <h5>Cómo me pongo en contacto</h5>
          <p>Sigue estos pasos para ponerte en contacto con nosotros:</p>
          <ol>
            <li>Ve a la sección de <strong>Soporte</strong> en el portal.</li>
            <li>En esta sección, tendrás tres opciones de contacto disponibles:</li>
            <ul>
              <li><strong>Ayuda:</strong> Puedes hacer clic en el enlace de WhatsApp para iniciar un chat en línea con el soporte.</li>
              <li><strong>Contacto:</strong> Puedes enviar un correo electrónico con tu solicitud, que será atendida por nuestro equipo.</li>
              <li><strong>Centro de Ayuda:</strong> Encuentra una variedad de recursos y formas de obtener ayuda o más información sobre el portal.</li>
            </ul>
          </ol>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- CSS -->
<style>
  .tutorial-link {
    color: #000; /* Color negro por defecto */
    text-decoration: none;
    font-weight: normal;
    transition: color 0.3s ease; /* Transición suave */
  }

  .tutorial-link i {
    margin-right: 8px; /* Espacio entre icono y texto */
  }

  .tutorial-link:hover {
    color: #FFD700; /* Color dorado metálico al pasar el mouse */
  }
</style>


<!-- Modal de Videos -->
<div class="modal fade" id="videosModal" tabindex="-1" aria-labelledby="videosModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videosModalLabel">Videos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Aquí tienes una colección de videos para guiarte:</p>

        <!-- Video 1: Registrarse -->
        <div class="mx-4">
          <h5>Registrarse en el portal </h5>
          <div class="ratio ratio-16x9">
            <video controls>
              <source src="{{ secure_asset('img/Registrofull.mp4') }}" type="video/mp4">
              Tu navegador no soporta la etiqueta de video.
            </video>
          </div>
        </div><br>
        
        <!-- Video 2: Comprar un fondo -->
        <div class="mx-4">
          <h5>Comprar un fondo</h5>
          <div class="ratio ratio-16x9">
            <video controls>
              <source src="{{ secure_asset('img/Fondo_final1.mp4') }}" type="video/mp4">
              Tu navegador no soporta la etiqueta de video.
            </video>
          </div>
        </div><br>

        <!-- Video 3: Renovar un fondo -->
        <div class="mx-4">
          <h5>Renovar un fondo </h5>
          <div class="ratio ratio-16x9">
            <video controls>
              <source src="{{ secure_asset('img/Renovar1.mp4') }}" type="video/mp4">
              Tu navegador no soporta la etiqueta de video.
            </video>
          </div>
        </div><br>

        <!-- Video 4: Donar -->
        <div class="mx-4">
          <h5>Como donar en la fundación </h5>
          <div class="ratio ratio-16x9">
            <video controls>
              <source src="{{ secure_asset('img/Donar.mp4') }}" type="video/mp4">
              Tu navegador no soporta la etiqueta de video.
            </video>
          </div>
        </div><br>

        <!-- Video 5: Realizar un traslado -->
        <div class="mx-4">
          <h5>Realizar un traslado</h5>
          <div class="ratio ratio-16x9">
            <video controls>
              <source src="{{ secure_asset('img/Traslado_final.mp4') }}" type="video/mp4">
              Tu navegador no soporta la etiqueta de video.
            </video>
          </div>
        </div><br>     
        @if (auth()->check() && auth()->user()->role == 'admin')
        <!-- Video 6: Actualizar información de un usuario -->
        <div class="mx-4">
          <h5>Actualizar información de un usuario</h5>
          <div class="ratio ratio-16x9">
            <video controls>
              <source src="{{ secure_asset('img/Actualizar Usuario.mp4') }}" type="video/mp4">
              Tu navegador no soporta la etiqueta de video.
            </video>
          </div>
        </div><br>

        <!-- Video 7: Asignar saldo -->
        <div class="mx-4">
          <h5>Asignar saldo a un usuario</h5>
          <div class="ratio ratio-16x9">
            <video controls>
              <source src="{{ secure_asset('img/Asignar saldo.mp4') }}" type="video/mp4">
              Tu navegador no soporta la etiqueta de video.
            </video>
          </div>
        </div><br>       
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Preguntas Frecuentes -->
<div class="modal fade" id="faqsModal" tabindex="-1" aria-labelledby="faqsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="faqsModalLabel">Preguntas Frecuentes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Respuestas a las preguntas más frecuentes:</p>
        <dl>
          <dt>¿Cómo puedo registrarme?</dt>
          <dd>Por favor acceder https://www.clubmansionphoenix.com/register, diligenciar los datos del formulario, si eres referido por alguien poner el id de la persona que te refirió, aceptas los TyC y haces clic en inscribirme, después de que validen tu hash de pago es esperar a que activen tu cuenta.</dd>
          <dt>¿Dónde puedo ver la utilidad de mis fondos?</dt>
          <dd>Visita la sección de "Billetera" en el menú principal y accede a mi billetera y en renovaciones haces clic en el icono de PDF.</dd>
          <dt>¿Dónde puedo ver los términos y condiciones?</dt>
          <dd>Puedes verlos en la parte inferior de la página en el enlace que dice “Términos”.</dd>
          <dt>¿Cómo contacto con soporte técnico?</dt>
          <dd>Puedes enviarnos un correo a comunicaciones.phoenixsiv@gamil.com o usar el chat en línea en la sección de soporte al lado izquierdo.</dd>
        </dl>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection


