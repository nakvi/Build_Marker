<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CustomerController,
    LoginController,
    ForemanController,
    ProjectController
};
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class,'login']);
Route::post('reset_password', [LoginController::class,'resetPassword']);

Route::get('customer_detail', [CustomerController::class,'customerDetail']);
Route::get('customer_all_project', [CustomerController::class,'customerAllProject']);
Route::get('customer_single_project', [CustomerController::class,'customerSingleProject']);

Route::get('foreman_detail', [ForemanController::class,'foremanDetail']);
Route::get('foreman_all_project', [ForemanController::class,'foremanAllProject']);
Route::get('foreman_single_project', [ForemanController::class,'foremanSingleProject']);

Route::post('project_image', [ProjectController::class,'projectImages']);





