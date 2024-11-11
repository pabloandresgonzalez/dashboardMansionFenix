@extends('layouts.user_type.auth')

@section('content')


<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-xl-6 mb-xl-0 mb-4">
          <div class="card bg-transparent shadow-xl">
            <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('{{ asset('assets/img/curved-images/curved14.jpg') }}');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 p-3">
                <i class="fas fa-wifi text-white p-2"></i>
                <h5 class="text-white mt-4 mb-5 pb-2">No. {{ auth()->user()->numberDoc }}</h5>
                <div class="d-flex">
                  <div class="d-flex">
                    <div class="me-4">
                      <p class="text-white text-sm opacity-8 mb-0">Titular de la tarjeta</p>
                      <h6 class="text-white mb-0">{{ auth()->user()->name }} {{ auth()->user()->lastname }}</h6>
                    </div>
                    <div>
                      <p class="text-white text-sm opacity-8 mb-0">Caduca</p>
                      <h6 class="text-white mb-0">11/26</h6>
                    </div>
                  </div>
                  <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                    <svg xmlns="http://www.w3.org/2000/svg" height="42" width="42" viewBox="0 0 512 512"><path fill="#FFD43B" d="M96 63.4C142.5 27.3 201.6 7.3 260.5 8.8c29.6-.4 59.1 5.4 86.9 15.3-24.1-4.6-49-6.3-73.4-2.5C231.2 27 191 48.8 162.2 80.9c5.7-1 10.8-3.7 16-5.9 18.1-7.9 37.5-13.3 57.2-14.8 19.7-2.1 39.6-.4 59.3 1.9-14.4 2.8-29.1 4.6-43 9.6-34.4 11.1-65.3 33.2-86.3 62.6-13.8 19.7-23.6 42.9-24.7 67.1-.4 16.5 5.2 34.8 19.8 44a53.3 53.3 0 0 0 37.5 6.7c15.5-2.5 30.1-8.6 43.6-16.3 11.5-6.8 22.7-14.6 32-24.3 3.8-3.2 2.5-8.5 2.6-12.8-2.1-.3-4.4-1.1-6.3 .3a203 203 0 0 1 -35.8 15.4c-20 6.2-42.2 8.5-62.1 .8 12.8 1.7 26.1 .3 37.7-5.4 20.2-9.7 36.8-25.2 54.4-38.8a526.6 526.6 0 0 1 88.9-55.3c25.7-12 52.9-22.8 81.6-24.1-15.6 13.7-32.2 26.5-46.8 41.4-14.5 14-27.5 29.5-40.1 45.2-3.5 4.6-9 6.9-13.6 10.2a150.7 150.7 0 0 0 -51.9 60.1c-9.3 19.7-14.5 41.9-11.8 63.7 1.9 13.7 8.7 27.6 20.9 34.9 12.9 8 29.1 8.1 43.5 5.1 32.8-7.5 61.4-28.9 81-55.8 20.4-27.5 30.5-62.2 29.2-96.4-.5-7.5-1.6-15-1.7-22.5 8 19.5 14.8 39.7 16.7 60.8 2 14.3 .8 28.8-1.6 42.9-1.9 11-5.7 21.5-7.8 32.4a165 165 0 0 0 39.3-81.1 183.6 183.6 0 0 0 -14.2-104.6c20.8 32 32.3 69.6 35.7 107.5 .5 12.7 .5 25.5 0 38.2A243.2 243.2 0 0 1 482 371.3c-26.1 47.3-68 85.6-117.2 108-78.3 36.2-174.7 31.3-248-14.7A248.3 248.3 0 0 1 25.4 366 238.3 238.3 0 0 1 0 273.1v-31.3C3.9 172 40.9 105.8 96 63.4m222 80.3a79.1 79.1 0 0 0 16-4.5c5-1.8 9.2-5.9 10.3-11.2-9 5-18 9.9-26.3 15.7z"/></svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         <div class="col-xl-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg d-flex justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" viewBox="0 0 512 512">
                                    <path fill="#ffffff" d="M320 96L192 96 144.6 24.9C137.5 14.2 145.1 0 157.9 0L354.1 0c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128l128 0c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96L96 512c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4c0 0 0 0 0 0s0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20l0 14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1c0 0 0 0 0 0s0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4l0 14.6c0 11 9 20 20 20s20-9 20-20l0-13.8c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15c0 0 0 0 0 0l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7l0-13.9z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                            <h6 class="text-center mb-0">Saldo</h6>
                            <span class="text-xs">PSIV</span>
                            <hr class="horizontal dark my-3">
                            <h5 class="mb-0">${{ $balanceString['PSIV']['total'] ?? '0.00' }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                    <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg d-flex justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" viewBox="0 0 384 512"><path fill="#ffffff" d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM64 80c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16zm128 72c8.8 0 16 7.2 16 16l0 17.3c8.5 1.2 16.7 3.1 24.1 5.1c8.5 2.3 13.6 11 11.3 19.6s-11 13.6-19.6 11.3c-11.1-3-22-5.2-32.1-5.3c-8.4-.1-17.4 1.8-23.6 5.5c-5.7 3.4-8.1 7.3-8.1 12.8c0 3.7 1.3 6.5 7.3 10.1c6.9 4.1 16.6 7.1 29.2 10.9l.5 .1s0 0 0 0s0 0 0 0c11.3 3.4 25.3 7.6 36.3 14.6c12.1 7.6 22.4 19.7 22.7 38.2c.3 19.3-9.6 33.3-22.9 41.6c-7.7 4.8-16.4 7.6-25.1 9.1l0 17.1c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-17.8c-11.2-2.1-21.7-5.7-30.9-8.9c0 0 0 0 0 0c-2.1-.7-4.2-1.4-6.2-2.1c-8.4-2.8-12.9-11.9-10.1-20.2s11.9-12.9 20.2-10.1c2.5 .8 4.8 1.6 7.1 2.4c0 0 0 0 0 0s0 0 0 0s0 0 0 0c13.6 4.6 24.6 8.4 36.3 8.7c9.1 .3 17.9-1.7 23.7-5.3c5.1-3.2 7.9-7.3 7.8-14c-.1-4.6-1.8-7.8-7.7-11.6c-6.8-4.3-16.5-7.4-29-11.2l-1.6-.5s0 0 0 0c-11-3.3-24.3-7.3-34.8-13.7c-12-7.2-22.6-18.9-22.7-37.3c-.1-19.4 10.8-32.8 23.8-40.5c7.5-4.4 15.8-7.2 24.1-8.7l0-17.3c0-8.8 7.2-16 16-16z"/></svg>
                            </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                            <h6 class="text-center mb-0">Saldo</h6>
                            <span class="text-xs"> x comisiones USDT</span>
                            <hr class="horizontal dark my-3">
                            <h5 class="mb-0">${{ $balanceString['USDT']['total'] ?? '0.00' }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-lg-0 mb-4">
          <div class="card mt-4">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Balance general - {{ auth()->user()->name }}</h6>
                </div>
                <div class="col-6 text-end">
                  <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-form1">
                    <i class="fas fa-plus"></i>&nbsp;&nbsp;Nuevo  Traslado
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <div class="row">
                <div class="col-md-6 mb-md-0 mb-4">
                  <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                    <ul class="list-group">
                      <li class="list-group-item border-0 d-flex justify-content-between align-items-center ps-0  border-radius-lg">
                        <div class="d-flex align-items-center flex-grow-1">
                          <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-up"></i>
                          </button>
                          <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">Balance:</h6>
                          </div>
                        </div>
                        <div class="text-success text-gradient text-sm font-weight-bold ms-3">
                          ${{ $balanceString['PSIV']['balance'] ?? '0.00' }}
                        </div>
                      </li>
                      <li class="list-group-item border-0 d-flex justify-content-between align-items-center ps-0  border-radius-lg">
                        <div class="d-flex align-items-center flex-grow-1">
                          <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-down"></i>
                          </button>
                          <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">En canje:</h6>
                          </div>
                        </div>
                        <div class="text-danger text-gradient text-sm font-weight-bold ms-3">
                          ${{ $balanceString['PSIV']['exhange'] ?? '0.00' }}
                        </div>
                      </li>
                      <li class="list-group-item border-0 d-flex justify-content-between align-items-center ps-0  border-radius-lg">
                        <div class="d-flex align-items-center flex-grow-1">
                          <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-down"></i>
                          </button>
                          <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">Traslados:</h6>
                          </div>
                        </div>
                        <div class="text-danger text-gradient text-sm font-weight-bold ms-3">
                          ${{ $balanceString['PSIV']['withdrawals'] ?? '0.00' }}
                        </div>
                      </li>
                      <li class="list-group-item border-0 d-flex justify-content-between align-items-center ps-0  border-radius-lg">
                        <div class="d-flex align-items-center flex-grow-1">
                          <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-up"></i>
                          </button>
                          <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">Saldo PSIV:</h6>
                            <span class="text-xs">{{ $diaActual }}</span>
                          </div>
                        </div>
                        <div class="text-success text-gradient text-sm font-weight-bold ms-3"> 
                          ${{ $balanceString['PSIV']['total'] ?? '0.00' }}
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">                      
                    <ul class="list-group">
                      <li class="list-group-item border-0 d-flex justify-content-between align-items-center ps-0  border-radius-lg">
                        <div class="d-flex align-items-center flex-grow-1">
                          <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-up"></i>
                          </button>
                          <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">Comisión:</h6>
                            <span class="text-xs">Por afiliados</span>
                          </div>
                        </div>
                        <div class="text-success text-gradient text-sm font-weight-bold ms-3">
                          ${{ $totalCommission }}
                        </div>
                      </li>
                      <li class="list-group-item border-0 d-flex justify-content-between align-items-center ps-0  border-radius-lg">
                        <div class="d-flex align-items-center flex-grow-1">
                          <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-up"></i>
                          </button>
                          <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">Saldo USDT:</h6>
                            <span class="text-xs"></span>
                          </div>
                        </div>
                        <div class="text-success text-gradient text-sm font-weight-bold ms-3"> 
                          ${{ $balanceString['USDT']['total'] ?? '0.00' }}
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Renovaciones</h6>
            </div>
            <div class="col-6 text-end">
              <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
            </div>
          </div>
        </div>
        <div class="card-body p-3 pb-0">
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark font-weight-bold text-sm">March, 01, 2020</h6>
                <span class="text-xs">#MS-415646</span>
              </div>
              <div class="d-flex align-items-center text-sm">
                $180
                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="text-dark mb-1 font-weight-bold text-sm">February, 10, 2021</h6>
                <span class="text-xs">#RV-126749</span>
              </div>
              <div class="d-flex align-items-center text-sm">
                $250
                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="text-dark mb-1 font-weight-bold text-sm">April, 05, 2020</h6>
                <span class="text-xs">#FB-212562</span>
              </div>
              <div class="d-flex align-items-center text-sm">
                $560
                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="text-dark mb-1 font-weight-bold text-sm">June, 25, 2019</h6>
                <span class="text-xs">#QW-103578</span>
              </div>
              <div class="d-flex align-items-center text-sm">
                $120
                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="text-dark mb-1 font-weight-bold text-sm">March, 01, 2019</h6>
                <span class="text-xs">#AR-803481</span>
              </div>
              <div class="d-flex align-items-center text-sm">
                $300
                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-7 mt-4">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">Billing Information</h6>
        </div>
        <div class="card-body pt-4 p-3">
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="mb-3 text-sm">Oliver Liam</h6>
                <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
                <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">oliver@burrito.com</span></span>
                <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
              </div>
              <div class="ms-auto text-end">
                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="mb-3 text-sm">Lucas Harper</h6>
                <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Stone Tech Zone</span></span>
                <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">lucas@stone-tech.com</span></span>
                <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
              </div>
              <div class="ms-auto text-end">
                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="mb-3 text-sm">Ethan James</h6>
                <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Fiber Notion</span></span>
                <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">ethan@fiber.com</span></span>
                <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
              </div>
              <div class="ms-auto text-end">
                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-5 mt-4">
      <div class="card h-100 mb-4">
        <div class="card-header pb-0 px-3">
          <div class="row">
            <div class="col-md-6">
              <h6 class="mb-0">Traslados de billetera</h6>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
              <span class="text-xs">{{ $rangoDias }}</span>&nbsp;&nbsp;
               <i class="far fa-calendar-alt me-2"></i>
              
            </div>
          </div>
        </div>
        <div class="card-body pt-4 p-3">
          <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Movimientos</h6>
            @foreach($myWallets as $Wallet)
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <!-- Usa icono y color en función de `inOut` -->
                            <button class="btn btn-icon-only btn-rounded btn-outline-{{ $Wallet->inOut == 1 ? 'success' : 'danger' }} mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                <i class="fas fa-arrow-{{ $Wallet->inOut == 1 ? 'up' : 'down' }}"></i>
                            </button>
                            <div class="d-flex flex-column">
                                <!-- Nombre de usuario o ID de la transacción -->
                                <h6 class="mb-1 text-dark text-sm">No. {{ $Wallet->id }} - {{ $Wallet->status }}</h6>
                                <!-- Fecha de transacción -->
                                <span class="text-xs">{{ $Wallet->created_at->format('d M Y, h:i A') }}</span>
                                <!-- Detalle de la transacción -->
                                <span class="text-xs text-secondary">{{ $Wallet->detail }}</span>
                                <span class="text-xs text-secondary">{{ $Wallet->type }}</span>
                            </div>
                        </div>
                        <!-- Valor de la transacción con estilo según `inOut` -->
                        <div class="d-flex align-items-center text-{{ $Wallet->inOut == 1 ? 'success' : 'danger' }} text-gradient text-sm font-weight-bold">
                            {{ $Wallet->inOut == 1 ? '+' : '-' }} ${{ number_format($Wallet->value, 2) }}
                        </div>
                    </li>
                </ul>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal crear Traslado -->
<div class="col-md-4">
  <div class="modal fade" id="modal-form1" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
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
                          <input type="number" name="value" value="" class="form-control" placeholder="Valor del traslado" aria-label="text">
                      </div>
                  </div>

                  <div class="form-group mb-1">
                      <label for="detail" class="form-control-label">Detalle</label>
                      <div class="input-group">
                          <input type="text" name="detail" value="" class="form-control" placeholder="Detalle del traslado" aria-label="text">
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
                          <input type="text" name="wallet" value="" class="form-control" placeholder="Detalle del traslado" aria-label="text">
                      </div>
                  </div>

                  <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-3 mb-0">Enviar Traslado</button>
              </form>

            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-2">
              <p class="mb-2 text-sm mx-auto">
                + <strong>5%</strong> de administración 
              </p>
            </div>
          </div>
        </form>

        </div>
      </div>
    </div>
  </div>
</div>

 
@endsection