<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PinController;
use App\Http\Controllers\Api\SavePostsController;
use App\Http\Controllers\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post( 'post-users/', [User::class , 'store']);
Route::get( 'get-users/', [User::class , 'index']);
Route::get( 'user/{id}', [User::class , 'user']);
Route::get( 'categories/', [CategoryController::class , 'index']);
Route::get( 'pins/', [PinController::class , 'index']);
Route::post( 'store-pin/', [PinController::class , 'store']);
Route::get( 'pins/{id}', [PinController::class , 'get_pin_by_category_id']);
Route::get( 'pin/{id}', [PinController::class , 'get_pin_by_id']);
Route::get( 'pin-poster/{id}', [PinController::class , 'get_pin_by_poster_id']);
Route::get( 'saved-pins/{id}', [SavePostsController::class , 'saved_pins']);
Route::get( 'save-pin', [SavePostsController::class , 'store']);
Route::get( 'pin-author/{id}', [SavePostsController::class , 'posted_by']);
Route::post( 'post-comment/', [CommentController::class , 'store']);
Route::get( 'comments/{id}', [CommentController::class , 'comments']);

