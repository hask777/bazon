@extends('layouts.main')

@section('content')
    <div class="container flex mx-auto px-4 mt-6 mb-8">
        @include('partials.left-sidebar')
        <div class="popular_movies w-80%">
            <div class="movies_header md:flex items-center">
                 
                <h2 class='movies_header_title tracking-wider text-gray-500 text-2xl  text-center font-semibold'>
                    <a href="">
                        Cкоро
                    </a>    
                </h2>
                
            </div>

            <div class="flex mt-5 mb-5">
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 row-gap-5">
                    @foreach($future_paginate as $movie)
                        <x-movie-card :movie="$movie" :genres="$genres"/>
                    @endforeach
                            
                </div>
            </div>

            <div class="movie_page_pagination">

                {{ $future_paginate->links() }}
                
            </div>

        </div>
    </div>
    
@endsection
