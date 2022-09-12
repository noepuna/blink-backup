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

Route::resource('/posts', PostController::class);


Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::view('myposts', 'myposts')->name('myposts');

    Route::controller(App\Http\Controllers\PostController::class)->group(function () {
        Route::get('/create-post', 'create');
        Route::post('/create-post', 'store');

        Route::get('/my-post', 'myposts');
    });
});

require __DIR__.'/auth.php';
