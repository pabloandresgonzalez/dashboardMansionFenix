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
        <h6 class="mb-1">Gestionar el saldo de las wallets</h6>
        <p class="text-sm">Gestiona y administra el saldo de las wallets.</p>
      </div>
      <div class="card-body p-3">
        
        <form action="{{ secure_url('/wallet/asigsaldo') }}" enctype="multipart/form-data" method="POST" role="form text-left">
          @csrf

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="value" class="form-control-label">Valor del traslado</label>
                <div class="@error('value') border border-danger rounded-3 @enderror">
                  <input class="form-control" value="{{ old('value') }}" type="number" placeholder="Valor" id="value" name="value">
                  @error('value')
                  <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="iduser" class="form-control-label">{{ __('Asignar a:') }}</label>
                <select class="form-control" id="iduser" name="iduser" required>
                  <option value="" selected disabled>Asignar a:</option>
                  @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->email }} - {{ $user->name . " " . $user->lastname }}</option>
                  @endforeach                            
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="type" class="form-control-label">Tipo de movimiento</label>
                <select class="form-control" id="type" name="type" required>
                  <option value="" selected disabled>Seleccione el tipo de movimiento</option>
                  <option value="Traslado">Resta saldo</option>
                  <option value="Abono directo">Abono directo</option>                          
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="currency" class="form-control-label">Tipo de divisa</label>
                <select class="form-control" id="currency" name="currency" required>
                  <option value="" selected disabled>Seleccione la divisa</option>
                  <option value="PSIV">PSIV</option>
                  <option value="USDT">USDT</option>                        
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="detail" class="form-control-label">Justificación del movimiento</label>
                <div class="@error('detail') border border-danger rounded-3 @enderror">
                  <input class="form-control" value="{{ old('detail') }}" type="text" placeholder="Describa la justificación del traslado" id="detail" name="detail">
                  @error('detail')
                  <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <button type="submit" class="btn bg-gradient-dark btn-md mt-2 mb-2">Realizar el Traslado</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</div>
  
  @endsection