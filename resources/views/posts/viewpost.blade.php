<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    
    <body class="antialiased">
        <div >
            <nav class="navbar navbar-light bg-light ">
                <h1 class="navbar-brand"><a href='/'>Blink ;)</a></h1>
                <form form action="/search-posts" class="form-inline" method="GET">
                    @csrf
                    @method('GET')
                    <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            
            
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: gray">Your Profile</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: gray">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline" style="color: gray">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>
           
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p>
            <p>{{ $post->avg_rating }}</p>
            <div>
                <x-success-status class="mb-4" :status="session('message')" />

                <form action="/">
                <label for="rate_input">Rate this piece from 1 to 5!</label>
                <input type="range" id="rate_input" name="rate_input"
                        min="0" max="5">
                <button>Submit</button>
                </form>
            </div>

        </div>
    </body>
</html>