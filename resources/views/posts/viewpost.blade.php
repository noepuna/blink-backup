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
        <x-search-nav></x-search-nav>
           
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p>
            <p>{{ $post->avg_rating }}</p>
            <div>
                <x-success-status class="mb-4" :status="session('message')" />

                <form action="{{ url('rate-post/'.$post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="rate_input">Rate this piece from 1 to 5!</label>
                    <input type="range" id="rate_input" name="rate_input"
                            min="0" max="5">
                    <button>Submit</button>
                </form>
                <form action="/makeorder/{{$post->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button>Buy</button>
                </form>
               
                <!-- if this post is already favourited -->
                @if ($favourited == true)
                <form action="{{ url('removefavourites/'.$post->id) }}" method="DELETE">
                    @csrf
                    @method('DELETE')
                    <button>Remove from Favourites</button>
                </form>
                @else
                <form action="{{ url('addtofavourites/'.$post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button>Add to Favourites</button>
                </form>
                @endif
                
            </div>

        </div>
    </body>
</html>
