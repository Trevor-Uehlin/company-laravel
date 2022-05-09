<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Project;
use App\Models\Image;

Route::middleware(['web'])->group(function(){

    Route::get('/sitemap.xml', 'App\Http\Controllers\SitemapXmlController@index');

    Route::view('/', 'top-level.home')->name('home');

    Route::view('/about', 'top-level.about')->name('about');

    # Email Routes
    Route::resource('/contact', 'App\Http\Controllers\EmailController')->names(['index' => 'contact', 'store' => 'send']);
    Route::view('/email/success', 'email.success')->name('email/success');


    # Playground Routes
    Route::resource('weather', 'App\Http\Controllers\WeatherController')->names(['index' => 'weather']);
    Route::view('playground/item/2', 'playground.item-2')->name('play/item/2');
});



Route::middleware(['auth'])->group(function(){

    Route::view('/dashboard', 'top-level.dashboard')->name('dashboard');

});

Route::middleware(['admin'])->group(function(){

    Route::get("/test", function(){

        $project = Project::find(2);

        $images = $project->images;

        foreach($images as $image){

            print $image->title;
        }
    });


    #############################################   Users   ########################################################################

    Route::resource("/users", "App\Http\Controllers\UserController");

    Route::resource('/images', 'App\Http\Controllers\ImageController');


});

// Index is a public route...the rest are admin only.  (see the constructor)
Route::resource('/projects', 'App\Http\Controllers\ProjectController')->names(['index' => 'projects']);


require __DIR__.'/auth.php';
