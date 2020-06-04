@extends('layouts.main')

@section('content')

    <div class="container flex mx-auto px-4 mt-6 mb-8">

        @include('partials.left-sidebar')

        <div class="popular_movies w-80%">
            <div class="flex movies_header items-center">
                         
                <h2 class='movies_header_title capitalize tracking-wider text-gray-500 text-2xl  text-center font-semibold'>
                    <a href="">
                        Рейтинг {{$movie_raiting}}
                    </a>    
                </h2>
                
            </div>

            <div class="flex mt-5 mb-5">
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 row-gap-5">
                    @foreach($average_paginate as $movie)
                        <x-movie-card :movie="$movie" :genres="$genres"/>
                    @endforeach              
                </div>        
            </div>

            <div class="movie_page_pagination">
                @php
                    if( !empty($_GET['movie_raiting'] )){         
                        $movie_raiting = $_GET['movie_raiting'];        
                    }

                    $params = ['movie_raiting' => $movie_raiting];
                @endphp
                {{ $average_paginate->appends($params)->links() }}
            </div>
        </div>
    </div>
   
@endsection