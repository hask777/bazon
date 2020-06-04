<?php

$top_rated = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3//movie/top_rated?append_to_response=&language=ru')
    ->json()['results'];

    // dd($latest);