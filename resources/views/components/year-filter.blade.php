<li class="inline">
    <form class="mb-0" action="{{route('year.index')}}" method="get">
        @csrf
        <input type="hidden" name="year" value="{{$year}}">
        <button type="submit" class="mt-1 text-sm font-light">{{$year}}</button>
    </form>
</li>
