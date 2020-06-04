<li class="inline">
    <form class="mb-0" action="{{route('genres.index')}}" method="get">
        @csrf
        <input type="hidden" name="genre_id" value="{{$key}}">
        <input type="hidden" name="genre_name" value="{{$value}}">
        <button type="submit" class="{{request()->genre_name == $value ? 'genre_active': ''}}
        mt-1 text-sm font-light">{{$value}}</button>
    </form>
</li>

