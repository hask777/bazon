<div class="movie_item relative">
    <a href="{{ route('tv.show', $movie['id']) }}">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">

        <div class="movie_card">
              
            <div class="movie_item_overlay">
                <h2 class="title">{{$movie['name']}}</h2>
    
                <span class="year">
                    <span class="inner">Год: </span>
                    {{\Carbon\Carbon::parse($movie['first_air_date'])->format('Y') }}
                </span>
    
                <span class="rate">
                    <span class="inner">Рейтинг: </span>
                    {{$movie['vote_average']}}
                </span>
    
                <span class="orig_title">
                    <span class="inner">Назвнаие: </span>
                    {{$movie['original_name']}}
                </span>
    
                <span class="lang">
                    <span class="inner">Страна: </span>
                    {{$movie['original_language']}}
                </span>
    
          
               
                <span class="p-2 block text-orange-500">{{$movie['overview']}}</span>
                <div class="watch">
                    <span>Смотреть</span>
                </div>     
            </div>            

        </div>    
    </a>
</div>
