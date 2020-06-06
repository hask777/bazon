<ul class="mx-auto
pr-2">
    <li class="mobile_menu_item films border-b  border-gray-800 border-t border-gray-800 pb-3 pt-3">
        <a href="{{route('company.index')}}">
        В трендах      
        </a>
    </li>            
    <li class="mobile_menu_item films border-b  border-gray-800  pb-3 pt-3">
        <a href="{{route('movies.index')}}">
            Популярные      
        </a>
    </li>
    <li class="mobile_menu_item tv-series pt-3 border-b border-gray-800 pb-3">
        <a href="{{route('movies.nowplaying')}}">
            Сейчас смотрят
        </a>
    </li>
    <li class="mobile_menu_item films pt-3 border-b border-gray-800 pb-3">
        <a href="{{route('movies.toprated')}}">
            Топ рэйтинга      
        </a>
    </li>
    <li class="mobile_menu_item tv-series pt-2">
        <a href="{{route('future.index')}}">
            Скоро
        </a>
    </li>
</ul>