<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\User;

Route::middleware(['web'])->group(function(){

    Route::get("/test", function(){

        $user = auth()->user();

        var_dump($user->isAdminstrator());exit;
    });

    Route::get('/sitemap.xml', 'App\Http\Controllers\SitemapXmlController@index');

    Route::view('/', 'top-level.home')->name('home');

    Route::view('/projects', 'top-level.projects')->name('projects');

    Route::view('/about', 'top-level.about')->name('about');

    # Email Routes
    Route::resource('/contact', 'App\Http\Controllers\EmailController')->names(['index' => 'contact', 'store' => 'send']);
    Route::view('/email/success', 'email.success')->name('email/success');


    # Playground Routes
    Route::view('playground/item/1', 'playground.item-1')->name('play/item/1');
    Route::view('playground/item/2', 'playground.item-2')->name('play/item/2');
});



Route::middleware(['auth'])->group(function(){

    Route::view('/dashboard', 'top-level.dashboard')->name('dashboard');

});


require __DIR__.'/auth.php';
