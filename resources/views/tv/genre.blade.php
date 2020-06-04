@extends('layouts.main')

@section('content')
    <div class="container flex mx-auto px-4 mt-6 mb-8">

        @include('partials.tv.left-sidebar-index')
        
        <div class="popular_movies w-80%">
            <div class="flex movies_header justify-between items-center">
                <h2 class='movies_header_title tracking-wider text-orange-500 text-2xl  text-center font-semibold'>Жанр:
                    @if(!empty($genre_name))
                       {{$genre_name}}
                    @endif
                    </h2> 
                
                    @include('partials.styles')             
            </div>

            <div class="flex mt-5 mb-5">
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($genres_paginate as $movie)
                        <x-tv-card :movie="$movie" :genres="$genres"/>
                    @endforeach
                </div>
            </div>

            <div class="movie_page_pagination">

                @php
                if(!empty($_GET['genre_id']) || !empty($_GET['genre_name'])){         
                    $genre_id = $_GET['genre_id'];
                    $genre_name = $_GET['genre_name'];
                }

                    $params = ['genre_id' => $genre_id, 'genre_name' => $genre_name,];
                @endphp

                {{ $genres_paginate->appends($params)->links() }}


            </div>
        </div>
    </div>
    
@endsection
