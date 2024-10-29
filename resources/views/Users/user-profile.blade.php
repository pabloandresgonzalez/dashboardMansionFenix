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

<div class="container-fluid">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/Capture3.png'); background-position-y: 55%;">
            <span class="mask  opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        @if($user->photo)
                            <img src="{{ route('user.avatar', ['filename' => $user->photo]) }}" class="w-100 border-radius-lg shadow-sm">
                        @elseif(!$user->photo)
                            <img src="../assets/img/bruce-mars1.jpg" alt="..." class="w-100 border-radius-lg shadow-sm">
                        @endif
                        
                        <a href="javascript:;" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                            <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
                        </a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->name }} {{ auth()->user()->lastname }} 
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                    role="tab" aria-controls="overview" aria-selected="true">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 640 512" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-2319.000000, -291.000000)"
                                                fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity"
                                                    transform="translate(1716.000000, 291.000000)">
                                                    <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                                                        <path class="color-background" d="M64 64a64 64 0 1 1 128 0A64 64 0 1 1 64 64zM25.9 233.4C29.3 191.9 64 160 105.6 160l44.8 0c27 0 51 13.4 65.5 34.1c-2.7 1.9-5.2 4-7.5 6.3l-64 64c-21.9 21.9-21.9 57.3 0 79.2L192 391.2l0 72.8c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-115.7c-26.5-9.5-44.7-35.8-42.2-65.6l4.1-49.3zM448 64a64 64 0 1 1 128 0A64 64 0 1 1 448 64zM431.6 200.4c-2.3-2.3-4.9-4.4-7.5-6.3c14.5-20.7 38.6-34.1 65.5-34.1l44.8 0c41.6 0 76.3 31.9 79.7 73.4l4.1 49.3c2.5 29.8-15.7 56.1-42.2 65.6L576 464c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-72.8 47.6-47.6c21.9-21.9 21.9-57.3 0-79.2l-64-64zM272 240l0 32 96 0 0-32c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2l64 64c9.4 9.4 9.4 24.6 0 33.9l-64 64c-6.9 6.9-17.2 8.9-26.2 5.2s-14.8-12.5-14.8-22.2l0-32-96 0 0 32c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-64-64c-9.4-9.4-9.4-24.6 0-33.9l64-64c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2z" id="Path"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">Referidos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-controls="teams" aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 576 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>document</title>
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                                    <g id="document" transform="translate(154.000000, 300.000000)">
                                                        <path class="color-background" d="M248 0L208 0c-26.5 0-48 21.5-48 48l0 112c0 35.3 28.7 64 64 64l128 0c35.3 0 64-28.7 64-64l0-112c0-26.5-21.5-48-48-48L328 0l0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80zM64 256c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l160 0c35.3 0 64-28.7 64-64l0-128c0-35.3-28.7-64-64-64l-40 0 0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80-40 0zM352 512l160 0c35.3 0 64-28.7 64-64l0-128c0-35.3-28.7-64-64-64l-40 0 0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80-40 0c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2l0 160c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z" id="Shape"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">Fondos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-controls="dashboard" aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>settings</title>
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                                    <g id="settings" transform="translate(304.000000, 151.000000)">
                                                        <polygon class="color-background" id="Path" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                        </polygon>
                                                        <path class="color-background" d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L80 128c-8.8 0-16-7.2-16-16s7.2-16 16-16l368 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L64 32zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/>          
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">Wallet</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Información de perfil') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="/user-profile" enctype="multipart/form-data" method="POST" role="form text-left">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-control-label">{{ __('Nombre completo') }}</label>
                                <div class="@error('name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ auth()->user()->name }}" type="text" placeholder="Name" id="name" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname" class="form-control-label">{{ __('Apellido completo') }}</label>
                                <div class="@error('lastname')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ auth()->user()->lastname }}" type="text" placeholder="lastName" id="lastname" name="lastname">
                                        @error('lastname')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone" class="form-control-label">{{ __('Telefono') }}</label>
                                <div class="@error('phone')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="tel" placeholder="40770888444" id="phone" name="phone" value="{{ auth()->user()->phone }}">
                                        @error('phone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cellphone" class="form-control-label">{{ __('Celular') }}</label>
                                <div class="@error('cellphone')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="tel" placeholder="40770888444" id="cellphone" name="cellphone" value="{{ auth()->user()->cellphone }}">
                                        @error('cellphone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country" class="form-control-label">{{ __('Pais') }}</label>
                                <select type="text" class="form-control" id="country" name="country" class="form-control" required >
                                  <option value="{{ auth()->user()->country }}">País</option>
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
                            <label for="photo" class="form-control-label mb-1">{{ __('Avatar') }}</label>
                            <div class="@error('photo')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="file" name="photo" id="photo" autocomplete="photo" >
                                @error('photo')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="photoDoc" class="form-control-label mb-1">{{ __('Documento') }}</label>
                            <div class="@error('photoDoc')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="file" name="photoDoc" id="photoDoc" autocomplete="photoDoc" >
                                @error('photoDoc')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div> 
                        </div> 
                    </div>      
                    <div class="form-group">
                        <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                        <div class="@error('email')border border-danger rounded-3 @enderror">
                            <input class="form-control" value="{{ auth()->user()->email }}" type="email" placeholder="@example.com" id="user-email" name="email">
                                @error('email')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label for="password" class="form-control-label">{{ __('Contraseña') }}</label>
                        <div class="@error('password')border border-danger rounded-3 @enderror">
                            <input class="form-control" value="" type="password" placeholder="Nueva contraseña" id="password" name="password">
                            @error('password')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <p style="font-size: 12px; margin-top: 4px;">Ingrese una nueva contraseña, sólo si desea cambiar la contraseña del usuario.</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Guardar cambios' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection