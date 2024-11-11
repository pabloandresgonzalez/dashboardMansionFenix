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
                            <h5 class="mb-0">Gestión de Traslados</h5>                            
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#modal-form">+&nbsp; Nuevo traslado</a>
                    </div>
                    <p class="text-sm ">Administra y autoriza los traslados</p>
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
                                        Tipo de movimiento 
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Divisa
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($Wallets as $Wallet)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $Wallet->id }}</p>
                                    </td>
                                    <td>
                                        <div>
                                                <img src="../assets/img/bruce-mars1.jpg" class="avatar avatar-sm me-3">
                                            
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $Wallet->created_at }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0"></p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0"></p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0"></p>
                                    </td>
                                    <td class="text-center">
                                        
                                        <p class="text-xs font-weight-bold mb-0">
                                        
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                           
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#modal-form1" class="mx-1" type="button" data-bs-toggle="modal" data-bs-target="#modal-form1">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <a class="mx-1" href="">
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
                                    
                                </div>        
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
