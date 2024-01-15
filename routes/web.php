<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
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
    return view('pages.home');
});

Route::get('/home', function () {
    return view('pages.home');
})->middleware(['auth'])->name('pages.home');

require __DIR__ . '/auth.php';



Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.pages.dashboard.dashboard');
        })->name('Dashboard');

        /////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////
        Route::get('/clubs', [ClubController::class, "index"])->name('clubs');

        Route::get('/clubs/create', [ClubController::class, "create"])->name('clubs-create');
        Route::post('/clubs/store', [ClubController::class, "store"])->name('clubs-store');

        Route::get('/clubs/{id}/edit', [ClubController::class, "edit"])->name('clubs-edit');
        Route::put('/clubs/{id}', [ClubController::class, "update"])->name('clubs-update');

        Route::delete('/clubs/{id}', [ClubController::class, "destroy"])->name('clubs-delete');
        /////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////
        Route::get('/teams', [ClubController::class, "index"])->name('teams');

        Route::get('/teams/create', [ClubController::class, "create"])->name('teams-create');
        Route::post('/teams/store', [ClubController::class, "store"])->name('teams-store');

        Route::get('/teams/{id}/edit', [ClubController::class, "edit"])->name('teams-edit');
        Route::put('/teams/{id}', [ClubController::class, "update"])->name('teams-update');

        Route::delete('/teams/{id}', [ClubController::class, "destroy"])->name('teams-delete');
        /////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////
        
    });
});




require __DIR__ . '/adminauth.php';
