@extends('layouts.main')

@section('content')
@php
    // echo \Request::url();
    // // echo url()->url();
    // echo url()->current();
    // echo url()->full();
@endphp
    <div class="container flex mx-auto px-4 mt-6 mb-8">

        {{-- Filter --}}
        @include('partials.left-sidebar-index')
        {{-- @include('partials.left-sidebar-mobile') --}}

        <div class="popular_movies w-80%">
            {{-- Popular --}}
            {{-- @include('movies.index.popular.lg')            
            @include('movies.index.popular.sm') --}}
                
            {{-- No playing --}}
            {{-- @include('movies.index.nowPlaying.lg')
            @include('movies.index.nowPlaying.sm') --}}
           
            {{-- Top rated --}}
            {{-- @include('movies.index.topRated.lg')
            @include('movies.index.topRated.sm') --}}

            {{-- Upcoming--}}
            {{-- @include('movies.index.upcoming.lg')
            @include('movies.index.upcoming.sm') --}}

            @include('movies.popular') 
            
        </div>
    </div>
@endsection
