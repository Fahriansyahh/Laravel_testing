<?php

use App\Http\Controllers\ControllerListUsers;
use App\Http\Controllers\ControllerManagement;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home', [
        "pages" => "home"
    ]);
});

Route::get('/About', function () {
    return view('about', [
        "pages" => "About",
        "item" => User::find(6)->about->getOriginal()
    ]);
});


Route::get('/List', [ControllerListUsers::class, "index"]);


Route::get('/List/{slug}', [ControllerListUsers::class, "show"]);


Route::get('/Management', [ControllerManagement::class, "index"]);
Route::get('/Management/{management:position}', [ControllerManagement::class, "show"]);
