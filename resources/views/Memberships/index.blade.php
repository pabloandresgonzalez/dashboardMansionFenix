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
                {{ $total }}
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
<div class="row my-4">
  <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <div class="row">
          <div class="col-lg-6 col-7">
            <h6>Gestíon de Memberchips</h6>
            <p class="text-sm mb-0">
              Control de Membresías Activas y Pendientes de Activación
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
      <div class="card-body px-0 pb-2">
        <div class="table-responsive">
          
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Membresía</th>
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
                      <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd">
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
                      $fecha_actual = date("Y-m-d");
                      $fecha_final = $membership->closedAt;

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

                      // Definimos un valor máximo para el cálculo del porcentaje
                      $maxDias = 30; // o cualquier valor máximo que determines

                      // Calculamos el porcentaje basado en los días hábiles
                      $porcentajeProgreso = ($totalDiasHabiles / $maxDias) * 100;

                      // Aseguramos que el porcentaje no exceda el 100%
                      $porcentajeProgreso = min($porcentajeProgreso, 100);

                      // Formateamos el resultado para mostrar los días hábiles y el progreso
                      echo '<i class="ni ni-watch-time"></i> Días hábiles restantes: ' . $totalDiasHabiles . '<br>';
                  ?>
                  <div class="progress-wrapper w-75 mx-auto">
    <div class="progress-info d-flex justify-content-between">
        <div class="progress-status">
            <span class="text-xs font-weight-bold">&nbsp;{{ $membership->status }}</span>
        </div>
        <div class="progress-percentage">
            <span class="text-xs font-weight-bold">{{ round($porcentajeProgreso) }}%&nbsp;</span>
        </div>
    </div>
    <div class="progress">
        <div class="progress-bar dynamic-progress-bar" style="width: {{ $porcentajeProgreso }}%;" role="progressbar" aria-valuenow="{{ round($porcentajeProgreso) }}" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>
                  <div class="progress-wrapper w-75 mx-auto">
                    <div class="progress-info d-flex justify-content-between">
                      <div class="progress-status">
                          <span class="text-xs font-weight-bold">&nbsp;{{ $membership->status }}</span>
                      </div>
                      <div class="progress-percentage">
                          <span class="text-xs font-weight-bold">60%&nbsp;</span>
                      </div>
                  </div>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
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
                      <a class="mx-1" href="{{ url('/user-management/'.$membership->id.'/detail') }}">
                                                <i class="cursor-pointer fas fa-search text-secondary"></i>
                      </a>                                            
                    </span>
                  </div>
                </td>             
              </tr>
            </tbody>
            @endforeach
          </table>
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
                <h4 class="font-weight-bolder text-info text-gradient mb-0">Activar Membresía de {{ $membership->membership }}</h4>
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512" class="ms-2">
                  <path fill="#FFD43B" d="M96 63.4C142.5 27.3 201.6 7.3 260.5 8.8c29.6-.4 59.1 5.4 86.9 15.3-24.1-4.6-49-6.3-73.4-2.5C231.2 27 191 48.8 162.2 80.9c5.7-1 10.8-3.7 16-5.9 18.1-7.9 37.5-13.3 57.2-14.8 19.7-2.1 39.6-.4 59.3 1.9-14.4 2.8-29.1 4.6-43 9.6-34.4 11.1-65.3 33.2-86.3 62.6-13.8 19.7-23.6 42.9-24.7 67.1-.4 16.5 5.2 34.8 19.8 44a53.3 53.3 0 0 0 37.5 6.7c15.5-2.5 30.1-8.6 43.6-16.3 11.5-6.8 22.7-14.6 32-24.3 3.8-3.2 2.5-8.5 2.6-12.8-2.1-.3-4.4-1.1-6.3 .3a203 203 0 0 1 -35.8 15.4c-20 6.2-42.2 8.5-62.1 .8 12.8 1.7 26.1 .3 37.7-5.4 20.2-9.7 36.8-25.2 54.4-38.8a526.6 526.6 0 0 1 88.9-55.3c25.7-12 52.9-22.8 81.6-24.1-15.6 13.7-32.2 26.5-46.8 41.4-14.5 14-27.5 29.5-40.1 45.2-3.5 4.6-9 6.9-13.6 10.2a150.7 150.7 0 0 0 -51.9 60.1c-9.3 19.7-14.5 41.9-11.8 63.7 1.9 13.7 8.7 27.6 20.9 34.9 12.9 8 29.1 8.1 43.5 5.1 32.8-7.5 61.4-28.9 81-55.8 20.4-27.5 30.5-62.2 29.2-96.4-.5-7.5-1.6-15-1.7-22.5 8 19.5 14.8 39.7 16.7 60.8 2 14.3 .8 28.8-1.6 42.9-1.9 11-5.7 21.5-7.8 32.4a165 165 0 0 0 39.3-81.1 183.6 183.6 0 0 0 -14.2-104.6c20.8 32 32.3 69.6 35.7 107.5 .5 12.7 .5 25.5 0 38.2A243.2 243.2 0 0 1 482 371.3c-26.1 47.3-68 85.6-117.2 108-78.3 36.2-174.7 31.3-248-14.7A248.3 248.3 0 0 1 25.4 366 238.3 238.3 0 0 1 0 273.1v-31.3C3.9 172 40.9 105.8 96 63.4m222 80.3a79.1 79.1 0 0 0 16-4.5c5-1.8 9.2-5.9 10.3-11.2-9 5-18 9.9-26.3 15.7z"/>
                </svg>
              </div>
              <p class="mt-1 mb-2 text-sm">Editar la membresía de <strong>{{ $membership->user_email }}</strong>.</p>              
            </div>
            <div class="card-body pt-1">
              <form class="" method="POST" enctype="multipart/form-data" action="{{ route('membership.update', $membership->id ) }}">
              @csrf @method('PUT')

                <label for="id">ID de la Membresía</label>
                <div class="input-group mb-1">
                  <input type="text" name="id"value="{{ $membership->id }}" class="form-control" placeholder="Hash de pago" aria-label="text" >
                </div>
                <label for="name">Membresía</label>
                <div class="input-group mb-1">
                  <input type="text" name="name" value="{{ $membership->membership }}" class="form-control" placeholder="Hash de pago" aria-label="text" >
                </div>
                <div class="form-group mb-1">
                  <label for="status" class="form-control-label mb-1">Estado</label>
                  <select class="form-control" id="status" name="status" >
                    <option value="{{ $membership->status}}">{{ $membership->status}}</option>
                    <option value="Activo"  >Activo</option>
                    <option value="Cerrado"  >Cerrado</option>    
                  </select>
                </div>
                <div class="form-group">
                    <label for="activedAt" class="form-control-label">Datetime</label>
                    @php
                        $fecha_actual = date("Y-m-d\TH:i");
                    @endphp
                    <input class="form-control" type="datetime-local" name="activedAt" value="{{ $fecha_actual }}" id="example-datetime-local-input">
                </div>
                <div class="text-center">
                  <?php
                    if ($membership->status === 'Pendiente') {
                      echo '
                        <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-2 mb-0">Comprar</button>
                      ';
                    } else {
                      echo '<h5>&nbsp; El estado de la membresia es  <strong>'.$membership->status.'</strong>, ya no es &nbsp;posible hacer mas cambios.</h5>';
                    }
                  ?>                  
                </div>
              </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-2 text-sm mx-auto">
                Valor membresía + administración <strong>$<?php echo $membership->valor + $membership->valor * 10 / 100; ?></strong>
              </p>
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

