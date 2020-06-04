@extends('layouts.main')

@section('content')
@php
    // echo \Request::url();
    // // echo url()->url();
    // echo url()->current();
    // echo url()->full();
@endphp
    <div class="container flex mx-auto px-4 mt-6 mb-8">

        @include('partials.tv.left-sidebar-index')


        <div class="popular_movies w-80%">
            <div class="flex movies_header justify-between items-center">
                <h2 class='movies_header_title capitalize tracking-wider text-orange-500 text-2xl  text-center font-semibold'>Сейчас смотрят:</h2> 
                   
                @include('partials.styles')
                
            </div>

            <div class="flex mt-5 mb-5">
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($today_paginate as $movie)
                    <div class="swiper-slide">
                        <x-tv-card :movie="$movie" :genres="$genres"/>
                    </div>
                    
                @endforeach             
                </div>        
            </div>

            <div class="movie_page_pagination">
                {{ $today_paginate->links() }}
            </div>
        </div>
    </div>
@endsection
