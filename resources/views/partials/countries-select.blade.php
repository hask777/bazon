<form class="mb-0" action="{{route('country.index')}}" method="get">
    @csrf
    <select name="countries_filter" id="">
        @foreach($genres as $key=>$value)
        <option value="{{$key}}">
            {{$value}}
        </option> 
            
        @endforeach
    </select>
    <button type="submit">{{$value}}</button>
    
</form>
@php
    if(!empty($_GET['countries_filter'])){
        $countries_filter = $_GET['countries_filter'];
        var_dump($countries_filter);      
    }
   
@endphp