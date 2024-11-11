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
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
              <h5 class="font-weight-bolder mb-0">
                $53,000
                <span class="text-success text-sm font-weight-bolder">+55%</span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Mis asociados </p>
              <h5 class="font-weight-bolder mb-0">
                {{ $totalUsers }}
                <span class="text-success text-sm font-weight-bolder">3% x referido </span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fa fa-user-group text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">New Clients</p>
              <h5 class="font-weight-bolder mb-0">
                +3,462
                <span class="text-danger text-sm font-weight-bolder">-2%</span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
              <h5 class="font-weight-bolder mb-0">
                $103,430
                <span class="text-success text-sm font-weight-bolder">+5%</span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
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
        
        <form action="/wallet/asigsaldo" enctype="multipart/form-data" method="POST" role="form text-left">
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
  
@endsection