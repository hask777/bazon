@extends('layouts.main')

@section('content')
@php
    // echo \Request::url().'<br>';
    // // // echo url()->url();
    // // echo url()->current().'<br>';
    // // echo url()->full();
    // if (request()->is('countries/country')) {
    //     echo 'eee';
    // }else{
    //     echo 'rrr';
    // }
@endphp
   
    <div class="container flex mx-auto px-4 mt-6 mb-8">
        @include('partials.tv.left-sidebar-index')
        
        <div class="popular_movies w-80%">
            <div class="flex movies_header justify-between items-center">
            <h2 class='movies_header_title tracking-wider text-orange-500 text-2xl  text-center font-semibold'>Страна: {{$country_name}}</h2>
            
            @include('partials.styles')

            </div>

            <div class="fflex mt-5 mb-5">
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($country_paginate as $movie)
                        <x-tv-card :movie="$movie" :genres="$genres"/>
                    @endforeach                  
                </div>
            </div>

            <div class="movie_page_pagination">

                @php
                    if( !empty($_GET['country_id'] || !empty($_GET['country_name']))){         
                        $country_id = $_GET['country_id'];
                        $country_name = $_GET['country_name'];
                    
                    }

                    $params = ['country_id' => $country_id, 'country_name' => $country_name];
                @endphp

                {{ $country_paginate->appends($params)->links() }}

            </div>
        </div>
    </div>
    
@endsection