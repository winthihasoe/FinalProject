<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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

Route::middleware('auth')->group(function(){
// Home Route 
    Route::get('/', [PageController::class,"index"])->name('home');
    // user
    Route::get('/user/createPost',[PageController::class,"createPost"])->name('createPost');
    Route::post('/user/createPost',[PageController::class,"post"])->name('post');
    Route::get('/post/edit/{id}',[PageController::class,"editPost"])->name('editPost');
    Route::post('/post/update/{id}',[PageController::class,"updatePost"])->name('updatePost');
    Route::get('/post/delete/{id}',[PageController::class,"deletePost"])->name('deletePost');
    Route::get('/post/{id}',[PageController::class,'postById'])->name('postById');
    Route::get('/user/userProfile',[PageController::class,"userProfile"])->name('userProfile');
    Route::post('/user/userProfile',[PageController::class,"post_userProfile"])->name('post_userProfile');
    Route::get('/user/contactUs',[PageController::class,"contactUs"])->name('contactUs');
    // admin 
    Route::get('/admin/index',[AdminController::class,'index'])->name('admin.index');
    Route::get('/admin/manage_premium_users',[AdminController::class,'manage_premium_users'])->name('admin.manage_premium_users');
    Route::get('/admin/contact_messages',[AdminController::class,'contact_messages'])->name('admin.contact_messages');
    Route::get('/logout',[AuthController::class,"logout"])->name('logout');

});

Route::middleware('guest')->group(function(){

    // Aunthentication route 
    Route::get('/login',[AuthController::class,"login"])->name('login');
    Route::post('/login',[AuthController::class,"post_login"])->name('post_login');
    Route::get('/register',[AuthController::class,"register"])->name('register');
    Route::post('/register',[AuthController::class,"post_register"])->name('post_register');
});
