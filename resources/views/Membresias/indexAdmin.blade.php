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
<div class="row">
  <div class="col-12 mt-4">
    <div class="card mb-4">
      <div class="card-header pb-0 p-4">
        <h6 class="mb-1">Bóvedas de minería de fondos</h6>
        <p class="text-sm">Administra las Bóvedas</p>
      </div>
      <div class="card-body p-3">
        <div class="row">
          @foreach($membresias as $membresia)
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                @if (!empty(in_array(strtolower(pathinfo($membresia->image, PATHINFO_EXTENSION)), ["png", "jpg", "gif", "avg"])))
                <a class="d-block shadow-xl border-radius-xl"> 
                  <img id="imgElement{{ $membresia->id }}" 
                       src="{{ asset('storage/photousers/' . $membresia->image) }}" 
                       alt="img-blur-shadow" 
                       class="img-fluid shadow border-radius-xl">
                </a>               
                @endif
              </div>
              <div class="card-body px-1 pb-0">
              <p class="text-gradient text-dark mb-2 text-sm">{{ $membresia->name }}</p>
              <a href="javascript:;">
                <h5>
                  {{ $membresia->intro }}
                </h5>
              </a>
              <p class="mt-2 text-sm">
                {{ $membresia->detail }}
              </p>
              <h6>
                {{ $membresia->isActive }}
              </h6>
              <div class="d-flex align-items-center justify-content-between">
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalMessage1{{ $membresia->id }}" class="text-gradient text-dark btn-sm"><svg xmlns="http://www.w3.org/2000/svg"  height="26" width="26" viewBox="0 0 512 512" class="cursor-pointer  text-secondary"><path fill="#e3e4e5" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z"/></svg></a>
              </div>                
              </div>
            </div>
          </div>
          @endforeach
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card h-100 card-plain border">
              <div class="card-body d-flex flex-column justify-content-center text-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">
                  <i class="fa fa-plus text-secondary mb-3"></i>
                  <h5 class=" text-secondary"> Nuevo Fondo </h5>
                </a>
              </div>
            </div>
          </div>
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
                  <h7>ID de la Membresía: {{ $membresia->id }}</h7>
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

  <!-- Modal crear membresia -->
  <div class="col-md-4">  
    <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header d-flex align-items-center justify-content-between">
            <h5 class="modal-title" id="exampleModalLabel">Nueva Bóveda</h5>
            <div class="d-flex align-items-center">
              <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" class="img-fluid shadow border-radius-xl ms-3" style="width: 40px; height: auto;">
            </div>
          </div>
          <div class="modal-body">
            <form class="" method="POST" enctype="multipart/form-data" action="{{ route('Membresias.store') }}">
              @csrf @method('POST')

              <div class="form-group mb-1">
                <label for="name" class="form-control-label mb-1">Nombre</label>
                <input type="text" class="form-control" value="" name="name" id="name" placeholder="Nombre para el fondo." autocomplete="off">
              </div>
              <div class="form-group mb-1">
                <label for="valor" class="form-control-label mb-1">Valor</label>
                <input type="number" class="form-control" value="" id="valor" name="valor" placeholder="Valor para el fondo.">
              </div>
              <div class="form-group mb-1">
                <label for="isActive" class="form-control-label mb-1">Estado de la Bóveda</label>
                <select class="form-control" id="isActive" name="isActive" >
                  <option value="Disponible" >Disponible</option>
                  <option value="Pasaporte" >Agotada</option>
                </select>
              </div>
              <div class="form-group mb-1">
                <label for="image" class="form-control-label mb-1">Imagen</label>                                  
                <input class="form-control" type="file" name="image" id="image" autocomplete="image" autofocus>   
              </div>
              <div class="form-group mb-1">
                <label for="detail" class="form-control-label mb-1">Detalle</label>
                <textarea class="form-control" type="text" name="detail" id="detail" placeholder="Maximo 2000 caractres."></textarea>
              </div>          
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn bg-gradient-primary">Crear Bóveda</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @foreach($membresias as $membresia)
  <!-- Modal editar membresia -->
  <div class="col-md-4">  
    <div class="modal fade" id="exampleModalMessage1{{ $membresia->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header d-flex align-items-center justify-content-between">
            <h5 class="modal-title" id="exampleModalLabel">Editar Bóveda {{ $membresia->id }}</h5>
            <div class="d-flex align-items-center">
              <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" class="img-fluid shadow border-radius-xl ms-3" style="width: 40px; height: auto;">
            </div>
          </div>
          <div class="modal-body">
            <form class="" method="POST" enctype="multipart/form-data" action="{{ route('Membresias.update', $membresia->id) }}">
              @csrf @method('put')

              <div class="form-group mb-1">
                <label for="name" class="form-control-label mb-1">Nombre</label>
                <input type="text" class="form-control" value="{{ $membresia->name }}" name="name" id="name" placeholder="Nombre para la membresía." autocomplete="off">
              </div>
              <div class="form-group mb-1">
                <label for="valor" class="form-control-label mb-1">Valor</label>
                <input type="number" class="form-control" value="{{ $membresia->valor }}" id="valor" name="valor" placeholder="Nombre para la membresía.">
              </div>
              <div class="form-group mb-1">
                <label for="isActive" class="form-control-label mb-1">Estado de la Bóveda</label>
                <select class="form-control" id="isActive" name="isActive" >
                  <option value="Disponible" >Disponible</option>
                  <option value="Pasaporte" >Agotada</option>
                </select>
              </div>
              <div class="form-group mb-1">
                <label for="image" class="form-control-label mb-1">Imagen</label>                                  
                <input class="form-control" type="file" name="image" id="image" autocomplete="image" autofocus>   
              </div>
              <div class="form-group mb-1">
                <label for="detail" class="form-control-label mb-1">Detalle</label>
                <textarea class="form-control" type="text" name="detail" id="detail" placeholder="Maximo 2000 caractres.">{{ $membresia->detail }}</textarea>
              </div>          
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn bg-gradient-primary">Guardar cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

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
                  <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" class="img-fluid shadow border-radius-xl ms-3" style="width: 40px; height: auto;">
                </div>
                <p class="mt-1 mb-2">Registrar Hash de pago.</p>
                <div class="d-flex justify-content-center">
                  <img src="{{ secure_asset('../img/qrusdt.PNG') }}" class="img-fluid shadow border-radius-xl mt-2">
                </div>
                <small class="d-flex justify-content-center mt-4">0xeB4e247A9C0ca606aE0300218014A71A4BA93319</small>
              </div>
              <div class="card-body pt-1">
                <form class="" method="POST" enctype="multipart/form-data" action="{{ secure_url('/membership/store') }}">
                  @csrf @method('POST')

                  <label for="id_membresia">ID de la Bóveda</label>
                  <div class="input-group mb-1">
                    <input type="text" name="id_membresia" value="{{ $membresia->id }}" class="form-control" placeholder="Hash de pago" aria-label="text">
                  </div>
                  <label for="name">Bóveda</label>
                  <div class="input-group mb-1">
                    <input type="text" name="name" value="{{ $membresia->name }}" class="form-control" placeholder="Hash de pago" aria-label="text">
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
                  Valor Bóveda + administración <strong>$<?php echo $membresia->valor + $membresia->valor * 10 / 100; ?></strong>
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
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var imgElement = document.getElementById("imgElement{{ $membresia->id }}");
    var fallbackImages = [
      "../assets/img/illustrations/hotel3.jpg",
      "../assets/img/illustrations/hotel4.jpg"
    ];

    // Contador global para alternar entre las imágenes de respaldo
    if (typeof window.fallbackCounter === "undefined") {
      window.fallbackCounter = 0;
    }

    imgElement.onerror = function() {
      imgElement.src = fallbackImages[window.fallbackCounter % fallbackImages.length];
      window.fallbackCounter++; // Alterna la imagen en la siguiente falla
    };
  });
</script>
@endforeach

@endsection