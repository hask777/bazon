<?php

$topRatedTv = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/tv/top_rated?page=1&language=ru-RU')
    ->json()['results'];

// dump($topRatedTv);