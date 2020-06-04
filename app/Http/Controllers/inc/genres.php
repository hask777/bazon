<?php 

$genresArray = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/genre/movie/list?append_to_response=&language=ru')
    ->json()['genres'];

$genres = collect($genresArray)->mapWithKeys(function($genre){
    return [$genre['id'] => $genre['name']];
});

