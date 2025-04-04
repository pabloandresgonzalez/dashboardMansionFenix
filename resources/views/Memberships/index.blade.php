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
                <span class="text-success text-sm font-weight-bolder">USDT</span>
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
<div class="row my-4">
  <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <div class="row">
          <div class="col-lg-6 col-7">
            <h6>Gestíon de Bóvedas</h6>
            <p class="text-sm mb-0">
              Control de Bóvedas de minería de fondos Activas y Pendientes de Activación
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
      <!-- Form -->
      <form class="">
        @csrf
        <div class="ms-md-3 pe-md-3 d-flex align-items-center mb-1 mt-2">                    
          <div class="input-group">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input name="buscarpor" id="buscarmembership" type="text" class="form-control" placeholder="Buscar un fondo aquí...">
          </div>
        </div>
      </form>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive">          
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bóveda</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha activada</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha cierre</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Acción</th>
              </tr>
            </thead>
            @foreach($memberships as $membership)
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/small-logos/stock-movement-svgrepo-com.svg" class="avatar avatar-m me-3" alt="xd">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ $membership->membership }}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="avatar-group mt-2">
                    <span class="text-xs font-weight-bold">
                      @php 
                      $fecha = $membership->activedAt;
                      @endphp
                      @if($fecha)
                      {{ \Carbon\Carbon::parse($fecha)->locale('es')->format('d \d\e F \d\e Y') }}
                      @else
                      Sin fecha.
                      @endif        
                    </span>  
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-xs font-weight-bold">
                    @php 
                    $fecha = $membership->closedAt;
                    @endphp
                    @if($fecha)
                    {{ \Carbon\Carbon::parse($fecha)->locale('es')->format('d \d\e F \d\e Y') }}
                    @else
                    Sin fecha.
                    @endif        
                  </span>
                </td>
                <td class="align-middle">
                  <?php
                    // Fecha actual
                  $fecha_actual = date("Y-m-d");
                    // Fecha final de la membresía
                  $fecha_final = $membership->closedAt;

                    // Inicializamos el porcentaje por defecto como vacío
                  $porcentajeProgreso = '';

                    // Verificamos si la fecha final existe
                  if ($fecha_final) {
                        // Convertimos las fechas a formato timestamp
                    $fecha11 = strtotime($fecha_actual); 
                    $fecha22 = strtotime($fecha_final);

                        // Inicializamos el array para almacenar los días hábiles
                    $diasHabiles = [];

                        // Obtenemos los días faltantes sin contar sábados ni domingos
                    for ($fecha11; $fecha11 <= $fecha22; $fecha11 = strtotime('+1 day', $fecha11)) {
                      if (date('D', $fecha11) != 'Sun' && date('D', $fecha11) != 'Sat') {
                                // Agregamos los días hábiles al array
                        $diasHabiles[] = date('Y-m-d', $fecha11);
                      }
                    }

                        // Contamos el total de días hábiles
                    $totalDiasHabiles = count($diasHabiles);

                        // Definimos un valor máximo de días para el cálculo del porcentaje
                    $maxDias = 30;

                        // Calculamos los días hábiles restantes hasta el máximo de 30 días
                    $diasRestantes = min($totalDiasHabiles, $maxDias);

                        // Calculamos el porcentaje basado en los días faltantes
                    $porcentajeProgreso = (($maxDias - $diasRestantes) / $maxDias) * 100;

                        // Aseguramos que el porcentaje no exceda el 100%
                    $porcentajeProgreso = min($porcentajeProgreso, 100);
                  }
                  ?>
                  <div class="progress-wrapper w-75 mx-auto">
                    <div class="progress-info d-flex justify-content-between">
                      <div class="progress-status">
                        <span class="text-xs font-weight-bold">&nbsp;{{ $membership->status }}</span>
                      </div>
                      <div class="progress-percentage">
                        <!-- Si el porcentaje no está definido, no mostrar porcentaje -->
                        <?php if ($porcentajeProgreso !== ''): ?>
                          <span class="text-xs font-weight-bold">{{ round($porcentajeProgreso) }}%&nbsp;</span>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="progress">
                      <!-- Si el porcentaje no está definido, la barra estará vacía -->
                      <div class="progress-bar dynamic-progress-bar" 
                      style="width: {{ $porcentajeProgreso !== '' ? $porcentajeProgreso . '%' : '0%' }};" 
                      role="progressbar" 
                      aria-valuenow="{{ $porcentajeProgreso !== '' ? round($porcentajeProgreso) : 0 }}" 
                      aria-valuemin="0" 
                      aria-valuemax="100"></div>
                    </div>
                  </div>                  
                </td>
                
                <td class="align-middle text-center text-sm">
                  <span class="text-xs font-weight-bold"> {{ $membership->user_email }} </span>
                </td>
                <td>
                  <div class="avatar-group">
                    <a href="#modal-form1{{ $membership->id }}" class="mx-1" type="button" data-bs-toggle="modal" data-bs-target="#modal-form1{{ $membership->id }}">
                      <i class="fas fa-user-edit text-secondary"></i>
                    </a>
                    <span>
                      <a class="mx-1" href="#modal-form2{{ $membership->id }}" data-bs-toggle="modal" data-bs-target="#modal-form2{{ $membership->id }}">
                        <i class="cursor-pointer fas fa-search text-secondary"></i>
                      </a>                                            
                    </span>
                  </div>
                </td>             
              </tr>
            </tbody>
            @endforeach
          </table>
          <!-- Contenedor del paginador -->
          <div id="wallets-container" class="card-footer pt-0 d-flex justify-content-center">
            <div class="d-flex justify-content-center flex-wrap pagination-container" style="max-width: 100%; overflow-x: auto; white-space: nowrap; padding: 10px 20px;">
              <div class="pagination pagination-warning pagination-sm" style="margin: 0; display: inline-flex; font-size: 0.8rem; gap: 5px;">
                {{ $memberships->appends(request()->input())->onEachSide(1)->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal editar UserMemberships -->
@foreach($memberships as $membership)
<div class="col-md-4">
  <div class="modal fade" id="modal-form1{{ $membership->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document"> <!-- Cambiado a modal-md para un ancho mediano -->
      <div class="modal-content">
        <div class="modal-body p-2">

          <div class="card card-plain">
            <div class="card-header pb-2">
              <div class="d-flex align-items-center justify-content-between">
                <h4 class="font-weight-bolder text-info text-gradient mb-0">Activar Bóveda de {{ $membership->membership }}</h4>
                <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" class="img-fluid shadow border-radius-xl ms-3" style="width: 40px; height: auto; border-radius: 50%;">
              </div>
              <p class="mt-1 mb-2 text-sm">Editar la Bóveda de la cuenta <strong>{{ $membership->user_email }}</strong>.</p>              
            </div>
            <div class="card-body pt-1">
              <form class="" method="POST" enctype="multipart/form-data" action="{{ route('membership.update', $membership->id ) }}">
                @csrf @method('PUT')

                <label for="id">ID de la Fondo</label>
                <div class="input-group mb-1">
                  <input type="text" name="id"value="{{ $membership->id }}" class="form-control" placeholder="Hash de pago" aria-label="text" >
                </div>
                <label for="name">Fondo</label>
                <div class="input-group mb-1">
                  <input type="text" name="name" value="{{ $membership->membership }}" class="form-control" placeholder="Hash de pago" aria-label="text" >
                </div>
                <div class="form-group mb-1">
                  <label for="status" class="form-control-label mb-1">Estado</label>
                  <select class="form-control" id="status" name="status" >
                    @if(in_array($membership->status, ['Activo', 'Terminada', 'Cerrado']))
                      <!-- Solo muestra el estado actual si es "Activo" -->
                      <option value="{{ $membership->status }}" selected>{{ $membership->status }}</option>
                    @else
                      <!-- Muestra las opciones si no está activo -->
                      <option value="{{ $membership->status }}" selected>{{ $membership->status }}</option>
                      <option value="Activo">Activo</option>
                      <option value="Cerrado">Cerrado</option>  
                    @endif
                  </select>
                </div>
                <div class="form-group">
                  <label for="activedAt" class="form-control-label">Fecha</label>
                  @php
                  $fecha_actual = date("Y-m-d\TH:i");
                  @endphp
                  <input class="form-control" type="datetime-local" name="activedAt" value="{{ $fecha_actual }}" id="example-datetime-local-input">
                </div>
                <div class="text-center">
                  <?php
                  if ($membership->status === 'Pendiente') {
                    echo '
                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-2 mb-0">Activar Fondo</button>
                    ';
                  } else {
                    echo '<h5>&nbsp; El estado del fondo es  <strong>'.$membership->status.'</strong>, ya no es &nbsp;posible hacer mas cambios.</h5>';
                  }
                  ?>                  
                </div>
              </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-2 text-sm mx-auto">
                Valor del Fondo <strong>${{ $membership->membership }}</strong>
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

<!-- Modal detalle UserMemberships -->
@foreach($memberships as $membership)
<div class="col-md-4">
  <div class="modal fade" id="modal-form2{{ $membership->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document"> <!-- Cambiado a modal-md para un ancho mediano -->
      <div class="modal-content">
        <div class="modal-body p-2">

          <div class="card card-plain">
            <div class="card-header pb-2">
              <div class="d-flex align-items-center justify-content-between">
                <h4 class="font-weight-bolder text-info text-gradient mb-0">Detalle de la Bóveda de {{ $membership->membership }}</h4>
                <img src="{{ secure_asset('../img/phoenix coin v29_1.png') }}" class="img-fluid shadow border-radius-xl ms-3" style="width: 40px; height: auto; border-radius: 50%">
              </div>
              <p class="mt-1 mb-2 text-sm">Detalle de la Bóveda.</p>              
            </div>
            <div class="card-body pt-1">
              <div style="border: 1px solid #FFD43B; padding: 10px; border-radius: 8px; box-shadow: 0 4px 8px rgba(218, 165, 32, 0.1);">
                <ul class="list-unstyled mx-2" style="font-family: 'Roboto', sans-serif; font-size: 0.9rem; line-height: 1.1; color: #3B3B3B;">
                  <li class="mb-1">
                    ID de la Bóveda: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $membership->id }}</b> 
                    <hr class="horizontal dark my-1">
                  </li>
                  <li class="mb-1">
                    Bóveda Padre: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $membership->membresiaPadre }}</b> 
                    <hr class="horizontal dark my-1">
                  </li>
                  <li class="mb-1">
                    Nombre Usuario: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $membership->user_name }}</b> 
                    <hr class="horizontal dark my-1">
                  </li>
                  <li class="mb-1">
                    ID de usuario: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $membership->user }}</b> 
                    <hr class="horizontal dark my-1">
                  </li>
                  <li class="mb-1">
                    Bóveda: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $membership->membership }}</b>  
                    <hr class="horizontal dark my-1">
                  </li>
                  <li class="mb-1">
                    Estado: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $membership->status }}</b>  
                    <hr class="horizontal dark my-1">
                  </li>
                  <li class="mb-1">
                    Email: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $membership->user_email  }}</b>  
                    <hr class="horizontal dark my-1">
                  </li>
                  <li class="mb-1">
                    Detalle: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $membership->detail  }}</b>  
                    <hr class="horizontal dark my-1">
                  </li>
                  <li class="mb-1">
                    Fecha Activada: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $membership->activedAt  }}</b>  
                    <hr class="horizontal dark my-1">
                  </li>
                  <li class="mb-1">
                    Fecha de cierre: <b style="font-size: 0.75rem; color: #6B6B6B;">{{ $membership->closedAt  }}</b>  
                    <hr class="horizontal dark my-1">
                  </li>
                </ul>
              </div>
              
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-2 text-sm mx-auto">
                Estado <strong>{{ $membership->status }}</strong>
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

@endsection


