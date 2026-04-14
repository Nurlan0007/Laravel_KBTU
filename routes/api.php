<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

//Public Route for Authentcation
Route::post('/Login', [AuthController::class, 'login']);

//Protected Routes
Route::middleware(['auth:sanctum'])->group(function () {

    //Grouping Category Routes for syntax
    Routes::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index');
        Route::get('/categories/{id}', 'store');
        Route::get('/categories/{category}', 'show');
        Route::put('/categories/{category}', 'update');
        Route::delete('/categories/{category}', 'destroy');

        //Custom route for getting categories by a specific product
        Route::get('/products/{product}/categories', 'getCAtegoryProducts');
    });
});

