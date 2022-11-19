<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <style>

    </style>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
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

            <div class="container">
                <x-success-status class="mb-4" :status="session('message')" />
                @forelse ($posts as $post)
                    <div class="col-md-3" style="padding-top: 20px;">
                        <h4>{{$post->title}}</h4>  
                        <h6>{{$post->price}}</h6>                          
                    </div>
                    
                @empty    
                    <h3>There are no items in your cart.</h3>
                    <?php $user_id = Auth::user()->id ?>
                    <!-- <button class="btn btn-primary" ><a href="{{ route('makeorderroute', $user_id) }}">Buy</a></button> -->
                    <form action="{{ route('makeorderroute', $user_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-primary">Buy</button>
                    </form>
                @endforelse

                @if($posts !== null)
                    
                @endif 
                                    
            </div>
        </div>
    </body>
</html>
