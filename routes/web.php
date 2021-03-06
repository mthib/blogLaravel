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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index');
Route::get('/articles', 'ArticlesController@index');
Route::get('/contact', 'ContactController@create');
Route::post('/contact','ContactController@store');
;

Route::get('/articles/{post_name}', 'ArticlesController@show');
Route::post('/articles/{post_name}', 'ArticlesController@store');

Route::resources([
    '/adminArticles' => 'AdminArticlesController',
]);

/*
Route::get('/posts/grid', 'PostsController@grid');
Route::resource('/posts', 'PostsController');*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
