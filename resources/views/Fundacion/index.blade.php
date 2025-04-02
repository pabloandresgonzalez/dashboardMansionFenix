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
    <!-- Primer Div -->
<div class="col-lg-12 col-md-12 col-sm-12 mb-lg-0 mb-4">
    <div class="card h-100 w-100">
        <div class="card-body p-3 h-100 w-100">
            <div class="row h-100">
                <!-- Texto a la izquierda -->
                <div class="col-lg-5 col-md-12 d-flex flex-column">
                    <p class="mb-3 pt-3 text-bold">Fundación Phoenixsiv</p> 
                    <h6 class="font-weight-bolder mb-3">Bienvenid@s</h6> 
                    <p class="mb-4">
                        La Fundación Phoenixsiv es una organización sin fines de lucro creada con el objetivo de respaldar y empoderar a las mujeres en ámbitos sociales, económicos y de bienestar emocional. Nuestra misión es promover la igualdad de género y el desarrollo sostenible a través de iniciativas y proyectos que aborden las necesidades y desafíos que enfrentan las mujeres en la sociedad. ✨💜.
                    </p>
                    <a class="btn btn-primary text-white font-weight-bold py-2 px-4 mt-3" href="#modal-form2" style="background-color: #e91e63; border-color: #e91e63; border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#modal-form2">
                        Donar ahora
                        <i class="fas fa-heart ms-1"></i>
                    </a>
                    <!-- Logo debajo del botón -->
                    <div class="d-flex justify-content-center mx-2">
                        <div style="width: 140px; height: 180px; padding: 10px; border-radius: 50% / 50%; border: 1px solid white; overflow: hidden;">
                            <img src="{{ secure_asset('../img/logo fundacion.jpg') }}" alt="Logo" 
                                 style="width: 90%; height: 90%; object-fit: cover; border-radius: 50%;">
                        </div>
                    </div>
                </div>
                
                <!-- Carrusel a la derecha -->
                <div class="col-lg-7 col-md-12 text-center d-flex flex-column align-items-center">
                    <div class="bg-gradient-primary border-radius-lg w-100 position-relative overflow-hidden" style="min-height: 250px;">
                        
                        <!-- Logo en la parte superior derecha -->
                        <img src="{{ secure_asset('../img/logo fundacion.jpg') }}" alt="Logo" 
                             class="position-absolute top-0 end-0 m-2" 
                             style="width: 40px; height: 60px; object-fit: cover; border-radius: 50% / 50%; z-index: 3; border: 1px solid black;">

                        <div id="carouselExampleIndicators" class="carousel slide w-100 h-100" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../assets/img/illustrations/womens.jpg" class="d-block mx-auto" style="max-width: 100%; height: auto;" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../assets/img/illustrations/womens1.jpg" class="d-block mx-auto" style="max-width: 100%; height: auto;" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../assets/img/illustrations/womens2.jpg" class="d-block mx-auto" style="max-width: 100%; height: auto;" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../assets/img/illustrations/womens3.jpg" class="d-block mx-auto" style="max-width: 100%; height: auto;" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



    <!-- Segundo Div -->
    <div class="col-lg-12 col-sm-12 mb-lg-0 mb-1 mt-2 mt-lg-4"> 
        <div class="card">
            <div class="card-body p-3">
                <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/mujeres.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                        <h5 class="text-white font-weight-bolder mb-4 pt-2">Orígenes y Ecosistema</h5>
                        <p class="text-white">La Fundación Phoenixsiv nace en Colombia con el abanderamiento de la criptomoneda Token llamado Phoenixsiv. Este proyecto es el pilar fundamental de nuestro ecosistema, que busca hacer partícipe la labor de las mujeres en el desarrollo de la sociedad. Nuestro ecosistema cuenta con el apoyo del proyecto "Club Mansión Phoenixsiv", un exclusivo club eco-ambiental de lujo ubicado en Colombia.</p>
                        <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                            Leer más
                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                        </a>
                        <!-- Logo en la parte superior derecha -->
                        <img src="{{ secure_asset('../img/logo fundacion.jpg') }}" alt="Logo" 
                             class="position-absolute top-0 end-0 m-2" 
                             style="width: 40px; height: 60px; object-fit: cover; border-radius: 50% / 50%; z-index: 3; border: 1px solid black;">
                    </div>
                </div>                
            </div>            
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-5 mb-lg-0 mb-4">
    <div class="card z-index-2">
        <div class="card-body p-3">
            <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3 text-center">
                <iframe 
                    width="100%" 
                    height="180" 
                    src="https://www.youtube.com/embed/2oIiFWR7aDM" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
            <h6 class="ms-2 mt-4 mb-0"> Inspirador </h6>
            <p class="text-sm ms-2"> Escucha historias de mujeres líderes que están transformando el mundo. 🎙️💜</p> 
            <p>La Fundación Phoenixsiv es una organización comprometida con el empoderamiento de la mujer en ámbitos sociales, económicos y de bienestar emocional. A través de nuestros programas y proyectos, buscamos promover la igualdad de género y el desarrollo sostenible en la sociedad. Esperamos que se unan a nosotros en esta misión para crear un futuro más equitativo y próspero para todas las mujeres.</p>       
        </div>
    </div>
</div>

<div class="col-lg-7">
    <div class="card z-index-2">
        <div class="card-body p-3">
            <h5 class="text-dark font-weight-bolder mb-4 pt-2">Proyectos</h5>
            <div class="card-header p-0 pb-2">
                <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-education-tab" data-bs-toggle="pill" href="#pills-education" role="tab" aria-controls="pills-education" aria-selected="true">Objetivos y Programas</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-leadership-tab" data-bs-toggle="pill" href="#pills-leadership" role="tab" aria-controls="pills-leadership" aria-selected="false">Proceso de Desarrollo de Proyectos</a>
                    </li>                    
                </ul>
            </div>
            <div class="card-body p-3">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-education" role="tabpanel" aria-labelledby="pills-education-tab">
                        <ul>
                            <p>Nuestro objetivo principal es enfocarnos en aspectos como el sanar, el amor propio, el perdón y la reconciliación de la mujer con la sociedad. Para lograr esto, hemos diseñado programas de empoderamiento económico de la mujer a través del desarrollo y aprendizaje del mundo digital. Algunos de nuestros programas incluyen:</p>
                            <li class="text-m">Aprendizaje de oportunidades del mundo Cripto.</li>
                            <li class="text-m">Desarrollo y ejecución de proyectos abanderados por mujeres.</li>
                            <li class="text-m">Construcción de proyectos que promuevan el empoderamiento económico de la mujer.</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="pills-leadership" role="tabpanel" aria-labelledby="pills-leadership-tab">
                        <ul>
                            <p>Nuestro objetivo principal es enfocarnos en aspectos como el sanar, el amor propio, el perdón y la reconciliación de la mujer con la sociedad. Para lograr esto, hemos diseñado programas de empoderamiento económico de la mujer a través del desarrollo y aprendizaje del mundo digital. Algunos de nuestros programas incluyen:</p>
                            <li class="text-m">Identificación de necesidades y desafíos.</li>
                            <li class="text-m">Desarrollo de habilidades y capacidades.</li>
                            <li class="text-m">Creación de proyectos y planes de acción.</li>
                            <li class="text-m">Ejecución y seguimiento de proyectos.</li>
                        </ul>
                    </div>
                </div>
                <a class="btn btn-primary text-white font-weight-bold py-2 px-4 mt-3" href="#modal-form2" style="background-color: #e91e63; border-color: #e91e63; border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#modal-form2">
                            Donar ahora
                            <i class="fas fa-heart ms-1"></i>
                        </a>
            </div>
        </div>            
    </div>
</div>
</div>
<div class="row my-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <!-- Logo en la parte superior derecha -->
                        <img src="{{ secure_asset('../img/logo fundacion.jpg') }}" alt="Logo" 
                             class="position-absolute top-0 end-0 m-3" 
                             style="width: 40px; height: 60px; object-fit: cover; border-radius: 50% / 50%; z-index: 3; border: 1px solid black;">
                        <h6>Fundación Mujeres Líderes</h6>
                        <p class="text-sm mb-0">
                            <i class="fa fa-check text-info" aria-hidden="true"></i>
                            <span class="font-weight-bold ms-1">Criptomonedas y empoderamiento económico femenino</span>
                        </p>                        
                    </div>
                </div>
            </div>
            <div id="videoCarousel" class="carousel slide m-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Video 1 -->
                    <div class="carousel-item active">
                        <div class="video-container text-center">
                            <div class="ratio ratio-16x9" style="border-radius: 15px; overflow: hidden; position: relative;">
                                <iframe 
                                    src="https://www.youtube.com/embed/Ng8UdGWLoj4"  
                                    title="Video de bienvenida" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen 
                                    style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; z-index: 1;">
                                </iframe>
                            </div>
                        </div>
                    </div>
                    <!-- Video 2 -->
                    <div class="carousel-item">
                        <div class="video-container text-center">
                            <div class="ratio ratio-16x9" style="border-radius: 15px; overflow: hidden; position: relative;">
                                <iframe 
                                    src="https://www.youtube.com/embed/A7WFyMPvr0M"                          
                                    title="Otro video" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen 
                                    style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; z-index: 1;">
                                </iframe>
                            </div>
                        </div>
                    </div>
                    <!-- Video 3 -->
                    <div class="carousel-item">
                        <div class="video-container text-center">
                            <div class="ratio ratio-16x9" style="border-radius: 15px; overflow: hidden; position: relative;">
                                <iframe 
                                    src="https://www.youtube.com/embed/CHXTzuwQ8RE"  
                                    title="Video adicional" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen 
                                    style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; z-index: 1;">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Controles del carrusel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#videoCarousel" data-bs-slide="prev" style="position: absolute; top: 50%; left: 0; z-index: 2; transform: translateY(-50%);">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#videoCarousel" data-bs-slide="next" style="position: absolute; top: 50%; right: 0; z-index: 2; transform: translateY(-50%);">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>          
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card h-100">
            <div class="card-header pb-0">
                <h6>En construcción</h6>
                <p class="text-sm">
                    <i class="fa fa-cogs text-warning" aria-hidden="true"></i>
                    <span class="font-weight-bold">Esta sección está en desarrollo</span>
                </p>
            </div>
            <div class="card-body p-3 text-center">
                <div class="alert " role="alert">
                    ¡Estamos trabajando en esta sección! Estará disponible muy pronto.
                </div>
                <div class="timeline timeline-one-side">
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="ni ni-briefcase-24 text-info text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">¡Casi listo! Estamos trabajando en nuevas características.</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Pronto disponible</p>
                        </div>
                    </div>
                    <div class="timeline-block">
                        <span class="timeline-step">
                            <i class="ni ni-refresh-2 text-danger text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">Actualizaciones en curso</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Próximamente</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Donar a la Fundación -->
<div class="col-md-4">
  <div class="modal fade" id="modal-form2" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document"> <!-- Modal mediano -->
      <div class="modal-content">
        <div class="modal-body p-3">
          <div class="card card-plain border-0 shadow-lg">
            <div class="card-header pb-2 bg-gradient-pink text-white text-center rounded-top">
              <h4 class="font-weight-bolder mb-0">💖 Donar a la Fundación 💖</h4>
              <p class="mt-2 text-sm">Tu ayuda transforma vidas. Gracias por apoyar nuestra causa. 🌸</p>
            </div>
            <div class="card-body pt-3">
              <!-- Formulario de donación -->
              <form action="{{ route('donacion.store') }}" enctype="multipart/form-data" method="POST" role="form text-left">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="value" class="form-control-label text-purple">💰 Monto de la donación</label>
                      <div class="@error('value') border border-danger rounded-3 @enderror">
                        <input class="form-control border-pink" value="{{ old('value') }}" type="number" placeholder="Ingrese el monto" id="value" name="value" min="1">
                        @error('value')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="currency" class="form-control-label text-purple">🌍 Tipo de divisa</label>
                      <select class="form-control border-pink" id="currency" name="currency" required>
                        <option value="" selected disabled>Seleccione la divisa</option>
                        <option value="PSIV">PSIV</option>
                        <option value="USDT">USDT</option>                        
                      </select>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-round bg-gradient-pink text-white btn-lg w-100 mt-3 mb-0">
                    💝 Realizar Donación
                  </button>
                </div>
              </form>
            </div>
            <div class="card-footer text-center pt-3 bg-light rounded-bottom">
              <p class="mb-2 text-sm text-purple">
                <strong>✨ Gracias por tu generosidad ✨</strong><br>
                Con tu ayuda, hacemos del mundo un lugar mejor. 🌷
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Estilos personalizados -->
<style>
  .bg-gradient-pink { background: linear-gradient(45deg, #ff9a9e, #fad0c4); }
  .text-purple { color: #8e44ad; }
  .border-pink { border: 2px solid #ff9a9e !important; }
</style>




@endsection


    