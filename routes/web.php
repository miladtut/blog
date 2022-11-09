<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::middleware ('guest')->group (function (){
    Route::get('/login', [AuthController::class,'login'])->name ('login');
    Route::post('/login', [AuthController::class,'post_login'])->name ('login');
    Route::get('/register', [AuthController::class,'register'])->name ('register');
    Route::post('/register', [AuthController::class,'post_register'])->name ('register');
});

Route::middleware ('auth')->group (function (){
    Route::get ('/',function (){
        return view ('welcome');
    })->name ('home');
    Route::get ('/logout',[AuthController::class,'logout'])->name ('logout');
});
