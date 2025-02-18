<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PhotoController;

// Basic Routes
Route::get('/world', function () {
    return 'World';
});

Route::get('/Love', function () {
    return 'Selamat Datang Di Local Hostnya Hammam ! ';
});

Route::get('/itsme', function () {
    return 'Hammam Abdullah Saeed B.G <br> N.A : 12 <br> Nim : 2341720203 <br> Class : TI_2i';
});

// Parameterized Routes
Route::get('/user/{name}', function ($name) {
    return 'My name is ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

// Optional Parameter Route (Only One Definition)
Route::get('/user/{name?}', function ($name = 'Hemooz') {
    return 'Nama saya ' . $name;
});

// Named Route
Route::get('/user/HammamProfile', function() {
    return 'This is Hammam Profile Page';
})->name('HammamProfile');

// Middleware Grouping
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        return 'Home with middleware';
    });

    Route::get('/user/profile', function () {
        return 'User Profile with middleware';
    });
});

// Subdomain Routing
Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        return "Subdomain: $account, User ID: $id";
    });
});

// Redirect Routes
Route::redirect('/here', '/there');

// View Routes
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

// Controller Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/articles/{id}', [ArticleController::class , 'articles']);

// Resource Controller
Route::resource('photos', PhotoController::class);


/// view 

Route::get('/greeting', function () {
    return view('hello', ['name' => 'Hammam']); // Replace 'Andi' with any name
});
