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
    return view('shortenurl');
});

Route::post('/shorten', "URLShortenerController@shorten");
Route::get('/s/{shortcut}', function ($shortcut) {
    $url = App\UrlMapping::where('shortcut', $shortcut)->first()->url;
    return Redirect::to($url);;
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
