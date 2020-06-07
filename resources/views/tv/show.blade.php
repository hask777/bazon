@extends('layouts.main')

@section('content')
<div class="container flex mx-auto px-4 mt-6 mb-8">
    @include('partials.tv.left-sidebar-index')
   
    <div class="popular_movies show w-100 md:w-80%">
        <div class="md:flex movies_header justify-between items-center">
            <div class="md:flex movies_header justify-between items-center">
                <h2 class='movies_header_title capitalize tracking-wider text-orange-500 text-2xl  text-center font-semibold'>{{ $movie['original_name'] }} | {{ $movie['name'] }}</h2>        
            </div>        
        </div>

        <div class="sm:flex mx-auto mt-6 momvie-info border-b border-gray-800">
            {{-- Poster --}}
                 
            <div class="movie_item_poster mb-10">
                @if ($movie['poster_path'])
                    <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" alt="parasite" class='w-100 sm:w-64 lg:w-96' >         
                @else
                    <img src="http://placehold.jp/2d3748/a0aec0/500x750.jpg?text=poster" alt="parasite" class='w-100 sm:w-64 lg:w-96'>
                @endif                    
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
                            @if(!empty($movie['first_air_date']))
                                <span class="date_content ml-4 text-white text-xs">{{ $movie['first_air_date'] }}</span>
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
                                    @foreach ($credits['cast'] as $cast)
                                    
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
                        @if($videos != 'NO' && $videocdn_tv != 'NO')

                            <button id="tv_play_movie" class="flex inline-flex items-center bg-gray-800 text-gray-100 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                <span class="ml-2">Плеер 1</span>
                            </button>

                            <button id="tv_play_movie" class="flex inline-flex items-center bg-gray-900 text-gray-100 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                <span class="ml-2">Плеер 2</span>
                            </button>

                            @if(!empty($videocdn_tv['preview_iframe_src']))                              
                                <div class="videocdn_tv">
                                    <iframe src="{{$videocdn_tv['preview_iframe_src']}}"  frameborder="0" allowfullscreen></iframe>
                                </div>
                            @endif

                            @if(!empty($videos['link']))            
                                <div class="videocdn_tv bazon_tv">
                                    <iframe src="{{$videos['link']}}"  frameborder="0" allowfullscreen></iframe>
                                </div>
                            @endif 

                        @elseif($videos == 'NO' && $videocdn_tv != 'NO')

                            <button id="tv_play_movie" class="flex inline-flex items-center bg-gray-800 text-gray-100 rounded font-semibold px-5 py-4">
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                <span class="ml-2">Смотреть сериал</span>
                            </button>

                            @if(!empty($videocdn_tv['preview_iframe_src']))                              
                                <div class="videocdn_tv">
                                    <iframe src="{{$videocdn_tv['preview_iframe_src']}}"  frameborder="0" allowfullscreen></iframe>
                                </div>
                            @endif

                        @elseif($videos != 'NO' && $videocdn_tv == 'NO')

                            <button id="tv_play_movie" class="flex inline-flex items-center bg-gray-800 text-gray-100 rounded font-semibold px-5 py-4">
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                <span class="ml-2">Смотреть сериал</span>
                            </button>

                            @if(!empty($videos['link']))            
                                <div class="videocdn_tv bazon_tv">
                                    <iframe src="{{$videos['link']}}"  frameborder="0" allowfullscreen></iframe>
                                </div>
                            @endif

                        @endif
                       

                       
                    </div>
                    {{-- end casts --}}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
