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
                    <div class="d-flex justify-content-center">
                        <div class="pagination-container justify-content-center">
                            <div class="pagination pagination-warning">
                                {{ $Wallets->appends(request()->input())->links() }}
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
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512" class="ms-2">
                  <path fill="#FFD43B" d="M96 63.4C142.5 27.3 201.6 7.3 260.5 8.8c29.6-.4 59.1 5.4 86.9 15.3-24.1-4.6-49-6.3-73.4-2.5C231.2 27 191 48.8 162.2 80.9c5.7-1 10.8-3.7 16-5.9 18.1-7.9 37.5-13.3 57.2-14.8 19.7-2.1 39.6-.4 59.3 1.9-14.4 2.8-29.1 4.6-43 9.6-34.4 11.1-65.3 33.2-86.3 62.6-13.8 19.7-23.6 42.9-24.7 67.1-.4 16.5 5.2 34.8 19.8 44a53.3 53.3 0 0 0 37.5 6.7c15.5-2.5 30.1-8.6 43.6-16.3 11.5-6.8 22.7-14.6 32-24.3 3.8-3.2 2.5-8.5 2.6-12.8-2.1-.3-4.4-1.1-6.3 .3a203 203 0 0 1 -35.8 15.4c-20 6.2-42.2 8.5-62.1 .8 12.8 1.7 26.1 .3 37.7-5.4 20.2-9.7 36.8-25.2 54.4-38.8a526.6 526.6 0 0 1 88.9-55.3c25.7-12 52.9-22.8 81.6-24.1-15.6 13.7-32.2 26.5-46.8 41.4-14.5 14-27.5 29.5-40.1 45.2-3.5 4.6-9 6.9-13.6 10.2a150.7 150.7 0 0 0 -51.9 60.1c-9.3 19.7-14.5 41.9-11.8 63.7 1.9 13.7 8.7 27.6 20.9 34.9 12.9 8 29.1 8.1 43.5 5.1 32.8-7.5 61.4-28.9 81-55.8 20.4-27.5 30.5-62.2 29.2-96.4-.5-7.5-1.6-15-1.7-22.5 8 19.5 14.8 39.7 16.7 60.8 2 14.3 .8 28.8-1.6 42.9-1.9 11-5.7 21.5-7.8 32.4a165 165 0 0 0 39.3-81.1 183.6 183.6 0 0 0 -14.2-104.6c20.8 32 32.3 69.6 35.7 107.5 .5 12.7 .5 25.5 0 38.2A243.2 243.2 0 0 1 482 371.3c-26.1 47.3-68 85.6-117.2 108-78.3 36.2-174.7 31.3-248-14.7A248.3 248.3 0 0 1 25.4 366 238.3 238.3 0 0 1 0 273.1v-31.3C3.9 172 40.9 105.8 96 63.4m222 80.3a79.1 79.1 0 0 0 16-4.5c5-1.8 9.2-5.9 10.3-11.2-9 5-18 9.9-26.3 15.7z"/>
              </svg>
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
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512" class="ms-2">
                  <path fill="#FFD43B" d="M96 63.4C142.5 27.3 201.6 7.3 260.5 8.8c29.6-.4 59.1 5.4 86.9 15.3-24.1-4.6-49-6.3-73.4-2.5C231.2 27 191 48.8 162.2 80.9c5.7-1 10.8-3.7 16-5.9 18.1-7.9 37.5-13.3 57.2-14.8 19.7-2.1 39.6-.4 59.3 1.9-14.4 2.8-29.1 4.6-43 9.6-34.4 11.1-65.3 33.2-86.3 62.6-13.8 19.7-23.6 42.9-24.7 67.1-.4 16.5 5.2 34.8 19.8 44a53.3 53.3 0 0 0 37.5 6.7c15.5-2.5 30.1-8.6 43.6-16.3 11.5-6.8 22.7-14.6 32-24.3 3.8-3.2 2.5-8.5 2.6-12.8-2.1-.3-4.4-1.1-6.3 .3a203 203 0 0 1 -35.8 15.4c-20 6.2-42.2 8.5-62.1 .8 12.8 1.7 26.1 .3 37.7-5.4 20.2-9.7 36.8-25.2 54.4-38.8a526.6 526.6 0 0 1 88.9-55.3c25.7-12 52.9-22.8 81.6-24.1-15.6 13.7-32.2 26.5-46.8 41.4-14.5 14-27.5 29.5-40.1 45.2-3.5 4.6-9 6.9-13.6 10.2a150.7 150.7 0 0 0 -51.9 60.1c-9.3 19.7-14.5 41.9-11.8 63.7 1.9 13.7 8.7 27.6 20.9 34.9 12.9 8 29.1 8.1 43.5 5.1 32.8-7.5 61.4-28.9 81-55.8 20.4-27.5 30.5-62.2 29.2-96.4-.5-7.5-1.6-15-1.7-22.5 8 19.5 14.8 39.7 16.7 60.8 2 14.3 .8 28.8-1.6 42.9-1.9 11-5.7 21.5-7.8 32.4a165 165 0 0 0 39.3-81.1 183.6 183.6 0 0 0 -14.2-104.6c20.8 32 32.3 69.6 35.7 107.5 .5 12.7 .5 25.5 0 38.2A243.2 243.2 0 0 1 482 371.3c-26.1 47.3-68 85.6-117.2 108-78.3 36.2-174.7 31.3-248-14.7A248.3 248.3 0 0 1 25.4 366 238.3 238.3 0 0 1 0 273.1v-31.3C3.9 172 40.9 105.8 96 63.4m222 80.3a79.1 79.1 0 0 0 16-4.5c5-1.8 9.2-5.9 10.3-11.2-9 5-18 9.9-26.3 15.7z"/>
              </svg>
          </div>
          <p class="mt-1 mb-2 text-sm">Solicitud de traslado en la cuenta <strong>{{ auth()->user()->email }} </strong>.</p>              
      </div>
      <div class="card-body pt-1">

        <form class="" method="POST" enctype="multipart/form-data" action="{{ url('/wallet/storeuser') }}">
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
