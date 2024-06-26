<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,

};
use App\Http\Controllers\Frontend\{
    CustomerController,
    ForemanController,
    ProjectController,
};


Auth::routes();

// my routes
Route::middleware(['auth'])->group(function () {

    //Language Translation
    Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
    Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

    Route::match(['get', 'post'], '/password', [UserController::class, 'index'])->name('password');


    //build marker routes
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer', 'index')->name('customer.index');
        Route::match(['get', 'post'], '/add_customer', 'store')->name('addCustomer');
        Route::get('/customer_edit/{id}', 'edit');
        Route::post('/update_customer/{id}', 'update');

        // Route::delete('/customer_delete/{id}', 'destroy');

    });
       Route::controller(ForemanController::class)->group(function () {
        Route::get('/foreman', 'index')->name('foreman');
        Route::match(['get', 'post'], '/add_foreman', 'store')->name('addForeman');
        Route::delete('/foreman_delete/{id}', 'destroy');
        Route::get('/foreman_edit/{id}/edit', 'edit');
        Route::post('/foreman_update/{id}', 'update');
    });
    Route::controller(ProjectController::class)->group(function () {
        Route::get('/project', 'index')->name('project');
        Route::match(['get', 'post'], '/add_project', 'store');
        Route::delete('/project_delete/{id}', 'destroy');
        Route::get('/project_edit/{id}/edit', 'edit');
        Route::post('/project_update/{id}', 'update');
        Route::get('/project_images/{id}', 'show');
        Route::delete('/project_image_delete/{id}', 'image_destroy');
    });
});



//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
