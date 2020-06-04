@extends('layouts.main')

@section('content')
<div class="container flex mx-auto px-4 mt-6 mb-8">
    @include('partials.left-sidebar')
    <div class="popular_movies show w-100 md:w-80%">
        <div class="md:flex movies_header justify-between items-center">
            <h2 class='movies_header_title capitalize tracking-wider text-gray-500 text-2xl  text-center font-semibold'>{{ $movie['original_title'] }} | {{ $movie['title'] }}</h2>        
        </div>

        <div class="sm:flex mx-auto mt-6 momvie-info border-b border-gray-800">
            {{-- Poster --}}
                <div class="movie_item_poster mb-10">
                    <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" alt="parasite" class='w-100 sm:w-64 lg:w-96' >                     
                </div>
            {{-- End Poster --}}
            {{-- Movie --}}
            <div class="container flex flex-col md:flex-row">
                <div class="movie_content sm:ml-8 md:ml-8">

                    <div class="text-gray-400 text-sm">
                        {{-- raiting --}}
                        @php
                            $ave = $movie['vote_average']*10
                        @endphp

                        <div class="raiting flex items-center">
                            <span class='text-white font-semibold text-gray-500'>Рэйтинг:</span>                        
                            <div class="show_movie_percent ml-3" 
                                @php  if($ave < 25){echo 'style="border: 3px solid rgb(250, 45, 90)"';} @endphp
                                @php  if($ave < 50){echo 'style="border: 3px solid rgb(230, 211, 42)"';} @endphp
                                @php  if($ave < 75){echo 'style="border: 3px solid rgb(55, 192, 37)"';} @endphp
                                @php  if($ave < 85){echo 'style="border: 3px solid rgb(37, 161, 192)"';} @endphp
                                @php  if($ave < 100){echo 'style="border: 3px solid rgb(148, 37, 192)"';} @endphp
                            >
                                <div class="number">
                                    <h2>{{$ave}}<span>%</span></h2>
                                    
                                </div>
                            </div>
                        </div>     
                        {{-- end raiting --}}
                        {{-- movie date --}}
                        <div class="date mt-1">
                            <span class='date_head text-white font-semibold text-gray-500'>Дата релиза:</span>
                            @if(!empty($movie['release_date']))
                                <span class="date_content ml-4 text-white text-xs">{{ $movie['release_date'] }}</span>
                            @endif
                            
                        </div>      
                        {{-- end movie date --}}
                        {{-- movie genres --}}
                        <div class="genres mt-2">
                            <span class='genres_head text-white font-semibold text-gray-500'>Жанр:</span>
                                <span class="genres_content ml-4 text-xs font-medium text-white">
                                @foreach ($movie['genres'] as $genre)
                                    {{ $genre['name'] }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </span>
                        </div>     
                        {{-- end movie genres --}}
                    </div>
                     {{-- casts --}}
                     <div class="casts flex mt-2 text-sm">
                        <div class="casts_head text-white font-semibold text-gray-500">Роли:</div>
                        <div class="casts_content ml-3 text-xs font-medium">
                            
                                @if(!empty($videos['info']))
                                    <h3> {{$videos['info']['actors']}}</h3> 
                                @else 
                                    @foreach ($movie['credits']['cast'] as $cast)
                                    
                                            @if ($loop->index < 5)
                                                <h3> {{$cast['name']}}</h3>                                     
                                            @endif
                                                
                                    @endforeach                                        
                                @endif
                                                                    
                        </div>
                    </div>
                    {{-- end casts --}}
                    {{-- movie overview --}}
                    <div class="overview flex mt-2 text-sm">
                        @if(!empty($movie['overview']))
                        <span class='overview_head text-white font-semibold text-gray-500'>Описание:</span>
                            <p class="overview_content text-gray-300  text-xs ml-4 font-medium">
                                {{ $movie['overview'] }}
                            </p>
                        @endif
                    </div>
                    
                    {{-- end movie overview --}}
                   
                    <div class="mt-12 pb-12">
                        @if(count($movie['videos']['results']) > 0 && $videos != 'NO')
                            <button id="play_trailer" class="flex inline-flex items-center  rounded font-semibold px-2 py-4"> 
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                                    <span class="ml-2">Смотреть Трэйлер</span>
                            </button>

                            <button id="play_movie" class="flex inline-flex items-center  rounded font-semibold px-2 py-4">
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                <span class="ml-2">Смотреть Фильм</span>
                            </button>

                            <div class="youtube">
                                <iframe class="" src="https://www.youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>

                            <div class="videocdn hide">
                                @if(!empty($videos))
                                    <iframe src="{{$videos['link']}}"  frameborder="0" allowfullscreen></iframe>
                                @endif               
                            </div>   
                        @endif

                        @if(count($movie['videos']['results']) == 0 && $videos != 'NO')
                            <button id="play_movie" class="flex inline-flex items-center  rounded font-semibold px-2 py-4">
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                <span class="ml-2">Смотреть Фильм</span>
                            </button>

                            <div class="videocdn">
                                @if(!empty($videos))
                                    <iframe src="{{$videos['link']}}"  frameborder="0" allowfullscreen></iframe>
                                @endif 
                            </div>
                            
                            {{-- <iframe src="{{$bazon[0]['link']}}"  frameborder="0" allowfullscreen></iframe> --}}
                        @endif

                        @if(count($movie['videos']['results']) > 0 && $videos == 'NO')
                            <button id="play_trailer" class="flex inline-flex items-center  rounded font-semibold px-6 py-4">         
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                                    <span class="ml-2">Трэйлер</span>
                            </button>

                            <div class="youtube">
                                <iframe class="" src="https://www.youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            
                            {{-- <iframe src="{{$bazon[0]['link']}}"  frameborder="0" allowfullscreen></iframe> --}}
                        @endif
                    </div>
                    {{-- end casts --}}
                </div>
            </div>
        </div>
        {{-- end  --}}
       @include('partials.show.recomendations')
       @include('partials.show.recomendations_mobile')

    </div>
</div>

@endsection
