<?php

$collection = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/collection/10')
    ->json();