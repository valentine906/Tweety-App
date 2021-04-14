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

Auth::routes();

Route::middleware('auth')->group(function(){
	Route::get('/tweets','TweetController@index')->name('home');
	Route::post('/tweets','TweetController@store');
	Route::post('/profile/{user:username}/follow','FollowersController@store');
	Route::get(
	'/profile/{user:username}/edit',
	'ProfileController@edit'
)->middleware('can:edit,user');

	Route::patch(
	'/profile/{user:username}',
	'ProfileController@update'
	); //PATCH IS TO UPDATE A RECORD

Route::get('/explore','ExploreController');
});

Route::get('/profile/{user:username}','ProfileController@show')->name('profile');








//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
