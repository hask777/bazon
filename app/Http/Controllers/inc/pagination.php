<?php

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator; 

 $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
 $items = $items instanceof Collection ? $items : Collection::make($items);
 return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);