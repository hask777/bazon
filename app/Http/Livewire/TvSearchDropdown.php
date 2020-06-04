<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class TvSearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];

        if(strlen($this->search) >= 2){
            $searchResults = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/tv?query='. $this->search .'&language=ru-RU')
                ->json()['results'];
        }

        // dump($searchResults);

        return view('livewire.tv-search-dropdown', [
            'searchResults' => collect($searchResults)->take(20)
        ]);
    }
    
}
