@extends('layouts.user_type.auth')

@section('content')

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
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #2</p>
                <a href="javascript:;">
                  <h5>
                    Modern
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  As Uber works through a huge amount of internal management turmoil.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="../assets/img/home-decor-2.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #1</p>
                <a href="javascript:;">
                  <h5>
                    Scandinavian
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Music is something that every person has his or her own specific opinion about.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="../assets/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #3</p>
                <a href="javascript:;">
                  <h5>
                    Minimalist
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Different people have different taste, and various types of music.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
      </div>
    </div>
  </div>
  <div class="col-12 col-xl-4">
    <div class="card h-100">
      <div class="card-header pb-0 p-3">
        <h6 class="mb-0">Platform Settings</h6>
      </div>
      <div class="card-body p-3">
        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Account</h6>
        <ul class="list-group">
          <li class="list-group-item border-0 px-0">
            <div class="form-check form-switch ps-0">
              <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
              <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">Email me when someone follows me</label>
            </div>
          </li>
          <li class="list-group-item border-0 px-0">
            <div class="form-check form-switch ps-0">
              <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1">
              <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault1">Email me when someone answers on my post</label>
            </div>
          </li>
          <li class="list-group-item border-0 px-0">
            <div class="form-check form-switch ps-0">
              <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
              <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">Email me when someone mentions me</label>
            </div>
          </li>
        </ul>
        <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Application</h6>
        <ul class="list-group">
          <li class="list-group-item border-0 px-0">
            <div class="form-check form-switch ps-0">
              <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3">
              <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault3">New launches and projects</label>
            </div>
          </li>
          <li class="list-group-item border-0 px-0">
            <div class="form-check form-switch ps-0">
              <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault4" checked>
              <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault4">Monthly product updates</label>
            </div>
          </li>
          <li class="list-group-item border-0 px-0 pb-0">
            <div class="form-check form-switch ps-0">
              <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault5">
              <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-12 col-xl-4">
    <div class="card h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-8 d-flex align-items-center">
            <h6 class="mb-0">Profile Information</h6>
          </div>
          <div class="col-md-4 text-end">
            <a href="javascript:;">
              <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <p class="text-sm">
          Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
        </p>
        <hr class="horizontal gray-light my-4">
        <ul class="list-group">
          <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; Alec M. Thompson</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; alecthompson@mail.com</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; USA</li>
          <li class="list-group-item border-0 ps-0 pb-0">
            <strong class="text-dark text-sm">Social:</strong> &nbsp;
            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
              <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
              <i class="fab fa-twitter fa-lg"></i>
            </a>
            <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
              <i class="fab fa-instagram fa-lg"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-12 col-xl-4">
    <div class="card h-100">
      <div class="card-header pb-0 p-3">
        <h6 class="mb-0">Conversations</h6>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">
          <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
            <div class="avatar me-3">
              <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
            </div>
            <div class="d-flex align-items-start flex-column justify-content-center">
              <h6 class="mb-0 text-sm">Sophie B.</h6>
              <p class="mb-0 text-xs">Hi! I need more information..</p>
            </div>
            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
          </li>
          <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
            <div class="avatar me-3">
              <img src="../assets/img/marie.jpg" alt="kal" class="border-radius-lg shadow">
            </div>
            <div class="d-flex align-items-start flex-column justify-content-center">
              <h6 class="mb-0 text-sm">Anne Marie</h6>
              <p class="mb-0 text-xs">Awesome work, can you..</p>
            </div>
            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
          </li>
          <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
            <div class="avatar me-3">
              <img src="../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
            </div>
            <div class="d-flex align-items-start flex-column justify-content-center">
              <h6 class="mb-0 text-sm">Ivanna</h6>
              <p class="mb-0 text-xs">About files I can..</p>
            </div>
            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
          </li>
          <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
            <div class="avatar me-3">
              <img src="../assets/img/team-4.jpg" alt="kal" class="border-radius-lg shadow">
            </div>
            <div class="d-flex align-items-start flex-column justify-content-center">
              <h6 class="mb-0 text-sm">Peterson</h6>
              <p class="mb-0 text-xs">Have a great afternoon..</p>
            </div>
            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
          </li>
          <li class="list-group-item border-0 d-flex align-items-center px-0">
            <div class="avatar me-3">
              <img src="../assets/img/team-3.jpg" alt="kal" class="border-radius-lg shadow">
            </div>
            <div class="d-flex align-items-start flex-column justify-content-center">
              <h6 class="mb-0 text-sm">Nick Daniel</h6>
              <p class="mb-0 text-xs">Hi! I need more information..</p>
            </div>
            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
          </li>
        </ul>
      </div>
    </div>
  </div>        
</div>

<div class="col-md-4">
  <!-- Modal -->
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
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Titulo</label>
              <input type="text" class="form-control" value="Creative Tim" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Intro</label>
              <input type="text" class="form-control" value="Creative Tim" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">URL del video</label>
              <input type="text" class="form-control" value="Creative Tim" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Detalle</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn bg-gradient-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection