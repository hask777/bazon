<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        include 'inc/popular.php';
        include 'inc/nowplaying.php';
        include 'inc/top_rated.php';
        include 'inc/upcoming.php';
        include 'inc/latest.php';
        include 'inc/genres.php';
        include 'inc/years.php';
        include 'inc/countries.php';
        include 'inc/sidebar.php';
        include 'inc/movies/popular_pagination.php';

        // dump($popularMovies);
            
        return view('movies.index', [
            'popularMovies' => $popularMovies,
            'nowPlayingMovies' => $nowPlayingMovies,
            'top_rated' => $top_rated,
            'upcoming' => $upcoming,
            'genresArray' => $genresArray,
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
        include 'inc/popular.php';
        include 'inc/movies/popular_pagination.php';

        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $id . '?append_to_response=videos,images,credits&language=ru')
            ->json();
            // dump($movie);

        $recomend = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $id . '/recommendations?append_to_response=videos,images,credits&language=ru')
            ->json()['results'];

        $similar = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $id . '/similar?append_to_response=videos,images,credits&language=ru')
            ->json()['results'];
            // dump($similar);
        
        if(!empty($movie['belongs_to_collection'])){
            $collection = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/collection/'.$movie['belongs_to_collection']['id'].'?language=ru')
            ->json();
            // dump($collection);
            // dump(count($collection['parts']));
        }

        $reviews = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $id . '/reviews?append_to_response=language=ru')
            ->json()['results'];
        // dump($reviews);
        
        $credits = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $id . '/credits?append_to_response=language=ru-RU')
            ->json();
            // dump($credits);

            
        $result = Http::get('https://bazon.cc/api/search?token=a27474c28593adb669d04ead29ee0c41&title='.$movie['original_title'].'')
        ->json();
        // dump($result);

        if(empty($result['error'])){          
            $videos = Http::get('https://bazon.cc/api/search?token=a27474c28593adb669d04ead29ee0c41&title='.$movie['original_title'].'')
            ->json()['results'];
            dump($videos);

            
            // $text = htmlspecialchars_decode($text);

        }else{
            $result = Http::get('https://bazon.cc/api/search?token=a27474c28593adb669d04ead29ee0c41&title='.$movie['title'].'')
            ->json();

            if(empty($result['error'])){
                $videos = Http::get('https://bazon.cc/api/search?token=a27474c28593adb669d04ead29ee0c41&title='. $movie['title'].'')
                ->json()['results'];
            }else{
                $videos = 'NO';
            }
        }

        dump($videos);

        $movie_year = \Carbon\Carbon::parse($movie['release_date'])->format('Y');

        // dump($movie_year);

        if($videos == 'NO'){
            if(!empty($collection)){
                return view('movies.show', [
                    'collection' => $collection,
                    'similar' => $similar,
                    'recomend' => $recomend,
                    'movie' => $movie,
                    'credits' => $credits,
                    'genres' => $genres,
                    'countries' => $countries,
                    'years' => $years,
                    'sidebarFutureMovies' => $sidebarFutureMovies,
                    'videos' => 'NO',
                ]);
            }else{
                return view('movies.show', [
                    'collection' => 'NO',
                    'similar' => $similar,
                    'recomend' => $recomend,
                    'movie' => $movie,
                    'credits' => $credits,
                    'genres' => $genres,
                    'countries' => $countries,
                    'years' => $years,
                    'sidebarFutureMovies' => $sidebarFutureMovies,
                    'videos' => 'NO',
                ]);
            }
        }else{
            foreach($videos as $video){
                dump( str_replace("&nbsp;",' ',$video['info']['rus']));
                // dump($movie['title']);
                if(!empty($video)){
                    if(     
                        str_replace("&nbsp;",' ',$video['info']['orig']) === $movie['original_title'] &&
                        $video['info']['year'] === $movie_year ||
                        str_replace("&nbsp;",' ',$video['info']['rus']) === $movie['title'] &&
                        $video['info']['year'] === $movie_year          
                    ){          
                        if(!empty($collection)){
                            return view('movies.show', [
                                'collection' => $collection,
                                'similar' => $similar,
                                'recomend' => $recomend,
                                'movie' => $movie,
                                'credits' => $credits,
                                'genres' => $genres,
                                'countries' => $countries,
                                'years' => $years,
                                'sidebarFutureMovies' => $sidebarFutureMovies,
                                'videos' => $video,
                            ]);
                        }else{
                            return view('movies.show', [
                                'collection' => 'NO',
                                'similar' => $similar,
                                'recomend' => $recomend,
                                'movie' => $movie,
                                'credits' => $credits,
                                'genres' => $genres,
                                'countries' => $countries,
                                'years' => $years,
                                'sidebarFutureMovies' => $sidebarFutureMovies,
                                'videos' => $video,
                            ]);
                        }
                    }
                   
                }else{
                    return view('movies.show', [
                        'collection' => $collection,
                        'similar' => $similar,
                        'recomend' => $recomend,
                        'movie' => $movie,
                        'credits' => $credits,
                        'genres' => $genres,
                        'countries' => $countries,
                        'years' => $years,
                        'sidebarFutureMovies' => $sidebarFutureMovies,               
                        'videos' => $video 
                    ]);
                } 
            }
                 
        }
        if(!empty($collection)){
            return view('movies.show', [
                // 'bazon' => $bazon,
                'collection' => $collection,
                'similar' => $similar,
                'recomend' => $recomend,
                'movie' => $movie,
                'credits' => $credits,
                'genres' => $genres,
                'countries' => $countries,
                'years' => $years,
                'sidebarFutureMovies' => $sidebarFutureMovies,                
                'videos' => $video
            ]); 
        }else{
            return view('movies.show', [
                // 'bazon' => $bazon,
                'collection' => 'NO',
                'similar' => $similar,
                'recomend' => $recomend,
                'movie' => $movie,
                'credits' => $credits,
                'genres' => $genres,
                'countries' => $countries,
                'years' => $years,
                'sidebarFutureMovies' => $sidebarFutureMovies,               
                'videos' => $video
            ]);  
        }
        foreach($videos as $video){
            if(!empty($video)){
                if(
                    str_replace("&nbsp;",' ',$video['info']['orig']) === $movie['original_title'] &&
                    $video['info']['year'] === $movie_year ||
                    str_replace("&nbsp;",' ',$video['info']['rus']) === $movie['title'] &&
                    $video['info']['year'] === $movie_year        
                ){
                    return view('movies.show', [
                        'collection' => $collection,
                        'similar' => $similar,
                        'recomend' => $recomend,
                        'movie' => $movie,
                        'credits' => $credits,
                        'genres' => $genres,
                        'countries' => $countries,
                        'years' => $years,
                        'sidebarFutureMovies' => $sidebarFutureMovies,               
                        'videos' => $video
                    ]);     
                }                          
            }
            else{
                return view('movies.show', [
                    'collection' => $collection,
                    'similar' => $similar,
                    'recomend' => $recomend,
                    'movie' => $movie,
                    'credits' => $credits,
                    'genres' => $genres,
                    'countries' => $countries,
                    'years' => $years,
                    'sidebarFutureMovies' => $sidebarFutureMovies,               
                    'videos' => $video 
                ]);
            }  
        }                         
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
