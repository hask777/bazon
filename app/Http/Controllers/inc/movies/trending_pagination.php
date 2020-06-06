<?php

$i = 1;
$pages = [];

while($i< 25){

    $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/trending/movie/week?&page='.$i++.'&language=ru-RU')
        ->json()['results'];
        // dump($movie);
    

    foreach ($movie as $page):
        array_push($pages, $page);
    endforeach;             
}

$trending_paginate = $this->paginate($pages);
$trending_paginate->setPath('trending'); 