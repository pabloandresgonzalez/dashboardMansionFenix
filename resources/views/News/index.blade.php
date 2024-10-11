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
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Users</p>
              <h5 class="font-weight-bolder mb-0">
                2,300
                <span class="text-success text-sm font-weight-bolder">+3%</span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
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
      <div class="card-header pb-0 p-3">
        <h6 class="mb-1">Noticias</h6>
        <p class="text-sm">Gestionar las noticias del portal  </p>
      </div>
      <div class="card-body p-3">
        <div class="row">
          @foreach($news as $new)
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                @if (!empty(in_array(strtolower(pathinfo($new->image, PATHINFO_EXTENSION)), ["png", "jpg", "gif", "avg"])))
                  <a class="d-block shadow-xl border-radius-xl"> 
                    <img src="{{ asset('storage/' . $new->image) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                  </a>
                @else                  
                    <iframe class="video-container shadow border-radius-xl" src="{{ $new->url_video }}" frameborder="0" allowfullscreen></iframe>                  
                @endif
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">{{ $new->title }}</p>
                <a href="javascript:;">
                  <h5>
                    {{ $new->intro }}
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  {{ $new->detail }}
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalMessage1{{ $new->id }}" class="text-gradient text-dark btn-sm"><svg xmlns="http://www.w3.org/2000/svg"  height="26" width="26" viewBox="0 0 512 512" class="cursor-pointer  text-secondary"><path fill="#e3e4e5" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z"/></svg></a>
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
                  <h5 class=" text-secondary"> Nueva Noticia </h5>
                </a>
              </div>
            </div>
          </div>
        </div>
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
  @foreach($news as $new)
  <div class="card card-blog card-plain mt-4">
  <div class="position-relative">
    <a class="d-block blur-shadow-image">
      @if (!empty(in_array(strtolower(pathinfo($new->image, PATHINFO_EXTENSION)), ["png", "jpg", "gif", "avg"])))
          <a class="d-block blur-shadow-image float-start">
              <img src="{{ asset('storage/' . $new->image) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
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
</div>
<div class="d-flex justify-content-center mt-2">
  <div class="pagination-container justify-content-center">
      <div class="pagination pagination-warning pagination-sm text-xs">
          {{ $news->appends(request()->input())->links() }}
      </div>
  </div>
</div>

<!-- Modal crear news -->
<div class="col-md-4">  
  <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center justify-content-between">
            <h5 class="modal-title" id="exampleModalLabel">Nueva noticia</h5>
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512" class="me-2">
                    <path fill="#FFD43B" d="M96 63.4C142.5 27.3 201.6 7.3 260.5 8.8c29.6-.4 59.1 5.4 86.9 15.3-24.1-4.6-49-6.3-73.4-2.5C231.2 27 191 48.8 162.2 80.9c5.7-1 10.8-3.7 16-5.9 18.1-7.9 37.5-13.3 57.2-14.8 19.7-2.1 39.6-.4 59.3 1.9-14.4 2.8-29.1 4.6-43 9.6-34.4 11.1-65.3 33.2-86.3 62.6-13.8 19.7-23.6 42.9-24.7 67.1-.4 16.5 5.2 34.8 19.8 44a53.3 53.3 0 0 0 37.5 6.7c15.5-2.5 30.1-8.6 43.6-16.3 11.5-6.8 22.7-14.6 32-24.3 3.8-3.2 2.5-8.5 2.6-12.8-2.1-.3-4.4-1.1-6.3 .3a203 203 0 0 1 -35.8 15.4c-20 6.2-42.2 8.5-62.1 .8 12.8 1.7 26.1 .3 37.7-5.4 20.2-9.7 36.8-25.2 54.4-38.8a526.6 526.6 0 0 1 88.9-55.3c25.7-12 52.9-22.8 81.6-24.1-15.6 13.7-32.2 26.5-46.8 41.4-14.5 14-27.5 29.5-40.1 45.2-3.5 4.6-9 6.9-13.6 10.2a150.7 150.7 0 0 0 -51.9 60.1c-9.3 19.7-14.5 41.9-11.8 63.7 1.9 13.7 8.7 27.6 20.9 34.9 12.9 8 29.1 8.1 43.5 5.1 32.8-7.5 61.4-28.9 81-55.8 20.4-27.5 30.5-62.2 29.2-96.4-.5-7.5-1.6-15-1.7-22.5 8 19.5 14.8 39.7 16.7 60.8 2 14.3 .8 28.8-1.6 42.9-1.9 11-5.7 21.5-7.8 32.4a165 165 0 0 0 39.3-81.1 183.6 183.6 0 0 0 -14.2-104.6c20.8 32 32.3 69.6 35.7 107.5 .5 12.7 .5 25.5 0 38.2A243.2 243.2 0 0 1 482 371.3c-26.1 47.3-68 85.6-117.2 108-78.3 36.2-174.7 31.3-248-14.7A248.3 248.3 0 0 1 25.4 366 238.3 238.3 0 0 1 0 273.1v-31.3C3.9 172 40.9 105.8 96 63.4m222 80.3a79.1 79.1 0 0 0 16-4.5c5-1.8 9.2-5.9 10.3-11.2-9 5-18 9.9-26.3 15.7z"/>
                </svg>
            </div>
        </div>
        <div class="modal-body">
          <form class="" method="POST" enctype="multipart/form-data" action="{{ route('news.store') }}">
            @csrf @method('POST')

            <div class="form-group mb-1">
              <label for="title" class="form-control-label mb-1">Titulo</label>
              <input type="text" class="form-control" value="" name="title" id="title" placeholder="Titulo para la noticia.">
            </div>
            <div class="form-group mb-1">
              <label for="intro" class="form-control-label mb-1">Intro</label>
              <input type="text" class="form-control" value="" name="intro" id="intro" placeholder="Pequeña introducción de la noticia.">
            </div>
            <div class="form-group mb-1">
              <label for="image" class="form-control-label mb-1">Imagen</label>                                  
              <input class="form-control" type="file" name="image" id="image" autocomplete="image" autofocus>   
            </div>
            <div class="form-group mb-1">
              <label for="url_video" class="form-control-label mb-1">URL del video</label>
              <input type="text" class="form-control" value="" name="url_video" id="url_video" placeholder="url donde esta el video.">
            </div>
            <div class="form-group mb-1">
              <label for="isActive" class="form-control-label mb-1">Estado</label>
              <select class="form-control" id="isActive" name="isActive" >
                <option value="1" >Activa</option>
                <option value="0" >Cerrada</option>
              </select>
            </div>
            <div class="form-group mb-1">
              <label for="detail" class="form-control-label mb-1">Detalle</label>
              <textarea class="form-control" type="text" name="detail" id="detail" placeholder="Maximo 2000 caractres."></textarea>
            </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-gradient-primary">Enviar noticia</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

@foreach($news as $new)
<!-- Modal editar news -->
<div class="col-md-4">  
  <div class="modal fade" id="exampleModalMessage1{{ $new->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center justify-content-between">
            <h5 class="modal-title" id="exampleModalLabel">Editar noticia {{ $new->id }}</h5>
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512" class="me-2">
                    <path fill="#FFD43B" d="M96 63.4C142.5 27.3 201.6 7.3 260.5 8.8c29.6-.4 59.1 5.4 86.9 15.3-24.1-4.6-49-6.3-73.4-2.5C231.2 27 191 48.8 162.2 80.9c5.7-1 10.8-3.7 16-5.9 18.1-7.9 37.5-13.3 57.2-14.8 19.7-2.1 39.6-.4 59.3 1.9-14.4 2.8-29.1 4.6-43 9.6-34.4 11.1-65.3 33.2-86.3 62.6-13.8 19.7-23.6 42.9-24.7 67.1-.4 16.5 5.2 34.8 19.8 44a53.3 53.3 0 0 0 37.5 6.7c15.5-2.5 30.1-8.6 43.6-16.3 11.5-6.8 22.7-14.6 32-24.3 3.8-3.2 2.5-8.5 2.6-12.8-2.1-.3-4.4-1.1-6.3 .3a203 203 0 0 1 -35.8 15.4c-20 6.2-42.2 8.5-62.1 .8 12.8 1.7 26.1 .3 37.7-5.4 20.2-9.7 36.8-25.2 54.4-38.8a526.6 526.6 0 0 1 88.9-55.3c25.7-12 52.9-22.8 81.6-24.1-15.6 13.7-32.2 26.5-46.8 41.4-14.5 14-27.5 29.5-40.1 45.2-3.5 4.6-9 6.9-13.6 10.2a150.7 150.7 0 0 0 -51.9 60.1c-9.3 19.7-14.5 41.9-11.8 63.7 1.9 13.7 8.7 27.6 20.9 34.9 12.9 8 29.1 8.1 43.5 5.1 32.8-7.5 61.4-28.9 81-55.8 20.4-27.5 30.5-62.2 29.2-96.4-.5-7.5-1.6-15-1.7-22.5 8 19.5 14.8 39.7 16.7 60.8 2 14.3 .8 28.8-1.6 42.9-1.9 11-5.7 21.5-7.8 32.4a165 165 0 0 0 39.3-81.1 183.6 183.6 0 0 0 -14.2-104.6c20.8 32 32.3 69.6 35.7 107.5 .5 12.7 .5 25.5 0 38.2A243.2 243.2 0 0 1 482 371.3c-26.1 47.3-68 85.6-117.2 108-78.3 36.2-174.7 31.3-248-14.7A248.3 248.3 0 0 1 25.4 366 238.3 238.3 0 0 1 0 273.1v-31.3C3.9 172 40.9 105.8 96 63.4m222 80.3a79.1 79.1 0 0 0 16-4.5c5-1.8 9.2-5.9 10.3-11.2-9 5-18 9.9-26.3 15.7z"/>
                </svg>
            </div>
        </div>
        <div class="modal-body">
          <form class="" method="POST" enctype="multipart/form-data" action="{{ route('news.update', $new->id) }}">
            @csrf @method('put')

            <div class="form-group mb-1">
              <label for="title" class="form-control-label mb-1">Titulo</label>
              <input type="text" class="form-control" value="{{ $new->title }}" name="title" id="title" placeholder="Titulo para la noticia.">
            </div>
            <div class="form-group mb-1">
              <label for="intro" class="form-control-label mb-1">Intro</label>
              <input type="text" class="form-control" value="{{ $new->intro }}" name="intro" id="intro" placeholder="Pequeña introducción de la noticia.">
            </div>
            <div class="form-group mb-1">
              <label for="image" class="form-control-label mb-1">Imagen</label>                                  
              <input class="form-control" type="file" name="image" id="image" autocomplete="image" autofocus>   
            </div>
            <div class="form-group mb-1">
              <label for="url_video" class="form-control-label mb-1">URL del video</label>
              <input type="text" class="form-control" value="{{ $new->url_video }}" name="url_video" id="url_video" placeholder="url donde esta el video.">
            </div>
            <div class="form-group mb-1">
              <label for="isActive" class="form-control-label mb-1">Estado</label>
              <select class="form-control" id="isActive" name="isActive" >
                <option value="1" >Activa</option>
                <option value="0" >Cerrada</option>
              </select>
            </div>
            <div class="form-group mb-1">
              <label for="detail" class="form-control-label mb-1">Detalle</label>
              <textarea class="form-control" type="text" name="detail" id="detail" placeholder="Maximo 2000 caractres.">{{ $new->detail }}</textarea>
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


@endsection