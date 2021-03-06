<?php

use App\Http\Controllers\BoardsController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CardsController;
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

        Route::get('/{board:uuid}/edit', [BoardsController::class, 'edit'])
            ->whereUuid('board')
            ->name('edit');

        Route::put('/{board:uuid}/edit', [BoardsController::class, 'update'])
            ->whereUuid('board')
            ->name('update');

        Route::post('/create', [BoardsController::class, 'store'])
            ->name('store');

        Route::delete('/{board:uuid}/delete', [BoardsController::class, 'destroy'])
            ->name('destroy');

        //Column route
        Route::post('/{board:uuid}/column', [ColumnsController::class, 'store'])
            ->whereUuid('board')
            ->name('column.store');

        Route::delete('/{board:uuid}/column/{column}', [ColumnsController::class, 'destroy'])
            ->whereUuid('board')
            ->whereNumber('column')
            ->name('column.destroy');

        //Card route
        Route::post('/{board:uuid}/column/{column}/card', [CardsController::class, 'store'])
            ->whereUuid('board')
            ->whereNumber('column')
            ->name('column.card.store');

        Route::delete('/{board:uuid}/column/{column}/card/{card}', [CardsController::class, 'destroy'])
            ->whereUuid('board')
            ->whereNumber('column')
            ->whereNumber('card')
            ->name('column.card.destroy');

        Route::put('/{board:uuid}/column/{column}/move', [ColumnsController::class, 'moveColumn'])
            ->whereUuid('board')
            ->whereNumber('column')
            ->name('column.move');
        Route::put('/{board:uuid}/column/{column}/move/{card}', [CardsController::class, 'moveCard'])
            ->whereUuid('board')
            ->whereNumber('column')
            ->whereNumber('card')
            ->name('column.card.move');
    });

Route::middleware(['auth:sanctum', 'verified'])->put('/teams/{team}/members/{user}/updatecolor',
    [TeamMemberController::class, 'updateColor'])
    ->name('team-member.updatecolor');

