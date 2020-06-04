<div class="filter">

    <div class=" bg-gray-800 p-4">
        <h3 class="font-bold text-gray-500 text-center mb-4">
            <a href="{{route('future.index')}}">
                Скоро на экранах
            </a>
        </h3>
        <div class="future_movie">
            @foreach($sidebarFutureMovies as $movie)
                <x-future-movie-card :movie="$movie" :genres="$genres"/>
            @endforeach
            <a href="{{route('future.index')}}" class="block text-center">Смотреть все</a>
        </div>
       
    </div>
</div>
<style>

    .future_movie  .movie_item{
        max-width: 7.5rem;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 1rem;
    }
    .future_movie a img{ 
       /* max-width: 7.5rem; */
    }
</style>
