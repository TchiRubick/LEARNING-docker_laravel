<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

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

Route::get('/articles', [ArticleController::class, 'getAll']);
Route::get('/articles/{barcode}', [ArticleController::class, 'getOne']);
Route::put('/articles/', [ArticleController::class, 'new']);
Route::post('/articles/{barcode}', [ArticleController::class, 'edit']);
Route::delete('/articles/{barcode}', [ArticleController::class, 'delete']);
