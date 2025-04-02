@extends('layouts.user_type.guest')

@section('content')

<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
              <div class="card-header pb-0 text-left bg-transparent mb-0 text-center"> 
                  <!-- Imagen decorativa -->
                  <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" alt="Phoenix" class="coin-image">

                  <!-- Texto mejorado -->
                  <h5 class="text-enhanced">El lujo y el turismo Eco-Ambiental se vuelven exclusividad</h5>               

                  <style>
                      /* Estilos para la imagen */
                      .coin-image {
                          max-width: 160px; /* Aumenta el tamaño de la imagen */
                          border-radius: 50%; /* Esquinas redondeadas */
                          display: block;
                          margin: 0 auto 10px; /* Centrado y separación con el texto */
                          transition: transform 0.3s ease, filter 0.3s ease; /* Efecto suave */
                      }

                      /* Efecto al pasar el cursor sobre la imagen */
                      .coin-image:hover {
                          transform: scale(1.15); /* Aumenta ligeramente el tamaño */
                          filter: drop-shadow(0px 6px 15px rgba(255, 215, 0, 0.6)); /* Resplandor dorado */
                      }

                      /* Estilos para el texto */
                      .text-enhanced {
                          font-weight: bolder;
                          font-size: 1rem; /* Aumenta el tamaño del texto */
                          color: transparent;
                          background: linear-gradient(45deg, #ffd700, #ffcc00, #d4af37);
                          -webkit-background-clip: text;
                          background-clip: text;
                          padding: 5px 10px;
                          text-align: center;
                          text-transform: uppercase;
                          letter-spacing: 4px;
                          transition: transform 0.3s ease, text-shadow 0.3s ease;
                      }

                      /* Efecto al pasar el cursor sobre el texto */
                      .text-enhanced:hover {
                          transform: translateY(-5px);
                          text-shadow: 0px 4px 15px rgba(0, 0, 0, 0.4);
                      }
                  </style>
              </div>
              <div class="card-body mt-0">
                <form role="form" method="POST" action="/session">
                  @csrf
                  <label>Email</label>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="" aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <label>Password</label>
                  <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                    <label class="form-check-label" for="rememberMe">Recordar sesión</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Iniciar sesión</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <small class="text-muted">¿Olvidaste tu contraseña? Restablecer tu contraseña
                  <a href="/login/forgot-password" class="text-info text-gradient font-weight-bold">aquí</a>
                </small>
                <p class="mb-4 text-sm mx-auto">
                  ¿No tienes una cuenta?
                  <a href="register" class="text-info text-gradient font-weight-bold">Inscribirse</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/Capture4.jpeg')"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true"> 
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videoModalLabel">Bienvenido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="ratio ratio-16x9">
          <!-- Iframe para el video de YouTube -->
          <iframe 
            src="https://www.youtube.com/embed/i9qDeEEMRqA" 
            title="Video de bienvenida" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
          </iframe>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection
