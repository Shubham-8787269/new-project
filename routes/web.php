<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/posts', [AuthController::class, 'index']);
Route::post('/posts/{post}/comment', [AuthController::class, 'store'])->name('comments.store');
Route::post('/comments/{comment}/reply', [AuthController::class, 'reply'])->name('comments.reply');


    Route::get('/welcome',[AuthController::class, 'welcome']);

Route::middleware('guest')->group(function(){


    Route::get('/register',[AuthController::class, 'register']);
    Route::get('/login',[AuthController::class, 'login']);
    Route::post('/register/store',[AuthController::class, 'registerStore']);
    Route::post('/login/store',[AuthController::class, 'postLogin']);


    });

Route::middleware('auth')->group(function(){

    
    Route::get('/dashboard',[AuthController::class, 'dashboard']);
    Route::get('/logout',[AuthController::class, 'logout']);
    Route::get('/add/post',[AuthController::class, 'addPost']);
    Route::get('/delete/post/{id}',[AuthController::class, 'deletePost']);
    Route::get('/edit/post/{id}',[AuthController::class, 'editPost']);
    Route::post('/update/post/{id}',[AuthController::class, 'Postupdate']);



    Route::post('/store/post',[AuthController::class, 'Poststore']);
    Route::post('/store/comment/{post}',[AuthController::class, 'commentStore']);
    Route::post('/store/reply',[AuthController::class, 'storeReply']);
    Route::post('/store/replytoreply',[AuthController::class, 'storeReplytoReply']);




});
