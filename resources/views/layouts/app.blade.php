<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('name', 'Healthcare') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{asset('resources/css/app.css')}}" >
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('name', 'Healthcare') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                      
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('doctors')}}">Our doctors</a>
                        </li>
                        @if( !(Auth::check()) )

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('doctor.login')}}">You are a practitioner?</a>
                        </li>
                        @endif
                        @if( Auth::guard('medecin')->check() )
                           <li class="nav-item">
                            <a class="nav-link" href="{{route('medecin.logout')}}">log out</a>
                           </li>
                        
                        @endif

                        @if(Auth::check() && Auth::user()->role === 1)
                           <li class="nav-item ">
                           <a class="nav-link" href="/medecins">All doctors</a>
                           </li>
                        @endif
                        @if(Auth::check() && Auth::user()->role === 1)
                            <li class="nav-item ">
                            <a class="nav-link" href="{{route('feedback')}}">Users Feedback</a>
                            </li>
                        @endif                        
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login') && !(Auth::guard('medecin')->check()))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register') && !(Auth::guard('medecin')->check()))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4 ">
            @yield('content')
        </main>
        <footer class=" pt-5 pb-5 text-white-50 text-md-start text-center  ">
            <div class="container">
              <div class="row">
                <div class="col-md-6 col-lg-4">
                  <div class="info">
                    <a href="#" class="btn rounded-pill main-btn bg-info mr-3"><h3>HealthCare</h3></a>
                    <p class="mb-5 text-black-50 ">Welcome to our health application, 
                        you can book an appointment from your prefered doctor</p>
                  </div>
                  <div class="copyright text-black ">
                    Created By<span class="copyright text-black-50"> Fatima</span>
                    <div>&copy; 2023 - <span class="text-black-50"">app</span></div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-2">
                 <div class="links">
                  <div class="text-light ">
                  <h5 class="text-black">Links</h5>
                  <ul class="list-unstyled lh-lg">
                    <li class="text-black-50 "><a href="/home">Home</a></li>
                    <li class="text-black-50"><a href="#services">Our Services</a></li>
                  </ul>
                  </div>
                 </div> 
                </div>
                <div class="col-md-6 col-lg-2">
                  <div class="links">
                   <div class="text-light ">
                   <h5 class="text-black">About</h5>
                   <ul class="list-unstyled lh-lg ">
                     <li class="text-black-50 "><a href="/login">Sign In</a></li>
                     <li class="text-black-50 "><a href="/allmedecins">Our doctors</a></li>
                     <li class="text-black-50 "><a href="mailto:appointment66gld2002@gmail.com">Contact Us</a></li>
                   </ul>
                   </div>
                  </div> 
                 </div>
                 <div class="col-md-6 col-lg-4">
                  <div class="contact">
                    <h5 class="text-black"> Contact Us</h5>
                    <p class=" mb-4 mt-4 text-black-50"> Get in touch with us via mail .We are waiting for
                       your message</p>
                    <a href="#" class="btn rounded-pill main-btn bg-info text-black">appointment66gld2002@gmail.com</a>
                  <ul class="list-unstyled d-flex mt-3 gap-3 ">
                   <li> <a class="d-block text-light" href="#">
                    <i class="fa-brands fa-facebook facebook"></i>
                   </a></li>
                   <li> <a class="d-block text-light" href="#">
                    <i class="fa-brands fa-instagram instagram"></i>
                   </a></li>
                   <li><a class="d-block text-light" href="#">
                    <i class="fa-brands fa-linkedin linkedin"></i>
                   </a></li>
                   <li><a class="d-block text-light" href="#">
                    <i class="fa-brands fa-youtube youtub"></i>
                   </a></li>
                  </ul> 
                  </div>
                 </div>
              </div>
            </div>
        </footer>
        
    </div>
</body>
</html>
