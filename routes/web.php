<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('login');});
Route::post('/auth', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['isLogin'])->group(function () {
    Route::get('/events', [MainController::class, 'index']);
    Route::get('/events/create', [MainController::class, 'create']);
    Route::post('/events/insert', [MainController::class, 'insert']);
    Route::get('/events/view/{id}', [MainController::class, 'view']);
    Route::get('/events/edit/{id}', [MainController::class, 'edit']);
    Route::post('/events/update/{id}', [MainController::class, 'update']);
    Route::get('/events/delete/{id}', [MainController::class, 'delete']);
});


