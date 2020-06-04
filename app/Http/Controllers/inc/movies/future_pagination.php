<?php

$i = 1;
$pages = [];

while($i< 5){

    $movie = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/movie/upcoming?page='.$i++.'&append_to_response=&language=ru')
    ->json()['results'];

    foreach ($movie as $page):
        array_push($pages, $page);
    endforeach;  
    
}

$future_paginate = $this->paginate($pages);       
$future_paginate->setPath('future');  

