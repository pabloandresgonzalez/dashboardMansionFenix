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
        <h6 class="mb-1">Actualidad y Noticias</h6>
        <p class="text-sm">Noticias destacadas para mantenerte al día.</p>
      </div>
      <div class="card-body p-3">
  @foreach($news as $new)
  <div class="card card-blog card-plain mt-4">
    <div class="position-relative">
      <a class="d-block blur-shadow-image">
        @if (!empty(in_array(strtolower(pathinfo($new->image, PATHINFO_EXTENSION)), ["png", "jpg", "gif", "avg"])))
        <a class="d-block blur-shadow-image float-start">
          <img src="{{ asset('storage/photousers/' . $new->image) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
        </a>
        @else 
        <div class="d-flex justify-content-start">
          <div class="video-container position-relative"> 
            <iframe class="video-frame position-relative shadow border-radius-xl" src="{{ $new->url_video }}" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        @endif
      </a>
    </div>
    <div class="card-body px-0 pt-2">
      <p class="text-gradient-gold font-weight-bold text-sm text-uppercase">{{ $new->created_at->locale('es')->isoFormat('D MMMM YYYY') }}</p>
      <a href="javascript:;">
        <h4>
          {{ $new->title }}
        </h4>
      </a>
      <p>
        {{ $new->detail }}
      </p>
    </div>
  </div>
  @endforeach
        <div class="d-flex justify-content-center mt-2">
          <div class="pagination-container justify-content-center">
            <div class="pagination pagination-warning pagination-sm text-xs">
              {{ $news->appends(request()->input())->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection


