<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});






    Route::controller(App\Http\Controllers\PostController::class)->group(function () {
        //all posts (this is available without the need to login)
        Route::get('/posts', 'allposts');

        Route::get('/search-posts', 'dosearch'); 

        Route::get('/post/{postid}', 'getpost')->name('specificpost');

        // everything within this middleware route, you must be logged in to access
        Route::group(['middleware' => 'auth'], function(){
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->middleware(['auth'])->name('dashboard');
        
            //mini
            //Route::view('myposts', 'myposts')->name('myposts');
        
    
            // routes for create view and for create post method (store) 
            Route::get('/create-post', 'create');
            Route::post('/create-post', 'store');
            
            // route for user's posts
            Route::get('/my-posts', 'myposts')->name('myposts');

            // routes for edit view
            Route::get('/edit-post/{post_id}', 'edit');
            Route::put('/update-post/{post_id}', 'update');

            Route::delete('/delete-post/{post_id}', 'destroy');

            
            Route::controller(App\Http\Controllers\RatingController::class)->group(function () {
                //Route::post('/ratepost/{post_id}/{rate_input}', 'rate');
                Route::put('/rate-post/{post_id}', 'rate2');
            });

            // ADMIN FEATURED ITEMS
            Route::get('/edit-featured', 'getallposts')->name('getallposts');
            Route::put('/new-features', 'newfeatures');

            // BUYING
            Route::put('/makeorder/{post_id}', 'makeAnOrder');
            
            // FAVOURITES
            Route::put('/addtofavourites/{post_id}', 'addFavourite');
            Route::get('/myfavourites', 'getfavourites');
            Route::get('/removefavourites/{post_id}', 'getFavToDelete');
            
        });
    });


require __DIR__.'/auth.php';
