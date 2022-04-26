<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\BoardsController;
use App\Http\Controllers\ColumnsController;
use App\Http\Controllers\DashboardsController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->middleware('guest');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',
        [DashboardsController::class, 'index'])
    ->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->as('boards.')
    ->prefix('boards')
    ->group(function () {
        Route::get('/{board:uuid}', [BoardsController::class, 'show'])
            ->whereUuid('board')
            ->name('show');
        Route::get('/create', [BoardsController::class, 'create'])
            ->name('create');
        Route::post('/store', [BoardsController::class, 'store'])
            ->name('store');
            
        Route::post('/{board:uuid}/column', [ColumnsController::class, 'store'])
            ->whereUuid('board')
            ->name('column.store');

        Route::post('/{board:uuid}/column/card', [CardsController::class, 'store'])
            ->whereUuid('board')
            ->name('column.card.store');
    });