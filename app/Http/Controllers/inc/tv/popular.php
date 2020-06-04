<?php

$popularTv = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/tv/popular?page=1&language=ru-RU')
    ->json()['results'];

