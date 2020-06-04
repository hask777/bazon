
@php
    $ave = $movie['vote_average']*10
@endphp
<div class="movie_item relative">
    
    <div class="percent" 
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
    <a href="{{ route('movies.show', $movie['id']) }}">
        @if ($movie['poster_path'])
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
        @else
            <img src="http://placehold.jp/2d3748/a0aec0/500x750.jpg?text=poster" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
        @endif
        
        <div class="movie_card">         
            <div class="movie_item_overlay">
                {{-- <h2 class="title">{{$movie['title']}}</h2> --}}
    
                {{-- <span class="year">
                    <span class="inner">Год: </span>
                    {{\Carbon\Carbon::parse($movie['release_date'])->format('Y') }}
                </span> --}}
    
                {{-- <span class="rate">
                    <span class="inner">Рейтинг: </span>
                    {{$movie['vote_average']}}
                </span> --}}
    
                {{-- <span class="orig_title">
                    <span class="inner">Назвнаие: </span>
                    {{$movie['original_title']}}
                </span> --}}
    
                {{-- <span class="lang">
                    <span class="inner">Страна: </span>
                    {{$movie['original_language']}}
                </span> --}}
    
                {{-- <span class="genre">
                    <span class="inner">Жанры: </span>
                    @foreach ($movie['genre_ids'] as $genre)
                
                        @foreach($genres as $key => $value) 
                            @if($key === $genre)
                                {{$value}}
                            @endif
                        @endforeach
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </span> --}}
               
                {{-- <span class="p-2 block text-orange-500">{{$movie['overview']}}</span> --}}
                <div class="watch">
                    <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 512 512" height="64px" id="Layer_1" version="1.1" viewBox="0 0 512 512" width="64px" fill="rgb(66, 153, 225)" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M256,512C114.625,512,0,397.375,0,256C0,114.609,114.625,0,256,0s256,114.609,256,256C512,397.375,397.375,512,256,512z   M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.03,0,192-85.969,192-192S362.031,64,256,64z M192,160l160,96l-160,96  V160z" /></svg>
                </div>     
            </div>            
        </div>    
    </a>
    <div class="flex justify-between px-2 py-2">
        <h2 class="title">{{mb_strimwidth($movie['title'], 0, 18, "...")}}</h2>
        <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('Y') }}</span>
    </div>
   
</div>




