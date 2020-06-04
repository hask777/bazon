<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        include 'inc/tv/popular.php';
        include 'inc/tv/today.php';
        include 'inc/tv/thisWeek.php';
        include 'inc/tv/latest.php';
        include 'inc/tv/top_rated.php';
        include 'inc/tv/genres.php';
        include 'inc/years.php';
        include 'inc/countries.php';
        include 'inc/sidebar.php';
        include 'inc/tv/popular_pagination.php';


        // dump($popularTv);

        // dump($popularMovies);
            
        return view('tv.popular', [
            'popularTv' => $popularTv,
            'toDay' => $toDay,
            'thisWeek' => $thisWeek,
            'topRatedTv' => $topRatedTv,
            'latest' => $latest,
            'genres' => $genres,
            'countries' => $countries,
            'years' => $years,
            'sidebarFutureMovies' => $sidebarFutureMovies,
            'popular_paginate' => $popular_paginate
        ]);
    }

     /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    public function paginate($items, $perPage = 20, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);    
    }    

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        include 'inc/genres.php';
        include 'inc/years.php';
        include 'inc/countries.php';
        include 'inc/sidebar.php';
       

        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'. $id . '?language=ru')
            ->json();

        // dump($movie);  

        $tvs = Http::get('https://videocdn.tv/api/tv-series?api_token=lTf8tBnZLmO0nHTyRaSlvGI5UH1ddZ2f&query='.$movie['original_name'] .'&limit=10')
            ->json()['data'];

        // dd($movie);

        foreach($tvs as $tv){
            if($tv['orig_title'] === $movie['original_name']){
                $video = $tv;
            }
        }
  
        // dump($video);

        return view('tv.show', [
            'genres' => $genres,
            'countries' => $countries,
            'years' => $years,
            'sidebarFutureMovies' => $sidebarFutureMovies,
            'movie' => $movie,                  
            'videos' => $video
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
