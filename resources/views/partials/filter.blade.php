<div class="filter">
    <div class="">
        <h2 class='capitalize  tracking-wider text-center text-gray-500 text-2xl  text-center font-semibold'>Фильмы</h2>
    </div>
    <div class="bg-gray-800 p-4 mt-5">

        <livewire:movies-search-dropdown>

        <div class="filter_inner px-2">
            @include('partials.buttons')
            <h3 class="genres_head font-bold text-gray-500  mt-1">По жанру</h3>
            <ul class="movie_list mb-4 mt-2 ml-1">
                @foreach($genres as $key=>$value)
                    <x-genres-filter :key="$key" :value="$value"/>
                @endforeach
            </ul>
            <h3 class="country_head font-bold text-gray-500 mt-1 ">По стране</h3>
            <ul class="countries_list mb-4 mt-2 ml-1"> 
                @foreach($countries as $key=>$value) 
                
                    {{-- {{count($countries)}} --}}
                    <x-country-filter :key="$key" :value="$value"/>
                @endforeach
            </ul>
            <h3 class="years_head font-bold text-gray-500 mt-1">По году</h3>
            <ul class="years_list mb-4 mt-2 ml-1">
                @foreach($years as $key => $year)
                   
                    {{-- @if($key == 4 || $key == 9 || $key == 14 || $key == 19)
                        <x-year-filter :year="$year"/><br>
                        @else
                        <x-year-filter :year="$year"/>
                    @endif --}}
    
                    <x-year-filter :year="$year"/>
                   
                @endforeach
            </ul>
            <h3 class="raiting_head font-bold text-gray-500 mt-1">По рэйтингу</h3>
            <ul class="raiting_list mb-4 mt-2 ml-1">
                <x-average-filter :key="$key" :value="$value"/>
            </ul>
        </div>    
    </div>
</div>

