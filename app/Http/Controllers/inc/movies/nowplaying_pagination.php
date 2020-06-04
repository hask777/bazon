<?php

$i = 1;
$pages = [];

while($i< 5){

    $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing?page='.$i++.'&language=ru-RU')
        ->json()['results'];
    

    foreach ($movie as $page):
        array_push($pages, $page);
    endforeach;             
}

$nowplaying_paginate = $this->paginate($pages);
$nowplaying_paginate->setPath('nowplaying'); 