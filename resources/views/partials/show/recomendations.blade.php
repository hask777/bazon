@if(!empty($recomend))
{{-- Recomindations --}}
<div class="recomended_title mt-4 flex">
    <h2 class='movies_header_title recomendations capitalize tracking-wider text-gray-500 text-2xl   font-semibold'>Рекомендованные</h2>
    <h2 class='movies_header_title similar capitalize tracking-wider text-gray-500 text-2xl   font-semibold ml-4'>Похожие</h2>       
</div>

    @if($collection != 0)
        <div class="recomendations_movies sm:flex mx-auto mt-6 momvie-info border-b border-gray-800 pb-10">
            <div class="flex w-100 ">
                <!-- Slider main container -->
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach($recomend as $movie)
                            <div class="swiper-slide">
                                <x-popular-card :movie="$movie" :genres="$genres"/>
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
        <div class="similar_movies sm:flex mx-auto mt-6 momvie-info border-b border-gray-800 pb-10">
            <div class="flex w-100 ">
                <!-- Slider main container -->
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach($similar as $movie)
                            <div class="swiper-slide">
                                <x-popular-card :movie="$movie" :genres="$genres"/>
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
    @else
        <div class="recomendations_movies sm:flex mx-auto mt-6 momvie-info pb-10">
            <div class="flex w-100 ">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($recomend as $movie)
                        <div class="swiper-slide">
                            <x-popular-card :movie="$movie" :genres="$genres"/>
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
                            <x-popular-card :movie="$movie" :genres="$genres"/>
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

@endif
{{-- end --}}

{{-- Collection --}}
@if($collection != 0)
    <div class="recomended_title mt-4">
        <h2 class='movies_header_title capitalize tracking-wider text-gray-500 text-2xl   font-semibold'>{{$collection['name']}}</h2>    
        </div>
        <div class="sm:flex mx-auto mt-6 momvie-info pb-10">
            <div class="flex w-100 ">

                @if(count($collection['parts']) > 5)
                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach($collection['parts'] as $movie)
                                <div class="swiper-slide">
                                    <x-popular-card :movie="$movie" :genres="$genres"/>
                                </div>
                                
                            @endforeach 
                        </div>
                        <!-- If we need pagination -->
                        {{-- <div class="swiper-pagination"></div> --}}
        
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev  z-50"></div>
                        <div class="swiper-button-next  z-50"></div>
        
                        <!-- If we need scrollbar -->
                        {{-- <div class="swiper-scrollbar"></div> --}}
                    </div>
                    {{-- end --}}
                @else
                    @foreach($collection['parts'] as $movie)
                    <div class="collection_wrapper">
                        <div class="swiper-slide collection_slide">
                            <x-popular-card :movie="$movie" :genres="$genres"/>
                        </div>
                    </div>             
                    @endforeach 
                @endif
                
            </div>        
        </div>
@endif
{{-- end --}}