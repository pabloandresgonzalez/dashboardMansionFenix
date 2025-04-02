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
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-lg-6">
              <div class="d-flex flex-column h-100">
                <p class="mb-1 pt-2 text-bold">Club Mansion Phoenix</p>
                <h5 class="font-weight-bolder">Bienvenidos</h5>
                <p class="mb-5">La fusión del lujo, comodidad y sostenibilidad ambiental están dando una nueva forma en la era del turismo moderno, donde proyectos como el Club Mansión Phoenix ofrecen una experiencia única e inolvidable.</p>
                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="#modal-form3" data-bs-toggle="modal" data-bs-target="#modal-form3">
                  Leer más
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
              <div class="bg-gradient-primary border-radius-lg h-100 position-relative overflow-hidden">
                  <video id="backgroundVideo" autoplay controls playsinline class="position-absolute top-0 start-0 w-100 h-100" 
                         style="z-index: 1; object-fit: cover;">
                      <source src="{{ secure_asset('img/video1.mp4') }}" type="video/mp4">
                      Tu navegador no soporta el video.
                  </video>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
          <span class="mask bg-gradient-dark"></span>
          <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
            <h5 class="text-white font-weight-bolder mb-4 pt-2">Descripción</h5>
            <p class="text-white">Un ecosistema de cabañas de lujo, que tendrán capacidad de alojamiento para asociados latinoamericanos y extranjeros. La exclusividad se encuentra con la ecología, ofreciendo actividades y experiencias que resaltan la riqueza y diversidad del entorno natural.</p>
            <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="#modal-form2" data-bs-toggle="modal" data-bs-target="#modal-form2">
              Leer más
              <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-5 mb-lg-0 mb-4">
      <div class="card z-index-2">
        <div class="card-body p-3">
          <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
            <div class="chart">
              <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
            </div>
          </div>
          <h6 class="ms-2 mt-4 mb-0"> Usuarios Activos </h6>
          <p class="text-sm ms-2"> (<span class="font-weight-bolder">+{{ $porcentajeActivos }}%</span>) de nuestra comunidad en movimiento 🚀</p>
          <div class="container border-radius-lg">
            <div class="row">
              <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                  <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="10px" height="10px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>document</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(154.000000, 300.000000)">
                              <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                              <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <p class="text-xs mt-1 mb-0 font-weight-bold">Users</p>
                </div>
                <h4 class="font-weight-bolder">{{ $totalUsuarios }}</h4>
                <div class="progress w-75">
                  <div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                  <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-info text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>spaceship</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(4.000000, 301.000000)">
                              <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                              <path class="color-background" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                              <path class="color-background" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z" opacity="0.598539807"></path>
                              <path class="color-background" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z" opacity="0.598539807"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <p class="text-xs mt-1 mb-0 font-weight-bold">Activos</p>
                </div>
                <h4 class="font-weight-bolder">{{ $usuariosActivos }}</h4>
                <div class="progress w-75">
                  <div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                  <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>settings</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(304.000000, 151.000000)">
                              <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                              <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                              <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>                    
                  </div>
                  <p class="text-xs mt-1 mb-0 font-weight-bold">Soportes</p>
                </div>
                <h5 class="font-weight-bolder">120</h5>
                <div class="progress w-75">
                  <div class="progress-bar bg-dark w-30" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                  <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-danger text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="10px" height="10px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>credit-card</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(453.000000, 454.000000)">
                              <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                              <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <p class="text-xs mt-1 mb-0 font-weight-bold">Pagos</p>
                </div>
                <h4 class="font-weight-bolder">{{ $totalPagosReducido }}</h4>
                <div class="progress w-75">
                  <div class="progress-bar bg-dark w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="card z-index-2">
        <div class="card-header pb-0">
          <h6>Transacciones</h6>
          <p class="text-sm">
            <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">Movimientos</span> anuales
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
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
          <h6>Proyectos</h6>
          <p class="text-sm mb-0">
            <i class="fa fa-check text-info" aria-hidden="true"></i>
            <span class="font-weight-bold ms-1">En curso</span> este mes
          </p>
        </div>
        <div class="col-lg-6 col-5 my-auto text-end">
          <div class="dropdown float-lg-end pe-4">
            <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-ellipsis-v text-secondary"></i>
            </a>
            <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
              <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
              <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
              <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body px-0 pb-2 mx-4">
      <!-- Reemplazamos el mensaje de "¡Casi listo!" con el reproductor de video -->
      <div class="video-container text-center">
        <div class="ratio ratio-16x9" style="border-radius: 15px; overflow: hidden;">
          <!-- Iframe para el video de YouTube -->
          <iframe 
            src="https://www.youtube.com/embed/i9qDeEEMRqA"  
            title="Video de bienvenida" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
          </iframe>
        </div>
      </div>
      <div class="text-center mt-4">
          <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
              <!-- Imagen más pequeña alineada a la izquierda -->
              <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" 
                   class="img-fluid shadow border-radius-xl" 
                   style="width: 40px; height: auto;"> <!-- Ajusta el tamaño según necesites -->
              <span class="ms-2 font-weight-bold">Club Mansion Phoenix</span>
          </a>
      </div>
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

<!-- Modal Descripción -->
<div class="col-md-4">
  <div class="modal fade" id="modal-form2" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body p-4 m-2">
          <div class="card card-plain">
            <div class="card-header pb-2 ">
              <div class="d-flex align-items-center justify-content-between">
                <h4 class="font-weight-bolder text-info text-gradient mb-0">Club Mansión Phoenix</h4>              
                <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" class="img-fluid shadow border-radius-xl ms-3" style="width: 40px; height: auto; border-radius: 50%">
              </div>
              <h5>Un Destino de Ensueño Exclusivo para Nuestros Miembros Asociados</h5>
              <p class="mt-1 mb-2 text-sm">Bienvenidos al Club Mansión Phoenix, un oasis de lujo y sostenibilidad ubicado en un entorno natural exquisito. Nuestro objetivo es ofrecer una experiencia única e inolvidable que combine la belleza de la naturaleza con el confort y la elegancia de un destino de lujo, exclusivamente para nuestros miembros asociados.</p>
            </div>

            <div class="card-body pt-1 ">
              
                <h5><strong>Nuestro Enfoque</strong></h5>
                <p>En el Club Mansión Phoenix, nos enfocamos en crear un entorno que no solo sea lujoso y cómodo, sino también sostenible y respetuoso con el medio ambiente. Nuestro ecosistema de cabañas de lujo está diseñado para integrarse perfectamente con el entorno natural, ofreciendo una experiencia auténtica y conectada con la naturaleza, solo para nuestros miembros asociados.</p>

                <h5><strong>Servicios y Actividades</strong></h5>
                <ul>
                  <li>Cabañas de lujo para parejas y familias</li>
                  <li>Zonas de spa y zonas húmedas al aire libre</li>
                  <li>Actividades de aventura y bienestar</li>
                  <li>Clases de yoga y meditación</li>
                  <li>Restaurante con comidas gourmet</li>
                </ul>

                <h5><strong>Membresía de Asociado</strong></h5>
                <p>La membresía de asociado es una membresía especial, limitada a 1000 puestos. Dado que esta membresía está integrada en un sistema exclusivo que requiere un número mínimo de miembros élite, no es posible solicitar la cancelación de la membresía.</p>
                <p>Si un miembro desea retirar su bóveda, solo podrá hacerlo bajo las siguientes condiciones:</p>
                <ol>
                  <li>Transferirla a un miembro de su núcleo familiar.</li>
                  <li>Transferirla a otro usuario dentro de la compañía.</li>
                  <li>En caso de que las dos condiciones anteriores no sean posibles, la membresía podrá ser transferida a una persona particular que no esté inscrita en la compañía pero que cumpla con los requisitos del club.</li>
                </ol>

                <h5><strong>Asignación de Fondos de Minado</strong></h5>
                <p>Para el minado y almacenamiento de criptomonedas, ofrecemos fondos asignados calculados en dólares estadounidenses, con las siguientes opciones:</p>
                <ul>
                  <li>USD $100.00</li>
                  <li>USD $250.00</li>
                  <li>USD $500.00</li>
                  <li>USD $1,000.00</li>
                  <li>USD $2,000.00</li>
                  <li>USD $3,000.00</li>
                  <li>USD $5,000.00</li>
                </ul>
                <p>Los fondos de minado pueden ser adquiridos mediante transacciones con criptomonedas como <strong>Bitcoin (BTC)</strong> y <strong>Tether (USDT)</strong>.</p>

                <h5><strong>Beneficios</strong></h5>
                <p>Al unirse a nuestro club, nuestros miembros asociados disfrutan de una serie de beneficios exclusivos, incluyendo:</p>
                <ul>
                  <li>Acceso exclusivo a nuestros servicios y facilidades.</li>
                  <li>Asignación de fondos en nuestra moneda digital <strong>PHOENIX (PSIVT)</strong>.</li>
                  <li>Invitaciones a eventos y actividades exclusivas.</li>
                  <li>Descuentos y promociones especiales en nuestros servicios y facilidades.</li>
                </ul>
              </div>
            

            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-2 text-xl mx-auto">
                Gracias por ser parte de nuestra comunidad exclusiva.
              </p>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Descripción 1 -->
<div class="col-md-4">
  <div class="modal fade" id="modal-form3" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body p-4 m-2">
          <div class="card card-plain">
            <div class="card-header pb-2 ">
              <div class="d-flex align-items-center justify-content-between">
                <h4 class="font-weight-bolder text-info text-gradient mb-0">Club Mansión Phoenix</h4>              
                <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" class="img-fluid shadow border-radius-xl ms-3" style="width: 40px; height: auto; border-radius: 50%">
              </div>
              <h5><strong>Sostenibilidad y Responsabilidad Ambiental</strong></h5>
                <p>En el Club Mansión Phoenix, nos tomamos muy en serio nuestra responsabilidad ambiental. Nuestro compromiso es minimizar nuestro impacto ambiental y promover prácticas sostenibles en todas nuestras operaciones. Algunas de nuestras iniciativas sostenibles incluyen:</p>

                <h5><strong>Servicios y Actividades</strong></h5>
                <ul>
                  <li>Uso de energía solar y fuentes de energía renovable</li>
                  <li>Jardines de plantas nativas y conservación de la biodiversidad</li>
                  <li>Programas de reciclaje y reducción de residuos</li>
                  <li>Uso de productos y materiales sostenibles en nuestras operaciones</li>
                </ul>

                <h5><strong>Conclusión:</strong></h5>
                <p>El Club Mansión Phoenix es un destino único y exclusivo que combina lujo, confort y sostenibilidad ambiental, solo para nuestros miembros asociados. Nuestro compromiso es ofrecer una experiencia inolvidable, mientras promovemos prácticas sostenibles y responsabilidad ambiental.</p>
            </div>

            <div class="card-body pt-1 ">
                  

            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-2 text-xl mx-auto">
                ¡Únete a nosotros y descubre la magia de Club Mansión Phoenix!
              </p>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Videos-->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-none" style="background: transparent;">
      
      <!-- Texto flotante -->
      <div class="modal-header border-0 position-absolute w-100 text-center" style="top: 10px; z-index: 10;">
        <h5 class="modal-title w-100" style="color: rgba(255, 255, 255, 0.8); font-size: 1.5rem; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);">
          Club Mansion Phoenix
        </h5>
      </div>

      <div class="modal-body p-0 d-flex justify-content-center align-items-center">
        <!-- Video Player -->
        <video id="videoPlayer" class="rounded-3 shadow-lg" 
               style="width: 100%; max-width: 380px; border-radius: 10px; box-shadow: 0px 4px 20px rgba(255, 255, 255, 0.5);" 
               controls autoplay>
          <source id="videoSource" src="{{ secure_asset('img/video2.mp4') }}" type="video/mp4">
          Tu navegador no soporta el video.
        </video>
      </div>

    </div>
  </div>
</div>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    const videoPlayer = document.getElementById("videoPlayer");
    const videoSource = document.getElementById("videoSource");
    
    // Lista de videos en orden
    const videos = [
      "{{ secure_asset('img/video2.mp4') }}",
      "{{ secure_asset('img/video3.mp4') }}"
    ];
    
    let currentVideoIndex = 0;

    // Evento para cambiar al siguiente video cuando termine
    videoPlayer.addEventListener("ended", function() {
      currentVideoIndex++;
      if (currentVideoIndex < videos.length) {
        videoSource.src = videos[currentVideoIndex];
        videoPlayer.load();
        videoPlayer.play();
      } else {
        currentVideoIndex = 0; // Reinicia la secuencia si se desea
      }
    });
  });
</script>


<script>
document.addEventListener("DOMContentLoaded", function() {
  const modal = new bootstrap.Modal(document.getElementById('videoModal'));
  modal.show();
});
</script>

@endsection


@push('dashboard')
  <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      // Datos simulados para ilustrar cómo llenar el gráfico
      var activationsData = [10, 15, 20, 12, 18, 25, 30, 22, 28]; // Resultados de la consulta

      new Chart(ctx, {
          type: "bar",
          data: {
              labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"], // Meses
              datasets: [{
                  label: "Fondos activados",
                  tension: 0.4,
                  borderWidth: 0,
                  borderRadius: 4,
                  borderSkipped: false,
                  backgroundColor: "#4caf50", // Cambiar color según preferencia
                  data: activationsData, // Datos obtenidos de la consulta
                  maxBarThickness: 6
              }],
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: {
                      display: false,
                  }
              },
              interaction: {
                  intersect: false,
                  mode: 'index',
              },
              scales: {
                  y: {
                      grid: {
                          drawBorder: false,
                          display: false,
                          drawOnChartArea: false,
                          drawTicks: false,
                      },
                      ticks: {
                          suggestedMin: 0,
                          suggestedMax: 50, // Cambia según la cantidad máxima de datos
                          beginAtZero: true,
                          padding: 15,
                          font: {
                              size: 14,
                              family: "Open Sans",
                              style: 'normal',
                              lineHeight: 2
                          },
                          color: "#fff"
                      },
                  },
                  x: {
                      grid: {
                          drawBorder: false,
                          display: false,
                          drawOnChartArea: false,
                          drawTicks: false
                      },
                      ticks: {
                          display: true // Habilitar para mostrar los meses
                      },
                  },
              },
          },
      });

    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors
      

    // Pasar los datos de la base de datos a JavaScript
    var meses = @json($meses);  // Meses de las transacciones
    var valores = @json($valores);  // Suma de valores por mes
    // Crear un gradiente en el contexto
    var gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, "rgba(169, 169, 169, 0.3)"); // Gris claro, con transparencia
    gradient.addColorStop(1, "rgba(15, 15, 15, 0.3)"); // Gris mucho más oscuro, con transparencia


    // Crear el gráfico
    var ctx = document.getElementById("chart-line").getContext('2d');
    var chartLine = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: meses,  // Etiquetas de los meses
            datasets: [{
                label: "Transacciones",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#dda90d",  // Color de la línea
                borderWidth: 3,
                backgroundColor: gradient,  // Color de fondo
                fill: true,
                data: valores,  // Datos de las transacciones
                maxBarThickness: 6
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#b2b9bf',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#b2b9bf',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
    }
  </script>
@endpush

