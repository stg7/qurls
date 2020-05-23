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

Route::match(['get', 'post'], '/shorten', "URLShortenerController@shorten")->name('shorten');
Route::get('/s/{shortcut}', function ($shortcut) {
    $url = App\UrlMapping::where('shortcut', $shortcut)->first()->url;
    return Redirect::to($url);;
})->name('shortcut');


Auth::routes(['register' => false]);
