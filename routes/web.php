<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function (){
    Route::get('register', 'registerView');
    Route::post('register', 'register')->name('auth.register');

    Route::get('login', 'loginView')->name('login');
    Route::post('login', 'login')->name('auth.login');

    Route::post('logout', 'logout')->name('logout');
});
Route::middleware(['auth'])->get('/', function () {
    return view('welcome');
});
