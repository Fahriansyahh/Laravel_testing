<?php

use App\Http\Controllers\ControllerAuthentication;
use App\Http\Controllers\ControllerListUsers;
use App\Http\Controllers\ControllerManagement;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/signin');
});

Route::get('/home', function () {
    return view('home', [
        "pages" => "home"
    ]);
})->middleware('auth');

Route::get('/About', function () {
    return view('about', [
        "pages" => "About",
        "item" => User::find(6)->about->getOriginal()
    ]);
})->middleware('auth');


Route::get('/signin', [ControllerAuthentication::class, "login"])->name('login')->middleware('guest');
Route::post('/signin', [ControllerAuthentication::class, "authenticate"]);

Route::get('/signup', [ControllerAuthentication::class, "create"])->middleware('guest');
Route::post('/signup', [ControllerAuthentication::class, "store"]);

Route::post('/logout', [ControllerAuthentication::class, "logout"]);

Route::get('/List', [ControllerListUsers::class, "index"])->middleware('auth');


Route::get('/Management', [ControllerManagement::class, "index"])->middleware('auth');
Route::get('/Management/{management:position}', [ControllerManagement::class, "show"])->middleware('auth');
