<?php

use App\Http\Controllers\BoardsController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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
    ->group(function () {
        Route::get('/boards/{board:uuid}', [BoardsController::class, 'show'])
            ->whereUuid('board')
            ->name('show');
        Route::get('/boards/create', [BoardsController::class, 'create'])
            ->name('create');
        Route::get('/boards/{board:uuid}/edit', [BoardsController::class, 'edit'])
            ->whereUuid('board')
            ->name('edit');
        Route::put('/boards/{board:uuid}/edit', [BoardsController::class, 'update'])
            ->whereUuid('board')
            ->name('update');
        Route::post('/boards/create', [BoardsController::class, 'store'])
            ->name('store');
        Route::delete('/boards/{board:uuid}/delete', [BoardsController::class, 'destroy'])
            ->name('destroy');
    });

Route::middleware(['auth:sanctum', 'verified'])->put('/teams/{team}/members/{user}/updatecolor',
    [TeamMemberController::class, 'updateColor'])
    ->name('team-member.updatecolor');

