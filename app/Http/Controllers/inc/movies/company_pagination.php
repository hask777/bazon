<?php

$i = 1;
$pages = [];

while($i< 25){

    $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/movie?with_companies=420&page='.$i++.'&append_to_response=&language=ru')
        ->json()['results'];
        // dump($company);
    

    foreach ($movie as $page):
        array_push($pages, $page);
    endforeach;             
}

$company_paginate = $this->paginate($pages);
$company_paginate->setPath('company'); 