<?php

$latest = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/movie/latest?append_to_response=&language=ru')
    ->json();