<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            #homeCarousel {
              padding-left: 20%;
              padding-right: 20%;
            }

            img {
              object-fit: 'fill';
            }
        </style>
    </head>
    
    <body class="antialiased">
        <div style="text-align: center;">
        <x-search-nav></x-search-nav>

            <h1>Welcome to Blink!</h1>
            <h5>Where you view 1 of 1 items, but they could be gone in the blink of an eye!</h5>

            <a href="/posts"><h3>Shop Now!</h3></a>
            <div id="homeCarousel" class="carousel slide" data-ride="carousel" ride=true >
              <div class="carousel-inner" role="listbox" style="width:900px; height:600px !important;">
              <?php $i = 0 ?>
              @forelse ($posts as $post)
                @if ($i == 0 ) 
                  <div class="carousel-item active">
                  <a href="/post/{{$post->id}}"> 
                    <img class="d-block w-100" src="{{$post->img_src}}" alt="First slide">
                  </a>
                  </div>
                </a>
                @else
                  <div class="carousel-item">
                    <a href="/post/{{$post->id}}">
                    <img class="d-block w-100" src="{{$post->img_src}}" alt="First slide" >
                    </a>
                  </div>
                  @endif
                  <?php $i++ ?>
                @empty    
                    <h3>No Featured Posts.</h3>
                @endforelse
              </div>
              <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only" style="color: black">PREVIOUS</span>
              </a>
              <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only" style="color: black">NEXT</span>
              </a>
            </div>
        </div>
    </body>
</html>
