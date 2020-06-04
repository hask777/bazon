<li class="ml-1">
    <form class="mb-0" action="{{route('country.index')}}" method="get">
        @csrf
        <input type="hidden" name="country_id" value="{{$key}}">
        <input type="hidden" name="country_name" value="{{$value}}">
        <button type="submit" class="mt-1 text-sm capitalize font-light">{{$value}}</button>      
    </form>
</li>






