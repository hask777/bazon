@extends('layouts.main')

@section('content')
<div class="container flex mx-auto px-4 mt-6 mb-8">
    @include('partials.tv.left-sidebar-index')
   
    <div class="popular_movies w-100 md:w-80%">
        <div class="md:flex movies_header justify-between items-center">
            <h2 class='movies_header_title capitalize tracking-wider text-orange-500 text-2xl  text-center font-semibold'>{{ $movie['name'] }}</h2>        
        </div>

        <div class="sm:flex mx-auto mt-6 momvie-info border-b border-gray-800">
            {{-- Poster --}}
                <div class="movie_item_poster">
                    <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" alt="parasite" class='w-100 sm:w-64 lg:w-96' >                     
                </div>
            {{-- End Poster --}}
            {{-- Movie --}}
            <div class="container flex flex-col md:flex-row">
                <div class="sm:ml-8 md:ml-8">
                    {{-- Movie Title --}}
                    <h2 class='text-4xl font-semibold'>{{ $movie['name'] }}</h2>
                    {{-- End Movie Title --}}
                    <div class="flex flex-wrap items-center text-gray-400 text-sm">
                        {{-- Movie raiting --}}
                        <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>          
                        <span class="ml-1">{{ $movie['vote_average'] * 10 . '%' }}</span>
                        {{-- end raiting --}}
                        <span class="mx-2">|</span>
                        {{-- movie date --}}
                        {{-- <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span> --}}
                        {{-- end movie date --}}
                        <span class="mx-2">|</span>
                        {{-- movie genres --}}
                        <span>
                            @foreach ($movie['genres'] as $genre)
                                {{ $genre['name'] }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </span>
                        {{-- end movie genres --}}
                    </div>
                    {{-- movie overview --}}
                        <p class="text-gray-300 mt-8">
                            {{ $movie['overview'] }}
                        </p>
                    {{-- end movie overview --}}
                    {{-- casts --}}
                    <div class="mt-12">
                        <h4 class="text-white font-semibold">В главных ролях</h4>
                        <div class="flex mt-4">
                            {{-- @foreach ($movie['credits']['crew'] as $crew)
                                @if ($loop->index < 2)
                                    <div class="mr-8">
                                        <div class="">
                                            {{$crew['name']}}
                                        </div>
                                        <div class="text-sm text-gray-400">
                                            {{$crew['job']}}
                                        </div>
                                    </div>
                                @endif
                            @endforeach --}}
                        </div>
                    </div>
                    {{-- end casts --}}
                    <div class="mt-12 pb-12">
                       
                        {{-- <button id="play_movie" class="flex inline-flex items-center bg-orange-500 teext-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">

                            <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                            <span class="ml-2">Смотреть Фильм</span>
                        </button> --}}
                          
                        @if($videos == 'NO')
                            <div class="videocdn_tv">
                                <span> Нет фильма!</span>                       
                            </div>              
                        @else
                            <div class="videocdn_tv">
                                <iframe src="{{$videos['preview_iframe_src']}}"  frameborder="0" allowfullscreen></iframe>
                            </div>
                        @endif        
                    </div>
                    {{-- end casts --}}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
