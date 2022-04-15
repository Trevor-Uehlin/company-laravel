<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['web'])->group(function(){

    Route::view('/', 'home')->name('home');

    Route::view('/projects', 'projects')->name('projects');

    Route::view('/about', 'about')->name('about');

    # Email Routes
    Route::resource('/contact', 'App\Http\Controllers\EmailController')->names(['index' => 'contact', 'store' => 'send']);
    Route::view('/email/success', 'email.success')->name('email/success');


    # Playground Routes
    Route::view('playground/item/1', 'playground.item-1')->name('play/item/1');
    Route::view('playground/item/2', 'playground.item-2')->name('play/item/2');
});



Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});


require __DIR__.'/auth.php';
