<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <title>Ballina - Fotoprinteri</title>
        <meta charset="utf-8">


        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <script src="/js/app.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href={{ URL::asset('css/style-fp.css'); }} >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link href="/css/app.css" rel="stylesheet">
        <script src="/livewire/livewire.js"></script>

    </head>

    <body style="background-image: url('images/background-01.jpg');">
    <div class="w3-row">
        <div class="logo-place">
            <a  href="/">
                <img src="images/fotoprinteri_logo.png" class="logo">
            </a>
        </div>

        <div id="app">

            <nav class="navbar navbar-expand-md">
                <div class="container">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('KYQU') }}</a>
                                    </li>
                                @endif


                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('REGJISTROHU') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    {{-- <form method="POST" action="{{ route('logout') }}">
                                      @csrf
                                      <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                               <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                                       </x-jet-dropdown-link>
                                    </form> --}}


                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('CKYQU') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
      </div>
      <div class ="h-96" style="margin-top:-25px">
        <div class="w3-quarter">
          <br>
            <div class="menu">
             <nav class="navbar">
               <ul class="navbar-nav list-group">
                  <li class="nav-item text-center list-group-item">
                      <a class="nav-link" href="/">Ballina</a>
                  </li>
                  <li class="nav-item text-center list-group-item">
                    <a class="nav-link"href="{{ route('dergo.fotografite') }}">Dërgo fotografitë</a>
                  </li>
                  <li class="nav-item text-center list-group-item">
                      <a class="nav-link" href="/llogaria">Llogaria</a>
                  </li>
                  <li class="nav-item text-center list-group-item">
                      <a class="nav-link" href="/porosit">Porosit e mia</a>
                  </li>
                  <li class="nav-item text-center list-group-item">
                    <a class="nav-link" href="/rreth-nesh">Rreth nesh</a>
                </li>
                {{-- <li class="nav-item text-center list-group-item">
                <a class="nav-link" href="/albums">Albums</a>
                </li> --}}
               </ul>
            </nav>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <ul class="social text-center">
            <a style="color:white;" class="nav-link" href="/privatesia-kushtet">Privatësia dhe Kushtet e përdorimit</a>
           </ul>
           <br>
         </div>
        </div>

        <div class="w3-rest">
          <br>
             <div class="w3-row">
                    <div class="w3-col s4">
                    <img class="transform bg-blue-400  hover:bg-blue-600 transition duration-500 hover:scale-150" src="images/1.jpg">
                    </div>
                    <div class="w3-col s4">
                    <img class="transform bg-blue-400  hover:bg-blue-600 transition duration-500 hover:scale-125" src="images/2.jpeg">
                    </div>
                    <div class="w3-col s4">
                    <img class="transform bg-blue-400  hover:bg-blue-600 transition duration-500 hover:scale-125" src="images/3.jpeg">
                    </div>
             </div>

             <div class="w3-row">
                 <div class="w3-col s4">
                   <img class="transform bg-blue-400  hover:bg-blue-600 transition duration-500 hover:scale-125" src="images/5.jpeg">
                 </div>
                 <div class="w3-col s4 bg">
                    <img class="transform bg-blue-400  hover:bg-blue-600 transition duration-500 hover:scale-125" src="images/12.jpeg">
                 </div>
                 <div class="w3-col s4">
                   <img class="transform  bg-blue-400 hover:bg-blue-600 transition duration-500 hover:scale-125" src="images/8.jpeg">
                 </div>
             </div>
        </div>
      </div>
    </body>
</html>
