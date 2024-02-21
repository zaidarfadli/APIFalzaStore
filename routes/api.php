<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\GameController;
use App\Http\Controllers\API\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

// Route::post('/game/add-item-game', [ItemController::class, 'addGameItem'])->name('admin.addItemGames');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('registrasi', [AuthController::class, 'registrasi'])->name('login');
Route::get('/game', [GameController::class, 'readGame'])->name('user.games');
Route::get('/game/{game}', [ItemController::class, 'readGameItem'])->name('user.gamesItem');
Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::post('/game/add-item-game', [ItemController::class, 'addGameItem'])->name('admin.addItemGames');
});
