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

Route::get('/', 'BlogsController@index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blogs', 'BlogsController@index')->name('blogs');
Route::get('/blogs/create', 'BlogsController@create')->name('create_blog');

Route::post('/blogs/store', 'BlogsController@store')->name('blogs_store');


//Trashed routes here
Route::get('/blogs/trash','BlogsController@trash')->name('blogs_trash');
Route::get('/blogs/{id}/restore','BlogsController@restore')->name('blogs_restore');
Route::delete('/blogs/{id}/permanent-delete','BlogsController@permanentDelete')->name('blogs_permanent-delete');




Route::get('/blogs/{id}', 'BlogsController@show')->name('blogs_show');
Route::get('/blogs/{id}/edit', 'BlogsController@edit')->name('blogs_edit');

Route::patch('/blogs/{id}/update', 'BlogsController@update')->name('blogs_update');

Route::delete('/blogs/{id}/delete', 'Blogscontroller@delete')->name('blogs_delete');


//Admin Controller Routes
Route::get('/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/admin/blogs', 'AdminController@blogs')->name('admin_blogs');


//resource routing
Route::resource('categories', 'CategoryController');
Route::resource('users', 'UserController');

//contact 
Route::get('contact', 'MailController@contact')->name('contact');
Route::post('contact/send', 'MailController@send')->name('mail_send');