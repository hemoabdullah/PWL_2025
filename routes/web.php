<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/hello', function () {
    return 'Hello World';
});

//////

Route::get('/world', function () {
    return 'World';
   });
   
//////
   Route::get('/Love', function () {
    return 'Selamat Datang Di Local Hostnya Hammam ! ';
});

/////

Route::get('/itsme', function () {
    return 'Hammam Abdullah Saeed B.G <br> N.A : 12 <br> Nim : 2341720203 <br> Class : TI_2i';
});

/////
Route::get('/user/{name}', function ($name) {
    return 'My name is ' . $name;
});
/////

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

///

Route::get('/user/{name?}', function ($name = null) {
    return 'Nama saya ' . $name;
});

////

Route::get('/user/{name?}', function ($name = 'Hemooz') {
    return 'Nama saya ' . $name;
});

///

Route::get('/user/HammamProfile', function() {
    
})->name('HammamProfile');

//// - Route Group dan Route Prefixes

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Menggunakan middleware 'first' dan 'second'
    });

    Route::get('/user/profile', function () {
        // Menggunakan middleware 'first' dan 'second'
    });
});

Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        // Menggunakan subdomain '{account}' dan parameter '{id}'
    });
});

/// Route Prefixes

Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
    });
    
    // - Redirect Routes
    Route::redirect('/here', '/there');

    // - View Routes
    Route::view('/welcome', 'welcome');
    Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

    // Controller 

    
