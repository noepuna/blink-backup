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

        //here
        Route::group(['middleware' => 'auth'], function(){
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->middleware(['auth'])->name('dashboard');
        
            //mini
            //Route::view('myposts', 'myposts')->name('myposts');
        
    
            Route::get('/create-post', 'create');
            Route::post('/create-post', 'store');
        
            Route::get('/my-posts', 'myposts')->name('myposts');
            
        });
    });


require __DIR__.'/auth.php';
