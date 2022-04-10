<?php

use App\Http\Controllers\UiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
//UI
Route::get('/', "UiController@index");
Route::get('/posts', 'UiController@postsIndex');
Route::get('/posts/{id}/details', 'UiController@postDetailsIndex');
Route::get('/search posts', 'UiController@search');
Route::get('/search-posts-by-category/{catId}', 'UiController@searchByCategory');

Route::post('/post/like/{postId}', 'LikeDislikeController@like');
Route::post('post/dislike/{postId}', 'LikeDislikeController@disLike');

Route::post('/post/comment/{postId}', 'CommentController@comment');
//ADMIN

Route::group(['prefix'=> 'admin','middleware' =>['auth', 'isAdmin']], function(){
    Route::get('/dashboard', "admin\AdminDashboardController@index");

    //Users
    Route::get('/users', 'admin\UserController@index');
    //Edit
    Route::get('/users/{id}/edit', 'admin\UserController@edit');
    Route::post('/users/{id}/update', 'admin\UserController@update');
    Route::post('/users/{id}/delete', 'admin\UserController@delete');

    //Skills
    Route::resource('/skills', 'admin\SkillController');

    //Projects
    Route::resource('/projects', 'admin\ProjectController');

    //Student count
    Route::get('/student-counts', 'admin\StudentCountController@index')->name('student-counts.index');
    Route::post('/student-counts/store', 'admin\studentCountController@store');
    Route::post('/student-counts/{id}/update', 'admin\studentCountController@update');

    //cateogry
    Route::resource('categories', 'admin\CategoryController');

    //post
    Route::resource('posts', 'admin\PostController');
    Route::post('comment/{commentId}/show_hide', 'admin\PostController@showHideComment');

    

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
