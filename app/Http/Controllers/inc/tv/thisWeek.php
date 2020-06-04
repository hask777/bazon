<?php

$thisWeek = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/tv/on_the_air?page=1&language=ru-RU')
    ->json()['results'];

// dump($thisWeek);