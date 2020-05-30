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
Route::group(['prefix'=>'user'],function (){
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/randomly','SeriesController@randomly' )->name('randomly');
Route::get('/watch/{id}/{slug}','EpisodesController@watch' )->name('episode.watch');
Route::get('/series','SeriesController@display_all' )->name('series');
Route::get('/view-series/{id}/{slug}','SeriesController@show' )->name('series.view');
Route::post('/dislike/{id}','EpisodesController@dislike' )->name('episode.dislike');
Route::post('/follow/{id}','FollowController@follow' )->name('follow');
Route::post('/unfollow/{id}','FollowController@unfollow' )->name('unfollow');



Route::post('/results','HomeController@search')->name('search') ;


});


Auth::routes();


//Admin area routes
Route::group(['middleware'=>'is_admin'],function (){
    //routes for episodes
    Route::get('/episode/create','EpisodesController@create')->name('create.episode');
    Route::post('/episode/store','EpisodesController@store')->name('episodes.store');
    Route::get('/episodes','EpisodesController@index')->name('episodes');
    Route::get('/episode/edit/{id}','EpisodesController@edit')->name('episode.edit');
    Route::post('/episode/update/{id}','EpisodesController@update')->name('episode.update');
    Route::get('/episode/delete/{id}','EpisodesController@destroy')->name('episode.delete');

    //series routes
    Route::get('/series/create', 'SeriesController@create')->name('series.create');
    Route::post('/series/store', 'SeriesController@store')->name('series.store');
    Route::get('/all-series', 'SeriesController@index')->name('series.index');
    Route::get('/series/edit/{id}', 'SeriesController@edit')->name('series.edit');
    Route::post('/series/update/{id}', 'SeriesController@update')->name('series.update');
    Route::get('/series/delete/{id}','SeriesController@destroy')->name('series.delete');



});