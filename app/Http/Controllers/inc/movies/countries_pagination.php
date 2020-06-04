<?php

$i = 1;
$pages = [];

while($i< 5){

    if(!empty($_GET['country_id'])){         
        $country_id = $_GET['country_id'];
    }
    if(!empty($_GET['country_name'])){         
        $country_name = $_GET['country_name'];
    }
    
    $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3//discover/movie?with_original_language='.$country_id.'&page='.$i++.'&append_to_response=&language=ru')
        ->json()['results'];

    foreach ($movie as $page):
        array_push($pages, $page);
    endforeach;  
                  
}
  
$country_paginate = $this->paginate($pages); 
// dump($country_paginate);
$country_paginate->setPath('countries');