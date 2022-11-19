<nav class="navbar navbar-light bg-light " style="padding-bottom: 10px; position: sticky;">
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
                        <!-- Bootstrap dropdown that doesn't drop down >:(
                        <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                        </div>
                        -->

                        
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: gray">Your Profile</a>
                            <a href="{{ url('/myfavourites') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: gray">Favourites</a>
                            <a href="{{ url('/cart') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: gray">Your Cart</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: gray">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline" style="color: gray">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>