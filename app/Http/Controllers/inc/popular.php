<?php

$popularMovies = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/movie/popular?page=1&language=ru-RU')
    ->json()['results'];