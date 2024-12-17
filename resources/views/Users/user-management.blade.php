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
                                <h5 class="mb-0">Todas las Cuentas</h5>
                            </div>
                            <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#modal-form">+&nbsp; Nuevo usuario</a>
                        </div>
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
                                            Foto
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nombre
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Apellido
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Rol
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Estado
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nivel
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->numberDoc }}</p>
                                        </td>
                                        <td>
                                            <div>
                                                @if($user->photo)
                                                <img src="{{ route('user.avatar', ['filename' => $user->photo]) }}" class="avatar avatar-sm me-3">
                                                @elseif(!$user->photo)
                                                <img src="../assets/img/bruce-mars1.jpg" class="avatar avatar-sm me-3">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->lastname }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->role }}</p>
                                        </td>
                                        <td class="text-center">
                                            
                                            <p class="text-xs font-weight-bold mb-0">
                                                @if($user->isActive == 1)
                                                Activo
                                                @elseif($user->isActive == 0)
                                                Inactivo
                                                @endif
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                @if($user->level == 1)
                                                Usuario
                                                @elseif($user->level == 2)
                                                Director
                                                @elseif($user->level == 3)
                                                Director Junior
                                                @elseif($user->level == 4)
                                                Director Senior
                                                @elseif($user->level == 5)
                                                Vice Presidente
                                                @endif
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#modal-form1{{ $user->id }}" class="mx-1" type="button" data-bs-toggle="modal" data-bs-target="#modal-form1{{ $user->id }}">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <a class="mx-1" href="{{ url('/user-management/'.$user->id.'/detail') }}">
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
                                        {{ $users->appends(request()->input())->links() }}
                                    </div>        
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($users as $user)
    <!-- Modal crear usuario -->
    <div class="row">
        <div class="col-md-4">      
          <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="font-weight-bolder text-info text-gradient">Crear una nueva cuenta</h3>
                                <p class="mb-0">Por favor, completar los campos para crear la cuenta.</p>
                            </div>
                            <div class="my-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512"><path fill="#FFD43B" d="M96 63.4C142.5 27.3 201.6 7.3 260.5 8.8c29.6-.4 59.1 5.4 86.9 15.3-24.1-4.6-49-6.3-73.4-2.5C231.2 27 191 48.8 162.2 80.9c5.7-1 10.8-3.7 16-5.9 18.1-7.9 37.5-13.3 57.2-14.8 19.7-2.1 39.6-.4 59.3 1.9-14.4 2.8-29.1 4.6-43 9.6-34.4 11.1-65.3 33.2-86.3 62.6-13.8 19.7-23.6 42.9-24.7 67.1-.4 16.5 5.2 34.8 19.8 44a53.3 53.3 0 0 0 37.5 6.7c15.5-2.5 30.1-8.6 43.6-16.3 11.5-6.8 22.7-14.6 32-24.3 3.8-3.2 2.5-8.5 2.6-12.8-2.1-.3-4.4-1.1-6.3 .3a203 203 0 0 1 -35.8 15.4c-20 6.2-42.2 8.5-62.1 .8 12.8 1.7 26.1 .3 37.7-5.4 20.2-9.7 36.8-25.2 54.4-38.8a526.6 526.6 0 0 1 88.9-55.3c25.7-12 52.9-22.8 81.6-24.1-15.6 13.7-32.2 26.5-46.8 41.4-14.5 14-27.5 29.5-40.1 45.2-3.5 4.6-9 6.9-13.6 10.2a150.7 150.7 0 0 0 -51.9 60.1c-9.3 19.7-14.5 41.9-11.8 63.7 1.9 13.7 8.7 27.6 20.9 34.9 12.9 8 29.1 8.1 43.5 5.1 32.8-7.5 61.4-28.9 81-55.8 20.4-27.5 30.5-62.2 29.2-96.4-.5-7.5-1.6-15-1.7-22.5 8 19.5 14.8 39.7 16.7 60.8 2 14.3 .8 28.8-1.6 42.9-1.9 11-5.7 21.5-7.8 32.4a165 165 0 0 0 39.3-81.1 183.6 183.6 0 0 0 -14.2-104.6c20.8 32 32.3 69.6 35.7 107.5 .5 12.7 .5 25.5 0 38.2A243.2 243.2 0 0 1 482 371.3c-26.1 47.3-68 85.6-117.2 108-78.3 36.2-174.7 31.3-248-14.7A248.3 248.3 0 0 1 25.4 366 238.3 238.3 0 0 1 0 273.1v-31.3C3.9 172 40.9 105.8 96 63.4m222 80.3a79.1 79.1 0 0 0 16-4.5c5-1.8 9.2-5.9 10.3-11.2-9 5-18 9.9-26.3 15.7z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">                  
                        <form class="p-1 md:p-5" method="POST" enctype="multipart/form-data" action="{{ route('users-store') }}">
                            @csrf @method('POST')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="name" class="form-control-label mb-1">{{ __('Nombre completo') }}</label>
                                        <div class="@error('name')border border-danger rounded-3 @enderror">
                                            <input class="form-control" value="" type="text" placeholder="Escribe el nombre" autocomplete="name" id="name" name="name">
                                            @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="lastname" class="form-control-label mb-1">{{ __('Apellido completo') }}</label>
                                        <div class="@error('lastname')border border-danger rounded-3 @enderror">
                                            <input class="form-control" value="" type="text" placeholder="Escribe el apellido" id="lastname" name="lastname">
                                            @error('lastname')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="typeDoc" class="form-control-label mb-1">{{ __('Tipo de documento') }}</label>
                                        <select class="form-control" id="typeDoc" name="typeDoc" >
                                            <option value="">Tipo</option>
                                            <option value="Cedula" >Cédula</option>
                                            <option value="Pasaporte" >Pasaporte</option>
                                            <option value="Visa" >Visa</option>
                                            <option value="Andorra" >Andorra</option>
                                            <option value="otro" >Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="numberDoc" class="form-control-label mb-1">{{ __('Numero identificación') }}</label>
                                        <div class="@error('numberDoc')border border-danger rounded-3 @enderror">
                                            <input class="form-control" type="number" placeholder="No identificación" id="numberDoc" name="numberDoc" value="">
                                            @error('numberDoc')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="role" class="form-control-label mb-1">{{ __('Tipo de rol') }}</label>
                                        <select class="form-control" id="role" name="role" >
                                            <option value="" >Rol</option>
                                            <option value="user" >User</option>
                                            <option value="admin" >Administrador</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="level" class="form-control-label mb-1">{{ __('Nivel') }}</label>
                                        <select class="form-control" id="level" name="level" >
                                          <option value="1"  >USUARIO</option>
                                          <option value="2"  >DIRECTOR</option>
                                          <option value="3"  >DIRECTOR JUNIOR</option>
                                          <option value="4"  >DIRECTOR SENIOR</option>
                                          <option value="5"  >VICE PRESIDENTE</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="phone" class="form-control-label mb-1">{{ __('Telefono') }}</label>
                                    <div class="@error('phone')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="tel" placeholder="40770888444" autocomplete="phone" id="phone" name="phone" value="">
                                        @error('phone')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cellphone" class="form-control-label mb-1">{{ __('Celular') }}</label>
                                    <div class="@error('cellphone')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="tel" placeholder="40770888444" id="cellphone" name="cellphone" value="">
                                        @error('cellphone')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="country" class="form-control-label mb-1">{{ __('Pais') }}</label>
                                    <select type="text" class="form-control" id="country" name="country" class="form-control" autocomplete="country"  required >
                                      <option value="">País</option>
                                      <option value="1"  >Afghanistan</option>
                                      <option value="2"  >Albania</option>
                                      <option value="3"  >Algeria</option>
                                      <option value="4"  >American Samoa</option>
                                      <option value="5"  >Andorra</option>
                                      <option value="6"  >Angola</option>
                                      <option value="7"  >Anguilla</option>
                                      <option value="8"  >Antarctica</option>
                                      <option value="9"  >Antigua and Barbuda</option>
                                      <option value="10"  >Argentina</option>
                                      <option value="11"  >Armenia</option>
                                      <option value="12"  >Aruba</option>
                                      <option value="13"  >Australia</option>
                                      <option value="14"  >Austria</option>
                                      <option value="15"  >Azerbaijan</option>
                                      <option value="16"  >Bahamas</option>
                                      <option value="17"  >Bahrain</option>
                                      <option value="18"  >Bangladesh</option>
                                      <option value="19"  >Barbados</option>
                                      <option value="20"  >Belarus</option>
                                      <option value="21"  >Belgium</option>
                                      <option value="22"  >Belize</option>
                                      <option value="23"  >Benin</option>
                                      <option value="24"  >Bermuda</option>
                                      <option value="25"  >Bhutan</option>
                                      <option value="26"  >Bolivia</option>
                                      <option value="27"  >Bosnia and Herzegovina</option>
                                      <option value="28"  >Botswana</option>
                                      <option value="29"  >Bouvet Island</option>
                                      <option value="30"  >Brazil</option>
                                      <option value="31"  >British Indian Ocean Territory</option>
                                      <option value="32"  >Brunei Darussalam</option>
                                      <option value="33"  >Bulgaria</option>
                                      <option value="34"  >Burkina Faso</option>
                                      <option value="35"  >Burundi</option>
                                      <option value="36"  >Cambodia</option>
                                      <option value="37"  >Cameroon</option>
                                      <option value="38"  >Canada</option>
                                      <option value="39"  >Cape Verde</option>
                                      <option value="40"  >Cayman Islands</option>
                                      <option value="41"  >Central African Republic</option>
                                      <option value="42"  >Chad</option>
                                      <option value="43"  >Chile</option>
                                      <option value="44"  >China</option>
                                      <option value="45"  >Christmas Island</option>
                                      <option value="46"  >Cocos (Keeling) Islands</option>
                                      <option value="57"  >Colombia</option>
                                      <option value="48"  >Comoros</option>
                                      <option value="49"  >Congo</option>
                                      <option value="50"  >Cook Islands</option>
                                      <option value="51"  >Costa Rica</option>
                                      <option value="52"  >Cote D'Ivoire</option>
                                      <option value="53"  >Croatia</option>
                                      <option value="54"  >Cuba</option>
                                      <option value="55"  >Cyprus</option>
                                      <option value="56"  >Czech Republic</option>
                                      <option value="57"  >Denmark</option>
                                      <option value="58"  >Djibouti</option>
                                      <option value="59"  >Dominica</option>
                                      <option value="60"  >Dominican Republic</option>
                                      <option value="61"  >East Timor</option>
                                      <option value="62"  >Ecuador</option>
                                      <option value="63"  >Egypt</option>
                                      <option value="64"  >El Salvador</option>
                                      <option value="65"  >Equatorial Guinea</option>
                                      <option value="66"  >Eritrea</option>
                                      <option value="67"  >Estonia</option>
                                      <option value="68"  >Ethiopia</option>
                                      <option value="69"  >Falkland Islands (Malvinas)</option>
                                      <option value="70"  >Faroe Islands</option>
                                      <option value="71"  >Fiji</option>
                                      <option value="72"  >Finland</option>
                                      <option value="74"  >France, Metropolitan</option>
                                      <option value="75"  >French Guiana</option>
                                      <option value="76"  >French Polynesia</option>
                                      <option value="77"  >French Southern Territories</option>
                                      <option value="78"  >Gabon</option>
                                      <option value="79"  >Gambia</option>
                                      <option value="80"  >Georgia</option>
                                      <option value="81"  >Germany</option>
                                      <option value="82"  >Ghana</option>
                                      <option value="83"  >Gibraltar</option>
                                      <option value="84"  >Greece</option>
                                      <option value="85"  >Greenland</option>
                                      <option value="86"  >Grenada</option>
                                      <option value="87"  >Guadeloupe</option>
                                      <option value="88"  >Guam</option>
                                      <option value="89"  >Guatemala</option>
                                      <option value="90"  >Guinea</option>
                                      <option value="91"  >Guinea-Bissau</option>
                                      <option value="92"  >Guyana</option>
                                      <option value="93"  >Haiti</option>
                                      <option value="94"  >Heard and Mc Donald Islands</option>
                                      <option value="95"  >Honduras</option>
                                      <option value="96"  >Hong Kong</option>
                                      <option value="97"  >Hungary</option>
                                      <option value="98"  >Iceland</option>
                                      <option value="99"  >India</option>
                                      <option value="100"  >Indonesia</option>
                                      <option value="101"  >Iran (Islamic Republic of)</option>
                                      <option value="102"  >Iraq</option>
                                      <option value="103"  >Ireland</option>
                                      <option value="104"  >Israel</option>
                                      <option value="105"  >Italy</option>
                                      <option value="106"  >Jamaica</option>
                                      <option value="107"  >Japan</option>
                                      <option value="108"  >Jordan</option>
                                      <option value="109"  >Kazakhstan</option>
                                      <option value="110"  >Kenya</option>
                                      <option value="111"  >Kiribati</option>
                                      <option value="112"  >North Korea</option>
                                      <option value="113"  >Korea, Republic of</option>
                                      <option value="114"  >Kuwait</option>
                                      <option value="115"  >Kyrgyzstan</option>
                                      <option value="116"  >Lao People's Democratic Republic</option>
                                      <option value="117"  >Latvia</option>
                                      <option value="118"  >Lebanon</option>
                                      <option value="119"  >Lesotho</option>
                                      <option value="120"  >Liberia</option>
                                      <option value="121"  >Libyan Arab Jamahiriya</option>
                                      <option value="122"  >Liechtenstein</option>
                                      <option value="123"  >Lithuania</option>
                                      <option value="124"  >Luxembourg</option>
                                      <option value="125"  >Macau</option>
                                      <option value="126"  >FYROM</option>
                                      <option value="127"  >Madagascar</option>
                                      <option value="128"  >Malawi</option>
                                      <option value="129"  >Malaysia</option>
                                      <option value="130"  >Maldives</option>
                                      <option value="131"  >Mali</option>
                                      <option value="132"  >Malta</option>
                                      <option value="133"  >Marshall Islands</option>
                                      <option value="134"  >Martinique</option>
                                      <option value="135"  >Mauritania</option>
                                      <option value="136"  >Mauritius</option>
                                      <option value="137"  >Mayotte</option>
                                      <option value="138"  >Mexico</option>
                                      <option value="139"  >Micronesia, Federated States of</option>
                                      <option value="140"  >Moldova, Republic of</option>
                                      <option value="141"  >Monaco</option>
                                      <option value="142"  >Mongolia</option>
                                      <option value="143"  >Montserrat</option>
                                      <option value="144"  >Morocco</option>
                                      <option value="145"  >Mozambique</option>
                                      <option value="146"  >Myanmar</option>
                                      <option value="147"  >Namibia</option>
                                      <option value="148"  >Nauru</option>
                                      <option value="149"  >Nepal</option>
                                      <option value="150"  >Netherlands</option>
                                      <option value="151"  >Netherlands Antilles</option>
                                      <option value="152"  >New Caledonia</option>
                                      <option value="153"  >New Zealand</option>
                                      <option value="154"  >Nicaragua</option>
                                      <option value="155"  >Niger</option>
                                      <option value="156"  >Nigeria</option>
                                      <option value="157"  >Niue</option>
                                      <option value="158"  >Norfolk Island</option>
                                      <option value="159"  >Northern Mariana Islands</option>
                                      <option value="160"  >Norway</option>
                                      <option value="161"  >Oman</option>
                                      <option value="162"  >Pakistan</option>
                                      <option value="163"  >Palau</option>
                                      <option value="164"  >Panama</option>
                                      <option value="165"  >Papua New Guinea</option>
                                      <option value="166"  >Paraguay</option>
                                      <option value="167"  >Peru</option>
                                      <option value="168"  >Philippines</option>
                                      <option value="169"  >Pitcairn</option>
                                      <option value="170"  >Poland</option>
                                      <option value="171"  >Portugal</option>
                                      <option value="172"  >Puerto Rico</option>
                                      <option value="173"  >Qatar</option>
                                      <option value="174"  >Reunion</option>
                                      <option value="175"  >Romania</option>
                                      <option value="176"  >Russian Federation</option>
                                      <option value="177"  >Rwanda</option>
                                      <option value="178"  >Saint Kitts and Nevis</option>
                                      <option value="179"  >Saint Lucia</option>
                                      <option value="180"  >Saint Vincent and the Grenadines</option>
                                      <option value="181"  >Samoa</option>
                                      <option value="182"  >San Marino</option>
                                      <option value="183"  >Sao Tome and Principe</option>
                                      <option value="184"  >Saudi Arabia</option>
                                      <option value="185"  >Senegal</option>
                                      <option value="186"  >Seychelles</option>
                                      <option value="187"  >Sierra Leone</option>
                                      <option value="188"  >Singapore</option>
                                      <option value="189"  >Slovak Republic</option>
                                      <option value="190"  >Slovenia</option>
                                      <option value="191"  >Solomon Islands</option>
                                      <option value="192"  >Somalia</option>
                                      <option value="193"  >South Africa</option>
                                      <option value="194"  >South Georgia &amp; South Sandwich Islands</option>
                                      <option value="195"  >Spain</option>
                                      <option value="196"  >Sri Lanka</option>
                                      <option value="197"  >St. Helena</option>
                                      <option value="198"  >St. Pierre and Miquelon</option>
                                      <option value="199"  >Sudan</option>
                                      <option value="200"  >Suriname</option>
                                      <option value="201"  >Svalbard and Jan Mayen Islands</option>
                                      <option value="202"  >Swaziland</option>
                                      <option value="203"  >Sweden</option>
                                      <option value="204"  >Switzerland</option>
                                      <option value="205"  >Syrian Arab Republic</option>
                                      <option value="206"  >Taiwan</option>
                                      <option value="207"  >Tajikistan</option>
                                      <option value="208"  >Tanzania, United Republic of</option>
                                      <option value="209"  >Thailand</option>
                                      <option value="210"  >Togo</option>
                                      <option value="211"  >Tokelau</option>
                                      <option value="212"  >Tonga</option>
                                      <option value="213"  >Trinidad and Tobago</option>
                                      <option value="214"  >Tunisia</option>
                                      <option value="215"  >Turkey</option>
                                      <option value="216"  >Turkmenistan</option>
                                      <option value="217"  >Turks and Caicos Islands</option>
                                      <option value="218"  >Tuvalu</option>
                                      <option value="219"  >Uganda</option>
                                      <option value="220"  >Ukraine</option>
                                      <option value="221"  >United Arab Emirates</option>
                                      <option value="222"  >United Kingdom</option>
                                      <option value="223"  >United States</option>
                                      <option value="224"  >United States Minor Outlying Islands</option>
                                      <option value="225"  >Uruguay</option>
                                      <option value="226"  >Uzbekistan</option>
                                      <option value="227"  >Vanuatu</option>
                                      <option value="228"  >Vatican City State (Holy See)</option>
                                      <option value="229"  >Venezuela</option>
                                      <option value="230"  >Viet Nam</option>
                                      <option value="231"  >Virgin Islands (British)</option>
                                      <option value="232"  >Virgin Islands (U.S.)</option>
                                      <option value="233"  >Wallis and Futuna Islands</option>
                                      <option value="234"  >Western Sahara</option>
                                      <option value="235"  >Yemen</option>
                                      <option value="237"  >Democratic Republic of Congo</option>
                                      <option value="238"  >Zambia</option>
                                      <option value="239"  >Zimbabwe</option>
                                      <option value="240"  >Jersey</option>
                                      <option value="241"  >Guernsey</option>
                                      <option value="242"  >Montenegro</option>
                                      <option value="243"  >Serbia</option>
                                      <option value="244"  >Aaland Islands</option>
                                      <option value="245"  >Bonaire, Sint Eustatius and Saba</option>
                                      <option value="246"  >Curacao</option>
                                      <option value="247"  >Palestinian Territory, Occupied</option>
                                      <option value="248"  >South Sudan</option>
                                      <option value="249"  >St. Barthelemy</option>
                                      <option value="250"  >St. Martin (French part)</option>
                                      <option value="251"  >Canary Islands</option>
                                  </select>
                              </div>
                          </div>                         
                          <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="isActive" class="form-control-label mb-1">{{ __('Estado en el sistema') }}</label>
                                <select class="form-control" id="isActive" name="isActive" required >
                                    <option value="1"  >Activo</option>
                                    <option value="0"  >Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group mb-2">
                        <label for="photo" class="form-control-label mb-1">{{ __('Avatar') }}</label>
                        <div class="@error('photo')border border-danger rounded-3 @enderror">
                            <input class="form-control" type="file" name="photo" id="photo" autocomplete="photo" autofocus>
                            @error('photo')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="photoDoc" class="form-control-label mb-1">{{ __('Documento') }}</label>
                        <div class="@error('photoDoc')border border-danger rounded-3 @enderror">
                            <input class="form-control" type="file" name="photoDoc" id="photoDoc" autocomplete="photoDoc" autofocus>
                            @error('photoDoc')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div> 
                    </div>                    
                    <div class="form-group mb-2">
                        <label for="user-email" class="form-control-label mb-1">{{ __('Email') }}</label>
                        <div class="@error('email')border border-danger rounded-3 @enderror">
                            <input class="form-control" value="" type="email" placeholder="@example.com" autocomplete="email" id="user-email" name="email">
                            @error('email')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>                   
                    <div class="form-group mb-2">
                        <label for="password" class="form-control-label mb-1">{{ __('Contraseña') }}</label>
                        <div class="@error('password')border border-danger rounded-3 @enderror">
                            <input class="form-control" value="" type="password" placeholder="Contraseña" id="password" name="password">
                            @error('password')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Guardar cambios</button>
                  </div>
              </form>
          </div>
          <div class="card-footer text-center pt-0 px-lg-2 px-1">
            <p class="mb-4 text-sm mx-auto">
                Creación masiva de cuentas desde formato .xlsx
                <a href="javascript:;" class="text-info text-gradient font-weight-bold">Aquí</a>
            </p>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>    
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endforeach

    @foreach($users as $user)
    <!-- Modal editar usuario -->
    <div class="row">
        <div class="col-md-4">      
          <div class="modal fade" id="modal-form1{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="font-weight-bolder text-info text-gradient">Editar cuenta</h3>
                                <p class="mb-0">No identificación: {{ $user->numberDoc }}</p>
                            </div>
                            <div class="my-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512"><path fill="#FFD43B" d="M96 63.4C142.5 27.3 201.6 7.3 260.5 8.8c29.6-.4 59.1 5.4 86.9 15.3-24.1-4.6-49-6.3-73.4-2.5C231.2 27 191 48.8 162.2 80.9c5.7-1 10.8-3.7 16-5.9 18.1-7.9 37.5-13.3 57.2-14.8 19.7-2.1 39.6-.4 59.3 1.9-14.4 2.8-29.1 4.6-43 9.6-34.4 11.1-65.3 33.2-86.3 62.6-13.8 19.7-23.6 42.9-24.7 67.1-.4 16.5 5.2 34.8 19.8 44a53.3 53.3 0 0 0 37.5 6.7c15.5-2.5 30.1-8.6 43.6-16.3 11.5-6.8 22.7-14.6 32-24.3 3.8-3.2 2.5-8.5 2.6-12.8-2.1-.3-4.4-1.1-6.3 .3a203 203 0 0 1 -35.8 15.4c-20 6.2-42.2 8.5-62.1 .8 12.8 1.7 26.1 .3 37.7-5.4 20.2-9.7 36.8-25.2 54.4-38.8a526.6 526.6 0 0 1 88.9-55.3c25.7-12 52.9-22.8 81.6-24.1-15.6 13.7-32.2 26.5-46.8 41.4-14.5 14-27.5 29.5-40.1 45.2-3.5 4.6-9 6.9-13.6 10.2a150.7 150.7 0 0 0 -51.9 60.1c-9.3 19.7-14.5 41.9-11.8 63.7 1.9 13.7 8.7 27.6 20.9 34.9 12.9 8 29.1 8.1 43.5 5.1 32.8-7.5 61.4-28.9 81-55.8 20.4-27.5 30.5-62.2 29.2-96.4-.5-7.5-1.6-15-1.7-22.5 8 19.5 14.8 39.7 16.7 60.8 2 14.3 .8 28.8-1.6 42.9-1.9 11-5.7 21.5-7.8 32.4a165 165 0 0 0 39.3-81.1 183.6 183.6 0 0 0 -14.2-104.6c20.8 32 32.3 69.6 35.7 107.5 .5 12.7 .5 25.5 0 38.2A243.2 243.2 0 0 1 482 371.3c-26.1 47.3-68 85.6-117.2 108-78.3 36.2-174.7 31.3-248-14.7A248.3 248.3 0 0 1 25.4 366 238.3 238.3 0 0 1 0 273.1v-31.3C3.9 172 40.9 105.8 96 63.4m222 80.3a79.1 79.1 0 0 0 16-4.5c5-1.8 9.2-5.9 10.3-11.2-9 5-18 9.9-26.3 15.7z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">                  
                        <form class="p-1 md:p-5" method="POST" enctype="multipart/form-data" action="{{ route('users-update', $user->id) }}">
                            @csrf @method('PUT')


                            <p style="font-size: 12px; margin-top: 2px;">Editar los atributos del ID: {{ $user->id }}</p>

                            <div class="row">
                             <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="name" class="form-control-label mb-1">{{ __('Nombre completo') }}</label>
                                    <div class="@error('name')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $user->name }}" type="text" placeholder="Escribe el nombre" autocomplete="name" id="name" name="name">
                                        @error('name')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="lastname" class="form-control-label mb-1">{{ __('Apellido completo') }}</label>
                                    <div class="@error('lastname')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $user->lastname }}" type="text" placeholder="Escribe el apellido" id="lastname" name="lastname">
                                        @error('lastname')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="typeDoc" class="form-control-label mb-1">{{ __('Tipo de documento') }}</label>
                                    <select class="form-control" id="typeDoc" name="typeDoc" >
                                        <option value="{{ $user->typeDoc }}">Tipo actual - {{ $user->typeDoc }}</option>
                                        <option value="Cedula" >Cédula</option>
                                        <option value="Pasaporte" >Pasaporte</option>
                                        <option value="Visa" >Visa</option>
                                        <option value="Andorra" >Andorra</option>
                                        <option value="otro" >Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="numberDoc" class="form-control-label mb-1">{{ __('Numero identificación') }}</label>
                                    <div class="@error('numberDoc')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="number" placeholder="No identificación" id="numberDoc" name="numberDoc" value="{{ $user->numberDoc }}">
                                        @error('numberDoc')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="role" class="form-control-label mb-1">{{ __('Tipo de rol') }}</label>
                                    <select class="form-control" id="role" name="role" >
                                        <option value="{{ $user->role }}" >Rol actual - {{ $user->role }}</option>
                                        <option value="user" >User</option>
                                        <option value="admin" >Administrador</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="level" class="form-control-label mb-1">{{ __('Nivel') }}</label>
                                    <select class="form-control" id="level" name="level" >
                                      <option value="{{ $user->level }}">
                                          @if($user->level == 1)
                                          Nivel actual - USUARIO
                                          @elseif($user->level == 2)
                                          Nivel actual - DIRECTOR
                                          @elseif($user->level == 3)
                                          Nivel actual - DIRECTOR JUNIOR
                                          @elseif($user->level == 4)
                                          Nivel actual - DIRECTOR SENIOR
                                          @elseif($user->level == 5)
                                          Nivel actual - VICE PRESIDENTE
                                      </option>
                                      @endif
                                      <option value="1"  >USUARIO</option>
                                      <option value="2"  >DIRECTOR</option>
                                      <option value="3"  >DIRECTOR JUNIOR</option>
                                      <option value="4"  >DIRECTOR SENIOR</option>
                                      <option value="5"  >VICE PRESIDENTE</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="phone" class="form-control-label mb-1">{{ __('Telefono') }}</label>
                                <div class="@error('phone')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="tel" placeholder="40770888444" autocomplete="phone" id="phone" name="phone" value="{{ $user->phone }}">
                                    @error('phone')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="cellphone" class="form-control-label mb-1">{{ __('Celular') }}</label>
                                <div class="@error('cellphone')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="tel" placeholder="40770888444" id="cellphone" name="cellphone" value="{{ $user->cellphone }}">
                                    @error('cellphone')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="country" class="form-control-label mb-1">{{ __('Pais') }}</label>
                                <select type="text" class="form-control" id="country" name="country" class="form-control" autocomplete="country"  required >
                                  <option value="{{ $user->country }}">País</option>
                                  <option value="1"  >Afghanistan</option>
                                  <option value="2"  >Albania</option>
                                  <option value="3"  >Algeria</option>
                                  <option value="4"  >American Samoa</option>
                                  <option value="5"  >Andorra</option>
                                  <option value="6"  >Angola</option>
                                  <option value="7"  >Anguilla</option>
                                  <option value="8"  >Antarctica</option>
                                  <option value="9"  >Antigua and Barbuda</option>
                                  <option value="10"  >Argentina</option>
                                  <option value="11"  >Armenia</option>
                                  <option value="12"  >Aruba</option>
                                  <option value="13"  >Australia</option>
                                  <option value="14"  >Austria</option>
                                  <option value="15"  >Azerbaijan</option>
                                  <option value="16"  >Bahamas</option>
                                  <option value="17"  >Bahrain</option>
                                  <option value="18"  >Bangladesh</option>
                                  <option value="19"  >Barbados</option>
                                  <option value="20"  >Belarus</option>
                                  <option value="21"  >Belgium</option>
                                  <option value="22"  >Belize</option>
                                  <option value="23"  >Benin</option>
                                  <option value="24"  >Bermuda</option>
                                  <option value="25"  >Bhutan</option>
                                  <option value="26"  >Bolivia</option>
                                  <option value="27"  >Bosnia and Herzegovina</option>
                                  <option value="28"  >Botswana</option>
                                  <option value="29"  >Bouvet Island</option>
                                  <option value="30"  >Brazil</option>
                                  <option value="31"  >British Indian Ocean Territory</option>
                                  <option value="32"  >Brunei Darussalam</option>
                                  <option value="33"  >Bulgaria</option>
                                  <option value="34"  >Burkina Faso</option>
                                  <option value="35"  >Burundi</option>
                                  <option value="36"  >Cambodia</option>
                                  <option value="37"  >Cameroon</option>
                                  <option value="38"  >Canada</option>
                                  <option value="39"  >Cape Verde</option>
                                  <option value="40"  >Cayman Islands</option>
                                  <option value="41"  >Central African Republic</option>
                                  <option value="42"  >Chad</option>
                                  <option value="43"  >Chile</option>
                                  <option value="44"  >China</option>
                                  <option value="45"  >Christmas Island</option>
                                  <option value="46"  >Cocos (Keeling) Islands</option>
                                  <option value="57"  >Colombia</option>
                                  <option value="48"  >Comoros</option>
                                  <option value="49"  >Congo</option>
                                  <option value="50"  >Cook Islands</option>
                                  <option value="51"  >Costa Rica</option>
                                  <option value="52"  >Cote D'Ivoire</option>
                                  <option value="53"  >Croatia</option>
                                  <option value="54"  >Cuba</option>
                                  <option value="55"  >Cyprus</option>
                                  <option value="56"  >Czech Republic</option>
                                  <option value="57"  >Denmark</option>
                                  <option value="58"  >Djibouti</option>
                                  <option value="59"  >Dominica</option>
                                  <option value="60"  >Dominican Republic</option>
                                  <option value="61"  >East Timor</option>
                                  <option value="62"  >Ecuador</option>
                                  <option value="63"  >Egypt</option>
                                  <option value="64"  >El Salvador</option>
                                  <option value="65"  >Equatorial Guinea</option>
                                  <option value="66"  >Eritrea</option>
                                  <option value="67"  >Estonia</option>
                                  <option value="68"  >Ethiopia</option>
                                  <option value="69"  >Falkland Islands (Malvinas)</option>
                                  <option value="70"  >Faroe Islands</option>
                                  <option value="71"  >Fiji</option>
                                  <option value="72"  >Finland</option>
                                  <option value="74"  >France, Metropolitan</option>
                                  <option value="75"  >French Guiana</option>
                                  <option value="76"  >French Polynesia</option>
                                  <option value="77"  >French Southern Territories</option>
                                  <option value="78"  >Gabon</option>
                                  <option value="79"  >Gambia</option>
                                  <option value="80"  >Georgia</option>
                                  <option value="81"  >Germany</option>
                                  <option value="82"  >Ghana</option>
                                  <option value="83"  >Gibraltar</option>
                                  <option value="84"  >Greece</option>
                                  <option value="85"  >Greenland</option>
                                  <option value="86"  >Grenada</option>
                                  <option value="87"  >Guadeloupe</option>
                                  <option value="88"  >Guam</option>
                                  <option value="89"  >Guatemala</option>
                                  <option value="90"  >Guinea</option>
                                  <option value="91"  >Guinea-Bissau</option>
                                  <option value="92"  >Guyana</option>
                                  <option value="93"  >Haiti</option>
                                  <option value="94"  >Heard and Mc Donald Islands</option>
                                  <option value="95"  >Honduras</option>
                                  <option value="96"  >Hong Kong</option>
                                  <option value="97"  >Hungary</option>
                                  <option value="98"  >Iceland</option>
                                  <option value="99"  >India</option>
                                  <option value="100"  >Indonesia</option>
                                  <option value="101"  >Iran (Islamic Republic of)</option>
                                  <option value="102"  >Iraq</option>
                                  <option value="103"  >Ireland</option>
                                  <option value="104"  >Israel</option>
                                  <option value="105"  >Italy</option>
                                  <option value="106"  >Jamaica</option>
                                  <option value="107"  >Japan</option>
                                  <option value="108"  >Jordan</option>
                                  <option value="109"  >Kazakhstan</option>
                                  <option value="110"  >Kenya</option>
                                  <option value="111"  >Kiribati</option>
                                  <option value="112"  >North Korea</option>
                                  <option value="113"  >Korea, Republic of</option>
                                  <option value="114"  >Kuwait</option>
                                  <option value="115"  >Kyrgyzstan</option>
                                  <option value="116"  >Lao People's Democratic Republic</option>
                                  <option value="117"  >Latvia</option>
                                  <option value="118"  >Lebanon</option>
                                  <option value="119"  >Lesotho</option>
                                  <option value="120"  >Liberia</option>
                                  <option value="121"  >Libyan Arab Jamahiriya</option>
                                  <option value="122"  >Liechtenstein</option>
                                  <option value="123"  >Lithuania</option>
                                  <option value="124"  >Luxembourg</option>
                                  <option value="125"  >Macau</option>
                                  <option value="126"  >FYROM</option>
                                  <option value="127"  >Madagascar</option>
                                  <option value="128"  >Malawi</option>
                                  <option value="129"  >Malaysia</option>
                                  <option value="130"  >Maldives</option>
                                  <option value="131"  >Mali</option>
                                  <option value="132"  >Malta</option>
                                  <option value="133"  >Marshall Islands</option>
                                  <option value="134"  >Martinique</option>
                                  <option value="135"  >Mauritania</option>
                                  <option value="136"  >Mauritius</option>
                                  <option value="137"  >Mayotte</option>
                                  <option value="138"  >Mexico</option>
                                  <option value="139"  >Micronesia, Federated States of</option>
                                  <option value="140"  >Moldova, Republic of</option>
                                  <option value="141"  >Monaco</option>
                                  <option value="142"  >Mongolia</option>
                                  <option value="143"  >Montserrat</option>
                                  <option value="144"  >Morocco</option>
                                  <option value="145"  >Mozambique</option>
                                  <option value="146"  >Myanmar</option>
                                  <option value="147"  >Namibia</option>
                                  <option value="148"  >Nauru</option>
                                  <option value="149"  >Nepal</option>
                                  <option value="150"  >Netherlands</option>
                                  <option value="151"  >Netherlands Antilles</option>
                                  <option value="152"  >New Caledonia</option>
                                  <option value="153"  >New Zealand</option>
                                  <option value="154"  >Nicaragua</option>
                                  <option value="155"  >Niger</option>
                                  <option value="156"  >Nigeria</option>
                                  <option value="157"  >Niue</option>
                                  <option value="158"  >Norfolk Island</option>
                                  <option value="159"  >Northern Mariana Islands</option>
                                  <option value="160"  >Norway</option>
                                  <option value="161"  >Oman</option>
                                  <option value="162"  >Pakistan</option>
                                  <option value="163"  >Palau</option>
                                  <option value="164"  >Panama</option>
                                  <option value="165"  >Papua New Guinea</option>
                                  <option value="166"  >Paraguay</option>
                                  <option value="167"  >Peru</option>
                                  <option value="168"  >Philippines</option>
                                  <option value="169"  >Pitcairn</option>
                                  <option value="170"  >Poland</option>
                                  <option value="171"  >Portugal</option>
                                  <option value="172"  >Puerto Rico</option>
                                  <option value="173"  >Qatar</option>
                                  <option value="174"  >Reunion</option>
                                  <option value="175"  >Romania</option>
                                  <option value="176"  >Russian Federation</option>
                                  <option value="177"  >Rwanda</option>
                                  <option value="178"  >Saint Kitts and Nevis</option>
                                  <option value="179"  >Saint Lucia</option>
                                  <option value="180"  >Saint Vincent and the Grenadines</option>
                                  <option value="181"  >Samoa</option>
                                  <option value="182"  >San Marino</option>
                                  <option value="183"  >Sao Tome and Principe</option>
                                  <option value="184"  >Saudi Arabia</option>
                                  <option value="185"  >Senegal</option>
                                  <option value="186"  >Seychelles</option>
                                  <option value="187"  >Sierra Leone</option>
                                  <option value="188"  >Singapore</option>
                                  <option value="189"  >Slovak Republic</option>
                                  <option value="190"  >Slovenia</option>
                                  <option value="191"  >Solomon Islands</option>
                                  <option value="192"  >Somalia</option>
                                  <option value="193"  >South Africa</option>
                                  <option value="194"  >South Georgia &amp; South Sandwich Islands</option>
                                  <option value="195"  >Spain</option>
                                  <option value="196"  >Sri Lanka</option>
                                  <option value="197"  >St. Helena</option>
                                  <option value="198"  >St. Pierre and Miquelon</option>
                                  <option value="199"  >Sudan</option>
                                  <option value="200"  >Suriname</option>
                                  <option value="201"  >Svalbard and Jan Mayen Islands</option>
                                  <option value="202"  >Swaziland</option>
                                  <option value="203"  >Sweden</option>
                                  <option value="204"  >Switzerland</option>
                                  <option value="205"  >Syrian Arab Republic</option>
                                  <option value="206"  >Taiwan</option>
                                  <option value="207"  >Tajikistan</option>
                                  <option value="208"  >Tanzania, United Republic of</option>
                                  <option value="209"  >Thailand</option>
                                  <option value="210"  >Togo</option>
                                  <option value="211"  >Tokelau</option>
                                  <option value="212"  >Tonga</option>
                                  <option value="213"  >Trinidad and Tobago</option>
                                  <option value="214"  >Tunisia</option>
                                  <option value="215"  >Turkey</option>
                                  <option value="216"  >Turkmenistan</option>
                                  <option value="217"  >Turks and Caicos Islands</option>
                                  <option value="218"  >Tuvalu</option>
                                  <option value="219"  >Uganda</option>
                                  <option value="220"  >Ukraine</option>
                                  <option value="221"  >United Arab Emirates</option>
                                  <option value="222"  >United Kingdom</option>
                                  <option value="223"  >United States</option>
                                  <option value="224"  >United States Minor Outlying Islands</option>
                                  <option value="225"  >Uruguay</option>
                                  <option value="226"  >Uzbekistan</option>
                                  <option value="227"  >Vanuatu</option>
                                  <option value="228"  >Vatican City State (Holy See)</option>
                                  <option value="229"  >Venezuela</option>
                                  <option value="230"  >Viet Nam</option>
                                  <option value="231"  >Virgin Islands (British)</option>
                                  <option value="232"  >Virgin Islands (U.S.)</option>
                                  <option value="233"  >Wallis and Futuna Islands</option>
                                  <option value="234"  >Western Sahara</option>
                                  <option value="235"  >Yemen</option>
                                  <option value="237"  >Democratic Republic of Congo</option>
                                  <option value="238"  >Zambia</option>
                                  <option value="239"  >Zimbabwe</option>
                                  <option value="240"  >Jersey</option>
                                  <option value="241"  >Guernsey</option>
                                  <option value="242"  >Montenegro</option>
                                  <option value="243"  >Serbia</option>
                                  <option value="244"  >Aaland Islands</option>
                                  <option value="245"  >Bonaire, Sint Eustatius and Saba</option>
                                  <option value="246"  >Curacao</option>
                                  <option value="247"  >Palestinian Territory, Occupied</option>
                                  <option value="248"  >South Sudan</option>
                                  <option value="249"  >St. Barthelemy</option>
                                  <option value="250"  >St. Martin (French part)</option>
                                  <option value="251"  >Canary Islands</option>
                              </select>
                          </div>
                      </div>                         
                      <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="isActive" class="form-control-label mb-1">{{ __('Estado en el sistema') }}</label>
                            <select class="form-control" id="isActive" name="isActive" required >
                                <option value="{{ auth()->user()->isActive }}">Estado actual -
                                  @if( $user->isActive == 1)
                                  Activo
                                  @elseif( $user->isActive == 0)
                                  Inactivo
                              </option>
                              @endif
                              <option value="1"  >Activo</option>
                              <option value="0"  >Inactivo</option>
                          </select>
                      </div>
                  </div>
              </div>  
              <div class="form-group mb-2">
                <label for="photo" class="form-control-label mb-1">{{ __('Avatar') }}</label>
                <div class="@error('photo')border border-danger rounded-3 @enderror">
                    <input class="form-control" type="file" name="photo" id="photo" autocomplete="photo" autofocus>
                    @error('photo')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="photoDoc" class="form-control-label mb-1">{{ __('Documento') }}</label>
                <div class="@error('photoDoc')border border-danger rounded-3 @enderror">
                    <input class="form-control" type="file" name="photoDoc" id="photoDoc" autocomplete="photoDoc" autofocus>
                    @error('photoDoc')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div> 
            </div>                    
            <div class="form-group mb-2">
                <label for="user-email" class="form-control-label mb-1">{{ __('Email') }}</label>
                <div class="@error('email')border border-danger rounded-3 @enderror">
                    <input class="form-control" value="{{ $user->email }}" type="email" placeholder="@example.com" autocomplete="email" id="user-email" name="email">
                    @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>                   
            <div class="form-group mb-2">
                <label for="password" class="form-control-label mb-1">{{ __('Contraseña') }}</label>
                <div class="@error('password')border border-danger rounded-3 @enderror">
                    <input class="form-control" value="" type="password" placeholder="Contraseña" id="password" name="password">
                    @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <p style="font-size: 12px; margin-top: 4px;">Ingrese una nueva contraseña, sólo si desea cambiar la contraseña del usuario.</p>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-2 mb-0">Guardar cambios</button>
          </div>
      </form>
    </div>
    <div class="card-footer text-center pt-0 px-lg-2 px-1">
      <p class="mb-4 text-sm mx-auto">
        Creación masiva de cuentas desde formato .xlsx
        <a href="javascript:;" class="text-info text-gradient font-weight-bold">Aquí</a>
    </p>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endforeach


    @endsection