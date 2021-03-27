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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\welcomeController::class, 'index'])->name('welcome');
Auth::routes();

Route::group(['middleware' => 'auth'], function ()
{

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::POST('/update_user_profile', [App\Http\Controllers\usercontroller::class, 'update_user_profile'])->name('update_user_profile');
Route::POST('/update_user_password', [App\Http\Controllers\usercontroller::class, 'update_user_password'])->name('update_user_password');

// admin
Route::get('admin/home', [App\Http\Controllers\admincontroller::class, 'index'])->name('adminhome');
Route::get('admin/add_movies', [App\Http\Controllers\admincontroller::class, 'add_movies'])->name('add_movies');
Route::get('admin/add_movies_manual', [App\Http\Controllers\admincontroller::class, 'add_movies_manual'])->name('add_movies_manual');
Route::POST('admin/insert_movie_db', [App\Http\Controllers\admincontroller::class, 'insert_movie_db'])->name('insert_movie_db');
Route::get('/movie_view/{id}', [App\Http\Controllers\HomeController::class, 'movie_view'])->name('movie_view');
Route::get('/userdetails', [App\Http\Controllers\usercontroller::class, 'userdetails'])->name('userdetails');
Route::POST('/find_user_details', [App\Http\Controllers\usercontroller::class, 'find_user_details'])->name('find_user_details');
Route::POST('/update_user_details', [App\Http\Controllers\usercontroller::class, 'update_user_details'])->name('update_user_details');
Route::POST('/remove_user', [App\Http\Controllers\usercontroller::class, 'remove_user'])->name('remove_user');
Route::get('/find_movie', [App\Http\Controllers\admincontroller::class, 'find_movie'])->name('find_movie');
Route::POST('/find_movie_data', [App\Http\Controllers\admincontroller::class, 'find_movie_data'])->name('find_movie_data');
Route::POST('/remove_movie', [App\Http\Controllers\admincontroller::class, 'remove_movie'])->name('remove_movie');
Route::POST('/find_movie_val', [App\Http\Controllers\admincontroller::class, 'find_movie_val'])->name('find_movie_val');
Route::POST('/update_movie_details', [App\Http\Controllers\admincontroller::class, 'update_movie_details'])->name('update_movie_details');
Route::get('admin/user_register', [App\Http\Controllers\admincontroller::class, 'admin_user_register'])->name('admin_user_register');
Route::POST('admin/admin_register', [App\Http\Controllers\admincontroller::class, 'admin_register'])->name('admin_register');


// API movie
Route::POST('admin/api_movie_submit', [App\Http\Controllers\admincontroller::class, 'api_movie_submit'])->name('api_movie_submit');


// comment
Route::POST('/add_comment', [App\Http\Controllers\commentcontroller::class, 'add_comment'])->name('add_comment');
Route::get('/pending_comment', [App\Http\Controllers\commentcontroller::class, 'pending_comment'])->name('pending_comment');
Route::POST('/accept_comment', [App\Http\Controllers\commentcontroller::class, 'accept_comment'])->name('accept_comment');
Route::POST('/update_accept_comment', [App\Http\Controllers\commentcontroller::class, 'update_accept_comment'])->name('update_accept_comment');
Route::POST('/reject_comment', [App\Http\Controllers\commentcontroller::class, 'reject_comment'])->name('reject_comment');
Route::get('/find_comment', [App\Http\Controllers\commentcontroller::class, 'find_comment'])->name('find_comment');
Route::POST('/find_comment_data', [App\Http\Controllers\commentcontroller::class, 'find_comment_data'])->name('find_comment_data');
Route::POST('/remove_movie_comment', [App\Http\Controllers\commentcontroller::class, 'remove_movie_comment'])->name('remove_movie_comment');
Route::POST('/update_movie_comment', [App\Http\Controllers\commentcontroller::class, 'update_movie_comment'])->name('update_movie_comment');
Route::POST('/update_comment_details', [App\Http\Controllers\commentcontroller::class, 'update_comment_details'])->name('update_comment_details');


});
