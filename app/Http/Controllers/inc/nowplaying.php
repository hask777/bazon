<?php

$nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/movie/now_playing?append_to_response=&language=ru')
    ->json()['results'];