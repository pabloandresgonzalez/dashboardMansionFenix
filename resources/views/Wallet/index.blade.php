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

<div> 
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>                      
                            <h5 class="mb-0">Mis Traslados</h5>                            
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#modal-form3">+&nbsp; Nuevo traslado</a>
                    </div>
                    <p class="text-sm ">Consulta todos tu traslados</p>
                </div>

                <!-- Form -->
                <form class="">
                    @csrf
                    <div class="ms-md-3 pe-md-3 d-flex align-items-center mb-4 mt-4">                    
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input name="buscarpor" id="buscaruser" type="text" class="form-control" placeholder="Buscar una cuenta aquí...">
                        </div>
                    </div>
                </form>
                <div class="card-body px-0 pt-0 pb-2">                    
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Usuario
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Fecha
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Estado
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Valor
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tarifa
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tipo
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Divisa
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Detalle de Hash
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($Wallets as $Wallet)
                               <tr>
                                <td class="ps-4">                                          
                                    <p class="text-xs font-weight-bold mb-0">{{ $Wallet->id }}</p>
                                </td>
                                <td>
                                   <p class="text-xs font-weight-bold mb-0">{{ $Wallet->email }}</p>
                                   <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $Wallet->created_at }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $Wallet->status }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $Wallet->value }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $Wallet->fee }}</p>
                                </td>
                                <td class="text-center">
                                    
                                    <p class="text-xs font-weight-bold mb-0">{{ $Wallet->type }}</p>
                                </td>
                                <td class="text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $Wallet->currency }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-secondary text-xs font-weight-bold text-truncate d-inline-block" style="max-width: 70px; white-space: normal; overflow: hidden;">
                                        {{ $Wallet->detail }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span>
                                        <a class="mx-1" href="#modal-form2{{ $Wallet->id }}" data-bs-toggle="modal" data-bs-target="#modal-form2{{ $Wallet->id }}">
                                            <i class="cursor-pointer fas fa-search text-secondary"></i>
                                        </a>                                            
                                    </span>
                                </td>
                            </tr>                                
                            @endforeach                                
                        </tbody>
                    </table>
                    <!-- Contenedor del paginador -->
                    <div id="wallets-container" class="card-footer pt-0 d-flex justify-content-center">
                        <div class="d-flex justify-content-center flex-wrap pagination-container" style="max-width: 100%; overflow-x: auto; white-space: nowrap; padding: 10px 20px;">
                          <div class="pagination pagination-warning pagination-sm" style="margin: 0; display: inline-flex; font-size: 0.8rem; gap: 5px;">
                            {{ $Wallets->appends(request()->input())->onEachSide(1)->links() }}
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal detalle traslado -->
@foreach($Wallets as $Wallet)
<div class="col-md-4">
  <div class="modal fade" id="modal-form2{{ $Wallet->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-2">

          <div class="card card-plain">
            <div class="card-header pb-2">
              <div class="d-flex align-items-center justify-content-between">
                <h4 class="font-weight-bolder text-info text-gradient mb-0">Ver detalle del traslado # {{ $Wallet->id }}</h4>
                <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" class="img-fluid shadow border-radius-xl ms-3" style="width: 40px; height: auto; border-radius: 50%">
          </div>
          <p class="mt-2 mb-2 text-sm">Traslado de la cuenta <strong>{{ $Wallet->email }}</strong>.</p>              
      </div>
      <div class="card-body pt-2">
        <div style="border: 1px solid #FFD43B; padding: 10px; border-radius: 8px; box-shadow: 0 4px 8px rgba(218, 165, 32, 0.1);">
            <ul class="list-unstyled mx-2" style="font-family: 'Roboto', sans-serif; font-size: 0.9rem; line-height: 1.1; color: #3B3B3B;">
                <li class="mb-1">
                    Traslado Wallet No: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $Wallet->id }}</b> 
                    <hr class="horizontal dark my-1">
                </li>
                <li class="mb-1">
                    Hash: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $Wallet->hash }}</b>  
                    <hr class="horizontal dark my-1">
                </li>
                <li class="mb-1">
                    Valor: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $Wallet->value }}</b>  
                    <hr class="horizontal dark my-1">
                </li>
                <li class="mb-1">
                    Tipo: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $Wallet->type }}</b>  
                    <hr class="horizontal dark my-1">
                </li>
                <li class="mb-1">
                    Billetera: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $Wallet->currency }}</b> 
                    <hr class="horizontal dark my-1">
                </li>
                <li class="mb-1">
                    Email usuario: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $Wallet->email }}</b>
                    <hr class="horizontal dark my-1">
                </li>
                <li>
                    Detalle: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $Wallet->detail }}</b>
                    <hr class="horizontal dark my-1">
                </li>                    
                <li class="mb-1">
                    Actualizada: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $Wallet->created_at }}</b>  
                    <hr class="horizontal dark my-1">
                </li>
                <li class="mb-1">
                    Creada: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $Wallet->updated_at }}</b>  
                    <hr class="horizontal dark my-1">
                </li>
            </ul>
        </div>

    </div>
    <div class="card-footer text-center pt-0 px-lg-2 px-1">
      <p class="mb-2 text-sm mx-auto">
        Estado <strong>{{ $Wallet->status }}</strong>
    </p>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
</div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
@endforeach

<!-- Modal crear Traslado -->
<div class="col-md-4">
  <div class="modal fade" id="modal-form3" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-2">

          <div class="card card-plain">
            <div class="card-header pb-2">
              <div class="d-flex align-items-center justify-content-between">
                <h4 class="font-weight-bolder text-info text-gradient mb-0">Traslado de billetera </h4>
                <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" class="img-fluid shadow border-radius-xl ms-3" style="width: 40px; height: auto; border-radius: 50%">
          </div>
          <p class="mt-1 mb-2 text-sm">Solicitud de traslado en la cuenta <strong>{{ auth()->user()->email }} </strong>.</p>              
      </div>
      <div class="card-body pt-1">

        <form class="" method="POST" enctype="multipart/form-data" action="{{ secure_url('/wallet/storeuser') }}">
            @csrf @method('POST')

            <div class="form-group mb-1">
                <label for="value" class="form-control-label">Valor</label>
                <div class="input-group">
                    <input type="number" id="value" name="value" value="" class="form-control" placeholder="Valor del traslado" aria-label="text">
                </div>
            </div>

            <div class="form-group mb-1">
                <label for="detail" class="form-control-label">Detalle</label>
                <div class="input-group">
                    <input type="text" id="detail" name="detail" value="" class="form-control" placeholder="Detalle del traslado" aria-label="text">
                </div>
            </div>

            <div class="form-group mb-1">
                <label for="currency" class="form-control-label">Tipo divisa</label>
                <select class="form-control" id="currency" name="currency">
                    <option value="">Selecciona el tipo de divisa</option>
                    <option value="PSIV">PSIV</option>
                    <option value="USDT">USDT</option>
                </select>
            </div>

            <div class="form-group mb-1">
                <label for="wallet" class="form-control-label">Wallet</label>
                <div class="input-group">
                    <input type="text" id="wallet" name="wallet" value="" class="form-control" placeholder="Detalle del traslado" aria-label="text">
                </div>
            </div>

            <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-3 mb-0">Enviar Traslado</button>

        </form>
    </div>

    <div class="card-footer text-center pt-0 px-lg-2 px-2">
        <p class="mb-2 text-sm mx-auto">
            Costo <strong for="fee" id="fee-label">%</strong> de administración 
        </p>
    </div>
</div>
</div>
</div>
</div>
</div>

<script>
    document.getElementById('currency').addEventListener('change', function () {
        const currency = this.value;
        const feeLabel = document.getElementById('fee-label');

        if (currency === 'PSIV') {
            feeLabel.textContent = ' 0%';
        } else if (currency === 'USDT') {
            feeLabel.textContent = ' 5% +';
        } else {
            feeLabel.textContent = '';
        }
    });
</script>

@endsection
