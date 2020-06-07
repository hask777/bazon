<div class="filter">
    <div class="">
        <h2 class='capitalize  tracking-wider text-center text-orange-500 text-2xl  text-center font-semibold'>Сериалы</h2>
    </div>
    <div class="bg-gray-800 p-4 mt-5">
        <livewire:tv-search-dropdown>
        
        @include('partials.tv.buttons')
        <div class="filter_inner px-2">   
            <h3 class="tv_movie_head font-bold text-gray-500  mt-1 pb-3 pt-3 border-b border-gray-700">Жанры</h3>
            <ul class="tv_movie_list mb-4 mt-2">
                @foreach($genres as $key=>$value)
                    <x-tv-genres :key="$key" :value="$value"/>
                @endforeach
            </ul>
            
            <h3 class="tv_countries_head font-bold text-gray-500  mt-1 pb-3 pt-3 border-b border-gray-700">Страна</h3>
            <ul class="tv_countries_list mb-4 mt-2">

                @foreach($countries as $key=>$value) 
                
                    {{-- {{count($countries)}} --}}
                    <x-tv-country :key="$key" :value="$value"/>
                @endforeach
            </ul>
            
            <h3 class="tv_years_head font-bold text-gray-500  mt-1 pb-3 pt-3 border-b border-gray-700">Год</h3>
            <ul class="tv_years_list mb-4 mt-2">
                @foreach($years as $key => $year)
                
                    {{-- @if($key == 4 || $key == 9 || $key == 14 || $key == 19)
                        <x-year-filter :year="$year"/><br>
                        @else
                        <x-year-filter :year="$year"/>
                    @endif --}}

                    <x-year-filter :year="$year"/>
                
                @endforeach
            </ul>
        </div>
    </div>
</div>

