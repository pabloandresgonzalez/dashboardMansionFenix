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

@if(session('alert'))
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="message_id">
  <span class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></span>
  <span class="alert-text"><strong>Warning!</strong> {{ session('alert') }}</span>
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
<div class="row">
  <div class="col-12 mt-4">
    <div class="card mb-4">
      <div class="card-header pb-0 p-4">
        <h6 class="mb-1">Bóvedas</h6>
        <p class="text-sm mb-1">¡Actualiza o adquiere tu Bóveda de minería de fondos y disfruta de beneficios exclusivos! </p>
      </div>
      <div class="card-body p-1">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($membresias as $index => $membresia)
          <div class="carousel-item @if($index == 0) active @endif">
            <div id="backgroundDiv{{ $membresia->id }}" class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('{{ asset('storage/photousers/' . $membresia->image) }}');">
              <span class="mask bg-gradient-dark"></span>
              <div class="container">
                <div class="description ps-6"> 
                  <div class="row">
                    <div class="col-lg-6 my-auto">
                      <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Bóveda de minería de fondos de {{ $membresia->name }}</h4>
                      <h1 class="text-white fadeIn2 fadeInBottom">$ {{ $membresia->valor }}</h1>
                      <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">{{ $membresia->detail }}</p>
                      <h7 class="text-white opacity-8 fadeIn3 fadeInBottom">Valor Bóveda + administración $<?php echo $membresia->valor + $membresia->valor * 10 / 100; ?></h7>
                    </div>
                  </div>                                         
                  <h3>
                    <a href="#modal-form1{{ $membresia->id }}" data-bs-toggle="modal" data-bs-target="#modal-form1{{ $membresia->id }}" class="text-white icon-move-right">
                      Comprar
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </h3>
                  <h7>ID de la Bóveda de minería de fondos : {{ $membresia->id }}</h7>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>   
      <div class="d-flex justify-content-center mt-2">
        <div class="pagination-container justify-content-center">
          <div class="pagination pagination-warning pagination-sm text-xs">
            {{ $membresias->appends(request()->input())->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal crear UserMemberships -->
@foreach($membresias as $membresia)
<div class="col-md-4">
  <div class="modal fade" id="modal-form1{{ $membresia->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document"> <!-- Cambiado a modal-md para un ancho mediano -->
      <div class="modal-content">
        <div class="modal-body p-2">

          <div class="card card-plain">
            <div class="card-header pb-2">
              <div class="d-flex align-items-center justify-content-between">
                <h3 class="font-weight-bolder text-info text-gradient mb-0">Bóveda de {{ $membresia->name }}</h3>
                <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" class="img-fluid shadow border-radius-xl ms-3" style="width: 40px; height: auto; border-radius: 50%">
              </div>
              <p class="mt-1 mb-2">Registrar Hash de pago.</p>
              <div class="d-flex justify-content-center">
                <img src="{{ secure_asset('../img/qrusdt.PNG') }}" class="img-fluid shadow border-radius-xl mt-2">
              </div>
              <small class="d-flex justify-content-center mt-4">TARCH4JZSBfZnTisJ14itqLsm8nKb2mAAm
              </small>
            </div>
            <div class="card-body pt-1">
              <form class="" method="POST" enctype="multipart/form-data" action="{{ secure_url('/membership/store') }}">
                @csrf @method('POST')

                <input type="hidden" name="form_token" value="{{ $membresia->form_token }}">

                <label for="id_membresia">ID del Bóveda</label>
                <div class="input-group mb-1">
                  <input type="text" name="id_membresia" value="{{ $membresia->id }}" class="form-control" placeholder="Hash de pago" aria-label="text" readonly>
                </div>
                <label for="name">Bóveda</label>
                <div class="input-group mb-1">
                  <input type="text" name="name" value="{{ $membresia->name }}" class="form-control" placeholder="Hash de pago" aria-label="text" readonly>
                </div>
                <label for="hashUSDT">Hash</label>
                <div class="input-group mb-1">
                  <input type="text" name="hashUSDT" class="form-control" placeholder="Hash de pago" aria-label="text">
                </div>
                <label for="image">Imagen soporte de pago</label> 
                <div class="form-group mb-1">                                                   
                  <input class="form-control" type="file" name="image" id="image" autocomplete="image" autofocus>   
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-2 mb-0">Comprar</button>
                </div>
              </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-2 text-sm mx-auto">
                Valor del fondo <strong>$ {{ $membresia->valor }}</strong>
              </p>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var bgDiv = document.getElementById("backgroundDiv{{ $membresia->id }}");
    var img = new Image();
    var fallbackImages = [
      "../assets/img/illustrations/hotel3.jpg",
      "../assets/img/illustrations/hotel4.jpg"
    ];
    
    // Contador global para alternar entre las imágenes de respaldo
    if (typeof window.fallbackCounter === "undefined") {
      window.fallbackCounter = 0;
    }

    img.src = "{{ asset('storage/photousers/' . $membresia->image) }}";

    img.onerror = function() {
      bgDiv.style.backgroundImage = "url('" + fallbackImages[window.fallbackCounter % fallbackImages.length] + "')";
      window.fallbackCounter++; // Incrementa para alternar en la siguiente imagen fallida
    };
  });
</script>
@endforeach

@endsection

