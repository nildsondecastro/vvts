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

Auth::routes();

Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/list/anime', 'AnimeController@index')->name('anime.index');
Route::get('/list/anime/visited', 'AnimeController@index')->name('anime.index');
Route::get('/list/anime/top', 'AnimeController@index')->name('anime.index');
Route::get('/show/{id}', 'AnimeController@show')->name('anime.show');
Route::get('favorited/{id}', 'AnimeController@storeFavorite')->name('favorited');
Route::get('/favorites', 'AnimeController@showfavorites')->name('favorites');


Route::get('/profile', 'HomeController@profile')->name('profile');


Route::get('/teste', function () {
    return view('teste');
});
//Route::get('teste', 'HomeController@teste')->name('teste');
