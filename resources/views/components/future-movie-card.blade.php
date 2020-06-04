<div class="movie_item relative">
    <a href="{{ route('movies.show', $movie['id']) }}">
       
        @if ($movie['poster_path'])
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
        @else
            <img src="http://placehold.jp/2d3748/a0aec0/500x750.jpg?text=poster" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
        @endif

        <div class="movie_item_overlay">

            {{-- <h2 class="title">{{$movie['title']}}</h2> --}}

            <div class="watch">
                <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 512 512" height="32px" id="Layer_1" version="1.1" viewBox="0 0 512 512" width="32px" fill="rgb(66, 153, 225)" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M256,512C114.625,512,0,397.375,0,256C0,114.609,114.625,0,256,0s256,114.609,256,256C512,397.375,397.375,512,256,512z   M256,64C149.969,64,64,149.969,64,256s85.969,192,192,192c106.03,0,192-85.969,192-192S362.031,64,256,64z M192,160l160,96l-160,96  V160z" /></svg>
            </div>     
        </div>
    </a>
    <div class="popular_heading flex px-2 py-2 text-xs">
        <h2 class="title">{{mb_strimwidth($movie['title'], 0, 18, "...")}}</h2>
        {{-- <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('Y') }}</span> --}}
    </div>
</div>
