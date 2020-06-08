<div class="recomend">

    {{-- Recomend --}}
    @if(!empty($recomend) && !empty($similar))
    <div class="recomended_title flex">
        <h2 class='movies_header_title recomendations capitalize tracking-wider text-gray-500 text-2xl   font-semibold bg-gray-800 px-3 py-4'>Рекомендованные</h2>
        <h2 class='movies_header_title similar capitalize tracking-wider text-gray-500 text-2xl  font-semibold ml-4 px-3 py-4'>Похожие</h2>       
    </div>

    <div class="recomendations_movies sm:flex mx-auto mt-6 momvie-info pb-10">
        <div class="flex w-100 ">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($recomend as $movie)
                        <div class="swiper-slide">
                            <x-tv-popular-card :movie="$movie" :genres="$genres"/>
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
    <div class="similar_movies sm:flex mx-auto mt-6 momvie-info pb-10">
        <div class="flex w-100 ">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($similar as $movie)
                        <div class="swiper-slide">
                            <x-tv-popular-card :movie="$movie" :genres="$genres"/>
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
    @endif
    @if(!empty($recomend) && empty($similar))
    <div class="recomended_title flex">
        <h2 class='movies_header_title recomendations capitalize tracking-wider text-gray-500 text-2xl font-semibold pt-4'>Рекомендованные</h2>       
    </div>
    <div class="recomendations_movies sm:flex mx-auto mt-6 momvie-info pb-10">
        <div class="flex w-100 ">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($recomend as $movie)
                        <div class="swiper-slide">
                            <x-tv-popular-card :movie="$movie" :genres="$genres"/>
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
    @endif
    @if(!empty($similar) && empty($recomend))
    <div class="recomended_title flex">
        <h2 class='movies_header_title similar_once capitalize tracking-wider text-gray-500 text-2xl  font-semibold pt-4'>Похожие</h2>       
    </div>
    <div class="similar_movies_once sm:flex mx-auto mt-6 momvie-info pb-10">
        <div class="flex w-100 ">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($similar as $movie)
                        <div class="swiper-slide">
                            <x-tv-popular-card :movie="$movie" :genres="$genres"/>
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

    @endif

    {{-- end --}}
</div>