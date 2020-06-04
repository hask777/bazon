<?php

$i = 1;
$pages = [];

while($i< 5){

    if(!empty($_GET['year'])){         
        $year = $_GET['year'];
    }

    $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/movie?primary_release_year='.$year.'&page='.$i++.'&append_to_response=&language=ru')
        ->json()['results'];

    foreach ($movie as $page):
        array_push($pages, $page);
    endforeach;  
                  
}
  
$years_paginate = $this->paginate($pages); 
// dump($years_paginate);
$years_paginate->setPath('year'); 