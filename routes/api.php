<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\ProjectController;
use App\Http\Controllers\api\v1\CommentsController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/v1/login', 
 [App\Http\Controllers\api\v1\AuthController::class,
 'login'])->name('api.login');

 Route::middleware(['auth:sanctum'])->group(function() { 
    Route::post('/v1/logout', 
    [App\Http\Controllers\api\v1\AuthController::class, 
    'logout'])->name('api.logout');
   });
    
Route::apiResource('v1/category', CategoryController::class);
Route::apiResource('v1/project', ProjectController::class);
Route::apiResource('v1/comments', CommentsController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
