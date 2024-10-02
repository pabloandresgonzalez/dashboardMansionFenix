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
                  <h5 class="text-white mt-4 mb-5 pb-2">No. {{ $user->numberDoc }}</h5>
                  <div class="d-flex">
                    <div class="d-flex">
                      <div class="me-4">
                        <p class="text-white text-sm opacity-8 mb-0">Titular de la tarjeta</p>
                        <h6 class="text-white mb-0">{{ $user->name }} {{ $user->lastname }}</h6>
                      </div>
                      <div>
                        <p class="text-white text-sm opacity-8 mb-0">Caduca</p>
                        <h6 class="text-white mb-0">11/22</h6>
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
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                      <i class="fas fa-landmark opacity-10"></i>
                    </div>
                  </div>
                  <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">Saldo</h6>
                    <span class="text-xs">USDT</span>
                    <hr class="horizontal dark my-3">
                    <h5 class="mb-0">+$2000</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mt-md-0 mt-4">
                <div class="card">
                  <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                      <i class="fab fa-paypal opacity-10"></i>
                    </div>
                  </div>
                  <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">Saldo</h6>
                    <span class="text-xs">PSIV</span>
                    <hr class="horizontal dark my-3">
                    <h5 class="mb-0">$455.00</h5>
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
                    <h6 class="mb-0">Balance general - {{ $user->name }}</h6>
                  </div>
                  <div class="col-6 text-end">
                    <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Traslado</a>
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
                            $2,000
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
                            $2,500
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
                            $2,500
                          </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between align-items-center ps-0  border-radius-lg">
                          <div class="d-flex align-items-center flex-grow-1">
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                              <i class="fas fa-arrow-up"></i>
                            </button>
                            <div class="d-flex flex-column">
                              <h6 class="mb-1 text-dark text-sm">Saldo:</h6>
                              <span class="text-xs">{{ $diaActual }}</span>
                            </div>
                          </div>
                          <div class="text-success text-gradient text-sm font-weight-bold ms-3"> 
                            $61242.82
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
                            $2,000
                          </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between align-items-center ps-0  border-radius-lg">
                          <div class="d-flex align-items-center flex-grow-1">
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                              <i class="fas fa-arrow-up"></i>
                            </button>
                            <div class="d-flex flex-column">
                              <h6 class="mb-1 text-dark text-sm">Saldo:</h6>
                              <span class="text-xs">{{ $diaActual }}</span>
                            </div>
                          </div>
                          <div class="text-success text-gradient text-sm font-weight-bold ms-3"> 
                            $61242.82
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
                <h6 class="mb-0">Tus Movimientos</h6>
              </div>
              <div class="col-md-6 d-flex justify-content-end align-items-center">
                <i class="far fa-calendar-alt me-2"></i>
                <small>{{ $rangoDias }}</small>
              </div>
            </div>
          </div>
          <div class="card-body pt-4 p-3">
            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
            <ul class="list-group">
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Netflix</h6>
                    <span class="text-xs">27 March 2020, at 12:30 PM</span>
                  </div>
                </div>
                <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                  - $ 2,500
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Apple</h6>
                    <span class="text-xs">27 March 2020, at 04:30 AM</span>
                  </div>
                </div>
                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                  + $ 2,000
                </div>
              </li>
            </ul>
            <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
            <ul class="list-group">
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Stripe</h6>
                    <span class="text-xs">26 March 2020, at 13:45 PM</span>
                  </div>
                </div>
                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                  + $ 750
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">HubSpot</h6>
                    <span class="text-xs">26 March 2020, at 12:30 PM</span>
                  </div>
                </div>
                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                  + $ 1,000
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                    <span class="text-xs">26 March 2020, at 08:30 AM</span>
                  </div>
                </div>
                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                  + $ 2,500
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-exclamation"></i></button>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                    <span class="text-xs">26 March 2020, at 05:00 AM</span>
                  </div>
                </div>
                <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                  Pending
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
 
@endsection





