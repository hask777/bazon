<?php 

$futureMovies = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/movie/upcoming?append_to_response=&language=ru')
    ->json()['results'];

$sidebarFutureMovies = collect($futureMovies)->random(4);    
