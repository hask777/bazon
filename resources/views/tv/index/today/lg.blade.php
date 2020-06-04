<div class="popular">
    <div class="flex movies_header justify-between items-center">
        <h2 class='movies_header_title capitalize tracking-wider text-orange-500 text-2xl  text-center font-semibold'>
            <a href="{{route('tv.index')}}">
                Сейчас транслируют
            </a>       
        </h2>     

        <div class="more">
            <a href="{{route('tv.index')}}">
                Еще...
            </a>    
        </div>
    </div>

    <div class="flex mt-5 mb-5">
        <div class="flex w-100">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($toDay as $movie)
                        <div class="swiper-slide">
                            <x-tv-card :movie="$movie" :genres="$genres"/>
                        </div>
                        
                    @endforeach 
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev  z-50"></div>
                <div class="swiper-button-next  z-50"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
                         
        </div>        
    </div>
</div>