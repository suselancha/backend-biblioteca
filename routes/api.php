<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Book\BooksController;
use App\Http\Controllers\Rol\RolesController;
use App\Http\Controllers\Staff\StaffsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api', // Ver constructor
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->name('me');
});

Route::group([
    //'middleware' => 'auth:api', // Necesito estar logueado para tener un token
], function ($router) {
    Route::get('staffs/config', [StaffsController::class, "config"]);
    Route::resource('staffs', StaffsController::class);
    Route::resource('books', BooksController::class);
    
    
});


