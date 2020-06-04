<?php

$i = 1;
$pages = [];

while($i< 5){

if(!empty($_GET['movie_raiting'])){         
    $movie_raiting = $_GET['movie_raiting'];    
}

$movie = Http::withToken(config('services.tmdb.token'))
    ->get('https://api.themoviedb.org/3/discover/movie?vote_average.lte='.$movie_raiting.'&page='.$i++.'&language=ru-RU')
    ->json()['results'];

foreach ($movie as $page):
    array_push($pages, $page);
endforeach;  
              
}

$average_paginate = $this->paginate($pages); 
// dump($country_paginate);
$average_paginate->setPath('average');