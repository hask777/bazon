<?php

$toDay = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/tv/airing_today?page=1&language=ru-RU')
    ->json()['results'];

// dump($toDay);