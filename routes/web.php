<?php

// Movies
Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/movie/{id}', 'MoviesController@show')->name('movies.show');
Route::get('/movies/popular', 'PopularController@index')->name('popular.index');
Route::get('/movies/nowplaying', 'NowPlayingController@index')->name('movies.nowplaying');
Route::get('/movies/toprated', 'TopRatedController@index')->name('movies.toprated');
Route::get('/movies/future', 'FutureMovieController@index')->name('future.index');
Route::get('/movies/genre', 'GenresController@index')->name('genres.index');
Route::get('/movies/year', 'YearController@index')->name('year.index');
Route::get('/movies/countries', 'CountryController@index')->name('country.index');
Route::get('/movies/average', 'AverageController@index')->name('average.index');

// TVs
Route::get('/tvs/popular', 'TvController@index')->name('tv.index');
// Route::get('/tvs/popular', 'TvController@index')->name('tv.popular');
Route::get('/tv/{id}', 'TvController@show')->name('tv.show');
Route::get('/tvs/genre', 'TvGenresController@index')->name('tv-genres.index');
Route::get('/tvs/today', 'TvTodayController@index')->name('tv.today');
Route::get('/tvs/thisweek', 'TvThisweekController@index')->name('tv.thisweek');
Route::get('/tvs/toprated', 'TvTopRatedController@index')->name('tv.toprated');
Route::get('/tvs/countries', 'TvCountriesController@index')->name('tv.countries');

