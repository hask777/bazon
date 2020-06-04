<?php

$i = 1;
$pages = [];

while($i< 5){
   
    $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/popular?&page='.$i++.'&append_to_response=&language=ru')
        ->json()['results'];

    foreach ($movie as $page):
        array_push($pages, $page);
    endforeach;  
                  
}
  
$popular_paginate = $this->paginate($pages); 
// dump($country_paginate);
$popular_paginate->setPath('popular');