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
            body {
                font-family: 'Nunito', sans-serif;
            }

            /* Basic Styling */
            html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            }
            
            .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px;
            display: flex;
            }

            /* Columns */
            .left-column {
            width: 65%;
            position: relative;
            }
            
            .right-column {
            width: 35%;
            margin-top: 60px;
            }

            
            /* Left Column */
            .left-column img {
            width: 100%;
            position: absolute;
            }

            /* Product Description */
            .product-description {
            border-bottom: 1px solid #E1E8EE;
            margin-bottom: 20px;
            }
            .product-description span {
            font-size: 15px;
            color: #358ED7;
            text-transform: uppercase;
            text-decoration: none;
            }
            .product-description h1 {
            font-weight: 300;
            font-size: 52px;
            color: #43484D;
            }
            .product-description p {
            font-size: 16px;
            font-weight: 300;
            color: #86939E;
            line-height: 24px;
            }

            /* Responsive */
            @media (max-width: 940px) {
            .container {
                flex-direction: column;
                margin-top: 60px;
            }
            
            .left-column,
            .right-column {
                width: 100%;
            }
            
            .left-column img {
                width: 300px;
                right: 0;
                top: -65px;
                left: initial;
            }
            }
            
            @media (max-width: 535px) {
            .left-column img {
                width: 220px;
                top: -85px;
            }
            }
        </style>
    </head>
    
    <body class="antialiased">
        <div >
        <x-search-nav></x-search-nav>
        
        
        </div>

        <main class="container">
 
  <!-- Left Column / Headphones Image -->
  <div class="left-column">
    <img data-image="black" src="{{$post->img_src}}" alt="">
  </div>
 
 
  <!-- Right Column -->
  <div class="right-column">
 
    <!-- Product Description -->
    <div class="product-description">
      <x-success-status class="mb-4" :status="session('message')" />
      <x-fail-status class="mb-4" :status="session('failmessage')" />
      <span>{{$post->medium}}</span>
      <h1>{{$post->title}}</h1>
      <span>{{$user->username}}</span>
      <p>{{$post->description}}</p>
    </div>

    <h3>{{$post->avg_rating}}</h3>

    <form action="{{ url('rate-post/'.$post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="rate_input">Rate this piece from 0 to 5!</label>
        <input type="range" id="rate_input" name="rate_input"
                            min="0" max="5">
        <button class="btn btn-primary">Submit</button>
    </form>
      
 
    <!-- Product Pricing -->
    <div class="product-price">
      <span>${{$post->price}}</span>
      
      <!-- if this post is already favourited -->
      @if ($favourited == true)
         <form action="{{ url('removefavourites/'.$post->id) }}" method="DELETE">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary">Remove from Favourites</button>
         </form>
       @else
         <form action="{{ url('addtofavourites/'.$post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button class="btn btn-primary">Add to Favourites</button>
          </form>
        @endif
      
      <form action="/addtocart/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <button class="btn btn-primary">Add to Cart</button>
      </form>

      
    </div>
  </div>
</main>
    </body>
</html>
