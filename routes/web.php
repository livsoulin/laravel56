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

Route::get('/post/{id}',['as'=> 'home.post', 'uses'=> 'PostController@post']);

//Route::group(['middleware'=>'web'],function(){

Route::group(['middleware'=>'admin'],function(){
    
    Route::get('admin/', function(){
    return view('admin.index');
    });
    
    Route::resource('Admin/user','AdminUsersController');
    
    Route::resource('Admin/post','PostController');
    
    Route::resource('Admin/category', 'AdminCategoryController');
    
    Route::resource('Admin/media', 'AdminMediaController');
    
    
    Route::resource('Admin/comments','PostCommentController');
    
    Route::resource('Admin/comment/replies', 'CommentRepliesController');
    
  //  Route::get('Admin/media/upload',['as'=>'Admin/media/upload','use'=>'AdminMediaController@upload']);
    
    
});
Route::group(['middleware'=>'auth'],function(){

    
    Route::post('/comment/reply',['as'=>'comment.reply','uses'=> 'CommentRepliesController@createReply']);
    
  });  