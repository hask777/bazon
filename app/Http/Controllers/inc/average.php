<?php

if(!empty($_GET['movie_raiting'])){         
    $movie_raiting = $_GET['movie_raiting'];    
}

 $average = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/discover/movie?vote_average.lte='.$movie_raiting.'&page=1&language=ru-RU')
    ->json()['results'];
    // dump($average);