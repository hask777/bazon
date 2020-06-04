<form action="{{route('average.index')}}" method="get">
    <label for="movie_raiting">0</label>
    <input type="range" min="0" max="10" name="movie_raiting" id="movie_raiting">
    <label for="movie_raiting" id="movie_raiting_value" >10</label>
    <button type="submit" class="mt-3">найти</button>     
</form>