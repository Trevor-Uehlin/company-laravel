<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Project;

Route::middleware(['web'])->group(function(){

    Route::get('/sitemap.xml', 'App\Http\Controllers\SitemapXmlController@index');

    Route::view('/', 'top-level.home')->name('home');

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


    ########## Delete Routes #############################################
    // I can't delete without a form...I think.  Thats why I have to use these routes for now.

    Route::get("/users/delete/{id}", function($id){

        $user = User::find($id)->destroy($id);

        return redirect(route("users.index"));
    });

    Route::get("/projects/delete/{id}", function($id){

        $project = Project::find($id)->destroy($id);

        return redirect(route("projects"));
    })->name('project/delete');

});

// Index is a public route...the rest are admin only.  (see the constructor)
Route::resource('/projects', 'App\Http\Controllers\ProjectController')->names(['index' => 'projects']);


require __DIR__.'/auth.php';
