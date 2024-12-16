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
        <p>Aquí puedes encontrar todos los tutoriales disponibles para ayudarte a usar nuestras herramientas:</p>
        <ul>
          <li><a href="#" target="_blank">Tutorial 1: Cómo empezar</a></li>
          <li><a href="#" target="_blank">Tutorial 2: Funcionalidades avanzadas</a></li>
          <li><a href="#" target="_blank">Tutorial 3: Resolución de problemas comunes</a></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

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
        <div class="ratio ratio-16x9 mb-3">
          <iframe src="https://www.youtube.com/embed/VIDEO_ID1" title="Video Tutorial 1" allowfullscreen></iframe>
        </div>
        <div class="ratio ratio-16x9 mb-3">
          <iframe src="https://www.youtube.com/embed/VIDEO_ID2" title="Video Tutorial 2" allowfullscreen></iframe>
        </div>
        <div class="ratio ratio-16x9 mb-3">
          <iframe src="https://www.youtube.com/embed/VIDEO_ID3" title="Video Tutorial 3" allowfullscreen></iframe>
        </div>
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
          <dd>Accede a la página de registro y completa el formulario.</dd>
          <dt>¿Dónde puedo ver mi historial de transacciones?</dt>
          <dd>Visita la sección de "Mi cuenta" en el menú principal.</dd>
          <dt>¿Cómo contacto con soporte técnico?</dt>
          <dd>Puedes enviarnos un correo a soporte@ejemplo.com o usar el chat en línea.</dd>
        </dl>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>






@endsection


