<?php

$latest = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/tv/latest?language=ru-RU')
    ->json();

// dump($latest);