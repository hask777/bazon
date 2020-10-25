<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name=”robots” content=”index, follow”>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KinoZET') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @php
        $current_uri = request()->segments();
        // dump($current_uri);    
    @endphp

    @if($current_uri != NULL && $current_uri[0] === 'movie')
        
        <meta property="og:title" content="{{ $movie['original_title'] }} | {{ $movie['title'] }}" />
        <meta property="og:site_name" content="KinoZet" />
        <meta property="og:url" content="{{ route('movies.show', $movie['id']) }}" />
        <meta property="og:description" content="{{ $movie['overview'] }}" />
        <meta property="og:image" content="{{ $movie['poster_path'] }}" />

    @endif

    @if($current_uri != NULL && $current_uri[0] === 'tv')
        
        <meta property="og:title" content="{{ $movie['original_name'] }} | {{ $movie['name'] }}" />
        <meta property="og:site_name" content="KinoZet" />
        <meta property="og:url" content="{{ route('tv.show', $movie['id']) }}" />
        <meta property="og:description" content="{{ $movie['overview'] }}" />
        <meta property="og:image" content="{{ $movie['poster_path'] }}" />
        
    @endif

    <link rel="canonical" href="http://example.com/" />
    
    <link rel="stylesheet" href="{{secure_asset('css/main.css')}}">
    <link rel="stylesheet" href="{{secure_asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <livewire:styles>
    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css">
        
   
    </head>
    <body class="bg-gray-900 text-white">
       
        {{-- <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  bg-gray-800">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
    
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
    
        </div> --}}
       
        <example-component></example-component>
        <header class="border-b border-gray-800">
            <div class="header_wrapper container mx-auto  px-4 py-4 flex">
                {{-- <div class="mobile_menu_button">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div> --}}

                <div class="logo w-20%">
                    @include('layouts.header-parts.logo')
                </div>
  
                <div class="main_menu lg:w-60% mr-8 flex justify-center items-center">
                    @include('layouts.header-parts.menu')
                </div>

                <div class="authetication flex items-center justify-center">   
                    <livewire:search-dropdown>     
                </div>

                <div class="mobile_menu">
                    @include('layouts.header-parts.mobile-menu')
                </div>
        
            </div>              
        </header>

	<!-- end header -->

        @yield('content')

        <footer class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-6 flex justify-center">
                {{-- <img src="{{secure_asset('img/icons/telegram.svg')}}" alt="" class="ml-1">
                <img src="{{secure_asset('img/icons/odnaklassniki.svg')}}" alt="" class="ml-1">
                <img src="{{secure_asset('img/icons/facebook.svg')}}" alt="" class="ml-1">
                <img src="{{secure_asset('img/icons/vkontakte.svg')}}" alt="" class="ml-1"> --}}
                {{-- <img src="{{asset('img/icons/telegram.svg')}}" alt="" class="ml-1">
                <img src="{{asset('img/icons/odnaklassniki.svg')}}" alt="" class="ml-1">
                <img src="{{asset('img/icons/facebook.svg')}}" alt="" class="ml-1">
                <img src="{{asset('img/icons/vkontakte.svg')}}" alt="" class="ml-1"> --}}
                <div class="footer_logo w-100% flex justify-center">
                    @include('layouts.header-parts.logo')
                </div>
            </div>     
        </footer>

        <div class="mobile_menu_overlay">
            {{-- MD --}}
            <div class="main_menu_md container mx-auto px-4 py-6">
                @include('layouts.header-parts.menu')
            </div>
        </div>

        {{-- Mobile filter button --}}
        @include('partials.settings')

        <div class="filter_mobile_overlay">
            
            @php
                $current_uri = request()->segments();
                // dump($current_uri);    
            @endphp

            @if($current_uri != NULL && $current_uri[0] == 'tvs' || $current_uri != NULL && $current_uri[0] == 'tv')
                @include('partials.tv.mobile.left-sidebar')
            @else
                @include('partials.left-sidebar-mobile')
            @endif
            
  
        </div>

        <!-- Scripts -->
        
        <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js'> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js.map"></script>
    
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <livewire:scripts>

       
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/swiper.js')}}"></script>

        

      
    </body>
</html>
