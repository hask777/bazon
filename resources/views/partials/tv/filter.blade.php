<div class="filter">
    <div class="">
        <h2 class='capitalize  tracking-wider text-center text-orange-500 text-2xl  text-center font-semibold'>Сериалы</h2>
    </div>
    <div class="bg-gray-800 p-4 mt-5">
        <livewire:tv-search-dropdown>
            <h3  class="font-bold text-orange-500  mt-6">
                <a href="{{route('tv.today')}}">
                    Сейчас мотрят
                </a>
            </h3>
            <h3  class="font-bold text-orange-500  mt-1">
                <a href="{{route('tv.thisweek')}}">
                    На этой неделе
                </a>
            </h3>
            <h3  class="font-bold text-orange-500  mt-1">
                <a href="{{route('tv.toprated')}}">
                    По рэйтингу
                </a>
            </h3>
           
        <h3 class="font-bold text-orange-500  mt-6">Жанры:</h3>
        <ul class="movie_list mb-4 mt-2 ml-1">
            @foreach($genres as $key=>$value)
                <x-tv-genres :key="$key" :value="$value"/>
            @endforeach
        </ul>
        
        <h3 class="font-bold text-orange-500 mt-6 ">Страна:</h3>
        <ul class="countries_list mb-4 mt-2 ml-1">

            @foreach($countries as $key=>$value) 
            
                {{-- {{count($countries)}} --}}
                <x-tv-country :key="$key" :value="$value"/>
            @endforeach
        </ul>
        <h3 class="font-bold text-orange-500 mt-6">Год:</h3>
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
        <form action="">
            <input
            type="text"
            name="tv_year_search"
            value=""
            class="flex bg-gray-900 rounded-full  px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" 
            placeholder="Введите год"   
        >
        </form>
    </div>
</div>

