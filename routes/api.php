<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/users', [UserController::class, 'register']);
Route::post('/users/login', [UserController::class, 'login']);

Route::middleware(ApiAuthMiddleware::class)->group(function () {
    Route::get('/user/current', [UserController::class, 'get']);
    Route::patch('/user/current', [UserController::class, 'update']);
    Route::delete('/user/logout', [UserController::class, 'logout']);

    Route::post('/contact', [ContactController::class, 'create']);
    Route::get('/contact', [ContactController::class, 'search']);
    Route::get('/contact/{id}', [ContactController::class, 'get'])->where('id', '[0-9]+');
    Route::put('/contact/{id}', [ContactController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/contact/{id}', [ContactController::class, 'delete'])->where('id', '[0-9]+');

    Route::post('/contact/{idContact}/addresses', [AddressController::class, 'create'])->where('idContact', '[0-9]+');
    Route::get('/contact/{idContact}/addresses', [AddressController::class, 'list'])->where('idContact', '[0-9]+');
    Route::get('/contact/{idContact}/addresses/{idAddress}', [AddressController::class, 'create'])
        ->where('idContact', '[0-9]+')
        ->where('idAddress', '[0-9]+');
    Route::put('/contact/{idContact}/addresses/{idAddress}', [AddressController::class, 'update'])
        ->where('idContact', '[0-9]+')
        ->where('idAddress', '[0-9]+');
    Route::delete('/contact/{idContact}/addresses/{idAddress}', [AddressController::class, 'delete'])
        ->where('idContact', '[0-9]+')
        ->where('idAddress', '[0-9]+');
});


