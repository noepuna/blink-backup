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
            

            <h1>
                Searching for "{{ $search }}"
            </h1>  
            
            <div class="container">
                <div class="row">
                        @forelse ($posts as $post)
                        <div class="col-md-3" style="padding-top: 20px;">
                            <x-post-card title="{{$post->title}}" imgurl="{{$post->img_src}}"  price="{{$post->price}}"  id="{{$post->id}}"/>
                        </div>
                        @empty    
                            <h3>No Record Found.</h3>
                        @endforelse
                </div>
            </div>   
                <div class="d-flex justify-content-center">
                    {!! $posts->links() !!}
                </div>
            
        </div>
    </body>
</html>
