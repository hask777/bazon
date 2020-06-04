<?php 

// if(!empty($_GET['year'])){
//     $year = $_GET['year'];       
// }
    
// $yearsArray = Http::withToken(config('services.tmdb.token'))
//     ->get('https://api.themoviedb.org/3/discover/movie?year='.$year.'&append_to_response=&language=ru')
//     ->json()['results'];

$years = [
    '2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009',
    '2008', '2007', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998', '1997'
];

