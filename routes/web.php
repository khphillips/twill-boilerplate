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

Route::get('/home', 'HomeController@index')->name('home');


//for when language preference is passed
Route::group([
    'prefix' => '{locale}',
    'middleware' => ['setLocale'],
    'where' => ['locale' => 'en|fr'],
], function() {
    Route::prefix('page')->group(function() {
        Route::get('{slug}', 'PageController@showSlugTranslation');
    });
});

//for when just the slug is passed
Route::prefix('page')->group(function() {
    Route::get('{slug}', 'PageController@showSlug');
});

//for traditional resource style. 
Route::resource('pages', 'PageController');
