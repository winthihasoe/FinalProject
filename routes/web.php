<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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
    
    // view blade file
    Route::get('/', [PageController::class,"index"])->name('home'); // Home Route 
    Route::get('/user/createPost',[PageController::class,"createPost"])->name('createPost');
    Route::get('/post/edit/{id}',[PageController::class,"editPost"])->name('editPost');
    Route::get('/post/{id}',[PageController::class,'postById'])->name('postById');
    Route::get('/user/userProfile',[PageController::class,"userProfile"])->name('userProfile');
    Route::get('/user/contactUs',[PageController::class,"contactUs"])->name('contactUs');
    
    // post and backend 
    Route::post('/user/createPost',[PostController::class,"post"])->name('post');
    Route::post('/post/update/{id}',[PostController::class,"updatePost"])->name('updatePost');
    Route::get('/post/delete/{id}',[PostController::class,"deletePost"])->name('deletePost');
    Route::post('/user/userProfile',[AuthController::class,"post_userProfile"])->name('post_userProfile');
    Route::post('/user/contactUs',[ContactUsController::class,"post_contact_message"])->name('post_contact_message');
    Route::get('/logout',[AuthController::class,"logout"])->name('logout');

    // admin 
    Route::middleware('admin')->group(function(){
        Route::get('/admin/index',[AdminController::class,'index'])->name('admin.index');
        Route::get('/admin/manage_premium_users',[AdminController::class,'manage_premium_users'])->name('admin.manage_premium_users');
        Route::get('/admin/manage_premium_users/edit/{id}',[AdminController::class,'editUser'])->name('admin.editUser');
        Route::post('/admin/manage_premium_users/update/{id}',[AdminController::class,'updateUser'])->name('admin.updateUser');
        Route::get('/admin/manage_premium_users/delete/{id}',[AdminController::class,'deleteUser'])->name('admin.deleteUser');
        Route::get('/admin/contact_messages',[AdminController::class,'contact_messages'])->name('admin.contact_messages');
        Route::get('/admin/contact_messages/edit/{id}',[ContactUsController::class,"editMessage"])->name('editMessage');
        Route::post('/admin/contact_messages/update/{id}',[ContactUsController::class,"updateMessage"])->name('updateMessage');
        Route::get('/admin/contact_messages/delete/{id}',[ContactUsController::class,"deleteMessage"])->name('deleteMessage');
    });

});

Route::middleware('guest')->group(function(){

    // Aunthentication route 
    Route::get('/login',[AuthController::class,"login"])->name('login');
    Route::post('/login',[AuthController::class,"post_login"])->name('post_login');
    Route::get('/register',[AuthController::class,"register"])->name('register');
    Route::post('/register',[AuthController::class,"post_register"])->name('post_register');
});
