<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['web'])->group(function(){

    Route::get('/', function () {
        return view('home');
    });

    Route::view('/projects', 'projects')->name('projects');

    Route::view('/about', 'about')->name('about');

    Route::view('/contact', 'contact')->name('contact');
});



Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});


require __DIR__.'/auth.php';
