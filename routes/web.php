<?php

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

//Route::get('/home', 'HomeController@index')->name('home');


//for when language preference is passed
Route::group([
    'prefix' => '{locale}',
    'middleware' => ['setLocale'],
    'where' => ['locale' => 'en|fr'],
], function() {
    Route::prefix('pages')->group(function() {
        Route::get('{slug}', 'PageController@showSlugTranslation');
    });
});

//for when just the slug is passed 'pages/slug'
Route::prefix('pages')->group(function() {
    Route::get('{slug}', 'PageController@show');
});

//for traditional resource style.  'page/1'
Route::resource('pages', 'PageController');

//for all other routes... this will try and match a "Page" model to the slug and resolve for a page. 
Route::get('{page}', 'PageController@showFromPageUrl');