<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{secure_asset('css/main.css')}}">
    <link rel="stylesheet" href="{{secure_asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <livewire:styles>
    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
        
   
    </head>
    <body class="bg-gray-900 text-white">
       

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
                <img src="{{asset('img/icons/telegram.svg')}}" alt="" class="ml-1">
                <img src="{{asset('img/icons/odnaklassniki.svg')}}" alt="" class="ml-1">
                <img src="{{asset('img/icons/facebook.svg')}}" alt="" class="ml-1">
                <img src="{{asset('img/icons/vkontakte.svg')}}" alt="" class="ml-1">
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

            @if($current_uri != NULL && $current_uri[0] == 'tvs')
                @include('partials.tv.mobile.left-sidebar')
            @else
                @include('partials.left-sidebar-mobile')
            @endif
            
  
        </div>

        
        <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js'> </script>
        <script src="https://unpkg.com/swiper/js/swiper.js"></script>
        <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <livewire:scripts>

       
        <script type="text/javascript" src="{{secure_asset('js/main.js')}}"></script>
        <script type="text/javascript" src="{{secure_asset('js/swiper.js')}}"></script>
        {{-- <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/swiper.js')}}"></script> --}}

      
    </body>
</html>
